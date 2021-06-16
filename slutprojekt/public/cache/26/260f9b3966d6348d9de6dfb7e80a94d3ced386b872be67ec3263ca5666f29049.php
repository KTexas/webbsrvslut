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
class __TwigTemplate_7ba4251ef5e6ac8e3e361ee5d2e8128b160392db93ccb00f2eb1931b3f102ded extends Template
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
";
        // line 12
        echo "        <table>
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
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posters"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["poster"]) {
            // line 23
            echo "                <tr  class='clickable-row clickable' data-href='/admin/products/";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["poster"], "name", [], "any", false, false, false, 23), [" " => "-"]), "html", null, true);
            echo "-poster'>
                    <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "id", [], "any", false, false, false, 24), "html", null, true);
            echo "</td>
                    <td>";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "name", [], "any", false, false, false, 25), "html", null, true);
            echo "</td>
                    <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "extra_price", [], "any", false, false, false, 26), "html", null, true);
            echo "</td>
                    <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "likes", [], "any", false, false, false, 27), "html", null, true);
            echo "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['poster'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "            </tbody>
        </table>
    </div>
    <a class=\"add-button\" href=\"/admin/add-product\">+</a>
";
    }

    // line 35
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 36
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
        return "admin.all-products.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 36,  122 => 35,  114 => 30,  105 => 27,  101 => 26,  97 => 25,  93 => 24,  88 => 23,  84 => 22,  72 => 12,  69 => 8,  65 => 7,  60 => 5,  56 => 4,  49 => 3,  38 => 1,);
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
{#        <form action=\"\" class=\"search-form\">#}
{#            <input type=\"text\" placeholder=\"Search\" name=\"search\">#}
{#        </form>#}
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
        jQuery(document).ready(function(\$) {
            \$(\".clickable-row\").click(function() {
                window.location = \$(this).data(\"href\");
            });
        });
    </script>

{% endblock %}", "admin.all-products.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\admin.all-products.twig");
    }
}
