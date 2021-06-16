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

/* cart.recent-order.twig */
class __TwigTemplate_061e9b0c041081a5e7feadd0b314a5770205de9ea82c60fd9df8d7984fbbdaef extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "cart.recent-order.twig", 1);
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
";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    <h1 class=\"cart-title\">Your Order</h1>
    <ul class=\"cart-container\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 11
            echo "            <li class=\"order-container\">
                <p>Order id: ";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 12), "id", [], "any", false, false, false, 12), "html", null, true);
            echo "<br>&nbsp;</p>
                <div class=\"cart-item\">
                    <a href=\"/";
            // line 14
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 14), "name", [], "any", false, false, false, 14), [" " => "-"]), "html", null, true);
            echo "-poster\"><img class=\"cart-image\" src=\"/assets/posters/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 14), "image", [], "any", false, false, false, 14), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 14), "name", [], "any", false, false, false, 14), "html", null, true);
            echo "\"></a>
                    <div class=\"cart-text-container\">
                        <a href=\"/";
            // line 16
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 16), "name", [], "any", false, false, false, 16), [" " => "-"]), "html", null, true);
            echo "-poster\" class=\"cart-item-name\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 16), "name", [], "any", false, false, false, 16), "html", null, true);
            echo "</a>
                        <p class=\"cart-item-price\">
                            ";
            // line 18
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 18), "qty", [], "any", false, false, false, 18), 1))) {
                // line 19
                echo "                                Total: ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 19), "total", [], "any", false, false, false, 19), "html", null, true);
                echo " kr
                            ";
            } else {
                // line 21
                echo "                                Per unit: ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 21), "unit_price", [], "any", false, false, false, 21), "html", null, true);
                echo " kr <br>Total: ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 21), "total", [], "any", false, false, false, 21), "html", null, true);
                echo " kr
                            ";
            }
            // line 23
            echo "
                        </p>
                        <p>Dimensions: ";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 25), "size", [], "any", false, false, false, 25), "html", null, true);
            echo "<br>Quantity: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 25), "qty", [], "any", false, false, false, 25), "html", null, true);
            echo "</p>
                        <p class=\"cart-item-article\">Article number: ";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 26), "id", [], "any", false, false, false, 26), "html", null, true);
            echo "</p>
                    </div>
                </div>
                <div class=\"map-position\">
                    <p>Destination:</p>
                    <div class=\"map-container\">
                        <iframe
                                class=\"destination-map\"
                                width=\"100%\"
                                height=\"100%\"
                                style=\"border:0\"
                                src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBWN6IL8paR0hWUg9Gy0QBx0JC5oQRbVP4&q=";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["destination"] ?? null), "city", [], "any", false, false, false, 37), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["destination"] ?? null), "country", [], "any", false, false, false, 37), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["destination"] ?? null), "zip_code", [], "any", false, false, false, 37), "html", null, true);
            echo "\" allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div>
                    <p>Payment method: ";
            // line 42
            echo twig_escape_filter($this->env, ($context["payment"] ?? null), "html", null, true);
            echo "</p>
                    <p>";
            // line 43
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "tracking", [], "any", false, false, false, 43), "status", [], "any", false, false, false, 43)), "html", null, true);
            echo "</p>
                    <p>";
            // line 44
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "tracking", [], "any", false, false, false, 44), "order_date", [], "any", false, false, false, 44)), "html", null, true);
            echo "</p>
                </div>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "    </ul>
";
    }

    public function getTemplateName()
    {
        return "cart.recent-order.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 48,  160 => 44,  156 => 43,  152 => 42,  140 => 37,  126 => 26,  120 => 25,  116 => 23,  108 => 21,  102 => 19,  100 => 18,  93 => 16,  84 => 14,  79 => 12,  76 => 11,  72 => 10,  68 => 8,  64 => 7,  59 => 5,  55 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Cart{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"/css/cart.css\">
{% endblock %}
{% block content %}
    <h1 class=\"cart-title\">Your Order</h1>
    <ul class=\"cart-container\">
        {% for order in orders %}
            <li class=\"order-container\">
                <p>Order id: {{ order.orderData.id }}<br>&nbsp;</p>
                <div class=\"cart-item\">
                    <a href=\"/{{ order.product.name | replace({' ' : '-'}) }}-poster\"><img class=\"cart-image\" src=\"/assets/posters/{{ order.product.image }}\" alt=\"{{ order.product.name }}\"></a>
                    <div class=\"cart-text-container\">
                        <a href=\"/{{ order.product.name | replace({' ' : '-'}) }}-poster\" class=\"cart-item-name\">{{ order.product.name }}</a>
                        <p class=\"cart-item-price\">
                            {% if order.orderData.qty == 1 %}
                                Total: {{ order.orderData.total }} kr
                            {% else %}
                                Per unit: {{ order.orderData.unit_price }} kr <br>Total: {{ order.orderData.total }} kr
                            {% endif %}

                        </p>
                        <p>Dimensions: {{ order.orderData.size }}<br>Quantity: {{ order.orderData.qty }}</p>
                        <p class=\"cart-item-article\">Article number: {{ order.product.id }}</p>
                    </div>
                </div>
                <div class=\"map-position\">
                    <p>Destination:</p>
                    <div class=\"map-container\">
                        <iframe
                                class=\"destination-map\"
                                width=\"100%\"
                                height=\"100%\"
                                style=\"border:0\"
                                src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBWN6IL8paR0hWUg9Gy0QBx0JC5oQRbVP4&q={{ destination.city }},{{ destination.country }},{{ destination.zip_code }}\" allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div>
                    <p>Payment method: {{ payment }}</p>
                    <p>{{ order.tracking.status|capitalize }}</p>
                    <p>{{ order.tracking.order_date|date() }}</p>
                </div>
            </li>
        {% endfor %}
    </ul>
{% endblock %}
", "cart.recent-order.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\cart.recent-order.twig");
    }
}
