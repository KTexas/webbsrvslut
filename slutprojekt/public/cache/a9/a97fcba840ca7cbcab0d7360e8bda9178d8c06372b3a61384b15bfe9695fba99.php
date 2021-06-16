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

/* cart.show-user-orders.twig */
class __TwigTemplate_0377fde75b4664013965752cc1179cd8cf09443a74a02be83a002c134b255c55 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "cart.show-user-orders.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Your orders";
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <link rel=\"stylesheet\" href=\"/css/cart.css\">
";
    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "    <ul class=\"cart-container\">
        ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 9
            echo "            <li class=\"order-container\">
                <p>Order id: ";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 10), "id", [], "any", false, false, false, 10), "html", null, true);
            echo "<br>&nbsp;</p>
                <div class=\"cart-item\">
                    <a href=\"/";
            // line 12
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 12), "name", [], "any", false, false, false, 12), [" " => "-"]), "html", null, true);
            echo "-poster\"><img class=\"cart-image\" src=\"/assets/posters/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 12), "image", [], "any", false, false, false, 12), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 12), "name", [], "any", false, false, false, 12), "html", null, true);
            echo "\"></a>
                    <div class=\"cart-text-container\">
                        <a href=\"/";
            // line 14
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 14), "name", [], "any", false, false, false, 14), [" " => "-"]), "html", null, true);
            echo "-poster\" class=\"cart-item-name\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 14), "name", [], "any", false, false, false, 14), "html", null, true);
            echo "</a>
                        <p class=\"cart-item-price\">
                            ";
            // line 16
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 16), "qty", [], "any", false, false, false, 16), 1))) {
                // line 17
                echo "                                Total: ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 17), "total", [], "any", false, false, false, 17), "html", null, true);
                echo " kr
                            ";
            } else {
                // line 19
                echo "                                Per unit: ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 19), "unit_price", [], "any", false, false, false, 19), "html", null, true);
                echo " kr <br>Total: ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 19), "total", [], "any", false, false, false, 19), "html", null, true);
                echo " kr
                            ";
            }
            // line 21
            echo "
                        </p>
                        <p>Dimensions: ";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 23), "size", [], "any", false, false, false, 23), "html", null, true);
            echo "<br>Quantity: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 23), "qty", [], "any", false, false, false, 23), "html", null, true);
            echo "</p>
                        <p class=\"cart-item-article\">Article number: ";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 24), "id", [], "any", false, false, false, 24), "html", null, true);
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
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "destination", [], "any", false, false, false, 36), "city", [], "any", false, false, false, 36), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "destination", [], "any", false, false, false, 36), "country", [], "any", false, false, false, 36), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "destination", [], "any", false, false, false, 36), "zip_code", [], "any", false, false, false, 36), "html", null, true);
            echo "\" allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div>
                    <p>Payment Method: ";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "payment", [], "any", false, false, false, 41), "html", null, true);
            echo "</p>
                    <p>";
            // line 42
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "tracking", [], "any", false, false, false, 42), "status", [], "any", false, false, false, 42)), "html", null, true);
            echo "</p>
                    <p>";
            // line 43
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "tracking", [], "any", false, false, false, 43), "order_date", [], "any", false, false, false, 43)), "html", null, true);
            echo "</p>
                </div>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "    </ul>
";
    }

    public function getTemplateName()
    {
        return "cart.show-user-orders.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 47,  160 => 43,  156 => 42,  152 => 41,  140 => 36,  125 => 24,  119 => 23,  115 => 21,  107 => 19,  101 => 17,  99 => 16,  92 => 14,  83 => 12,  78 => 10,  75 => 9,  71 => 8,  68 => 7,  64 => 6,  59 => 4,  55 => 3,  48 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.twig' %}
{% block title %}Your orders{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"/css/cart.css\">
{% endblock %}
{% block content %}
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
                                src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyBWN6IL8paR0hWUg9Gy0QBx0JC5oQRbVP4&q={{ order.destination.city }},{{ order.destination.country }},{{ order.destination.zip_code }}\" allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div>
                    <p>Payment Method: {{ order.payment }}</p>
                    <p>{{ order.tracking.status|capitalize }}</p>
                    <p>{{ order.tracking.order_date|date() }}</p>
                </div>
            </li>
        {% endfor %}
    </ul>
{% endblock %}", "cart.show-user-orders.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\cart.show-user-orders.twig");
    }
}
