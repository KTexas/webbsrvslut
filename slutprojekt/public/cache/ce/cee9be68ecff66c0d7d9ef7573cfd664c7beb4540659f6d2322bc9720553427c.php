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
class __TwigTemplate_1c7290052b7f7eb5f58b30f9971fab399a8c388fb6d729836d5a50c291aa7b7f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
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
    <link rel=\"shortcut icon\" type='image/favicon' href=\"/favicon.ico\" />
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
        <a href=\"/\" class=\"home-button\" ><img src=\"assets/logo.png\" alt=\"\"></a>
        <ul class=\"right-nav\">
            <li class=\"nav-items\"><a href=\"/posters\">Posters</a></li>
            <li class=\"nav-items\"><a href=\"/contact\">Contact Us</a></li>
            <li class=\"nav-items\"><a href=\"/liked-products\"><img class=\"nav-image\" src=\"assets/heart-4x.png\" alt=\"cart\"></a></li>
            <li class=\"nav-items nav-cart\">
                <a href=\"/cart\">
                    <img class=\"nav-image\" src=\"assets/bag.png\" alt=\"cart\">
                    <p class=\"cart-amount\">";
        // line 24
        $this->displayBlock('cartAmount', $context, $blocks);
        echo "</p>
                </a>
            </li>
            <li class=\"nav-items\"><a href=\"/profile\"><img class=\"nav-image\" src=\"assets/profile.png\" alt=\"cart\"></a></li>
        </ul>
    </nav>
    <div class=\"container\">
        <div id=\"content\">";
        // line 31
        $this->displayBlock('content', $context, $blocks);
        echo "</div>
    </div>
";
        // line 33
        $this->displayBlock('script', $context, $blocks);
        // line 34
        echo "</body>
</html>";
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

    // line 24
    public function block_cartAmount($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 31
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 33
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
        return array (  119 => 33,  113 => 31,  107 => 24,  101 => 12,  97 => 11,  93 => 10,  88 => 34,  86 => 33,  81 => 31,  71 => 24,  55 => 12,  53 => 10,  42 => 1,);
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
    <link rel=\"shortcut icon\" type='image/favicon' href=\"/favicon.ico\" />
    <link rel=\"stylesheet\" href=\"/css/base.css\">
    {% block head %}
    {% endblock %}
    <title>{% block title %}{% endblock %} | HELISH</title>
</head>
<body>
    <nav class=\"nav\">
        <a href=\"/\" class=\"home-button\" ><img src=\"assets/logo.png\" alt=\"\"></a>
        <ul class=\"right-nav\">
            <li class=\"nav-items\"><a href=\"/posters\">Posters</a></li>
            <li class=\"nav-items\"><a href=\"/contact\">Contact Us</a></li>
            <li class=\"nav-items\"><a href=\"/liked-products\"><img class=\"nav-image\" src=\"assets/heart-4x.png\" alt=\"cart\"></a></li>
            <li class=\"nav-items nav-cart\">
                <a href=\"/cart\">
                    <img class=\"nav-image\" src=\"assets/bag.png\" alt=\"cart\">
                    <p class=\"cart-amount\">{% block cartAmount %}{% endblock %}</p>
                </a>
            </li>
            <li class=\"nav-items\"><a href=\"/profile\"><img class=\"nav-image\" src=\"assets/profile.png\" alt=\"cart\"></a></li>
        </ul>
    </nav>
    <div class=\"container\">
        <div id=\"content\">{% block content %}{% endblock %}</div>
    </div>
{% block script %}{% endblock %}
</body>
</html>", "base.twig", "C:\\code\\webbsrv\\app\\views\\base.twig");
    }
}
