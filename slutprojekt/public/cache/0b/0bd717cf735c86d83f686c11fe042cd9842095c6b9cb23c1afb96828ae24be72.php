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

/* cart.confirm-order.twig */
class __TwigTemplate_3786f18d433eed1dd261f94cf87927e0c287939b0a462c53a31143168d1f61bb extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
            'script' => [$this, 'block_script'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.twig", "cart.confirm-order.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Cart";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <link rel=\"stylesheet\" href=\"/css/cart.css\">
    <link rel=\"stylesheet\" href=\"/css/lib/jessepollak/card.css\">
";
    }

    // line 8
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 9
        echo "    <div class=\"form-container\">
        <div class=\"card-wrapper\"></div>
        <form action=\"/make-order\" method=\"post\" class=\"co-form\">
            <h2>Payment Method</h2>
            <div class=\"co-row\" id=\"co-row-1\">
                <input type=\"text\" name=\"number\" placeholder=\"Valid Card Number\" required>
            </div>
            <div class=\"co-row\">
                <input type=\"text\" name=\"last-name\" placeholder=\"Last Name\" required/>
                <input type=\"text\" name=\"first-name\" placeholder=\"First Name\" required/>
            </div>
            <div class=\"co-row\">
                <input type=\"text\" name=\"expiry\" placeholder=\"MM/YY\" required/>
                <input type=\"text\" name=\"cvc\" placeholder=\"CVC\" required/>
            </div>

            <div class=\"map-container map-container-live\">
                <iframe
                        class=\"destination-map\"
                        width=\"100%\"
                        height=\"100%\"
                        style=\"border:0\"
                        src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBWN6IL8paR0hWUg9Gy0QBx0JC5oQRbVP4&q=,,\" allowfullscreen>
                </iframe>
            </div>
            <h2>Destination</h2>
            <input onchange=\"updateMap()\" type=\"text\" placeholder=\"Country\" name=\"country\" id=\"inp-country\" required>
            <input onchange=\"updateMap()\" type=\"text\" placeholder=\"City\" name=\"city\" id=\"inp-city\" required>
            <input onchange=\"updateMap()\" type=\"text\" placeholder=\"Street\" name=\"street\" id=\"inp-street\" required>
            <input onchange=\"updateMap()\" type=\"number\" placeholder=\"Zip Code\" name=\"zip-code\" id=\"inp-zip\" required>
            <input type=\"submit\" value=\"Proceed\">
        </form>
    </div>
";
    }

    // line 43
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 44
        echo "    <script src=\"/js/lib/jessepollak/card.js\"></script>
    <script>
        var card = new Card({
            form: 'form',
            container: '.card-wrapper',

            formSelectors: {
                nameInput: 'input[name=\"first-name\"], input[name=\"last-name\"]'
            }
        });
    </script>
    <script src=\"/js/liveMap.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "cart.confirm-order.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 44,  107 => 43,  70 => 9,  66 => 8,  60 => 5,  56 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Cart{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"/css/cart.css\">
    <link rel=\"stylesheet\" href=\"/css/lib/jessepollak/card.css\">
{% endblock %}
{% block content %}
    <div class=\"form-container\">
        <div class=\"card-wrapper\"></div>
        <form action=\"/make-order\" method=\"post\" class=\"co-form\">
            <h2>Payment Method</h2>
            <div class=\"co-row\" id=\"co-row-1\">
                <input type=\"text\" name=\"number\" placeholder=\"Valid Card Number\" required>
            </div>
            <div class=\"co-row\">
                <input type=\"text\" name=\"last-name\" placeholder=\"Last Name\" required/>
                <input type=\"text\" name=\"first-name\" placeholder=\"First Name\" required/>
            </div>
            <div class=\"co-row\">
                <input type=\"text\" name=\"expiry\" placeholder=\"MM/YY\" required/>
                <input type=\"text\" name=\"cvc\" placeholder=\"CVC\" required/>
            </div>

            <div class=\"map-container map-container-live\">
                <iframe
                        class=\"destination-map\"
                        width=\"100%\"
                        height=\"100%\"
                        style=\"border:0\"
                        src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBWN6IL8paR0hWUg9Gy0QBx0JC5oQRbVP4&q=,,\" allowfullscreen>
                </iframe>
            </div>
            <h2>Destination</h2>
            <input onchange=\"updateMap()\" type=\"text\" placeholder=\"Country\" name=\"country\" id=\"inp-country\" required>
            <input onchange=\"updateMap()\" type=\"text\" placeholder=\"City\" name=\"city\" id=\"inp-city\" required>
            <input onchange=\"updateMap()\" type=\"text\" placeholder=\"Street\" name=\"street\" id=\"inp-street\" required>
            <input onchange=\"updateMap()\" type=\"number\" placeholder=\"Zip Code\" name=\"zip-code\" id=\"inp-zip\" required>
            <input type=\"submit\" value=\"Proceed\">
        </form>
    </div>
{% endblock %}
{% block script %}
    <script src=\"/js/lib/jessepollak/card.js\"></script>
    <script>
        var card = new Card({
            form: 'form',
            container: '.card-wrapper',

            formSelectors: {
                nameInput: 'input[name=\"first-name\"], input[name=\"last-name\"]'
            }
        });
    </script>
    <script src=\"/js/liveMap.js\"></script>
{% endblock %}
", "cart.confirm-order.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\cart.confirm-order.twig");
    }
}
