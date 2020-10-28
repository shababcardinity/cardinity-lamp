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

/* default/template/extension/payment/cardinity_3ds.twig */
class __TwigTemplate_eb2868ddfccecfa0c182bc18791fc6d2ef6036950a9d36cd281d83ed25523fa7 extends \Twig\Template
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
        if (($context["success"] ?? null)) {
            // line 2
            echo "<form id=\"cardinity-3ds-form\" name=\"ThreeDForm\" method=\"POST\" action=\"";
            echo ($context["url"] ?? null);
            echo "\">
\t<input type=\"hidden\" name=\"PaReq\" value=\"";
            // line 3
            echo ($context["PaReq"] ?? null);
            echo "\" />
\t<input type=\"hidden\" name=\"TermUrl\" value=\"";
            // line 4
            echo ($context["TermUrl"] ?? null);
            echo "\" />
\t<input type=\"hidden\" name=\"MD\" value=\"";
            // line 5
            echo ($context["MD"] ?? null);
            echo "\" />
</form>
<script type=\"text/javascript\"><!--
\$('#cardinity-3ds-form').submit();
//--></script>
";
        }
        // line 11
        if (($context["redirect"] ?? null)) {
            // line 12
            echo "<script type=\"text/javascript\"><!--
location = '";
            // line 13
            echo ($context["redirect"] ?? null);
            echo "';
//--></script>
";
        }
    }

    public function getTemplateName()
    {
        return "default/template/extension/payment/cardinity_3ds.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 13,  63 => 12,  61 => 11,  52 => 5,  48 => 4,  44 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/payment/cardinity_3ds.twig", "");
    }
}
