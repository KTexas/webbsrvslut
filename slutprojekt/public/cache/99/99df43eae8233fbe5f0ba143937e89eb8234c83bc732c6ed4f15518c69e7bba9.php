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

/* base.twig */
class __TwigTemplate_00e473bce32061b9a347885c10c763685f30d3c083d033a5ec14eb2d91582bf6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'favicon' => [$this, 'block_favicon'],
            'head' => [$this, 'block_head'],
            'title' => [$this, 'block_title'],
            'cartAmount' => [$this, 'block_cartAmount'],
            'content' => [$this, 'block_content'],
            'script' => [$this, 'block_script'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <link rel=\"shortcut icon\" type='image/favicon' href=\"/favicon";
        // line 8
        $this->displayBlock('favicon', $context, $blocks);
        echo ".ico\" />
    <link rel=\"stylesheet\" href=\"/css/base.css\">
    ";
        // line 10
        $this->displayBlock('head', $context, $blocks);
        // line 12
        echo "    <title>";
        $this->displayBlock('title', $context, $blocks);
        echo " | HELISH</title>
</head>
<body>
    <nav class=\"nav\">
        <a href=\"/\" class=\"home-button\" ><img src=\"/assets/logo.png\" alt=\"Helish\"></a>
        <ul class=\"right-nav\">
            <li class=\"nav-items\"><a href=\"/search\"><img class=\"nav-image\" src=\"/assets/search.png\" alt=\"search\"></a></li>
            <li class=\"nav-items\"><a href=\"/posters\">Posters</a></li>
";
        // line 21
        echo "            <li class=\"nav-items\"><a href=\"/liked-products\"><img class=\"nav-image\" src=\"/assets/heart-4x.png\" alt=\"liked products\"></a></li>
            <li class=\"nav-items nav-cart\">
                <a href=\"/cart\">
                    <img class=\"nav-image\" src=\"/assets/bag.png\" alt=\"cart\">
                    <p class=\"cart-amount\">";
        // line 25
        $this->displayBlock('cartAmount', $context, $blocks);
        echo "</p>
                </a>
            </li>
            <li class=\"nav-items\"><a href=\"/profile\"><img class=\"nav-image\" src=\"/assets/profile.png\" alt=\"profile\"></a></li>
        </ul>
    </nav>
    <div class=\"container\">
        <div id=\"content\">";
        // line 32
        $this->displayBlock('content', $context, $blocks);
        echo "</div>
    </div>
    <script
            src=\"https://code.jquery.com/jquery-3.6.0.js\"
            integrity=\"sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=\"
            crossorigin=\"anonymous\"></script>
";
        // line 38
        $this->displayBlock('script', $context, $blocks);
        // line 40
        echo "</body>
</html>";
    }

    // line 8
    public function block_favicon($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 10
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "    ";
    }

    // line 12
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 25
    public function block_cartAmount($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 32
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 38
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function getDebugInfo()
    {
        return array (  135 => 38,  129 => 32,  123 => 25,  117 => 12,  113 => 11,  109 => 10,  103 => 8,  98 => 40,  96 => 38,  87 => 32,  77 => 25,  71 => 21,  59 => 12,  57 => 10,  52 => 8,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <link rel=\"shortcut icon\" type='image/favicon' href=\"/favicon{% block favicon %}{% endblock %}.ico\" />
    <link rel=\"stylesheet\" href=\"/css/base.css\">
    {% block head %}
    {% endblock %}
    <title>{% block title %}{% endblock %} | HELISH</title>
</head>
<body>
    <nav class=\"nav\">
        <a href=\"/\" class=\"home-button\" ><img src=\"/assets/logo.png\" alt=\"Helish\"></a>
        <ul class=\"right-nav\">
            <li class=\"nav-items\"><a href=\"/search\"><img class=\"nav-image\" src=\"/assets/search.png\" alt=\"search\"></a></li>
            <li class=\"nav-items\"><a href=\"/posters\">Posters</a></li>
{#            <li class=\"nav-items\"><a href=\"/contact\">Contact Us</a></li>#}
            <li class=\"nav-items\"><a href=\"/liked-products\"><img class=\"nav-image\" src=\"/assets/heart-4x.png\" alt=\"liked products\"></a></li>
            <li class=\"nav-items nav-cart\">
                <a href=\"/cart\">
                    <img class=\"nav-image\" src=\"/assets/bag.png\" alt=\"cart\">
                    <p class=\"cart-amount\">{% block cartAmount %}{% endblock %}</p>
                </a>
            </li>
            <li class=\"nav-items\"><a href=\"/profile\"><img class=\"nav-image\" src=\"/assets/profile.png\" alt=\"profile\"></a></li>
        </ul>
    </nav>
    <div class=\"container\">
        <div id=\"content\">{% block content %}{% endblock %}</div>
    </div>
    <script
            src=\"https://code.jquery.com/jquery-3.6.0.js\"
            integrity=\"sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=\"
            crossorigin=\"anonymous\"></script>
{% block script %}
{% endblock %}
</body>
</html>", "base.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\base.twig");
    }
}
