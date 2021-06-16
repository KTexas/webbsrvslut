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

/* user.user.user.log-in.twig */
class __TwigTemplate_d813f2b9fdb46c583fe18cf7f892c13ae5846a7c65be73f654dcf324c00140d5 extends Template
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
            'cartAmount' => [$this, 'block_cartAmount'],
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
        $this->parent = $this->loadTemplate("base.twig", "user.user.user.log-in.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Log in";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <link rel=\"stylesheet\" href=\"css/user-form.css\">
";
    }

    // line 7
    public function block_cartAmount($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    ";
        if ((($context["cartAmount"] ?? null) === 0)) {
            // line 9
            echo "    ";
        } else {
            // line 10
            echo "        ";
            echo twig_escape_filter($this->env, ($context["cartAmount"] ?? null), "html", null, true);
            echo "
    ";
        }
    }

    // line 13
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        echo "    <form action=\"/log-in-user\" method=\"post\" class=\"u-form\">
        <h1 class=\"u-title\">Log in</h1>
        <input class=\"u-input\" type=\"text\" placeholder=\"Email\" name=\"email\">
        <input class=\"u-input\" type=\"password\" placeholder=\"Password\" name=\"password\">
        <button class=\"u-button\" type=\"submit\">Log in</button>
    </form>
    <a href=\"/create-profile\" class=\"u-login-button\">Create Account</a>
";
    }

    public function getTemplateName()
    {
        return "user.user.user.log-in.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 14,  83 => 13,  75 => 10,  72 => 9,  69 => 8,  65 => 7,  60 => 5,  56 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Log in{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"css/user-form.css\">
{% endblock %}
{% block cartAmount %}
    {% if cartAmount is same as(0) %}
    {% else %}
        {{ cartAmount }}
    {% endif %}
{% endblock %}
{% block content %}
    <form action=\"/log-in-user\" method=\"post\" class=\"u-form\">
        <h1 class=\"u-title\">Log in</h1>
        <input class=\"u-input\" type=\"text\" placeholder=\"Email\" name=\"email\">
        <input class=\"u-input\" type=\"password\" placeholder=\"Password\" name=\"password\">
        <button class=\"u-button\" type=\"submit\">Log in</button>
    </form>
    <a href=\"/create-profile\" class=\"u-login-button\">Create Account</a>
{% endblock %}", "user.user.user.log-in.twig", "C:\\code\\webbsrv\\app\\views\\user.user.user.log-in.twig");
    }
}
