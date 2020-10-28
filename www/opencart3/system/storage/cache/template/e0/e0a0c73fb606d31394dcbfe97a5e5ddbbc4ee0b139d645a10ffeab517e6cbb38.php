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
class __TwigTemplate_1d3fc774d3910037ab4cbac6fff1f8bb1b9fabe4aef930eaf581d3a02ad9a5ac extends \Twig\Template
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
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-key\">";
        // line 48
        echo ($context["project_key"] ?? null);
        echo "</label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <input type=\"text\" name=\"payment_cardinity_project_key\" value=\"";
        // line 50
        echo ($context["payment_cardinity_project_key"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["project_key"] ?? null);
        echo "\" id=\"input-key\" class=\"form-control\"/>
\t\t\t  ";
        // line 51
        if (($context["error_project_key"] ?? null)) {
            // line 52
            echo "\t\t\t  <div class=\"text-danger\">";
            echo ($context["error_project_key"] ?? null);
            echo "</div>
\t\t\t  ";
        }
        // line 54
        echo "\t\t\t</div>
\t\t  </div>
\t\t  <div class=\"form-group\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-secret\">";
        // line 57
        echo ($context["project_secret"] ?? null);
        echo "</label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <input type=\"text\" name=\"payment_cardinity_project_secret\" value=\"";
        // line 59
        echo ($context["payment_cardinity_project_secret"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["project_secret"] ?? null);
        echo "\" id=\"input-secret\" class=\"form-control\"/>
\t\t\t  ";
        // line 60
        if (($context["error_project_secret"] ?? null)) {
            // line 61
            echo "\t\t\t  <div class=\"text-danger\">";
            echo ($context["error_project_secret"] ?? null);
            echo "</div>
\t\t\t  ";
        }
        // line 63
        echo "\t\t\t</div>
\t\t  </div>

\t\t  <div class=\"form-group\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-external\"><span data-toggle=\"tooltip\" title=\"";
        // line 67
        echo ($context["help_external"] ?? null);
        echo "\">";
        echo ($context["entry_external"] ?? null);
        echo "</span></label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <select name=\"payment_cardinity_external\" id=\"input-external\" class=\"form-control\">
\t\t\t\t";
        // line 70
        if (($context["payment_cardinity_external"] ?? null)) {
            // line 71
            echo "\t\t\t\t<option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t<option value=\"0\">";
            // line 72
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t";
        } else {
            // line 74
            echo "\t\t\t\t<option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t<option value=\"0\" selected=\"selected\">";
            // line 75
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t";
        }
        // line 77
        echo "\t\t\t  </select>
\t\t\t</div>
\t\t  </div>


\t\t  <div class=\"form-group\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-debug\"><span data-toggle=\"tooltip\" title=\"";
        // line 83
        echo ($context["help_debug"] ?? null);
        echo "\">";
        echo ($context["entry_debug"] ?? null);
        echo "</span></label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <select name=\"payment_cardinity_debug\" id=\"input-debug\" class=\"form-control\">
\t\t\t\t";
        // line 86
        if (($context["payment_cardinity_debug"] ?? null)) {
            // line 87
            echo "\t\t\t\t<option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t<option value=\"0\">";
            // line 88
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t";
        } else {
            // line 90
            echo "\t\t\t\t<option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t<option value=\"0\" selected=\"selected\">";
            // line 91
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t";
        }
        // line 93
        echo "\t\t\t  </select>
\t\t\t</div>
\t\t  </div>
\t\t  <div class=\"form-group\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-total\"><span data-toggle=\"tooltip\" title=\"";
        // line 97
        echo ($context["help_total"] ?? null);
        echo "\">";
        echo ($context["entry_total"] ?? null);
        echo "</span></label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <input type=\"text\" name=\"payment_cardinity_total\" value=\"";
        // line 99
        echo ($context["payment_cardinity_total"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_total"] ?? null);
        echo "\" id=\"input-total\" class=\"form-control\" />
\t\t\t</div>
\t\t  </div>
\t\t  <div class=\"form-group\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-order-status\">";
        // line 103
        echo ($context["entry_order_status"] ?? null);
        echo "</label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <select name=\"payment_cardinity_order_status_id\" id=\"input-order-status\" class=\"form-control\">
\t\t\t\t";
        // line 106
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 107
            echo "\t\t\t\t";
            if ((twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 107) == ($context["payment_cardinity_order_status_id"] ?? null))) {
                // line 108
                echo "\t\t\t\t<option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 108);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 108);
                echo "</option>
\t\t\t\t";
            } else {
                // line 110
                echo "\t\t\t\t<option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 110);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 110);
                echo "</option>
\t\t\t\t";
            }
            // line 112
            echo "\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "\t\t\t  </select>
\t\t\t</div>
\t\t  </div>
\t\t  <div class=\"form-group\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-geo-zone\">";
        // line 117
        echo ($context["entry_geo_zone"] ?? null);
        echo "</label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <select name=\"payment_cardinity_geo_zone_id\" id=\"input-geo-zone\" class=\"form-control\">
\t\t\t\t<option value=\"0\">";
        // line 120
        echo ($context["text_all_zones"] ?? null);
        echo "</option>
\t\t\t\t";
        // line 121
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["geo_zones"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["geo_zone"]) {
            // line 122
            echo "\t\t\t\t";
            if ((twig_get_attribute($this->env, $this->source, $context["geo_zone"], "geo_zone_id", [], "any", false, false, false, 122) == ($context["payment_cardinity_geo_zone_id"] ?? null))) {
                // line 123
                echo "\t\t\t\t<option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["geo_zone"], "geo_zone_id", [], "any", false, false, false, 123);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["geo_zone"], "name", [], "any", false, false, false, 123);
                echo "</option>
\t\t\t\t";
            } else {
                // line 125
                echo "\t\t\t\t<option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["geo_zone"], "geo_zone_id", [], "any", false, false, false, 125);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["geo_zone"], "name", [], "any", false, false, false, 125);
                echo "</option>
\t\t\t\t";
            }
            // line 127
            echo "\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['geo_zone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 128
        echo "\t\t\t  </select>
\t\t\t</div>
\t\t  </div>
\t\t  <div class=\"form-group\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 132
        echo ($context["entry_status"] ?? null);
        echo "</label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <select name=\"payment_cardinity_status\" id=\"input-status\" class=\"form-control\">
\t\t\t\t";
        // line 135
        if (($context["payment_cardinity_status"] ?? null)) {
            // line 136
            echo "\t\t\t\t<option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t<option value=\"0\">";
            // line 137
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t";
        } else {
            // line 139
            echo "\t\t\t\t<option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t<option value=\"0\" selected=\"selected\">";
            // line 140
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t";
        }
        // line 142
        echo "\t\t\t  </select>
\t\t\t</div>
\t\t  </div>
\t\t  <div class=\"form-group\">
\t\t\t<label class=\"col-sm-2 control-label\" for=\"input-sort-order\">";
        // line 146
        echo ($context["entry_sort_order"] ?? null);
        echo "</label>
\t\t\t<div class=\"col-sm-10\">
\t\t\t  <input type=\"text\" name=\"payment_cardinity_sort_order\" value=\"";
        // line 148
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
        // line 158
        echo ($context["datepicker"] ?? null);
        echo "',
\tpickTime: false
});
//--></script>
";
        // line 162
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
        return array (  442 => 162,  435 => 158,  420 => 148,  415 => 146,  409 => 142,  404 => 140,  399 => 139,  394 => 137,  389 => 136,  387 => 135,  381 => 132,  375 => 128,  369 => 127,  361 => 125,  353 => 123,  350 => 122,  346 => 121,  342 => 120,  336 => 117,  330 => 113,  324 => 112,  316 => 110,  308 => 108,  305 => 107,  301 => 106,  295 => 103,  286 => 99,  279 => 97,  273 => 93,  268 => 91,  263 => 90,  258 => 88,  253 => 87,  251 => 86,  243 => 83,  235 => 77,  230 => 75,  225 => 74,  220 => 72,  215 => 71,  213 => 70,  205 => 67,  199 => 63,  193 => 61,  191 => 60,  185 => 59,  180 => 57,  175 => 54,  169 => 52,  167 => 51,  161 => 50,  156 => 48,  150 => 44,  144 => 42,  142 => 41,  136 => 40,  131 => 38,  126 => 35,  120 => 33,  118 => 32,  112 => 31,  107 => 29,  102 => 27,  96 => 24,  92 => 22,  84 => 18,  82 => 17,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/payment/cardinity.twig", "");
    }
}
