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

/* admin.edit-user.twig */
class __TwigTemplate_3d9f422f09236a2eddde271a818828aa455e45b7e0b5db1efd3ad896fafe7459 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "admin.edit-user.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Edit User ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 3), "html", null, true);
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
        <h1>USER</h1>
        <form action=\"/admin/update-user\" method=\"post\" class=\"settings-form\">
            <input type=\"hidden\" name=\"userId\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 12), "html", null, true);
        echo "\">
            <div>
                <input id=\"email\" type=\"text\" name=\"email\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 14), "html", null, true);
        echo "\">
                <label for=\"email\">Email</label>
            </div>

            <div>
                <input id=\"fname\" type=\"text\" name=\"fname\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "fname", [], "any", false, false, false, 19), "html", null, true);
        echo "\">
                <label for=\"fname\">First Name</label>
            </div>

            <div>
                <input id=\"lname\" type=\"text\" name=\"lname\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "lname", [], "any", false, false, false, 24), "html", null, true);
        echo "\">
                <label for=\"lname\">Last Name</label>
            </div>

            <div>
                <input id='adminHidden' type='hidden' value='off' name='adminHidden'>
                <input class=\"clickable\" id=\"admin\" type=\"checkbox\" name=\"admin\" ";
        // line 30
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "is_admin", [], "any", false, false, false, 30)) {
            echo "CHECKED";
        }
        echo ">
                <label for=\"admin\">Is Admin</label>
            </div>
            <button type=\"submit\" id=\"submit-data\" class=\"save-btn clickable\" disabled=\"\">Save</button>
        </form>
    </div>
";
    }

    // line 37
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 38
        echo "    <script src=\"/js/disableSaveButton.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "admin.edit-user.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 38,  119 => 37,  106 => 30,  97 => 24,  89 => 19,  81 => 14,  76 => 12,  71 => 9,  67 => 8,  61 => 5,  57 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Edit User {{ user.id }}{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"/css/admin.all-items.css\">
    <link rel=\"stylesheet\" href=\"/css/profile.css\">
{% endblock %}
{% block content %}
    <div class=\"ad-container\">
        <h1>USER</h1>
        <form action=\"/admin/update-user\" method=\"post\" class=\"settings-form\">
            <input type=\"hidden\" name=\"userId\" value=\"{{ user.id }}\">
            <div>
                <input id=\"email\" type=\"text\" name=\"email\" value=\"{{ user.email }}\">
                <label for=\"email\">Email</label>
            </div>

            <div>
                <input id=\"fname\" type=\"text\" name=\"fname\" value=\"{{ user.fname }}\">
                <label for=\"fname\">First Name</label>
            </div>

            <div>
                <input id=\"lname\" type=\"text\" name=\"lname\" value=\"{{ user.lname }}\">
                <label for=\"lname\">Last Name</label>
            </div>

            <div>
                <input id='adminHidden' type='hidden' value='off' name='adminHidden'>
                <input class=\"clickable\" id=\"admin\" type=\"checkbox\" name=\"admin\" {% if user.is_admin %}CHECKED{% endif %}>
                <label for=\"admin\">Is Admin</label>
            </div>
            <button type=\"submit\" id=\"submit-data\" class=\"save-btn clickable\" disabled=\"\">Save</button>
        </form>
    </div>
{% endblock %}
{% block script %}
    <script src=\"/js/disableSaveButton.js\"></script>
{% endblock %}", "admin.edit-user.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\admin.edit-user.twig");
    }
}
