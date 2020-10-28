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

/* extension/payment/cardinity.twig */
class __TwigTemplate_582a0906ae786f3821b0e8ebb9b307b51df80c873f6399c37c073614251dd7f6 extends \Twig\Template
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
        echo ($context["header"] ?? null);
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">
        <button type=\"submit\" form=\"form-payment\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 7
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 8
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "        <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 11);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 11);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 17
        if (($context["error_warning"] ?? null)) {
            // line 18
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 22
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 24
        echo ($context["text_edit"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 27
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-payment\" class=\"form-horizontal\">
\t\t  <div class=\"form-group required\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-key\">";
        // line 29
        echo ($context["entry_key"] ?? null);
        echo "</label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <input type=\"text\" name=\"payment_cardinity_key\" value=\"";
        // line 31
        echo ($context["payment_cardinity_key"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_key"] ?? null);
        echo "\" id=\"input-key\" class=\"form-control\"/>
\t\t\t  ";
        // line 32
        if (($context["error_key"] ?? null)) {
            // line 33
            echo "\t\t\t  <div class=\"text-danger\">";
            echo ($context["error_key"] ?? null);
            echo "</div>
\t\t\t  ";
        }
        // line 35
        echo "\t\t\t</div>
\t\t  </div>
\t\t  <div class=\"form-group required\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-secret\">";
        // line 38
        echo ($context["entry_secret"] ?? null);
        echo "</label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <input type=\"text\" name=\"payment_cardinity_secret\" value=\"";
        // line 40
        echo ($context["payment_cardinity_secret"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_secret"] ?? null);
        echo "\" id=\"input-secret\" class=\"form-control\"/>
\t\t\t  ";
        // line 41
        if (($context["error_secret"] ?? null)) {
            // line 42
            echo "\t\t\t  <div class=\"text-danger\">";
            echo ($context["error_secret"] ?? null);
            echo "</div>
\t\t\t  ";
        }
        // line 44
        echo "\t\t\t</div>
\t\t  </div>
\t\t  <div class=\"form-group\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-debug\"><span data-toggle=\"tooltip\" title=\"";
        // line 47
        echo ($context["help_debug"] ?? null);
        echo "\">";
        echo ($context["entry_debug"] ?? null);
        echo "</span></label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <select name=\"payment_cardinity_debug\" id=\"input-debug\" class=\"form-control\">
\t\t\t\t";
        // line 50
        if (($context["payment_cardinity_debug"] ?? null)) {
            // line 51
            echo "\t\t\t\t<option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t<option value=\"0\">";
            // line 52
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t";
        } else {
            // line 54
            echo "\t\t\t\t<option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t<option value=\"0\" selected=\"selected\">";
            // line 55
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t";
        }
        // line 57
        echo "\t\t\t  </select>
\t\t\t</div>
\t\t  </div>
\t\t  <div class=\"form-group\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-total\"><span data-toggle=\"tooltip\" title=\"";
        // line 61
        echo ($context["help_total"] ?? null);
        echo "\">";
        echo ($context["entry_total"] ?? null);
        echo "</span></label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <input type=\"text\" name=\"payment_cardinity_total\" value=\"";
        // line 63
        echo ($context["payment_cardinity_total"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_total"] ?? null);
        echo "\" id=\"input-total\" class=\"form-control\" />
\t\t\t</div>
\t\t  </div>
\t\t  <div class=\"form-group\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-order-status\">";
        // line 67
        echo ($context["entry_order_status"] ?? null);
        echo "</label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <select name=\"payment_cardinity_order_status_id\" id=\"input-order-status\" class=\"form-control\">
\t\t\t\t";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 71
            echo "\t\t\t\t";
            if ((twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 71) == ($context["payment_cardinity_order_status_id"] ?? null))) {
                // line 72
                echo "\t\t\t\t<option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 72);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 72);
                echo "</option>
\t\t\t\t";
            } else {
                // line 74
                echo "\t\t\t\t<option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 74);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 74);
                echo "</option>
\t\t\t\t";
            }
            // line 76
            echo "\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "\t\t\t  </select>
\t\t\t</div>
\t\t  </div>
\t\t  <div class=\"form-group\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-geo-zone\">";
        // line 81
        echo ($context["entry_geo_zone"] ?? null);
        echo "</label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <select name=\"payment_cardinity_geo_zone_id\" id=\"input-geo-zone\" class=\"form-control\">
\t\t\t\t<option value=\"0\">";
        // line 84
        echo ($context["text_all_zones"] ?? null);
        echo "</option>
\t\t\t\t";
        // line 85
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["geo_zones"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["geo_zone"]) {
            // line 86
            echo "\t\t\t\t";
            if ((twig_get_attribute($this->env, $this->source, $context["geo_zone"], "geo_zone_id", [], "any", false, false, false, 86) == ($context["payment_cardinity_geo_zone_id"] ?? null))) {
                // line 87
                echo "\t\t\t\t<option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["geo_zone"], "geo_zone_id", [], "any", false, false, false, 87);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["geo_zone"], "name", [], "any", false, false, false, 87);
                echo "</option>
\t\t\t\t";
            } else {
                // line 89
                echo "\t\t\t\t<option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["geo_zone"], "geo_zone_id", [], "any", false, false, false, 89);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["geo_zone"], "name", [], "any", false, false, false, 89);
                echo "</option>
\t\t\t\t";
            }
            // line 91
            echo "\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['geo_zone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "\t\t\t  </select>
\t\t\t</div>
\t\t  </div>
\t\t  <div class=\"form-group\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 96
        echo ($context["entry_status"] ?? null);
        echo "</label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <select name=\"payment_cardinity_status\" id=\"input-status\" class=\"form-control\">
\t\t\t\t";
        // line 99
        if (($context["payment_cardinity_status"] ?? null)) {
            // line 100
            echo "\t\t\t\t<option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t<option value=\"0\">";
            // line 101
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t";
        } else {
            // line 103
            echo "\t\t\t\t<option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t<option value=\"0\" selected=\"selected\">";
            // line 104
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t";
        }
        // line 106
        echo "\t\t\t  </select>
\t\t\t</div>
\t\t  </div>
\t\t  <div class=\"form-group\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-sort-order\">";
        // line 110
        echo ($context["entry_sort_order"] ?? null);
        echo "</label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <input type=\"text\" name=\"payment_cardinity_sort_order\" value=\"";
        // line 112
        echo ($context["payment_cardinity_sort_order"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_sort_order"] ?? null);
        echo "\" id=\"input-sort-order\" class=\"form-control\" />
\t\t\t</div>
\t\t  </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('.date').datetimepicker({
\tlanguage: '";
        // line 122
        echo ($context["datepicker"] ?? null);
        echo "',
\tpickTime: false
});
//--></script>
";
        // line 126
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/payment/cardinity.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  354 => 126,  347 => 122,  332 => 112,  327 => 110,  321 => 106,  316 => 104,  311 => 103,  306 => 101,  301 => 100,  299 => 99,  293 => 96,  287 => 92,  281 => 91,  273 => 89,  265 => 87,  262 => 86,  258 => 85,  254 => 84,  248 => 81,  242 => 77,  236 => 76,  228 => 74,  220 => 72,  217 => 71,  213 => 70,  207 => 67,  198 => 63,  191 => 61,  185 => 57,  180 => 55,  175 => 54,  170 => 52,  165 => 51,  163 => 50,  155 => 47,  150 => 44,  144 => 42,  142 => 41,  136 => 40,  131 => 38,  126 => 35,  120 => 33,  118 => 32,  112 => 31,  107 => 29,  102 => 27,  96 => 24,  92 => 22,  84 => 18,  82 => 17,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/payment/cardinity.twig", "");
    }
}
