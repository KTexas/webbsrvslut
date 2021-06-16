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

/* admin.add-product.twig */
class __TwigTemplate_d77efddb9df56cd7e4f1a860a219cb95987e80fc2cd0299f859ba34c2e659670 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "admin.add-product.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Add product";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <link rel=\"stylesheet\" href=\"/css/admin.all-items.css\">
    <link rel=\"stylesheet\" href=\"/css/profile.css\">
";
    }

    // line 8
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 9
        echo "    <div class=\"ad-container\">
        <form action=\"/admin/add-product/post\" method=\"post\" class=\"settings-form\" enctype=\"multipart/form-data\">
            <div>
                <label for=\"name\">Name: </label>
                <input id=\"name\" type=\"text\" name=\"name\" autocomplete=\"off\">
            </div>
            <div>
                <label for=\"price\">Extra price: </label>
                <input id=\"price\" type=\"text\" name=\"price\" autocomplete=\"off\">
            </div>
            <div>
                <label for=\"likes\">Likes: </label>
                <input id=\"likes\" type=\"text\" name=\"likes\" autocomplete=\"off\">
            </div>
            <div>
                <label for=\"image\">Image: </label>
";
        // line 26
        echo "                <input name=\"image\" type=\"file\">
            </div>
            <fieldset class=\"color-container\">
                ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["colors"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["color"]) {
            // line 30
            echo "                    <span>
                        <input
                                type=\"checkbox\"
                                id=\"color-";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["color"], "id", [], "any", false, false, false, 33), "html", null, true);
            echo "\"
                                name=\"color-";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["color"], "id", [], "any", false, false, false, 34), "html", null, true);
            echo "\"
                                value=\"";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["color"], "name", [], "any", false, false, false, 35), "html", null, true);
            echo "\"
                                ";
            // line 36
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["color"], "id", [], "any", false, false, false, 36), ($context["selectedColors"] ?? null))) {
                // line 37
                echo "                                    CHECKED
                                ";
            }
            // line 39
            echo "                        >
                        <label for=\"color-";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["color"], "id", [], "any", false, false, false, 40), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["color"], "name", [], "any", false, false, false, 40), "html", null, true);
            echo "</label>
                    </span>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['color'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "                <input type=\"hidden\" name=\"totalColorAmount\" value=\"";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["colors"] ?? null)), "html", null, true);
        echo "\">
            </fieldset>
            <input type=\"submit\" value=\"Add\" class=\"u-button clickable\">
        </form>
    </div>
";
    }

    // line 49
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 50
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
        return "admin.add-product.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 50,  145 => 49,  134 => 43,  123 => 40,  120 => 39,  116 => 37,  114 => 36,  110 => 35,  106 => 34,  102 => 33,  97 => 30,  93 => 29,  88 => 26,  70 => 9,  66 => 8,  60 => 5,  56 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Add product{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"/css/admin.all-items.css\">
    <link rel=\"stylesheet\" href=\"/css/profile.css\">
{% endblock %}
{% block content %}
    <div class=\"ad-container\">
        <form action=\"/admin/add-product/post\" method=\"post\" class=\"settings-form\" enctype=\"multipart/form-data\">
            <div>
                <label for=\"name\">Name: </label>
                <input id=\"name\" type=\"text\" name=\"name\" autocomplete=\"off\">
            </div>
            <div>
                <label for=\"price\">Extra price: </label>
                <input id=\"price\" type=\"text\" name=\"price\" autocomplete=\"off\">
            </div>
            <div>
                <label for=\"likes\">Likes: </label>
                <input id=\"likes\" type=\"text\" name=\"likes\" autocomplete=\"off\">
            </div>
            <div>
                <label for=\"image\">Image: </label>
{#                <input id=\"image\" type=\"text\" name=\"image\" autocomplete=\"off\">#}
                <input name=\"image\" type=\"file\">
            </div>
            <fieldset class=\"color-container\">
                {% for color in colors %}
                    <span>
                        <input
                                type=\"checkbox\"
                                id=\"color-{{ color.id }}\"
                                name=\"color-{{ color.id }}\"
                                value=\"{{ color.name }}\"
                                {% if color.id in selectedColors %}
                                    CHECKED
                                {% endif %}
                        >
                        <label for=\"color-{{ color.id }}\">{{ color.name }}</label>
                    </span>
                {% endfor %}
                <input type=\"hidden\" name=\"totalColorAmount\" value=\"{{ colors|length }}\">
            </fieldset>
            <input type=\"submit\" value=\"Add\" class=\"u-button clickable\">
        </form>
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

{% endblock %}", "admin.add-product.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\admin.add-product.twig");
    }
}
