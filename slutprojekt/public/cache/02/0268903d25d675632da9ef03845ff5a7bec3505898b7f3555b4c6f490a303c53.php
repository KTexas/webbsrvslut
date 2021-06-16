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

/* main.liked-products.twig */
class __TwigTemplate_2f08c546deb718d1de7df61f6f43124303148965bedc1635696c2b47afef53ea extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "main.liked-products.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Liked Products";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <link rel=\"stylesheet\" href=\"css/index.css\">
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
        echo "    <h1 class=\"title\">Liked Posters</h1>
    <div class=\"poster-container\">
        ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posters"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["poster"]) {
            // line 18
            echo "            <a href=\"/";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["poster"], "name", [], "any", false, false, false, 18), [" " => "-"]), "html", null, true);
            echo "-poster\">
                <div class=\"poster-card\">
                    <img class=\"poster-image\" src=\"/assets/posters/";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "image", [], "any", false, false, false, 20), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "image", [], "any", false, false, false, 20), "html", null, true);
            echo "\">
                    <ul class=\"poster-ul\">
                        <li class=\"poster-li\">
                            <p class=\"poster-title\">";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "name", [], "any", false, false, false, 23), "html", null, true);
            echo "</p>
                            <p class=\"poster-price\">
                                ";
            // line 25
            $context["price"] = 99;
            // line 26
            echo "                                ";
            $context["price"] = (($context["price"] ?? null) + twig_get_attribute($this->env, $this->source, $context["poster"], "extra_price", [], "any", false, false, false, 26));
            // line 27
            echo "                                Fr. ";
            echo twig_escape_filter($this->env, ($context["price"] ?? null), "html", null, true);
            echo ":-
                            </p>
                        </li>
                        <li class=\"poster-li poster-li-2\">
                            <form action=\"/like-poster\" method=\"post\">
                                <input type=\"hidden\" name=\"poster_id\" value=\"";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "id", [], "any", false, false, false, 32), "html", null, true);
            echo "\">
                                <input type=\"hidden\" name=\"poster_liked\" value=\"true\">
                                <input type=\"hidden\" name=\"location\" value=\"/liked-products\">
                                <button type=\"submit\" class=\"clickable like-button\"><img src=\"/assets/heart";
            // line 35
            echo twig_escape_filter($this->env, ($context["like"] ?? null), "html", null, true);
            echo "-liked.png\" alt=\"\"></button>
                            </form>
                            <p class=\"poster-likes\">";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "likes", [], "any", false, false, false, 37), "html", null, true);
            echo "</p>
                        </li>
                    </ul>
                </div>
            </a>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['poster'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "        ";
        if ((0 === twig_compare(twig_length_filter($this->env, ($context["posters"] ?? null)), 0))) {
            // line 44
            echo "            <p>You do not have any liked products</p>
        ";
        }
        // line 46
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "main.liked-products.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 46,  164 => 44,  161 => 43,  149 => 37,  144 => 35,  138 => 32,  129 => 27,  126 => 26,  124 => 25,  119 => 23,  111 => 20,  105 => 18,  101 => 17,  97 => 15,  93 => 14,  85 => 11,  82 => 10,  79 => 9,  75 => 8,  66 => 7,  61 => 5,  57 => 4,  50 => 3,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Liked Products{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"css/index.css\">
{% endblock %}
{% block favicon %}{% if cartAmount is not same as(0) %}-cart{% endif %}{% endblock %}
{% block cartAmount %}
    {% if cartAmount is same as(0) %}
    {% else %}
        {{ cartAmount }}
    {% endif %}
{% endblock %}
{% block content %}
    <h1 class=\"title\">Liked Posters</h1>
    <div class=\"poster-container\">
        {% for poster in posters %}
            <a href=\"/{{ poster.name | replace({' ' : '-'}) }}-poster\">
                <div class=\"poster-card\">
                    <img class=\"poster-image\" src=\"/assets/posters/{{ poster.image }}\" alt=\"{{ poster.image }}\">
                    <ul class=\"poster-ul\">
                        <li class=\"poster-li\">
                            <p class=\"poster-title\">{{ poster.name }}</p>
                            <p class=\"poster-price\">
                                {% set price = 99 %}
                                {% set price = price + poster.extra_price %}
                                Fr. {{ price }}:-
                            </p>
                        </li>
                        <li class=\"poster-li poster-li-2\">
                            <form action=\"/like-poster\" method=\"post\">
                                <input type=\"hidden\" name=\"poster_id\" value=\"{{ poster.id }}\">
                                <input type=\"hidden\" name=\"poster_liked\" value=\"true\">
                                <input type=\"hidden\" name=\"location\" value=\"/liked-products\">
                                <button type=\"submit\" class=\"clickable like-button\"><img src=\"/assets/heart{{ like }}-liked.png\" alt=\"\"></button>
                            </form>
                            <p class=\"poster-likes\">{{ poster.likes }}</p>
                        </li>
                    </ul>
                </div>
            </a>
        {% endfor %}
        {% if posters|length == 0 %}
            <p>You do not have any liked products</p>
        {% endif %}
    </div>
{% endblock %}", "main.liked-products.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\main.liked-products.twig");
    }
}
