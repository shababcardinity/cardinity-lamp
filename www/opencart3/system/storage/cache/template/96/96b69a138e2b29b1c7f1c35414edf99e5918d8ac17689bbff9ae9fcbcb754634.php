<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* extension/payment/cardinity_order_ajax.twig */
class __TwigTemplate_22ba2be7ebd5b2fe8bade676c06e8ea49533a34aecc9999a656283d6667676cb extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        if (($context["payment"] ?? null)) {
            // line 2
            echo "<table class=\"table table-bordered\">
  <tr>
\t<td>";
            // line 4
            echo ($context["column_refund_history"] ?? null);
            echo "</td>
\t<td>
\t\t<table class=\"table table-bordered\">
\t\t  <thead>
\t\t\t<tr>
\t\t\t  <td class=\"text-left\">";
            // line 9
            echo ($context["column_date"] ?? null);
            echo "</td>
\t\t\t  <td class=\"text-left\">";
            // line 10
            echo ($context["column_amount"] ?? null);
            echo "</td>
\t\t\t  <td class=\"text-left\">";
            // line 11
            echo ($context["column_status"] ?? null);
            echo "</td>
\t\t\t  <td class=\"text-left\">";
            // line 12
            echo ($context["column_description"] ?? null);
            echo "</td>
\t\t\t</tr>
\t\t  </thead>
\t\t  <tbody>
\t\t\t";
            // line 16
            if (($context["refunds"] ?? null)) {
                // line 17
                echo "\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["refunds"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["refund"]) {
                    // line 18
                    echo "\t\t\t<tr>
\t\t\t  <td>";
                    // line 19
                    echo twig_get_attribute($this->env, $this->source, $context["refund"], "date_added", [], "any", false, false, false, 19);
                    echo "</td>
\t\t\t  <td>";
                    // line 20
                    echo twig_get_attribute($this->env, $this->source, $context["refund"], "amount", [], "any", false, false, false, 20);
                    echo "</td>
\t\t\t  <td>";
                    // line 21
                    echo twig_get_attribute($this->env, $this->source, $context["refund"], "status", [], "any", false, false, false, 21);
                    echo "</td>
\t\t\t  <td>";
                    // line 22
                    echo twig_get_attribute($this->env, $this->source, $context["refund"], "description", [], "any", false, false, false, 22);
                    echo "</td>
\t\t\t</tr>
\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['refund'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 25
                echo "\t\t\t";
            } else {
                // line 26
                echo "\t\t\t<tr>
\t\t\t  <td class=\"text-center\" colspan=\"3\">";
                // line 27
                echo ($context["text_no_refund"] ?? null);
                echo "</td>
\t\t\t</tr>
\t\t\t";
            }
            // line 30
            echo "\t\t  </tbody>
\t\t</table>
\t</td>
  </tr>
  <tr>
\t<td>";
            // line 35
            echo ($context["column_action"] ?? null);
            echo "</td>
\t<td>
\t\t<table class=\"table table-bordered\">
\t\t  <thead>
\t\t\t<tr>
\t\t\t  <td class=\"text-left\">";
            // line 40
            echo ($context["column_refund"] ?? null);
            echo "</td>
\t\t\t</tr>
\t\t  </thead>
\t\t  <tbody>
\t\t\t<tr>
\t\t\t  <td>
\t\t\t\t  ";
            // line 46
            if (($context["refund_action"] ?? null)) {
                // line 47
                echo "\t\t\t\t  <label class=\"control-label\">Amount:</label>
\t\t\t\t  <input id=\"refund-amount\" text=\"text\" name=\"refund_amount\" value=\"";
                // line 48
                echo ($context["max_refund_amount"] ?? null);
                echo "\" />
\t\t\t\t  <label class=\"control-label\">Description:</label>
\t\t\t\t  <input id=\"refund-description\" text=\"text\" name=\"refund_description\" value=\"\" />
\t\t\t\t  <a class=\"btn btn-primary button-command\" data-type=\"refund\">";
                // line 51
                echo ($context["button_refund"] ?? null);
                echo "</a>
\t\t\t\t  ";
            } else {
                // line 53
                echo "\t\t\t\t  ";
                echo ($context["text_na"] ?? null);
                echo "
\t\t\t\t  ";
            }
            // line 55
            echo "\t\t\t  </td>
\t\t\t</tr>
\t\t  </tbody>
\t\t</table>
\t</td>
  </tr>
</table>
";
        } else {
            // line 63
            echo "Unable to find transaction for this order.
";
        }
        // line 65
        echo "
<script type=\"text/javascript\"><!--
\$('.button-command').on('click', function() {
\tvar confirm_text = '';

\t";
        // line 70
        if (($context["symbol_left"] ?? null)) {
            // line 71
            echo "\tconfirm_text = '";
            echo ($context["text_confirm_refund"] ?? null);
            echo " ' + '";
            echo ($context["symbol_left"] ?? null);
            echo "' + \$('#refund-amount').val();
\t";
        } elseif (        // line 72
($context["symbol_right"] ?? null)) {
            // line 73
            echo "\tconfirm_text = '";
            echo ($context["text_confirm_refund"] ?? null);
            echo " ' + \$('#refund-amount').val() + '";
            echo ($context["symbol_right"] ?? null);
            echo "';
\t";
        }
        // line 75
        echo "
\tif (confirm(confirm_text)) {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=extension/payment/cardinity/refund&user_token=";
        // line 78
        echo ($context["user_token"] ?? null);
        echo "',
\t\t\ttype: 'post',
\t\t\tdata: {
\t\t\t\tpayment_id: '";
        // line 81
        echo ($context["payment_id"] ?? null);
        echo "',
\t\t\t\tamount: \$('#refund-amount').val(),
\t\t\t\tdescription: \$('#refund-description').val()
\t\t\t},
\t\t\tdataType: 'json',
\t\t\tbeforeSend: function() {
\t\t\t\t\$('#button-settle').button('loading');

\t\t\t\t\$('.alert').hide();

\t\t\t\t\$('.alert').removeClass('alert-success alert-danger');
\t\t\t},
\t\t\tcomplete: function() {
\t\t\t\t\$('#button-settle').button('reset');
\t\t\t},
\t\t\tsuccess: function(json) {
\t\t\t\tif (json.error) {
\t\t\t\t\t\$('.alert').show();

\t\t\t\t\t\$('.alert').addClass('alert-danger');

\t\t\t\t\t\$('.alert').html('<i class=\"fa fa-check-circle\"></i> ' + json.error);
\t\t\t\t}

\t\t\t\tif (json.success) {
\t\t\t\t\t\$('.alert').show();

\t\t\t\t\t\$('.alert').addClass('alert-success');

\t\t\t\t\t\$('.alert').html('<i class=\"fa fa-exclamation-circle\"></i> ' + json.success);
\t\t\t\t}

\t\t\t\tgetPayment('";
        // line 113
        echo ($context["payment_id"] ?? null);
        echo "');
\t\t\t}
\t\t});
\t}
});
//--></script>";
    }

    public function getTemplateName()
    {
        return "extension/payment/cardinity_order_ajax.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 113,  210 => 81,  204 => 78,  199 => 75,  191 => 73,  189 => 72,  182 => 71,  180 => 70,  173 => 65,  169 => 63,  159 => 55,  153 => 53,  148 => 51,  142 => 48,  139 => 47,  137 => 46,  128 => 40,  120 => 35,  113 => 30,  107 => 27,  104 => 26,  101 => 25,  92 => 22,  88 => 21,  84 => 20,  80 => 19,  77 => 18,  72 => 17,  70 => 16,  63 => 12,  59 => 11,  55 => 10,  51 => 9,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/payment/cardinity_order_ajax.twig", "");
    }
}
