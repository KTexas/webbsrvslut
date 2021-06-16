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

/* cardtest.twig */
class __TwigTemplate_1187ed08ad51475420ca2ef3640920f31b8d7af4902d76f042f6141d1555da36 extends Template
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
        echo "<!DOCTYPE html>
<html>
<head>

    <title>Example 01 - Basic Examples | CardJs</title>

    <script src=\"https://code.jquery.com/jquery-1.11.3.min.js\"></script>

    <link href=\"/css/lib/cardjs/card-js.min.css\" rel=\"stylesheet\" type=\"text/css\" />
    <script src=\"/js/lib/cardjs/card-js.js\"></script>

</head>
<body>

<!-- Basic -->
<div class=\"card-js\">
    <input class=\"card-number my-custom-class\" name=\"card-number\">
    <input class=\"name\" id=\"the-card-name-id\" name=\"card-holders-name\" placeholder=\"Name on card\">
    <input class=\"expiry-month\" name=\"expiry-month\">
    <input class=\"expiry-year\" name=\"expiry-year\">
    <input class=\"cvc\" name=\"cvc\">
</div>


<!-- Add Name -->
<div style=\"margin-top: 50px\">
    <div class=\"card-js\" data-capture-name=\"true\"></div>
</div>


<!-- Change Icon Color -->
<div style=\"margin-top: 50px\">
    <div class=\"card-js\" data-capture-name=\"true\" data-icon-colour=\"#158CBA\"></div>
</div>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "cardtest.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>

    <title>Example 01 - Basic Examples | CardJs</title>

    <script src=\"https://code.jquery.com/jquery-1.11.3.min.js\"></script>

    <link href=\"/css/lib/cardjs/card-js.min.css\" rel=\"stylesheet\" type=\"text/css\" />
    <script src=\"/js/lib/cardjs/card-js.js\"></script>

</head>
<body>

<!-- Basic -->
<div class=\"card-js\">
    <input class=\"card-number my-custom-class\" name=\"card-number\">
    <input class=\"name\" id=\"the-card-name-id\" name=\"card-holders-name\" placeholder=\"Name on card\">
    <input class=\"expiry-month\" name=\"expiry-month\">
    <input class=\"expiry-year\" name=\"expiry-year\">
    <input class=\"cvc\" name=\"cvc\">
</div>


<!-- Add Name -->
<div style=\"margin-top: 50px\">
    <div class=\"card-js\" data-capture-name=\"true\"></div>
</div>


<!-- Change Icon Color -->
<div style=\"margin-top: 50px\">
    <div class=\"card-js\" data-capture-name=\"true\" data-icon-colour=\"#158CBA\"></div>
</div>

</body>
</html>", "cardtest.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\cardtest.twig");
    }
}
