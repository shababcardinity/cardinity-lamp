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

/* default/template/extension/payment/cardinity.twig */
class __TwigTemplate_bdee3482728d33b3069631ec6ade04714b90b690977a4a2bf0fa6cfcea17a8d2 extends \Twig\Template
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
        echo "<div style=\"display: none;\" class=\"payment-warning alert alert-danger\">
  <i class=\"fa fa-exclamation-circle\"></i>
  <span class=\"message\"></span>
</div>
<form class=\"form-horizontal\" id=\"payment\">
  <div class=\"form-group required\">
    <label class=\"col-sm-2 control-label\" for=\"input-holder\">";
        // line 7
        echo ($context["entry_holder"] ?? null);
        echo "</label>
    <div class=\"col-sm-10\">
\t  <input type=\"text\" autocomplete=\"off\" autocorrect=\"off\" autocapitalize=\"none\" spellcheck=\"false\" maxlength=\"32\" name=\"holder\" placeholder=\"";
        // line 9
        echo ($context["entry_holder"] ?? null);
        echo "\" id=\"input-holder\" class=\"form-control\" />
    </div>
  </div>
  <div class=\"form-group required\">
    <label class=\"col-sm-2 control-label\" for=\"input-pan\">";
        // line 13
        echo ($context["entry_pan"] ?? null);
        echo "</label>
    <div class=\"col-sm-10\">
\t  <input type=\"text\" autocomplete=\"off\" autocorrect=\"off\" autocapitalize=\"none\" spellcheck=\"false\" maxlength=\"19\" name=\"pan\" placeholder=\"";
        // line 15
        echo ($context["entry_pan"] ?? null);
        echo "\" id=\"input-pan\" class=\"form-control\" />
    </div>
  </div>
  <div id=\"expiry-date-group\" class=\"form-group required\">
    <label class=\"col-sm-2 control-label\">";
        // line 19
        echo ($context["entry_expires"] ?? null);
        echo "</label>
    <div class=\"col-sm-3\">
      <select name=\"exp_month\" class=\"form-control\">
       ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["months"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["month"]) {
            // line 23
            echo "        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["month"], "value", [], "any", false, false, false, 23);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["month"], "text", [], "any", false, false, false, 23);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['month'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "      </select>
    </div>
    <div class=\"col-sm-3\">
      <select name=\"exp_year\" class=\"form-control\">
       ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["years"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["year"]) {
            // line 30
            echo "        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["year"], "value", [], "any", false, false, false, 30);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["year"], "text", [], "any", false, false, false, 30);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['year'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo ">
      </select>
    </div>
  </div>
  <div class=\"form-group required\">
    <label class=\"col-sm-2 control-label\" for=\"input-cvc\">";
        // line 36
        echo ($context["entry_cvc"] ?? null);
        echo "</label>
    <div class=\"col-sm-10\">
\t  <input type=\"text\" autocomplete=\"off\" autocorrect=\"off\" autocapitalize=\"none\" spellcheck=\"false\" maxlength=\"4\" name=\"cvc\" placeholder=\"";
        // line 38
        echo ($context["entry_cvc"] ?? null);
        echo "\" id=\"input-cvc\" class=\"form-control\" />
    </div>
  </div>
  <div class=\"form-group\">
    <div class=\"col-sm-1 col-sm-offset-2\">
      <input id=\"button-confirm\" type=\"button\" value=\"";
        // line 43
        echo ($context["button_confirm"] ?? null);
        echo "\" class=\"btn btn-primary\" />
    </div>
  </div>
</form>
<div id=\"cardinity-3ds\"></div>
<script type=\"text/javascript\"><!--
\$('#button-confirm').on('click', function() {
\t\$.ajax({
\t\turl: 'index.php?route=extension/payment/cardinity/send',
\t\ttype: 'post',
\t\tdata: \$('#payment :input'),
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$('.payment-warning').hide();

\t\t\t\$('.payment-warning .message').text();

\t\t\t\$('#payment').find('*').removeClass('has-error');

\t\t\t\$('#button-confirm').button('loading').attr('disabled', true);
\t\t},
\t\tcomplete: function() {
\t\t\t\$('#button-confirm').button('reset');
\t\t},
\t\tsuccess: function(json) {
\t\t\tif (json['error']) {
\t\t\t\tif (json['error']['warning']) {
\t\t\t\t\t\$('.payment-warning').show();

\t\t\t\t\t\$('.payment-warning .message').text(json['error']['warning']);
\t\t\t\t}

\t\t\t\tif (json['error']['holder']) {
\t\t\t\t\t\$('#input-holder').closest('.form-group').addClass('has-error');
\t\t\t\t}

\t\t\t\tif (json['error']['pan']) {
\t\t\t\t\t\$('#input-pan').closest('.form-group').addClass('has-error');
\t\t\t\t}

\t\t\t\tif (json['error']['expiry_date']) {
\t\t\t\t\t\$('#expiry-date-group').addClass('has-error');
\t\t\t\t}

\t\t\t\tif (json['error']['cvc']) {
\t\t\t\t\t\$('#input-cvc').closest('.form-group').addClass('has-error');
\t\t\t\t}
\t\t\t}

\t\t\tif (json['3ds']) {
\t\t\t\t\$.ajax({
\t\t\t\t\turl: 'index.php?route=extension/payment/cardinity/threeDSecureForm',
\t\t\t\t\ttype: 'post',
\t\t\t\t\tdata: json['3ds'],
\t\t\t\t\tdataType: 'html',
\t\t\t\t\tsuccess: function(html) {
\t\t\t\t\t\t\$('#cardinity-3ds').html(html);
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}

\t\t\tif (json['redirect']) {
\t\t\t\tlocation = json['redirect'];
\t\t\t}
\t\t}
\t});
});
//--></script>";
    }

    public function getTemplateName()
    {
        return "default/template/extension/payment/cardinity.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 43,  123 => 38,  118 => 36,  111 => 31,  100 => 30,  96 => 29,  90 => 25,  79 => 23,  75 => 22,  69 => 19,  62 => 15,  57 => 13,  50 => 9,  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/payment/cardinity.twig", "");
    }
}
