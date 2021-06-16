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

/* admin.edit-poster.twig */
class __TwigTemplate_7162ea684f443983f89286064ea96b939c57e2064b4f330186cdf153a27675c0 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "admin.edit-poster.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Edit Poster";
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
        <h1>";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "name", [], "any", false, false, false, 10), "html", null, true);
        echo " (ID: ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "id", [], "any", false, false, false, 10), "html", null, true);
        echo ")</h1>
        <form action=\"/admin/update-poster\" method=\"post\" class=\"settings-form\">
            <input type=\"hidden\" name=\"posterId\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "id", [], "any", false, false, false, 12), "html", null, true);
        echo "\">
            <div class=\"poster-image-container\">
                <img src=\"/assets/posters/";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "image", [], "any", false, false, false, 14), "html", null, true);
        echo "\" alt=\"\">
                <input type=\"text\" id=\"image\" name=\"image\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "image", [], "any", false, false, false, 15), "html", null, true);
        echo "\">
            </div>
            <div>
                <input id=\"name\" type=\"text\" name=\"name\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "name", [], "any", false, false, false, 18), "html", null, true);
        echo "\">
                <label for=\"name\">Name</label>
            </div>
            <div>
                <input id=\"price\" type=\"text\" name=\"price\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "extra_price", [], "any", false, false, false, 22), "html", null, true);
        echo "\">
                <label for=\"price\">Extra Price (kr)</label>
            </div>

            <div>
                <input id=\"likes\" type=\"text\" name=\"likes\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "likes", [], "any", false, false, false, 27), "html", null, true);
        echo "\">
                <label for=\"likes\">Likes</label>
            </div>
            <fieldset class=\"color-container\">
                ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["allColors"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["color"]) {
            // line 32
            echo "                    <span>
                        <input
                                type=\"checkbox\"
                                id=\"color-";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["color"], "id", [], "any", false, false, false, 35), "html", null, true);
            echo "\"
                                name=\"color-";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["color"], "id", [], "any", false, false, false, 36), "html", null, true);
            echo "\"
                                value=\"";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["color"], "name", [], "any", false, false, false, 37), "html", null, true);
            echo "\"
                                ";
            // line 38
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["color"], "id", [], "any", false, false, false, 38), ($context["selectedColors"] ?? null))) {
                // line 39
                echo "                                    CHECKED
                                ";
            }
            // line 41
            echo "                        >
                        <label for=\"color-";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["color"], "id", [], "any", false, false, false, 42), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["color"], "name", [], "any", false, false, false, 42), "html", null, true);
            echo "</label>
                    </span>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['color'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "                <input type=\"hidden\" name=\"totalColorAmount\" value=\"";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["allColors"] ?? null)), "html", null, true);
        echo "\">
            </fieldset>
            <button type=\"submit\" id=\"submit-data\" class=\"save-btn clickable\" disabled=\"\">Save</button>
        </form>
        <form action=\"/admin/products/delete-product\" method=\"post\">
            <input type=\"hidden\" name=\"id\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["poster"] ?? null), "id", [], "any", false, false, false, 50), "html", null, true);
        echo "\">
            <button type=\"submit\" id=\"submit-data\" class=\"delete-button clickable\">DELETE</button>
        </form>
    </div>
";
    }

    // line 55
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 56
        echo "    <script src=\"/js/disableSaveButton.js\"></script>

";
    }

    public function getTemplateName()
    {
        return "admin.edit-poster.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 56,  176 => 55,  167 => 50,  158 => 45,  147 => 42,  144 => 41,  140 => 39,  138 => 38,  134 => 37,  130 => 36,  126 => 35,  121 => 32,  117 => 31,  110 => 27,  102 => 22,  95 => 18,  89 => 15,  85 => 14,  80 => 12,  73 => 10,  70 => 9,  66 => 8,  60 => 5,  56 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Edit Poster{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"/css/admin.all-items.css\">
    <link rel=\"stylesheet\" href=\"/css/profile.css\">
{% endblock %}
{% block content %}
    <div class=\"ad-container\">
        <h1>{{ poster.name }} (ID: {{ poster.id }})</h1>
        <form action=\"/admin/update-poster\" method=\"post\" class=\"settings-form\">
            <input type=\"hidden\" name=\"posterId\" value=\"{{ poster.id }}\">
            <div class=\"poster-image-container\">
                <img src=\"/assets/posters/{{ poster.image }}\" alt=\"\">
                <input type=\"text\" id=\"image\" name=\"image\" value=\"{{ poster.image }}\">
            </div>
            <div>
                <input id=\"name\" type=\"text\" name=\"name\" value=\"{{ poster.name }}\">
                <label for=\"name\">Name</label>
            </div>
            <div>
                <input id=\"price\" type=\"text\" name=\"price\" value=\"{{ poster.extra_price }}\">
                <label for=\"price\">Extra Price (kr)</label>
            </div>

            <div>
                <input id=\"likes\" type=\"text\" name=\"likes\" value=\"{{ poster.likes }}\">
                <label for=\"likes\">Likes</label>
            </div>
            <fieldset class=\"color-container\">
                {% for color in allColors %}
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
                <input type=\"hidden\" name=\"totalColorAmount\" value=\"{{ allColors|length }}\">
            </fieldset>
            <button type=\"submit\" id=\"submit-data\" class=\"save-btn clickable\" disabled=\"\">Save</button>
        </form>
        <form action=\"/admin/products/delete-product\" method=\"post\">
            <input type=\"hidden\" name=\"id\" value=\"{{ poster.id }}\">
            <button type=\"submit\" id=\"submit-data\" class=\"delete-button clickable\">DELETE</button>
        </form>
    </div>
{% endblock %}
{% block script %}
    <script src=\"/js/disableSaveButton.js\"></script>

{% endblock %}", "admin.edit-poster.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\admin.edit-poster.twig");
    }
}
