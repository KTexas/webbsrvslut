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

/* main.posters.twig */
class __TwigTemplate_744aaf148cc95994b33a442238efbd1b65a0cdd43783add05902cabdda0a5dcf extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "main.posters.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Home";
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
        echo "    ";
        if ((0 === twig_compare(($context["user"] ?? null), null))) {
            // line 15
            echo "        <h1 class=\"title\">Todays pick of posters</h1>
    ";
        } else {
            // line 17
            echo "        <h1 class=\"title\">Welcome ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "fname", [], "any", false, false, false, 17), "html", null, true);
            echo "!</h1>
    ";
        }
        // line 19
        echo "
    <div class=\"poster-container\">
        ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posters"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["poster"]) {
            // line 22
            echo "            <a href=\"/";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["poster"], "name", [], "any", false, false, false, 22), [" " => "-"]), "html", null, true);
            echo "-poster\">
                <div class=\"poster-card\">
                    <img class=\"poster-image\" src=\"assets/posters/";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "image", [], "any", false, false, false, 24), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "image", [], "any", false, false, false, 24), "html", null, true);
            echo "\">
                    <ul class=\"poster-ul\">
                        <li class=\"poster-li\">
                            <p class=\"poster-title\">";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "name", [], "any", false, false, false, 27), "html", null, true);
            echo "</p>
                            <p class=\"poster-price\">
                                ";
            // line 29
            $context["price"] = 99;
            // line 30
            echo "                                ";
            $context["price"] = (($context["price"] ?? null) + twig_get_attribute($this->env, $this->source, $context["poster"], "extra_price", [], "any", false, false, false, 30));
            // line 31
            echo "                                Fr. ";
            echo twig_escape_filter($this->env, ($context["price"] ?? null), "html", null, true);
            echo " kr
                            </p>
                        </li>
                        <li class=\"poster-li poster-li-2\">
                            ";
            // line 35
            $context["like"] = "";
            // line 36
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["liked"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["userLike"]) {
                // line 37
                echo "                                ";
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["userLike"], "product_id", [], "any", false, false, false, 37), twig_get_attribute($this->env, $this->source, $context["poster"], "id", [], "any", false, false, false, 37)))) {
                    // line 38
                    echo "                                    ";
                    $context["like"] = "-liked";
                    // line 39
                    echo "                                ";
                }
                // line 40
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['userLike'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "                            <p></p>
                            <form action=\"/like-poster\" method=\"post\">
                                <input type=\"hidden\" name=\"poster_id\" value=\"";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "id", [], "any", false, false, false, 43), "html", null, true);
            echo "\">
                                <input type=\"hidden\" name=\"poster_liked\" value=\"";
            // line 44
            if ((0 === twig_compare(($context["like"] ?? null), ""))) {
                echo "false";
            } else {
                echo "true";
            }
            echo "\">
                                <input type=\"hidden\" name=\"location\" value=\"/\">
                                <button type=\"submit\" class=\"clickable like-button\"><img src=\"assets/heart";
            // line 46
            echo twig_escape_filter($this->env, ($context["like"] ?? null), "html", null, true);
            echo ".png\" alt=\"\"></button>
                            </form>
                            <p class=\"poster-likes\">";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "likes", [], "any", false, false, false, 48), "html", null, true);
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
        // line 54
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "main.posters.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  196 => 54,  184 => 48,  179 => 46,  170 => 44,  166 => 43,  162 => 41,  156 => 40,  153 => 39,  150 => 38,  147 => 37,  142 => 36,  140 => 35,  132 => 31,  129 => 30,  127 => 29,  122 => 27,  114 => 24,  108 => 22,  104 => 21,  100 => 19,  94 => 17,  90 => 15,  87 => 14,  83 => 13,  75 => 10,  72 => 9,  69 => 8,  65 => 7,  60 => 5,  56 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Home{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"css/index.css\">
{% endblock %}
{% block cartAmount %}
    {% if cartAmount is same as(0) %}
    {% else %}
        {{ cartAmount }}
    {% endif %}
{% endblock %}
{% block content %}
    {% if user == null %}
        <h1 class=\"title\">Todays pick of posters</h1>
    {% else %}
        <h1 class=\"title\">Welcome {{ user.fname }}!</h1>
    {% endif %}

    <div class=\"poster-container\">
        {% for poster in posters %}
            <a href=\"/{{ poster.name | replace({' ' : '-'}) }}-poster\">
                <div class=\"poster-card\">
                    <img class=\"poster-image\" src=\"assets/posters/{{ poster.image }}\" alt=\"{{ poster.image }}\">
                    <ul class=\"poster-ul\">
                        <li class=\"poster-li\">
                            <p class=\"poster-title\">{{ poster.name }}</p>
                            <p class=\"poster-price\">
                                {% set price = 99 %}
                                {% set price = price + poster.extra_price %}
                                Fr. {{ price }} kr
                            </p>
                        </li>
                        <li class=\"poster-li poster-li-2\">
                            {% set like = '' %}
                            {% for userLike in liked %}
                                {% if userLike.product_id == poster.id %}
                                    {% set like = '-liked' %}
                                {% endif %}
                            {% endfor %}
                            <p></p>
                            <form action=\"/like-poster\" method=\"post\">
                                <input type=\"hidden\" name=\"poster_id\" value=\"{{ poster.id }}\">
                                <input type=\"hidden\" name=\"poster_liked\" value=\"{% if like == \"\" %}false{% else %}true{% endif %}\">
                                <input type=\"hidden\" name=\"location\" value=\"/\">
                                <button type=\"submit\" class=\"clickable like-button\"><img src=\"assets/heart{{ like }}.png\" alt=\"\"></button>
                            </form>
                            <p class=\"poster-likes\">{{ poster.likes }}</p>
                        </li>
                    </ul>
                </div>
            </a>
        {% endfor %}
    </div>
{% endblock %}", "main.posters.twig", "C:\\code\\webbsrv\\app\\views\\main.posters.twig");
    }
}
