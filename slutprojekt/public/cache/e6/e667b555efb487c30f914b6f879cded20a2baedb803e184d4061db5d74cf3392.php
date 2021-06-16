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

/* user.log-in.twig */
class __TwigTemplate_a810fb0df7ef38c81afd064de973b8cea5457bc73695ad643c1559a27391904f extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "user.log-in.twig", 1);
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
        echo "    <form action=\"/log-in-user\" method=\"post\" class=\"u-form\">
        <h1 class=\"u-title\">Log in</h1>
        <input class=\"u-input\" type=\"text\" placeholder=\"Email\" name=\"email\">
        <input class=\"u-input\" id=\"password-input\" onmouseover=\"showPassword('#password-input')\" onmouseout=\"hidePassword('#password-input')\" type=\"password\" placeholder=\"Password\" name=\"password\" autocomplete=\"off\">
";
        // line 21
        echo "        <button class=\"u-button\" type=\"submit\">Log in</button>
    </form>
    <a href=\"/forgot-password\" class=\"u-login-button\">Forgot Password?</a>
    <a href=\"/create-profile\" class=\"u-login-button\">Create Account</a>
";
    }

    // line 26
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "    <script>
        showPassword = (element) => {
            let x = document.querySelector(element);
            x.type = 'text';
        }
        hidePassword = (element) => {
            let x = document.querySelector(element);
            x.type = 'password';
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "user.log-in.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 27,  112 => 26,  104 => 21,  98 => 15,  94 => 14,  86 => 11,  83 => 10,  80 => 9,  76 => 8,  67 => 7,  62 => 5,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Log in{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"css/user-form.css\">
{% endblock %}
{% block favicon %}{% if cartAmount is not same as(0) %}-cart{% endif %}{% endblock %}
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
        <input class=\"u-input\" id=\"password-input\" onmouseover=\"showPassword('#password-input')\" onmouseout=\"hidePassword('#password-input')\" type=\"password\" placeholder=\"Password\" name=\"password\" autocomplete=\"off\">
{#        <input type=\"checkbox\" id=\"show-password\" onclick=\"showPassword('#password-input')\">#}
{#        <label for=\"show-password\" id=\"show-password-label\">Show Password</label>#}
        <button class=\"u-button\" type=\"submit\">Log in</button>
    </form>
    <a href=\"/forgot-password\" class=\"u-login-button\">Forgot Password?</a>
    <a href=\"/create-profile\" class=\"u-login-button\">Create Account</a>
{% endblock %}
{% block script %}
    <script>
        showPassword = (element) => {
            let x = document.querySelector(element);
            x.type = 'text';
        }
        hidePassword = (element) => {
            let x = document.querySelector(element);
            x.type = 'password';
        }
    </script>
{% endblock %}", "user.log-in.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\user.log-in.twig");
    }
}
