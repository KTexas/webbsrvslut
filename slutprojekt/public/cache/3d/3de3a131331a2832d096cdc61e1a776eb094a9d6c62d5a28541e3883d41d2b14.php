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

/* admin.all-orders.twig */
class __TwigTemplate_17c030759d7bdbebdcb44200aef889bf38fe69ba0781a6d9ce1b544561e584f3 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "admin.all-orders.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "All Orders";
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
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    <div class=\"ad-container\">
        <div class=\"search-container\">
            <form action=\"\" class=\"search-form\" id=\"search-form\">
                <input type=\"text\" placeholder=\"Search\" id=\"search-input\" name=\"search\" ";
        // line 11
        if (($context["search"] ?? null)) {
            echo "value=\"";
            echo twig_escape_filter($this->env, ($context["search"] ?? null), "html", null, true);
            echo "\"";
        }
        echo ">
            </form>
            <button onclick=\"clearSearch()\">Clear</button>
        </div>
        ";
        // line 15
        if ((1 === twig_compare(twig_length_filter($this->env, ($context["orders"] ?? null)), 0))) {
            // line 16
            echo "            <table>
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>QTY</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                    <th>D.country</th>
                    <th>D.city</th>
                    <th>D.street</th>
                    <th>D.zip</th>
                    <th>T.status</th>
                </tr>
                </thead>
                <tbody>


                ";
            // line 35
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 36
                echo "                    <tr class='clickable-row clickable' data-href='/admin/order/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "data", [], "any", false, false, false, 36), "id", [], "any", false, false, false, 36), "html", null, true);
                echo "'>
                        <td>";
                // line 37
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "data", [], "any", false, false, false, 37), "id", [], "any", false, false, false, 37), "html", null, true);
                echo "</td>
                        <td>";
                // line 38
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "user", [], "any", false, false, false, 38), "html", null, true);
                echo "</td>
                        <td>";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "data", [], "any", false, false, false, 39), "product_id", [], "any", false, false, false, 39), "html", null, true);
                echo "</td>
                        <td>";
                // line 40
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "data", [], "any", false, false, false, 40), "qty", [], "any", false, false, false, 40), "html", null, true);
                echo "</td>
                        <td>";
                // line 41
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "data", [], "any", false, false, false, 41), "unit_price", [], "any", false, false, false, 41), "html", null, true);
                echo "</td>
                        <td>";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "data", [], "any", false, false, false, 42), "total", [], "any", false, false, false, 42), "html", null, true);
                echo "</td>
                        <td>";
                // line 43
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "destination", [], "any", false, false, false, 43), "country", [], "any", false, false, false, 43), "html", null, true);
                echo "</td>
                        <td>";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "destination", [], "any", false, false, false, 44), "city", [], "any", false, false, false, 44), "html", null, true);
                echo "</td>
                        <td>";
                // line 45
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "destination", [], "any", false, false, false, 45), "street", [], "any", false, false, false, 45), "html", null, true);
                echo "</td>
                        <td>";
                // line 46
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "destination", [], "any", false, false, false, 46), "zip_code", [], "any", false, false, false, 46), "html", null, true);
                echo "</td>
                        <td>";
                // line 47
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "tracking", [], "any", false, false, false, 47), "status", [], "any", false, false, false, 47), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "                </tbody>
            </table>
        ";
        } else {
            // line 53
            echo "            <h2>No orders found containing '";
            echo twig_escape_filter($this->env, ($context["search"] ?? null), "html", null, true);
            echo "'</h2>
        ";
        }
        // line 55
        echo "    </div>
";
    }

    // line 57
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 58
        echo "    <script>
        clearSearch = () => {
            \$('#search-input').val('');
            \$('#search-form').submit();
        }
    </script>
    <script>
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
        return "admin.all-orders.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  186 => 58,  182 => 57,  177 => 55,  171 => 53,  166 => 50,  157 => 47,  153 => 46,  149 => 45,  145 => 44,  141 => 43,  137 => 42,  133 => 41,  129 => 40,  125 => 39,  121 => 38,  117 => 37,  112 => 36,  108 => 35,  87 => 16,  85 => 15,  74 => 11,  69 => 8,  65 => 7,  60 => 5,  56 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}All Orders{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"/css/admin.all-items.css\">
{% endblock %}
{% block content %}
    <div class=\"ad-container\">
        <div class=\"search-container\">
            <form action=\"\" class=\"search-form\" id=\"search-form\">
                <input type=\"text\" placeholder=\"Search\" id=\"search-input\" name=\"search\" {% if search %}value=\"{{ search }}\"{% endif %}>
            </form>
            <button onclick=\"clearSearch()\">Clear</button>
        </div>
        {% if orders|length > 0 %}
            <table>
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>QTY</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                    <th>D.country</th>
                    <th>D.city</th>
                    <th>D.street</th>
                    <th>D.zip</th>
                    <th>T.status</th>
                </tr>
                </thead>
                <tbody>


                {% for order in orders %}
                    <tr class='clickable-row clickable' data-href='/admin/order/{{ order.data.id }}'>
                        <td>{{ order.data.id }}</td>
                        <td>{{ order.user }}</td>
                        <td>{{ order.data.product_id }}</td>
                        <td>{{ order.data.qty }}</td>
                        <td>{{ order.data.unit_price }}</td>
                        <td>{{ order.data.total }}</td>
                        <td>{{ order.destination.country }}</td>
                        <td>{{ order.destination.city }}</td>
                        <td>{{ order.destination.street }}</td>
                        <td>{{ order.destination.zip_code }}</td>
                        <td>{{ order.tracking.status }}</td>
                    </tr>
                {% endfor %}
                </tbody>
            </table>
        {% else %}
            <h2>No orders found containing '{{ search }}'</h2>
        {% endif %}
    </div>
{% endblock %}
{% block script %}
    <script>
        clearSearch = () => {
            \$('#search-input').val('');
            \$('#search-form').submit();
        }
    </script>
    <script>
        jQuery(document).ready(function(\$) {
            \$(\".clickable-row\").click(function() {
                window.location = \$(this).data(\"href\");
            });
        });
    </script>
{% endblock %}", "admin.all-orders.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\admin.all-orders.twig");
    }
}
