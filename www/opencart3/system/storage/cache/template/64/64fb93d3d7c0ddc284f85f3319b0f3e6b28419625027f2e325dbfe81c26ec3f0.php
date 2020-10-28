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

/* default/template/extension/payment/cardinity_external.twig */
class __TwigTemplate_af1b9b7f4cedeed0471131bb5121ab6222363a77b29e19d32b60288dde226ab1 extends \Twig\Template
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
        echo "<html>
   <head >
      <title>Credit/Debit Card Payment By Cardinity</title>
   </head>
   <body>
       <div>
            <form name=\"checkout\" method=\"POST\" action=\"https://checkout.cardinity.com\">
                <button type=submit class=\"btn btn-primary\">Pay now</button>
                <input type=\"hidden\" name=\"amount\" value=\"";
        // line 9
        echo ($context["amount"] ?? null);
        echo "\" />
                <input type=\"hidden\" name=\"country\" value=\"";
        // line 10
        echo ($context["country"] ?? null);
        echo "\" />
                <input type=\"hidden\" name=\"currency\" value=\"";
        // line 11
        echo ($context["currency"] ?? null);
        echo "\" />
                <input type=\"hidden\" name=\"order_id\" value=\"";
        // line 12
        echo ($context["order_id"] ?? null);
        echo "\" />
                <input type=\"hidden\" name=\"description\" value=\"";
        // line 13
        echo ($context["description"] ?? null);
        echo "\" />
                <input type=\"hidden\" name=\"return_url\" value=\"";
        // line 14
        echo ($context["return_url"] ?? null);
        echo "\" />
                <input type=\"hidden\" name=\"project_id\" value=\"";
        // line 15
        echo ($context["project_id"] ?? null);
        echo "\" />
                <input type=\"hidden\" name=\"signature\" value=\"";
        // line 16
        echo ($context["signature"] ?? null);
        echo "\" />
            </form
       </div>
   </body>
</html>";
    }

    public function getTemplateName()
    {
        return "default/template/extension/payment/cardinity_external.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 16,  71 => 15,  67 => 14,  63 => 13,  59 => 12,  55 => 11,  51 => 10,  47 => 9,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/payment/cardinity_external.twig", "");
    }
}
