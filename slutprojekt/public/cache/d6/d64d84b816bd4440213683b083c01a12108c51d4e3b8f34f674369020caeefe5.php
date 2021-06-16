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

/* admin.twig */
class __TwigTemplate_2d4ff43ce7a648d6c9b0f33196024b24383292add618a856e8a873167b3db1ba extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "admin.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Admin";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <link rel=\"stylesheet\" href=\"css/profile.css\">
";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    <h1>Welcome ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "fname", [], "any", false, false, false, 8), "html", null, true);
        echo "!</h1>

    <ul>
        <li><br><a class=\"u-button\" href=\"/admin/all-orders\">All orders</a></li>
        <li><br><a class=\"u-button\" href=\"/admin/all-users\">All users</a></li>
    </ul>

    <a href=\"/log-out\" id=\"log-out-btn\"><p>Log Out</p></a>
";
    }

    // line 17
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 18
        echo "    <script src=\"/js/disableSaveButton.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 18,  83 => 17,  69 => 8,  65 => 7,  60 => 5,  56 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Admin{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"css/profile.css\">
{% endblock %}
{% block content %}
    <h1>Welcome {{ user.fname }}!</h1>

    <ul>
        <li><br><a class=\"u-button\" href=\"/admin/all-orders\">All orders</a></li>
        <li><br><a class=\"u-button\" href=\"/admin/all-users\">All users</a></li>
    </ul>

    <a href=\"/log-out\" id=\"log-out-btn\"><p>Log Out</p></a>
{% endblock %}
{% block script %}
    <script src=\"/js/disableSaveButton.js\"></script>
{% endblock %}", "admin.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\admin.twig");
    }
}
