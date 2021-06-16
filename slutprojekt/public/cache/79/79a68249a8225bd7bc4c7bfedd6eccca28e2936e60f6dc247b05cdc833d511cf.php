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
class __TwigTemplate_c56398c9a1255497f2b03cd02f8e234393877323c1063864e43e8a219b646927 extends Template
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
        echo "    ";
        if ((1 === twig_compare(twig_length_filter($this->env, ($context["cartItems"] ?? null)), 0))) {
            // line 9
            echo "        ";
            $context["cartAmount"] = 0;
            // line 10
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["cartItems"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 11
                echo "            ";
                $context["cartAmount"] = (($context["cartAmount"] ?? null) + twig_get_attribute($this->env, $this->source, $context["item"], "amount", [], "any", false, false, false, 11));
                // line 12
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 13
            echo "    ";
        }
        // line 14
        echo "    <h1 class=\"cart-title\">Your Cart";
        if ((0 === twig_compare(twig_length_filter($this->env, ($context["cartItems"] ?? null)), 0))) {
            echo " is Empty";
        } else {
            echo " Has ";
            echo twig_escape_filter($this->env, ($context["cartAmount"] ?? null), "html", null, true);
            echo " items";
        }
        echo "</h1>
    <ul class=\"cart-container\">
        ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cartItems"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 17
            echo "            <li class=\"cart-item\">
                <a href=\"/";
            // line 18
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 18), "name", [], "any", false, false, false, 18), [" " => "-"]), "html", null, true);
            echo "-poster\"><img class=\"cart-image\" src=\"/assets/posters/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 18), "image", [], "any", false, false, false, 18), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 18), "name", [], "any", false, false, false, 18), "html", null, true);
            echo "\"></a>
                <div class=\"cart-text-container\">
                    <a href=\"/";
            // line 20
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 20), "name", [], "any", false, false, false, 20), [" " => "-"]), "html", null, true);
            echo "-poster\" class=\"cart-item-name\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 20), "name", [], "any", false, false, false, 20), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "size", [], "any", false, false, false, 20), "html", null, true);
            echo ")</a>
                    <p class=\"cart-item-price\">";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "price", [], "any", false, false, false, 21), "html", null, true);
            echo " kr</p>
                    <form action=\"/change-cart-item-amount\" method=\"post\" onchange=\"this.form.submit()\">
                        <input type=\"hidden\" name=\"product_id\" value=\"";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 23), "id", [], "any", false, false, false, 23), "html", null, true);
            echo "\">
                        <input type=\"hidden\" name=\"poster_price\" value=\"";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "price", [], "any", false, false, false, 24), "html", null, true);
            echo "\" id=\"form-price\">
                        <input type=\"hidden\" name=\"poster_size\" value=\"";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "size", [], "any", false, false, false, 25), "html", null, true);
            echo "\">
                        <label for=\"amount-dropdown\">Amount: </label>
                        <select class=\"clickable\" name=\"amount\" id=\"amount-dropdown\" onchange=\"this.form.submit()\">
                            ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 20));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 29
                echo "                                <option ";
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["item"], "amount", [], "any", false, false, false, 29), $context["i"]))) {
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
            // line 31
            echo "                        </select>
                    </form>
                    <p class=\"cart-item-article\">Article number: ";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 33), "id", [], "any", false, false, false, 33), "html", null, true);
            echo "</p>
                    <form action=\"/remove-cart-item\" method=\"post\">
                        <input type=\"hidden\" name=\"product_id\" value=\"";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "poster", [], "any", false, false, false, 35), "id", [], "any", false, false, false, 35), "html", null, true);
            echo "\">
                        <input type=\"hidden\" name=\"poster_size\" value=\"";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "size", [], "any", false, false, false, 36), "html", null, true);
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
        // line 42
        echo "    </ul>
    ";
        // line 43
        if ((1 === twig_compare(twig_length_filter($this->env, ($context["cartItems"] ?? null)), 0))) {
            // line 44
            echo "        <a href=\"/confirm-order\" class=\"continue-btn\">
            Continue →
        </a>
    ";
        }
        // line 48
        echo "
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
        return array (  201 => 48,  195 => 44,  193 => 43,  190 => 42,  178 => 36,  174 => 35,  169 => 33,  165 => 31,  150 => 29,  146 => 28,  140 => 25,  136 => 24,  132 => 23,  127 => 21,  119 => 20,  110 => 18,  107 => 17,  103 => 16,  91 => 14,  88 => 13,  82 => 12,  79 => 11,  74 => 10,  71 => 9,  68 => 8,  64 => 7,  59 => 5,  55 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Cart{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"css/cart.css\">
{% endblock %}
{% block content %}
    {% if cartItems|length > 0  %}
        {% set cartAmount = 0 %}
        {% for item in cartItems %}
            {% set cartAmount = cartAmount + item.amount %}
        {% endfor %}
    {% endif %}
    <h1 class=\"cart-title\">Your Cart{% if cartItems|length == 0  %} is Empty{% else %} Has {{ cartAmount }} items{% endif %}</h1>
    <ul class=\"cart-container\">
        {% for item in cartItems %}
            <li class=\"cart-item\">
                <a href=\"/{{ item.poster.name | replace({' ' : '-'}) }}-poster\"><img class=\"cart-image\" src=\"/assets/posters/{{ item.poster.image }}\" alt=\"{{ item.poster.name }}\"></a>
                <div class=\"cart-text-container\">
                    <a href=\"/{{ item.poster.name | replace({' ' : '-'}) }}-poster\" class=\"cart-item-name\">{{ item.poster.name }} ({{ item.size }})</a>
                    <p class=\"cart-item-price\">{{ item.price }} kr</p>
                    <form action=\"/change-cart-item-amount\" method=\"post\" onchange=\"this.form.submit()\">
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
                    <form action=\"/remove-cart-item\" method=\"post\">
                        <input type=\"hidden\" name=\"product_id\" value=\"{{ item.poster.id }}\">
                        <input type=\"hidden\" name=\"poster_size\" value=\"{{ item.size }}\">
                        <button type=\"submit\" class=\"remove-button clickable\"></button>
                    </form>
                </div>
            </li>
        {% endfor %}
    </ul>
    {% if cartItems|length > 0  %}
        <a href=\"/confirm-order\" class=\"continue-btn\">
            Continue →
        </a>
    {% endif %}

{% endblock %}
", "cart.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\cart.twig");
    }
}
