<?php
/*
  Plugin Name: Cardinity Payment Gateway
  Plugin URI:
  Description: Cardinity payment gateway integration for WooCommerce.
  Version: 2.1.2
  Author: Cardinity
  Author URI: https://cardinity.com
  License: MIT
  WC tested up to: 4.3.2
 */

use Cardinity\Method\Payment\BrowserInfo;

if (!defined('ABSPATH')) {
	exit;
} // exit if accessed directly

function cardinity_init()
{
	if (!class_exists('WC_Payment_Gateway')) {
		return;
	} // if the WC payment gateway class is not available, do nothing

	if (class_exists('WC_Cardinity_Gateway')) {
		return;
	}

	if (!class_exists('Cardinity\Client')) {
		require_once(plugin_dir_path(__FILE__) . 'vendor/autoload.php');
	}

	/**
	 * Add the gateway to WooCommerce
	 *
	 * @param $methods
	 *
	 * @return array
	 */
	function add_cardinity_gateway_class($methods)
	{
		$methods[] = 'WC_Cardinity_Gateway';

		return $methods;
	}

	add_filter('woocommerce_payment_gateways', 'add_cardinity_gateway_class');

	/**
	 * Execute renewal payment
	 *
	 * @param $renewal_order
	 * @param $renewal_order
	 *
	 */
	function process_recurring($renewal_total, $renewal_order)
	{
		$recurringPayment = new WC_Cardinity_Gateway();
		$recurringPayment->process_subscription_payment($renewal_total, $renewal_order);
	}

	add_action('woocommerce_scheduled_subscription_payment_cardinity', 'process_recurring', 10, 2);

	class WC_Cardinity_Gateway extends WC_Payment_Gateway
	{

		/** @var boolean Whether or not logging is enabled */
		public static $log_enabled = false;

		/** @var WC_Logger Logger instance */
		public static $log = false;

		public function __construct()
		{
			$this->id           = 'cardinity';
			$this->icon         = apply_filters('woocommerce_cardinity_icon', plugins_url('images/cardinity.png', __FILE__));
			$this->method_title = 'Cardinity Payment Gateway';
			$this->notify_url   = WC()->api_request_url('WC_Gateway_Cardinity');

			// Load the settings
			$this->init_form_fields();
			$this->init_settings();

			$this->title           = $this->get_option('title');
			$this->description     = $this->get_option('description');
			$this->consumer_key    = $this->get_option('consumer_key');
			$this->consumer_secret = $this->get_option('consumer_secret');
			$this->project_key     = $this->get_option('project_key');
			$this->project_secret  = $this->get_option('project_secret');
			$this->external 	   = $this->get_option('external');
			$this->debug           = 'yes' === $this->get_option('debug', 'no');

			$this->has_fields   = $this->external == 'no' ? false : true;
			$this->supports     = $this->external == 'no' ? array(
				'products',
				'subscriptions',
				'multiple_subscriptions',
				'subscription_cancellation',
				'subscription_suspension',
				'subscription_reactivation',
				'subscription_amount_changes',
				'subscription_date_changes',
			) : array('products');

			self::$log_enabled = $this->debug;

			add_action('woocommerce_update_options_payment_gateways_' . $this->id,
						array($this, 'process_admin_options')
			);
			add_action('woocommerce_receipt_cardinity', array($this, 'receipt_page'));
			add_action('woocommerce_api_wc_gateway_cardinity', array($this, 'check_response'));

			if (!$this->is_valid_for_use()) {
				$this->enabled = 'no';
			}

			// add_action('admin_notices', array($this, 'do_ssl_check'));
		}

		/**
		 * Logging method
		 *
		 * @param  string $message
		 * @param  string $order_id
		 */
		public static function log($message, $order_id = '')
		{
			if (self::$log_enabled) {
				if (empty(self::$log)) {
					self::$log = new WC_Logger();
				}
				if (!empty($order_id)) {
					$message = 'Order: ' . $order_id . '. ' . $message;
				}
				self::$log->add('cardinity', $message);
			}
		}

		/**
		 * Check if store currency is supported
		 * @return bool true if currency is in Cardinity supported currencies list
		 */
		public function is_valid_for_use()
		{
			return in_array(get_woocommerce_currency(), apply_filters(
				'woocommerce_cardinity_supported_currencies',
				array('EUR', 'GBP', 'USD')
			));
		}

		/**
		 * Output admin panel options
		 */
		public function admin_options()
		{
			if ($this->is_valid_for_use()) {
				parent::admin_options();
			} else {
				?>
				<div class="inline error">
					<p>
						<strong><?php _e('Gateway Disabled', 'woocommerce'); ?></strong>: <?php _e('Cardinity does not support your store currency.', 'woocommerce'); ?></p>
				</div>
<?php
			}
		}

		/**
		 * Initialise gateway settings form fields
		 *
		 * @access public
		 * @return void
		 */
		function init_form_fields()
		{
			$this->form_fields = include('settings-cardinity.php');
		}

		/**
		 * This method echo's HTML for the CreditCard form.
		 */
		public function payment_fields()
		{
			if ($this->external == 'yes') { } else {
				if (WC()->version < '2.7.0') {
					$this->credit_card_form();
				} else {
					$cc     = new WC_Payment_Gateway_CC();
					$cc->id = $this->id;
					$cc->form();
				}
			}
		}

		/**
		 * Validate credit card data
		 *
		 * @return void
		 */
		public function validate_fields()
		{
			if ($this->external != 'yes') {
				if (!$this->isCreditCardNumber($_POST['cardinity-card-number'])) {
					wc_add_notice(__('Credit Card Number is not valid.', 'woocommerce'), 'error');
				}

				if (!$this->isCorrectExpireDate($_POST['cardinity-card-expiry'])) {
					wc_add_notice(__('Card Expiry Date is not valid.', 'woocommerce'), 'error');
				}

				if (!$_POST['cardinity-card-cvc']) {
					wc_add_notice(__('Card CVC is not entered.', 'woocommerce'), 'error');
				}
			}
		}

		/**
		 * Add notice in admin section if Cardinity gateway is used without SSL certificate
		 */
		public function do_ssl_check()
		{
			if ($this->enabled == 'yes') {
				if (get_option('woocommerce_force_ssl_checkout') == 'no') {
					echo "<div class=\"error\"><p>" .
						sprintf(__("<strong>%s</strong> is enabled and WooCommerce is not forcing the SSL certificate on your checkout page. Please ensure that you have a valid SSL certificate and that you are <a href=\"%s\">forcing the checkout pages to be secured.</a>"), $this->method_title, admin_url('admin.php?page=wc-settings&tab=checkout')) . "</p></div>";
				}
			}
		}

		/**
		 * Send payment request to Cardinity gateway
		 *
		 * @param int $order_id
		 *
		 * @return array
		 */
		function process_payment($order_id)
		{
			if ($this->external == 'yes') {
				return $this->process_external_payment($order_id);
			} else {
				return $this->process_direct_payment($order_id);
			}
		}

		/**
		 * Send payment through an external gateway
		 * 
		 * @param int $order_id
		 * 
		 * @return array
		 */

		public function process_external_payment($order_id)
		{
			$order = new WC_Order($order_id);
			$order->update_status('pending-payment', __('Awaiting payment', 'woocommerce'));

			$project_key = $this->project_key;
			$project_secret = $this->project_secret;
			$attributes = [
				"amount" => number_format($order->get_total(), 2),
				"currency" => $order->get_currency(),
				"country" => $order->get_billing_country(),
				"order_id" => $order_id,
				"description" => "WC-" . $order_id,
				"project_id" => $project_key,
				"return_url" => $this->get_return_url($order) . '&' . build_query(['wc-api'=>'WC_Gateway_Cardinity']),
			];
			
			ksort($attributes);

			$message = '';
			foreach ($attributes as $key => $value) {
				$message .= $key . $value;
			}

			$signature = hash_hmac('sha256', $message, $project_secret);
			$attributes["signature"] = $signature;
			$attributes['return_url'] = urlencode($attributes['return_url']);

			return array(
				'result'   => 'success',
				'redirect' => get_home_url() .
					'/wp-content/plugins/cardinity-free-payment-gateway-for-woocommerce/redirect-to-external-checkout.php?' . 
					build_query($attributes)
			);
		}

		/**
		 * Send payment through a direct gateway
		 * 
		 * @param int $order_id
		 * 
		 * @return array
		 */
		public function process_direct_payment($order_id)
		{
			$order = new WC_Order($order_id);

			$params = $this->getPaymentParams($order);
			$method = new Cardinity\Method\Payment\Create($params);

			$result = $this->sendCardinityRequest($method, $order_id);

			if ($result['status'] == 'approved') {
				$order->payment_complete($result['payment_id']);
				$order->add_order_note($result['message']);

				if (function_exists('wcs_order_contains_subscription') && wcs_order_contains_subscription($order)) {
					$subscriptions = wcs_get_subscriptions_for_order($order_id);
					foreach ($subscriptions as $subscription) {
						$subscription_id = $subscription->get_id();
						update_post_meta($subscription_id, '_crd_recurring_id', $result['payment_id'], true);
					}
				}

				WC()->cart->empty_cart();

				return array(
					'result'   => 'success',
					'redirect' => $this->get_return_url($order)
				);
			} elseif ($result['status'] == 'pending') {

				//3ds required 
				$this->testLog("3ds triggered");

				$order->add_order_note($result['message']);

				update_post_meta($order_id, '_transaction_id', $result['payment_id']);

				return array(
					'result'   => 'success',
					'redirect' => $order->get_checkout_payment_url(true)
				);
			} elseif ($result['status'] == 'declined') {
				$order->add_order_note($result['message']);
			}

			foreach ($result['errors'] as $error) {
				wc_add_notice($error, 'error');
				$this->testLog(print_r($error, true));
			}
			self::log('Direct payment errors: \r\n' . json_encode($result['errors']), $order_id);

			return null;
		}

		/**
		 * Send recurring payment request to Cardinity gateway
		 *
		 * @param $renewal_total
		 * @param object $order
		 *
		 * @return array
		 */
		public function process_subscription_payment($renewal_total, $order)
		{
			if (WC()->version < '2.7.0') {
				$order_id = $order->id;
			} else {
				$order_id = $order->get_id();
			};

			self::log('Starting Cardinity recurring processing', $order_id);

			$params = $this->getRecurringPaymentParams($order);
			$method = new Cardinity\Method\Payment\Create($params);

			$result = $this->sendCardinityRequest($method, $order_id);

			if ($result['status'] == 'approved') {
				$order->payment_complete($result['payment_id']);
				$order->add_order_note($result['message']);

				return array(
					'result'   => 'success',
					'redirect' => $this->get_return_url($order)
				);
			} elseif ($result['status'] == 'declined') {
				$order->add_order_note($result['message']);
				self::log('subscription payment declined', $order_id);
			}

			return null;
		}

		/**
		 * Hook to trigger 3D Secure redirect
		 *
		 * @param $order_id
		 */
		function receipt_page($order_id)
		{
			self::log('Performing POST redirect to 3D Secure ACS', $order_id);

			echo '<p>' . __(
				'Thank you for your order. Please click Continue button below to Authenticate your card.',
				'woocommerce'
			)
				. '</p>';

			echo $this->generate_threed_form();
		}

		/**
		 * Generate 3D Secure redirection form
		 *
		 * @return string Redirect form HTML
		 */
		public function generate_threed_form()
		{
			$threed_secure_args = array_merge(
				array(
					'PaReq'   => WC()->session->get('cardinity-pareq'),
					'MD'      => WC()->session->get('cardinity-MD'),
					'TermUrl' => $this->notify_url
				)
			);

			$threed_secure_args_array = array();

			foreach ($threed_secure_args as $key => $value) {
				$threed_secure_args_array[] = '<input type="hidden" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '" />';
			}

			wc_enqueue_js('jQuery("#threed_form_submit").click();');

			return '<form action="' . esc_url(WC()->session->get('cardinity-acs')) . '" method="post" id="threed_form">
					' . implode('', $threed_secure_args_array) . '
					<input type="submit" class="button" id="threed_form_submit" value="' . __('Continue', 'woocommerce') . '" />
				    </form>';
		}

		/**
		 * Process response
		 */
		public function check_response()
		{
			if ($this->external == 'yes') {
				return $this->check_response_external();
			} else {
				return $this->check_response_direct();
			}
		}

		public function check_response_external()
		{
			$order = wc_get_order($_POST['order_id']);

			$message = '';
			ksort($_POST);

			foreach ($_POST as $key => $value) {
				if ($key == 'signature') continue;
				$message .= $key . $value;
			}
			// Check if response is valid
			$signature = hash_hmac('sha256', $message, $this->project_secret);

			if ($signature == $_POST['signature'] && $_POST['status'] == 'approved') {
				WC()->cart->empty_cart();
				$order->payment_complete($_POST['id']);
			} else {
				$order->update_status('failed', __('Awaiting payment', 'woocommerce'));
				self::log('external checkout payment failed', $order_id);
			}
			wp_redirect($this->get_return_url($order));
			exit;
		}

		/**
		 * Process 3D Secure callback
		 */
		public function check_response_direct()
		{
			if (!empty($_POST['MD']) && !empty($_POST['PaRes'])) {
				$order = $this->get_cardinity_order(wp_unslash($_POST['MD']));

				if (WC()->version < '2.7.0') {
					$order_id = $order->id;
				} else {
					$order_id = $order->get_id();
				}

				self::log('Starting Cardinity 3D processing', $order_id);

				if ($order && $order->has_status('pending')) {
					$paymentId = $order->get_transaction_id();
					$PaRes     = wp_unslash($_POST['PaRes']);
					$method    = new Cardinity\Method\Payment\Finalize($paymentId, $PaRes);

					$result = $this->sendCardinityRequest($method, $order_id);

					if ($result['status'] == 'approved') {
						$order->payment_complete($result['payment_id']);
						$order->add_order_note($result['message']);

						if (function_exists('wcs_order_contains_subscription') && wcs_order_contains_subscription($order)) {
							$subscriptions = wcs_get_subscriptions_for_order($order_id);
							foreach ($subscriptions as $subscription) {
								$subscription_id = $subscription->get_id();
								update_post_meta($subscription_id, '_crd_recurring_id', $result['payment_id'], true);
							}
						}

						WC()->cart->empty_cart();

						wp_redirect($this->get_return_url($order));

						exit;
					} elseif ($result['status'] == 'declined') {
						$order->add_order_note($result['message']);
					}

					foreach ($result['errors'] as $error) {
						wc_add_notice($error, 'error');
					}
				} else {
					self::log('Invalid order status.', $order_id);
					wp_die('3D Secure Failure.', '3D Secure', array('response' => 500));
				}

				if (WC()->version < '2.5.0') {
					wp_redirect(apply_filters('woocommerce_get_checkout_url', WC()->cart->get_checkout_url()));
				} else {
					wp_redirect(wc_get_checkout_url());
				}

				exit;
			} else {
				self::log('Malformed or invalid Cardinity callback.');
				wp_die('3D Secure Failure.', '3D Secure', array('response' => 500));
			}
		}

		/**
		 * Get Cardinity client
		 *
		 * @return object
		 */
		private function getCardinityClient()
		{
			$client = Cardinity\Client::create([
				'consumerKey'    => $this->consumer_key,
				'consumerSecret' => $this->consumer_secret,
			]);

			return $client;
		}

		/**
		 * Send Cardinity payment request
		 *
		 * @param  object $method
		 * @param  int $order_id
		 *
		 * @return array
		 */
		private function sendCardinityRequest($method, $order_id)
		{
			$errors     = array();
			$status     = null;
			$message    = null;
			$payment_id = null;

			$client = $this->getCardinityClient();

			try {
				self::log('Calling Cardinity payment endpoint.', $order_id);

				$payment = $client->call($method);

				if ($payment->getStatus() == 'approved') {
					$status     = 'approved';
					$payment_id = $payment->getId();
					$message    = sprintf(__('Cardinity payment completed at: %s. Payment ID: %s', 'woocommerce'), $payment->getCreated(), $payment_id);

					self::log($message, $order_id);
				} else if ($payment->getStatus() == 'pending') {
					$status     = 'pending';
					$payment_id = $payment->getId();
					$message    = sprintf(__('Cardinity payment pending, 3D auth required. Payment ID: %s', 'woocommerce'), $payment_id);

					// Retrieve and set 3D Secure details
					$order = new WC_Order($order_id);
					if (WC()->version < '2.7.0') {
						$MD = urlencode($order->id . '-CRD-' . $order->order_key);
					} else {
						$MD = urlencode($order->get_id() . '-CRD-' . $order->get_order_key());
					}
					WC()->session->set('cardinity-acs', $payment->getAuthorizationInformation()->getUrl());
					WC()->session->set('cardinity-pareq', $payment->getAuthorizationInformation()->getData());
					WC()->session->set('cardinity-MD', $MD);

					self::log($message, $order_id);
				} else {
					array_push($errors, __('Payment failed: Internal Error.', 'woocommerce'));

					self::log('Unexpected payment response status.', $order_id);
				}
			} catch (Cardinity\Exception\Declined $exception) {
				$status     = 'declined';
				$payment    = $exception->getResult();
				$payment_id = $payment->getId();
				$message    = sprintf(__('Cardinity payment was declined: %s. Payment ID: %s', 'woocommerce'), $payment->getError(), $payment_id);
				array_push($errors, sprintf(__('Payment declined: %s', 'woocommerce'), $payment->getError()));

				self::log($message, $order_id);
			} catch (Cardinity\Exception\InvalidAttributeValue $exception) {
				$this->testLog(print_r($exception, true));
				foreach ($exception->getViolations() as $violation) {
					array_push($errors, sprintf(__('Validation error: %s', 'woocommerce'), $violation->getMessage()));

					self::log($violation->getPropertyPath() . ' ' . $violation->getMessage(), $order_id);
				}
			} catch (Cardinity\Exception\ValidationFailed $exception) {
				array_push($errors, sprintf(__('Payment failed: %s.', 'woocommerce'), $exception->getErrorsAsString()));

				self::log($exception->getErrorsAsString(), $order_id);
			} catch (Cardinity\Exception\NotFound $exception) {
				array_push($errors, __('Payment failed: Internal Error.', 'woocommerce'));

				self::log($exception->getErrorsAsString(), $order_id);
			} catch (Exception $exception) {
				array_push($errors, __('Payment failed: Internal Error.', 'woocommerce'));

				self::log($exception->getMessage(), $order_id);
				self::log($exception->getPrevious()->getMessage(), $order_id);
			}

			return array(
				'status'     => $status,
				'errors'     => $errors,
				'message'    => $message,
				'payment_id' => $payment_id
			);
		}

		/**
		 * Find WooCommerce order by callback MD value
		 *
		 * @param $MD
		 *
		 * @return bool - false | object $order
		 */
		private function get_cardinity_order($MD)
		{
			if (($custom = explode('-CRD-', $MD))) {
				$order_id  = $custom[0];
				$order_key = $custom[1];
			} else {
				self::log('Error: Order ID and key were not found in "custom".');

				return false;
			}

			if (!$order = wc_get_order($order_id)) {
				// We have an invalid $order_id, probably because invoice_prefix has changed
				$order_id = wc_get_order_id_by_order_key($order_key);
				$order    = wc_get_order($order_id);
			}

			if (WC()->version < '2.7.0') {
				$key = $order->order_key;
			} else {
				$key = $order->get_order_key();
			}

			if (!$order || $key !== $order_key) {
				self::log('Error: Order keys do not match.');

				return false;
			}

			return $order;
		}

		/**
		 * Get required Cardinity payment parameters
		 *
		 * @param object $order
		 *
		 * @return array
		 */
		private function getPaymentParams($order)
		{

			

			if (WC()->version < '2.7.0') {
				$order_id    = $order->id;
				$amount      = (float) $order->order_total;
				$holder_name = mb_substr($order->billing_first_name . ' ' . $order->billing_last_name, 0, 32);
				if (!empty($order->billing_country)) {
					$country = $order->billing_country;
				} else {
					$country = $order->shipping_country;
				}
			} else {
				$order_id    = $order->get_id();
				$amount      = (float) $order->get_total();
				$holder_name = mb_substr($order->get_billing_first_name() . ' ' . $order->get_billing_last_name(), 0, 32);
				if ($order->get_billing_country()) {
					$country = $order->get_billing_country();
				} else {
					$country = $order->get_shipping_country();
				}
			}

			$crd_order_id      = str_pad($order_id, 2, '0', STR_PAD_LEFT);
			$cvc               = sanitize_text_field($_POST['cardinity-card-cvc']);
			$card_number       = str_replace(' ', '', sanitize_text_field($_POST['cardinity-card-number']));
			$card_expire_array = explode('/', sanitize_text_field($_POST['cardinity-card-expiry']));
			$exp_month         = (int) $card_expire_array[0];
			$exp_year          = (int) $card_expire_array[1];
			if ($exp_year < 100) {
				$exp_year += 2000;
			}

			$threeDS2Data = new Cardinity\Method\Payment\ThreeDS2Data();

			$briws = new BrowserInfo();

			//$threeDS2Data->setBrowserInfo();

			$this->testLog(print_r($threeDS2Data, true));

			return [
				'amount'             => $amount,
				'currency'           => get_woocommerce_currency(),
				'order_id'           => $crd_order_id,
				'country'            => $country,
				'payment_method'     => Cardinity\Method\Payment\Create::CARD,
				'payment_instrument' => [
					'pan'       => $card_number,
					'exp_year'  => $exp_year,
					'exp_month' => $exp_month,
					'cvc'       => $cvc,
					'holder'    => $holder_name
				],
				'threeds2_data' 	=> [
					'notification_url' => 'https://testas.do/wcommerce/?test=test',
					"browser_info" => [
							"accept_header" => "text/html",
							"browser_language" => "en-US",
							"screen_width" => 1920,
							"screen_height" => 1040,
							"user_agent" => "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:21.0) Gecko/20100101 Firefox/21.0",
							"color_depth" => 24,
							"time_zone" => -60
					]
				]
			];
		}

		/**
		 * Get required Cardinity recurring payment parameters
		 *
		 * @param object $order
		 *
		 * @return array
		 */
		private function getRecurringPaymentParams($order)
		{
			if (WC()->version < '2.7.0') {
				$order_id = $order->id;
				$amount   = (float) $order->order_total;
				if (!empty($order->billing_country)) {
					$country = $order->billing_country;
				} else {
					$country = $order->shipping_country;
				}
			} else {
				$order_id = $order->get_id();
				$amount   = (float) $order->get_total();
				if ($order->get_billing_country()) {
					$country = $order->get_billing_country();
				} else {
					$country = $order->get_shipping_country();
				}
			}

			$crd_order_id = str_pad($order_id, 2, '0', STR_PAD_LEFT);

			$payment = [
				'amount'             => $amount,
				'currency'           => get_woocommerce_currency(),
				'order_id'           => $crd_order_id,
				'country'            => $country,
				'payment_method'     => Cardinity\Method\Payment\Create::RECURRING,
				'payment_instrument' => [
					'payment_id' => get_post_meta($order_id, '_crd_recurring_id', true)
				]
			];

			return $payment;
		}

		/**
		 * Check if credit card number is valid
		 *
		 * @param $toCheck
		 *
		 * @return bool
		 */
		private function isCreditCardNumber($toCheck)
		{
			$number = preg_replace('/[^0-9]+/', '', $toCheck);

			if (!is_numeric($number)) {
				return false;
			}

			$strlen = strlen($number);
			$sum    = 0;

			if ($strlen < 13) {
				return false;
			}

			for ($i = 0; $i < $strlen; $i++) {
				$digit = substr($number, $strlen - $i - 1, 1);
				if ($i % 2 == 1) {
					$sub_total = $digit * 2;
					if ($sub_total > 9) {
						$sub_total = 1 + ($sub_total - 10);
					}
				} else {
					$sub_total = $digit;
				}
				$sum += $sub_total;
			}

			if ($sum > 0 and $sum % 10 == 0) {
				return true;
			}

			return false;
		}

		/**
		 * Check if card expiry date is in the future
		 *
		 * @param $toCheck
		 *
		 * @return bool
		 */
		private function isCorrectExpireDate($toCheck)
		{
			if (!preg_match('/^([0-9]{2})\\s\\/\\s([0-9]{2,4})$/', $toCheck, $exp_date)) {
				return false;
			}

			$month = $exp_date[1];
			$year  = $exp_date[2];

			$now       = time();
			$result    = false;
			$thisYear  = (int) date('y', $now);
			$thisMonth = (int) date('m', $now);

			if (is_numeric($year) && is_numeric($month)) {
				if ($year > 100) {
					$year -= 2000;
				}

				if ($thisYear == (int) $year) {
					$result = (int) $month >= $thisMonth;
				} else if ($thisYear < (int) $year) {
					$result = true;
				}
			}

			return $result;
		}

		private function testLog($message){

			$pluginlog = plugin_dir_path(__FILE__).'debug.log';
			$message = $message.PHP_EOL;
			error_log($message, 3, $pluginlog);

		}
	}
}

add_action('plugins_loaded', 'cardinity_init');
