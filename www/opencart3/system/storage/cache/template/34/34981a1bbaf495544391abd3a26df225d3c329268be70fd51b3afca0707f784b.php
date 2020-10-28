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

/* extension/payment/cardinity_order.twig */
class __TwigTemplate_f2d2c764d7fb58efc8e0f95949379ab444451e5e441ca96adcd69fa2000ae31f extends \Twig\Template
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
        echo "<h3>";
        echo ($context["text_payment_info"] ?? null);
        echo "</h3>
<div class=\"alert alert-success\" style=\"display: none;\"><i class=\"fa fa-check-circle\"></i></div>
<div id=\"table-action\"></div>

<script type=\"text/javascript\"><!--
function getPayment() {
\t\$.ajax({
\t\turl: 'index.php?route=extension/payment/cardinity/getPayment&user_token=";
        // line 8
        echo ($context["user_token"] ?? null);
        echo "',
\t\tdataType: 'html',
\t\tdata: {
\t\t\torder_id: '";
        // line 11
        echo ($context["order_id"] ?? null);
        echo "'
\t\t},
\t\tbeforeSend: function() {
\t\t\t\$('#button-filter').button('loading');

\t\t\t\$('#table-action').html('<i class=\"cardinity-loading fa fa-spinner fa-spin fa-5x\" style=\"text-align: center; margin: 0 auto; width: 100%; font-size: 5em;\"></i>');
\t\t},
\t\tcomplete: function() {
\t\t\t\$('#button-filter').button('reset');
\t\t},
\t\tsuccess: function(html) {
\t\t\t\$('#table-action').html(html);
\t\t}
\t});
}

getPayment();
//--></script>";
    }

    public function getTemplateName()
    {
        return "extension/payment/cardinity_order.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 11,  48 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/payment/cardinity_order.twig", "");
    }
}
