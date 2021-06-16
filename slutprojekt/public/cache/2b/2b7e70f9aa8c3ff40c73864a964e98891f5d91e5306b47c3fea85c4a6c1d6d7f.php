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

/* admin.all-products.twig */
class __TwigTemplate_80f5078e1d48c45058303eadc56cafedb3a43d506fef5736b4818013f3e7ea80 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "admin.all-products.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "All Products";
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
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EXTRA PRICE</th>
                <th>LIKES</th>
            </tr>
            </thead>
            <tbody>
            ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posters"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["poster"]) {
            // line 26
            echo "                <tr  class='clickable-row clickable' data-href='/admin/products/";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["poster"], "name", [], "any", false, false, false, 26), [" " => "-"]), "html", null, true);
            echo "-poster'>
                    <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "id", [], "any", false, false, false, 27), "html", null, true);
            echo "</td>
                    <td>";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "name", [], "any", false, false, false, 28), "html", null, true);
            echo "</td>
                    <td>";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "extra_price", [], "any", false, false, false, 29), "html", null, true);
            echo "</td>
                    <td>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "likes", [], "any", false, false, false, 30), "html", null, true);
            echo "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['poster'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "            </tbody>
        </table>
    </div>
    <a class=\"add-button\" href=\"/admin/add-product\">+</a>
";
    }

    // line 38
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 39
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
        return "admin.all-products.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 39,  133 => 38,  125 => 33,  116 => 30,  112 => 29,  108 => 28,  104 => 27,  99 => 26,  95 => 25,  74 => 11,  69 => 8,  65 => 7,  60 => 5,  56 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}All Products{% endblock %}
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
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EXTRA PRICE</th>
                <th>LIKES</th>
            </tr>
            </thead>
            <tbody>
            {% for poster in posters %}
                <tr  class='clickable-row clickable' data-href='/admin/products/{{ poster.name | replace({' ' : '-'}) }}-poster'>
                    <td>{{ poster.id }}</td>
                    <td>{{ poster.name }}</td>
                    <td>{{ poster.extra_price }}</td>
                    <td>{{ poster.likes }}</td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
    <a class=\"add-button\" href=\"/admin/add-product\">+</a>
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
{% endblock %}", "admin.all-products.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\admin.all-products.twig");
    }
}
