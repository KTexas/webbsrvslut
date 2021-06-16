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

/* index.twig */
class __TwigTemplate_3a64ec4ea0d2d3a8caf5cf18705278c577850f66f59b28c43f689ebae2f0df49 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Home";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <link rel=\"stylesheet\" href=\"css/index.css\">
    <link rel=\"stylesheet\" href=\"/libs/owlcarousel/dist/assets/owl.carousel.min.css\" />
";
    }

    // line 8
    public function block_favicon($context, array $blocks = [])
    {
        $macros = $this->macros;
        if ( !(($context["cartAmount"] ?? null) === 0)) {
            echo "-cart";
        }
    }

    // line 9
    public function block_cartAmount($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "    ";
        if ((($context["cartAmount"] ?? null) === 0)) {
            // line 11
            echo "    ";
        } else {
            // line 12
            echo "        ";
            echo twig_escape_filter($this->env, ($context["cartAmount"] ?? null), "html", null, true);
            echo "
    ";
        }
    }

    // line 15
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 16
        echo "    ";
        if ((0 === twig_compare(($context["user"] ?? null), null))) {
            // line 17
            echo "        <h1 class=\"title\">Todays pick of posters</h1>
    ";
        } else {
            // line 19
            echo "        <h1 class=\"title\">Welcome ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "fname", [], "any", false, false, false, 19), "html", null, true);
            echo "!</h1>
    ";
        }
        // line 21
        echo "
    <div class=\"poster-container\">
        ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posters"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["poster"]) {
            // line 24
            echo "            <a href=\"/";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["poster"], "name", [], "any", false, false, false, 24), [" " => "-"]), "html", null, true);
            echo "-poster\">
                <div class=\"poster-card\">
                    <img class=\"poster-image\" src=\"/assets/posters/";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "image", [], "any", false, false, false, 26), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "image", [], "any", false, false, false, 26), "html", null, true);
            echo "\">
                    <ul class=\"poster-ul\">
                        <li class=\"poster-li\">
                            <p class=\"poster-title\">";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "name", [], "any", false, false, false, 29), "html", null, true);
            echo "</p>
                            <p class=\"poster-price\">
                                ";
            // line 31
            $context["price"] = 99;
            // line 32
            echo "                                ";
            $context["price"] = (($context["price"] ?? null) + twig_get_attribute($this->env, $this->source, $context["poster"], "extra_price", [], "any", false, false, false, 32));
            // line 33
            echo "                                Fr. ";
            echo twig_escape_filter($this->env, ($context["price"] ?? null), "html", null, true);
            echo " kr
                            </p>
                        </li>
                        <li class=\"poster-li poster-li-2\">
                            ";
            // line 37
            $context["like"] = "";
            // line 38
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["liked"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["userLike"]) {
                // line 39
                echo "                                ";
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["userLike"], "product_id", [], "any", false, false, false, 39), twig_get_attribute($this->env, $this->source, $context["poster"], "id", [], "any", false, false, false, 39)))) {
                    // line 40
                    echo "                                    ";
                    $context["like"] = "-liked";
                    // line 41
                    echo "                                ";
                }
                // line 42
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['userLike'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "                            <p></p>
                            <form action=\"/like-poster\" method=\"post\">
                                <input type=\"hidden\" name=\"poster_id\" value=\"";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "id", [], "any", false, false, false, 45), "html", null, true);
            echo "\">
                                <input type=\"hidden\" name=\"poster_liked\" value=\"";
            // line 46
            if ((0 === twig_compare(($context["like"] ?? null), ""))) {
                echo "false";
            } else {
                echo "true";
            }
            echo "\">
                                <input type=\"hidden\" name=\"location\" value=\"/\">
                                <button type=\"submit\" class=\"clickable like-button\"><img src=\"/assets/heart";
            // line 48
            echo twig_escape_filter($this->env, ($context["like"] ?? null), "html", null, true);
            echo ".png\" alt=\"\"></button>
                            </form>
                            <p class=\"poster-likes\">";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "likes", [], "any", false, false, false, 50), "html", null, true);
            echo "</p>
                        </li>
                    </ul>
                </div>
            </a>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['poster'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "    </div>
    <a class=\"all-href\" href=\"/posters\"><h3>See all posters →</h3></a>
    <br>
    ";
        // line 59
        if ((1 === twig_compare(($context["orders"] ?? null), 0))) {
            // line 60
            echo "    <h1>Your current orders</h1>
        <ul class=\"owl-carousel cart-container\">
            ";
            // line 62
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 63
                echo "                <li class=\"order-container draggable\">
                    <p>Order id: ";
                // line 64
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 64), "id", [], "any", false, false, false, 64), "html", null, true);
                echo "<br>&nbsp;</p>
                    <div class=\"cart-item\">
                        <a href=\"/";
                // line 66
                echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 66), "name", [], "any", false, false, false, 66), [" " => "-"]), "html", null, true);
                echo "-poster\"><img class=\"cart-image\" src=\"/assets/posters/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 66), "image", [], "any", false, false, false, 66), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 66), "name", [], "any", false, false, false, 66), "html", null, true);
                echo "\"></a>
                        <div class=\"cart-text-container\">
                            <a href=\"/";
                // line 68
                echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 68), "name", [], "any", false, false, false, 68), [" " => "-"]), "html", null, true);
                echo "-poster\" class=\"cart-item-name\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 68), "name", [], "any", false, false, false, 68), "html", null, true);
                echo "</a>
                            <p class=\"cart-item-price\">
                                ";
                // line 70
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 70), "qty", [], "any", false, false, false, 70), 1))) {
                    // line 71
                    echo "                                    Total: ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 71), "total", [], "any", false, false, false, 71), "html", null, true);
                    echo " kr
                                ";
                } else {
                    // line 73
                    echo "                                    Per unit: ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 73), "unit_price", [], "any", false, false, false, 73), "html", null, true);
                    echo " kr <br>Total: ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 73), "total", [], "any", false, false, false, 73), "html", null, true);
                    echo " kr
                                ";
                }
                // line 75
                echo "
                            </p>
                            <p>Dimensions: ";
                // line 77
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 77), "size", [], "any", false, false, false, 77), "html", null, true);
                echo "<br>Quantity: ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 77), "qty", [], "any", false, false, false, 77), "html", null, true);
                echo "</p>
                            <p class=\"cart-item-article\">Article number: ";
                // line 78
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 78), "id", [], "any", false, false, false, 78), "html", null, true);
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
                // line 90
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "destination", [], "any", false, false, false, 90), "city", [], "any", false, false, false, 90), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "destination", [], "any", false, false, false, 90), "country", [], "any", false, false, false, 90), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "destination", [], "any", false, false, false, 90), "zip_code", [], "any", false, false, false, 90), "html", null, true);
                echo "\" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                    <div>
                        <p>";
                // line 95
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "tracking", [], "any", false, false, false, 95), "status", [], "any", false, false, false, 95)), "html", null, true);
                echo "</p>
                        <p>";
                // line 96
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "tracking", [], "any", false, false, false, 96), "order_date", [], "any", false, false, false, 96)), "html", null, true);
                echo "</p>
                    </div>
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 100
            echo "        </ul>
    ";
        }
        // line 102
        echo "
";
    }

    // line 104
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 105
        echo "    <script src=\"/libs/owlcarousel/dist/owl.carousel.min.js\"></script>
    <script>
        \$(document).ready(function(){
            \$('.owl-carousel').owlCarousel();
        });
        \$('.owl-carousel').owlCarousel({
            margin:20,
            loop:false,
            autoWidth:true,
            items:4,
            lazyLoad: true
        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  327 => 105,  323 => 104,  318 => 102,  314 => 100,  304 => 96,  300 => 95,  288 => 90,  273 => 78,  267 => 77,  263 => 75,  255 => 73,  249 => 71,  247 => 70,  240 => 68,  231 => 66,  226 => 64,  223 => 63,  219 => 62,  215 => 60,  213 => 59,  208 => 56,  196 => 50,  191 => 48,  182 => 46,  178 => 45,  174 => 43,  168 => 42,  165 => 41,  162 => 40,  159 => 39,  154 => 38,  152 => 37,  144 => 33,  141 => 32,  139 => 31,  134 => 29,  126 => 26,  120 => 24,  116 => 23,  112 => 21,  106 => 19,  102 => 17,  99 => 16,  95 => 15,  87 => 12,  84 => 11,  81 => 10,  77 => 9,  68 => 8,  62 => 5,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Home{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"css/index.css\">
    <link rel=\"stylesheet\" href=\"/libs/owlcarousel/dist/assets/owl.carousel.min.css\" />
{% endblock %}
{% block favicon %}{% if cartAmount is not same as(0) %}-cart{% endif %}{% endblock %}
{% block cartAmount %}
    {% if cartAmount is same as(0) %}
    {% else %}
        {{ cartAmount }}
    {% endif %}
{% endblock %}
{% block content %}
    {% if user == null %}
        <h1 class=\"title\">Todays pick of posters</h1>
    {% else %}
        <h1 class=\"title\">Welcome {{ user.fname }}!</h1>
    {% endif %}

    <div class=\"poster-container\">
        {% for poster in posters %}
            <a href=\"/{{ poster.name | replace({' ' : '-'}) }}-poster\">
                <div class=\"poster-card\">
                    <img class=\"poster-image\" src=\"/assets/posters/{{ poster.image }}\" alt=\"{{ poster.image }}\">
                    <ul class=\"poster-ul\">
                        <li class=\"poster-li\">
                            <p class=\"poster-title\">{{ poster.name }}</p>
                            <p class=\"poster-price\">
                                {% set price = 99 %}
                                {% set price = price + poster.extra_price %}
                                Fr. {{ price }} kr
                            </p>
                        </li>
                        <li class=\"poster-li poster-li-2\">
                            {% set like = '' %}
                            {% for userLike in liked %}
                                {% if userLike.product_id == poster.id %}
                                    {% set like = '-liked' %}
                                {% endif %}
                            {% endfor %}
                            <p></p>
                            <form action=\"/like-poster\" method=\"post\">
                                <input type=\"hidden\" name=\"poster_id\" value=\"{{ poster.id }}\">
                                <input type=\"hidden\" name=\"poster_liked\" value=\"{% if like == \"\" %}false{% else %}true{% endif %}\">
                                <input type=\"hidden\" name=\"location\" value=\"/\">
                                <button type=\"submit\" class=\"clickable like-button\"><img src=\"/assets/heart{{ like }}.png\" alt=\"\"></button>
                            </form>
                            <p class=\"poster-likes\">{{ poster.likes }}</p>
                        </li>
                    </ul>
                </div>
            </a>
        {% endfor %}
    </div>
    <a class=\"all-href\" href=\"/posters\"><h3>See all posters →</h3></a>
    <br>
    {% if orders > 0 %}
    <h1>Your current orders</h1>
        <ul class=\"owl-carousel cart-container\">
            {% for order in orders %}
                <li class=\"order-container draggable\">
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
                        <p>{{ order.tracking.status|capitalize }}</p>
                        <p>{{ order.tracking.order_date|date() }}</p>
                    </div>
                </li>
            {% endfor %}
        </ul>
    {% endif %}

{% endblock %}
{% block script %}
    <script src=\"/libs/owlcarousel/dist/owl.carousel.min.js\"></script>
    <script>
        \$(document).ready(function(){
            \$('.owl-carousel').owlCarousel();
        });
        \$('.owl-carousel').owlCarousel({
            margin:20,
            loop:false,
            autoWidth:true,
            items:4,
            lazyLoad: true
        })
    </script>
{% endblock %}", "index.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\index.twig");
    }
}
