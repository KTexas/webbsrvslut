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
class __TwigTemplate_b37b290e0de533c25623da048d6f8a1ec3dd1123881235e7ed55b4774c4b29b4 extends Template
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
    public function block_cartAmount($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    ";
        if ((($context["cartAmount"] ?? null) === 0)) {
            // line 9
            echo "    ";
        } else {
            // line 10
            echo "        ";
            echo twig_escape_filter($this->env, ($context["cartAmount"] ?? null), "html", null, true);
            echo "
    ";
        }
    }

    // line 13
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        echo "    <div class=\"poster-container\">
        <div class=\"url-route\">
            <a href=\"/\">POSTERS</a>
            <p>&#160;/ ";
        // line 17
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "name", [], "any", false, false, false, 17)), "html", null, true);
        echo "</p>
        </div>
        <img class=\"poster-image\" src=\"assets/posters/";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "image", [], "any", false, false, false, 19), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "image", [], "any", false, false, false, 19), "html", null, true);
        echo "\">
        <div class=\"line-breaker\"></div>
        <h1 class=\"title\">";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "name", [], "any", false, false, false, 21), "html", null, true);
        echo "</h1>
        <div class=\"price-container\">
            <p class=\"poster-price\" id=\"price-label\">
                ";
        // line 24
        $context["price"] = 99;
        // line 25
        echo "                ";
        $context["price"] = (($context["price"] ?? null) + twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "extra_price", [], "any", false, false, false, 25));
        // line 26
        echo "                ";
        echo twig_escape_filter($this->env, ($context["price"] ?? null), "html", null, true);
        echo "
            </p>
            <p class=\"poster-price\">&#160;kr</p>
        </div>
        <form action=\"/add-cart\" method=\"post\" class=\"order-form\">
            <p class=\"select-label\">Chose size</p>
            <input type=\"hidden\" name=\"product_id\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "id", [], "any", false, false, false, 32), "html", null, true);
        echo "\">
            <input type=\"hidden\" name=\"poster_price\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, ($context["price"] ?? null), "html", null, true);
        echo "\" id=\"form-price\">
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
                    <img src=\"assets/bag-white.png\" alt=\"cart\">
                </button>
            </div>
        </form>

    </div>
";
    }

    // line 52
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 53
        echo "<script>
    let DivTxt = [
        99 + ";
        // line 55
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "extra_price", [], "any", false, false, false, 55), "html", null, true);
        echo ",
        159 + ";
        // line 56
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "extra_price", [], "any", false, false, false, 56), "html", null, true);
        echo ",
        199 + ";
        // line 57
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "extra_price", [], "any", false, false, false, 57), "html", null, true);
        echo ",
        249 + ";
        // line 58
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "extra_price", [], "any", false, false, false, 58), "html", null, true);
        echo ",
        379 + ";
        // line 59
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "extra_price", [], "any", false, false, false, 59), "html", null, true);
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
        return array (  177 => 59,  173 => 58,  169 => 57,  165 => 56,  161 => 55,  157 => 53,  153 => 52,  131 => 33,  127 => 32,  117 => 26,  114 => 25,  112 => 24,  106 => 21,  99 => 19,  94 => 17,  89 => 14,  85 => 13,  77 => 10,  74 => 9,  71 => 8,  67 => 7,  62 => 5,  58 => 4,  50 => 3,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}{{ poster.name }} Poster{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"css/poster-details.css\">
{% endblock %}
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
        <img class=\"poster-image\" src=\"assets/posters/{{ poster.image }}\" alt=\"{{ poster.image }}\">
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
            <input type=\"hidden\" name=\"poster_price\" value=\"{{ price }}\" id=\"form-price\">
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
                    <img src=\"assets/bag-white.png\" alt=\"cart\">
                </button>
            </div>
        </form>

    </div>
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
{% endblock %}", "main.poster-details.twig", "C:\\code\\webbsrv\\app\\views\\main.poster-details.twig");
    }
}
