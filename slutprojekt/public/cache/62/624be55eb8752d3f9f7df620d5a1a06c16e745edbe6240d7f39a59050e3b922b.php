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

/* main.poster-details.twig */
class __TwigTemplate_b92a57620c0a8e367f0ec4240b8f4fed61e25c4520bab836ba073d21d0100e32 extends Template
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
            'favicon' => [$this, 'block_favicon'],
            'cartAmount' => [$this, 'block_cartAmount'],
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
        $this->parent = $this->loadTemplate("base.twig", "main.poster-details.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "name", [], "any", false, false, false, 3), "html", null, true);
        echo " Poster";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <link rel=\"stylesheet\" href=\"css/poster-details.css\">
";
    }

    // line 7
    public function block_favicon($context, array $blocks = [])
    {
        $macros = $this->macros;
        if ( !(($context["cartAmount"] ?? null) === 0)) {
            echo "-cart";
        }
    }

    // line 8
    public function block_cartAmount($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 9
        echo "    ";
        if ((($context["cartAmount"] ?? null) === 0)) {
            // line 10
            echo "    ";
        } else {
            // line 11
            echo "        ";
            echo twig_escape_filter($this->env, ($context["cartAmount"] ?? null), "html", null, true);
            echo "
    ";
        }
    }

    // line 14
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        echo "    <div class=\"poster-container\">

        <div class=\"url-route\">
            <a href=\"/\">POSTERS</a>
            <p>&#160;/ ";
        // line 19
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "name", [], "any", false, false, false, 19)), "html", null, true);
        echo "</p>
        </div>
        <img class=\"poster-image\" src=\"/assets/posters/";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "image", [], "any", false, false, false, 21), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "image", [], "any", false, false, false, 21), "html", null, true);
        echo "\">
        <div class=\"line-breaker\"></div>
        <h1 class=\"title\">";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "name", [], "any", false, false, false, 23), "html", null, true);
        echo "</h1>
        <div class=\"price-container\">
            <p class=\"poster-price\" id=\"price-label\">
                ";
        // line 26
        $context["price"] = 99;
        // line 27
        echo "                ";
        $context["price"] = (($context["price"] ?? null) + twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "extra_price", [], "any", false, false, false, 27));
        // line 28
        echo "                ";
        echo twig_escape_filter($this->env, ($context["price"] ?? null), "html", null, true);
        echo "
            </p>
            <p class=\"poster-price\">&#160;kr</p>
        </div>
        <form action=\"/add-cart\" method=\"post\" class=\"order-form\">
            <p class=\"select-label\">Chose size</p>
            <input type=\"hidden\" name=\"product_id\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "id", [], "any", false, false, false, 34), "html", null, true);
        echo "\">
            <input type=\"hidden\" name=\"location\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
        echo "\">
            <select class=\"clickable\" name=\"poster_size\" id=\"poster-size\" onchange=\"getText(this)\">
                <option value=\"21x30\">21x30</option>
                <option value=\"30x40\">30x40</option>
                <option value=\"30x40\">40x50</option>
                <option value=\"50x70\">50x70</option>
                <option value=\"70x100\">70x100</option>
            </select>
            <div class=\"submit-container\">
                <button type=\"submit\" class=\"clickable\">
                    Add to
                    <img src=\"/assets/bag-white.png\" alt=\"cart\">
                </button>
            </div>
        </form>

    </div>
    ";
        // line 52
        if (($context["addCartAnim"] ?? null)) {
            // line 53
            echo "        <div class=\"cart-popup\">
            <div class=\"cp-text-container\">
                <img class=\"cp-shopping-bag\" src=\"/assets/bag-white.png\" alt=\"\">
                <p>\"";
            // line 56
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "name", [], "any", false, false, false, 56), "html", null, true);
            echo "\" was added to your cart!</p>
            </div>
            <img class=\"cp-img-background\" src=\"/assets/posters/";
            // line 58
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "image", [], "any", false, false, false, 58), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "image", [], "any", false, false, false, 58), "html", null, true);
            echo "\">
        </div>
    ";
        }
        // line 61
        echo "
";
    }

    // line 64
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 65
        echo "<script>
    let DivTxt = [
        99 + ";
        // line 67
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "extra_price", [], "any", false, false, false, 67), "html", null, true);
        echo ",
        159 + ";
        // line 68
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "extra_price", [], "any", false, false, false, 68), "html", null, true);
        echo ",
        199 + ";
        // line 69
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "extra_price", [], "any", false, false, false, 69), "html", null, true);
        echo ",
        249 + ";
        // line 70
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "extra_price", [], "any", false, false, false, 70), "html", null, true);
        echo ",
        379 + ";
        // line 71
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "extra_price", [], "any", false, false, false, 71), "html", null, true);
        echo "
    ]

    function getText(selction){
        textSelected = selction.selectedIndex;
        document.querySelector('#price-label').innerHTML = DivTxt[textSelected];
        document.querySelector('#form-price').value = DivTxt[textSelected];
    }
</script>
";
    }

    public function getTemplateName()
    {
        return "main.poster-details.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 71,  207 => 70,  203 => 69,  199 => 68,  195 => 67,  191 => 65,  187 => 64,  182 => 61,  174 => 58,  169 => 56,  164 => 53,  162 => 52,  142 => 35,  138 => 34,  128 => 28,  125 => 27,  123 => 26,  117 => 23,  110 => 21,  105 => 19,  99 => 15,  95 => 14,  87 => 11,  84 => 10,  81 => 9,  77 => 8,  68 => 7,  63 => 5,  59 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}{{ poster.name }} Poster{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"css/poster-details.css\">
{% endblock %}
{% block favicon %}{% if cartAmount is not same as(0) %}-cart{% endif %}{% endblock %}
{% block cartAmount %}
    {% if cartAmount is same as(0) %}
    {% else %}
        {{ cartAmount }}
    {% endif %}
{% endblock %}
{% block content %}
    <div class=\"poster-container\">

        <div class=\"url-route\">
            <a href=\"/\">POSTERS</a>
            <p>&#160;/ {{ poster.name | upper }}</p>
        </div>
        <img class=\"poster-image\" src=\"/assets/posters/{{ poster.image }}\" alt=\"{{ poster.image }}\">
        <div class=\"line-breaker\"></div>
        <h1 class=\"title\">{{ poster.name }}</h1>
        <div class=\"price-container\">
            <p class=\"poster-price\" id=\"price-label\">
                {% set price = 99 %}
                {% set price = price + poster.extra_price %}
                {{ price }}
            </p>
            <p class=\"poster-price\">&#160;kr</p>
        </div>
        <form action=\"/add-cart\" method=\"post\" class=\"order-form\">
            <p class=\"select-label\">Chose size</p>
            <input type=\"hidden\" name=\"product_id\" value=\"{{ poster.id }}\">
            <input type=\"hidden\" name=\"location\" value=\"{{ url }}\">
            <select class=\"clickable\" name=\"poster_size\" id=\"poster-size\" onchange=\"getText(this)\">
                <option value=\"21x30\">21x30</option>
                <option value=\"30x40\">30x40</option>
                <option value=\"30x40\">40x50</option>
                <option value=\"50x70\">50x70</option>
                <option value=\"70x100\">70x100</option>
            </select>
            <div class=\"submit-container\">
                <button type=\"submit\" class=\"clickable\">
                    Add to
                    <img src=\"/assets/bag-white.png\" alt=\"cart\">
                </button>
            </div>
        </form>

    </div>
    {% if addCartAnim %}
        <div class=\"cart-popup\">
            <div class=\"cp-text-container\">
                <img class=\"cp-shopping-bag\" src=\"/assets/bag-white.png\" alt=\"\">
                <p>\"{{ poster.name }}\" was added to your cart!</p>
            </div>
            <img class=\"cp-img-background\" src=\"/assets/posters/{{ poster.image }}\" alt=\"{{ poster.image }}\">
        </div>
    {% endif %}

{% endblock %}

{% block script %}
<script>
    let DivTxt = [
        99 + {{ poster.extra_price }},
        159 + {{ poster.extra_price }},
        199 + {{ poster.extra_price }},
        249 + {{ poster.extra_price }},
        379 + {{ poster.extra_price }}
    ]

    function getText(selction){
        textSelected = selction.selectedIndex;
        document.querySelector('#price-label').innerHTML = DivTxt[textSelected];
        document.querySelector('#form-price').value = DivTxt[textSelected];
    }
</script>
{% endblock %}", "main.poster-details.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\main.poster-details.twig");
    }
}
