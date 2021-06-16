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

/* cart.twig */
class __TwigTemplate_ced6c5d36fb0d94cfe84d3ed67eca10cc501eb622df6326f20a4a3554c66453c extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "cart.twig", 1);
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
        echo "    <link rel=\"stylesheet\" href=\"css/cart.css\">
";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    <h1 class=\"cart-title\">Your cart</h1>
    <ul class=\"cart-container\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cartItems"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 11
            echo "            <li class=\"cart-item\">
                <a href=\"/";
            // line 12
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 12), "name", [], "any", false, false, false, 12), [" " => "-"]), "html", null, true);
            echo "-poster\"><img class=\"cart-image\" src=\"assets/posters/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 12), "image", [], "any", false, false, false, 12), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 12), "name", [], "any", false, false, false, 12), "html", null, true);
            echo "\"></a>
                <div class=\"cart-text-container\">
                    <a href=\"/";
            // line 14
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 14), "name", [], "any", false, false, false, 14), [" " => "-"]), "html", null, true);
            echo "-poster\" class=\"cart-item-name\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 14), "name", [], "any", false, false, false, 14), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "size", [], "any", false, false, false, 14), "html", null, true);
            echo ")</a>
                    <p class=\"cart-item-price\">";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "price", [], "any", false, false, false, 15), "html", null, true);
            echo " kr</p>
                    <form action=\"/changeCartItemAmount\" method=\"post\" onchange=\"this.form.submit()\">
                        <input type=\"hidden\" name=\"product_id\" value=\"";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 17), "id", [], "any", false, false, false, 17), "html", null, true);
            echo "\">
                        <input type=\"hidden\" name=\"poster_price\" value=\"";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "price", [], "any", false, false, false, 18), "html", null, true);
            echo "\" id=\"form-price\">
                        <input type=\"hidden\" name=\"poster_size\" value=\"";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "size", [], "any", false, false, false, 19), "html", null, true);
            echo "\">
                        <label for=\"amount-dropdown\">Amount: </label>
                        <select class=\"clickable\" name=\"amount\" id=\"amount-dropdown\" onchange=\"this.form.submit()\">
                            ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 20));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 23
                echo "                                <option ";
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["item"], "amount", [], "any", false, false, false, 23), $context["i"]))) {
                    echo " selected ";
                }
                echo " value=\"";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "                        </select>
                    </form>
                    <p class=\"cart-item-article\">Article number: ";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 27), "id", [], "any", false, false, false, 27), "html", null, true);
            echo "</p>
                    <form action=\"/removeCartItem\" method=\"post\">
                        <input type=\"hidden\" name=\"product_id\" value=\"";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 29), "id", [], "any", false, false, false, 29), "html", null, true);
            echo "\">
                        <input type=\"hidden\" name=\"poster_size\" value=\"";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "size", [], "any", false, false, false, 30), "html", null, true);
            echo "\">
                        <button type=\"submit\" class=\"remove-button clickable\"></button>
                    </form>
                </div>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "    </ul>
";
    }

    public function getTemplateName()
    {
        return "cart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 36,  147 => 30,  143 => 29,  138 => 27,  134 => 25,  119 => 23,  115 => 22,  109 => 19,  105 => 18,  101 => 17,  96 => 15,  88 => 14,  79 => 12,  76 => 11,  72 => 10,  68 => 8,  64 => 7,  59 => 5,  55 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Cart{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"css/cart.css\">
{% endblock %}
{% block content %}
    <h1 class=\"cart-title\">Your cart</h1>
    <ul class=\"cart-container\">
        {% for item in cartItems %}
            <li class=\"cart-item\">
                <a href=\"/{{ item.poster.name | replace({' ' : '-'}) }}-poster\"><img class=\"cart-image\" src=\"assets/posters/{{ item.poster.image }}\" alt=\"{{ item.poster.name }}\"></a>
                <div class=\"cart-text-container\">
                    <a href=\"/{{ item.poster.name | replace({' ' : '-'}) }}-poster\" class=\"cart-item-name\">{{ item.poster.name }} ({{ item.size }})</a>
                    <p class=\"cart-item-price\">{{ item.price }} kr</p>
                    <form action=\"/changeCartItemAmount\" method=\"post\" onchange=\"this.form.submit()\">
                        <input type=\"hidden\" name=\"product_id\" value=\"{{ item.poster.id }}\">
                        <input type=\"hidden\" name=\"poster_price\" value=\"{{ item.price }}\" id=\"form-price\">
                        <input type=\"hidden\" name=\"poster_size\" value=\"{{ item.size }}\">
                        <label for=\"amount-dropdown\">Amount: </label>
                        <select class=\"clickable\" name=\"amount\" id=\"amount-dropdown\" onchange=\"this.form.submit()\">
                            {% for i in 1..20 %}
                                <option {% if item.amount == i %} selected {% endif %} value=\"{{ i }}\">{{ i }}</option>
                            {% endfor %}
                        </select>
                    </form>
                    <p class=\"cart-item-article\">Article number: {{ item.poster.id }}</p>
                    <form action=\"/removeCartItem\" method=\"post\">
                        <input type=\"hidden\" name=\"product_id\" value=\"{{ item.poster.id }}\">
                        <input type=\"hidden\" name=\"poster_size\" value=\"{{ item.size }}\">
                        <button type=\"submit\" class=\"remove-button clickable\"></button>
                    </form>
                </div>
            </li>
        {% endfor %}
    </ul>
{% endblock %}
", "cart.twig", "C:\\code\\webbsrv\\app\\views\\cart.twig");
    }
}
