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

/* admin.user-info.twig */
class __TwigTemplate_f7ba482143c2b618a463009a931a9c50e84ba5fa7e0048edf82e1308afdd70fb extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "admin.user-info.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "User ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 3), "html", null, true);
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <link rel=\"stylesheet\" href=\"/css/admin.all-items.css\">
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
        echo "    <div class=\"ad-container\">
        <div class=\"ad-header\">
            <h1>";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "fname", [], "any", false, false, false, 17), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "lname", [], "any", false, false, false, 17), "html", null, true);
        echo "</h1>
            <a href=\"/admin/user/";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 18), "html", null, true);
        echo "/edit\" class=\"settings-icon\">
                <img src=\"/assets/settings.png\" alt=\"\">
            </a>
        </div>
        <br>
        ";
        // line 23
        if ((0 === twig_compare(twig_length_filter($this->env, ($context["likedProducts"] ?? null)), 0))) {
            // line 24
            echo "            <h2>No Liked Products</h2>
        ";
        } else {
            // line 26
            echo "            <h2>Liked Products</h2>
            <br>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>STARTING PRICE</th>
                    <th>LIKES</th>
                </tr>
                </thead>
                <tbody>
                    ";
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["likedProducts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["likedProduct"]) {
                // line 39
                echo "                        <tr class='clickable-row clickable' data-href='/";
                echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["likedProduct"], "name", [], "any", false, false, false, 39), [" " => "-"]), "html", null, true);
                echo "-poster'>
                            <td>";
                // line 40
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["likedProduct"], "id", [], "any", false, false, false, 40), "html", null, true);
                echo "</td>
                            <td>";
                // line 41
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["likedProduct"], "name", [], "any", false, false, false, 41), "html", null, true);
                echo "</td>
                            <td>";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["likedProduct"], "extra_price", [], "any", false, false, false, 42), "html", null, true);
                echo "</td>
                            <td>";
                // line 43
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["likedProduct"], "likes", [], "any", false, false, false, 43), "html", null, true);
                echo "</td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['likedProduct'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "                </tbody>
            </table>
        ";
        }
        // line 49
        echo "        <br>
        ";
        // line 50
        if ((0 === twig_compare(twig_length_filter($this->env, ($context["orders"] ?? null)), 0))) {
            // line 51
            echo "            <h2>No Orders</h2>
        ";
        } else {
            // line 53
            echo "            <h2>Orders</h2>
            <table>
                <thead>
                <tr>
                    <th>ORDER ID</th>
                    <th>PRODUCT ID</th>
                    <th>ORDER QTY</th>
                    <th>UNIT | TOTAL PRICE</th>
                    <th>PRODUCT DIMENSION</th>
                    <th>ORDER DATE</th>
                </tr>
                </thead>
                <tbody>
                ";
            // line 66
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 67
                echo "                    <tr>
                        <td>";
                // line 68
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 68), "id", [], "any", false, false, false, 68), "html", null, true);
                echo "</td>
                        <td class='clickable-row clickable' data-href='/";
                // line 69
                echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 69), "name", [], "any", false, false, false, 69), [" " => "-"]), "html", null, true);
                echo "-poster'>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 69), "id", [], "any", false, false, false, 69), "html", null, true);
                echo "</td>
                        <td>";
                // line 70
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 70), "qty", [], "any", false, false, false, 70), "html", null, true);
                echo "</td>
                        <td>";
                // line 71
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 71), "unit_price", [], "any", false, false, false, 71), "html", null, true);
                echo " kr | ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 71), "total", [], "any", false, false, false, 71), "html", null, true);
                echo " kr</td>
                        <td>";
                // line 72
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "orderData", [], "any", false, false, false, 72), "size", [], "any", false, false, false, 72), "html", null, true);
                echo "</td>
                        <td>";
                // line 73
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "tracking", [], "any", false, false, false, 73), "order_date", [], "any", false, false, false, 73)), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "                </tbody>
            </table>
        ";
        }
        // line 79
        echo "
    </div>
";
    }

    // line 82
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 83
        echo "    <script>
        jQuery(document).ready(function(\$) {
            \$(\".clickable-row\").click(function() {
                window.location = \$(this).data(\"href\");
            });
        });
    </script>

";
    }

    public function getTemplateName()
    {
        return "admin.user-info.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 83,  247 => 82,  241 => 79,  236 => 76,  227 => 73,  223 => 72,  217 => 71,  213 => 70,  207 => 69,  203 => 68,  200 => 67,  196 => 66,  181 => 53,  177 => 51,  175 => 50,  172 => 49,  167 => 46,  158 => 43,  154 => 42,  150 => 41,  146 => 40,  141 => 39,  137 => 38,  123 => 26,  119 => 24,  117 => 23,  109 => 18,  103 => 17,  99 => 15,  95 => 14,  87 => 11,  84 => 10,  81 => 9,  77 => 8,  68 => 7,  63 => 5,  59 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}User {{ user.id }}{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"/css/admin.all-items.css\">
{% endblock %}
{% block favicon %}{% if cartAmount is not same as(0) %}-cart{% endif %}{% endblock %}
{% block cartAmount %}
    {% if cartAmount is same as(0) %}
    {% else %}
        {{ cartAmount }}
    {% endif %}
{% endblock %}
{% block content %}
    <div class=\"ad-container\">
        <div class=\"ad-header\">
            <h1>{{ user.fname }} {{ user.lname }}</h1>
            <a href=\"/admin/user/{{ user.id }}/edit\" class=\"settings-icon\">
                <img src=\"/assets/settings.png\" alt=\"\">
            </a>
        </div>
        <br>
        {% if likedProducts|length == 0 %}
            <h2>No Liked Products</h2>
        {% else %}
            <h2>Liked Products</h2>
            <br>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>STARTING PRICE</th>
                    <th>LIKES</th>
                </tr>
                </thead>
                <tbody>
                    {% for likedProduct in likedProducts %}
                        <tr class='clickable-row clickable' data-href='/{{ likedProduct.name | replace({' ' : '-'}) }}-poster'>
                            <td>{{ likedProduct.id }}</td>
                            <td>{{ likedProduct.name }}</td>
                            <td>{{ likedProduct.extra_price }}</td>
                            <td>{{ likedProduct.likes }}</td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        {% endif %}
        <br>
        {% if orders|length == 0 %}
            <h2>No Orders</h2>
        {% else %}
            <h2>Orders</h2>
            <table>
                <thead>
                <tr>
                    <th>ORDER ID</th>
                    <th>PRODUCT ID</th>
                    <th>ORDER QTY</th>
                    <th>UNIT | TOTAL PRICE</th>
                    <th>PRODUCT DIMENSION</th>
                    <th>ORDER DATE</th>
                </tr>
                </thead>
                <tbody>
                {% for order in orders %}
                    <tr>
                        <td>{{ order.orderData.id }}</td>
                        <td class='clickable-row clickable' data-href='/{{ order.product.name | replace({' ' : '-'}) }}-poster'>{{ order.product.id }}</td>
                        <td>{{ order.orderData.qty }}</td>
                        <td>{{ order.orderData.unit_price }} kr | {{ order.orderData.total }} kr</td>
                        <td>{{ order.orderData.size }}</td>
                        <td>{{ order.tracking.order_date|date() }}</td>
                    </tr>
                {% endfor %}
                </tbody>
            </table>
        {% endif %}

    </div>
{% endblock %}
{% block script %}
    <script>
        jQuery(document).ready(function(\$) {
            \$(\".clickable-row\").click(function() {
                window.location = \$(this).data(\"href\");
            });
        });
    </script>

{% endblock %}", "admin.user-info.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\admin.user-info.twig");
    }
}
