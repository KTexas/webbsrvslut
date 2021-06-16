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

/* 404.twig */
class __TwigTemplate_107ca00fa8f9cb7cbd4bd130284f4b88769a1e91c5deeafcfe74acfb5ce233be extends Template
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
        return "../base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("../base.twig", "404.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "404";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "
    <link rel=\"stylesheet\" href=\"css/404.css\">
";
    }

    // line 8
    public function block_favicon($context, array $blocks = [])
    {
        $macros = $this->macros;
        if ( !(($context["cartAmount"] ?? null) === 0)) {
            echo "-cart";
        }
    }

    // line 9
    public function block_cartAmount($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "    ";
        if ((($context["cartAmount"] ?? null) === 0)) {
            // line 11
            echo "    ";
        } else {
            // line 12
            echo "        ";
            echo twig_escape_filter($this->env, ($context["cartAmount"] ?? null), "html", null, true);
            echo "
    ";
        }
    }

    // line 15
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 16
        echo "    <div id=\"notfound\">
        <div class=\"notfound\">
            <div class=\"notfound-404\">
                <h1>Oops!</h1>
                <h2>404 - The Page can't be found</h2>
            </div>
            <a href=\"/\">Go TO Homepage</a>
        </div>
    </div>
";
    }

    // line 26
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "404.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 26,  99 => 16,  95 => 15,  87 => 12,  84 => 11,  81 => 10,  77 => 9,  68 => 8,  62 => 5,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"../base.twig\" %}

{% block title %}404{% endblock %}
{% block head %}

    <link rel=\"stylesheet\" href=\"css/404.css\">
{% endblock %}
{% block favicon %}{% if cartAmount is not same as(0) %}-cart{% endif %}{% endblock %}
{% block cartAmount %}
    {% if cartAmount is same as(0) %}
    {% else %}
        {{ cartAmount }}
    {% endif %}
{% endblock %}
{% block content %}
    <div id=\"notfound\">
        <div class=\"notfound\">
            <div class=\"notfound-404\">
                <h1>Oops!</h1>
                <h2>404 - The Page can't be found</h2>
            </div>
            <a href=\"/\">Go TO Homepage</a>
        </div>
    </div>
{% endblock %}
{% block script %}
{% endblock %}", "404.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\other\\404.twig");
    }
}
