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
class __TwigTemplate_2dba10d63b0b3f56073e17f2f67352b43845c2120f17e4b925f08c94528b7240 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "main.posters.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Posters";
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
        echo "    <h1 class=\"title\">All posters</h1>
    <form method=\"get\" action=\"\">
        <label for=\"color-select\">Colors</label>
        <select name=\"color\" id=\"color-select\" onchange=\"this.form.submit()\">
            <option value=\"all\" ";
        // line 19
        if ((0 === twig_compare(($context["selectedColor"] ?? null), 0))) {
            echo "selected";
        }
        echo ">All</option>
            ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["colors"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["color"]) {
            // line 21
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, $context["color"], "name", [], "any", false, false, false, 21)), "html", null, true);
            echo "\" ";
            if ((0 === twig_compare(($context["selectedColor"] ?? null), twig_get_attribute($this->env, $this->source, $context["color"], "id", [], "any", false, false, false, 21)))) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["color"], "name", [], "any", false, false, false, 21), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['color'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "        </select>

        <label for=\"order-select\">Sort by</label>
        <select name=\"order\" id=\"order-select\" onchange=\"this.form.submit()\">
            <option value=\"0\" ";
        // line 27
        if ((0 === twig_compare(($context["selectedOrder"] ?? null), 0))) {
            echo "selected";
        }
        echo ">Name</option>
            <option value=\"1\" ";
        // line 28
        if ((0 === twig_compare(($context["selectedOrder"] ?? null), 1))) {
            echo "selected";
        }
        echo ">Lowest Price</option>
            <option value=\"2\" ";
        // line 29
        if ((0 === twig_compare(($context["selectedOrder"] ?? null), 2))) {
            echo "selected";
        }
        echo ">Highest Price</option>
            <option value=\"3\" ";
        // line 30
        if ((0 === twig_compare(($context["selectedOrder"] ?? null), 3))) {
            echo "selected";
        }
        echo ">Most likes</option>
        </select>
    </form>
    <div class=\"poster-container\">

        ";
        // line 35
        if ((1 === twig_compare(twig_length_filter($this->env, ($context["posters"] ?? null)), 0))) {
            // line 36
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["posters"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["poster"]) {
                // line 37
                echo "                <a href=\"/";
                echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["poster"], "name", [], "any", false, false, false, 37), [" " => "-"]), "html", null, true);
                echo "-poster\">
                    <div class=\"poster-card\">
                        <img class=\"poster-image\" src=\"/assets/posters/";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "image", [], "any", false, false, false, 39), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "image", [], "any", false, false, false, 39), "html", null, true);
                echo "\">
                        <ul class=\"poster-ul\">
                            <li class=\"poster-li\">
                                <p class=\"poster-title\">";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "name", [], "any", false, false, false, 42), "html", null, true);
                echo "</p>
                                <p class=\"poster-price\">
                                    ";
                // line 44
                $context["price"] = 99;
                // line 45
                echo "                                    ";
                $context["price"] = (($context["price"] ?? null) + twig_get_attribute($this->env, $this->source, $context["poster"], "extra_price", [], "any", false, false, false, 45));
                // line 46
                echo "                                    From ";
                echo twig_escape_filter($this->env, ($context["price"] ?? null), "html", null, true);
                echo " kr
                                </p>
                            </li>
                            <li class=\"poster-li poster-li-2\">
                                ";
                // line 50
                $context["like"] = "";
                // line 51
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["liked"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["userLike"]) {
                    // line 52
                    echo "                                    ";
                    if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["userLike"], "product_id", [], "any", false, false, false, 52), twig_get_attribute($this->env, $this->source, $context["poster"], "id", [], "any", false, false, false, 52)))) {
                        // line 53
                        echo "                                        ";
                        $context["like"] = "-liked";
                        // line 54
                        echo "                                    ";
                    }
                    // line 55
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['userLike'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                echo "                                <p></p>
                                <form action=\"/like-poster\" method=\"post\">
                                    <input type=\"hidden\" name=\"poster_id\" value=\"";
                // line 58
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "id", [], "any", false, false, false, 58), "html", null, true);
                echo "\">
                                    <input type=\"hidden\" name=\"poster_liked\" value=\"";
                // line 59
                if ((0 === twig_compare(($context["like"] ?? null), ""))) {
                    echo "false";
                } else {
                    echo "true";
                }
                echo "\">
                                    <input type=\"hidden\" name=\"location\" value=\"";
                // line 60
                echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
                echo "\">
                                    <button type=\"submit\" class=\"clickable like-button\"><img src=\"/assets/heart";
                // line 61
                echo twig_escape_filter($this->env, ($context["like"] ?? null), "html", null, true);
                echo ".png\" alt=\"\"></button>
                                </form>
                                <p class=\"poster-likes\">";
                // line 63
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["poster"], "likes", [], "any", false, false, false, 63), "html", null, true);
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
            // line 69
            echo "        ";
        } else {
            // line 70
            echo "            <p>No result found</p>
        ";
        }
        // line 72
        echo "    </div>
    ";
        // line 73
        if ( !($context["user"] ?? null)) {
            // line 74
            echo "        <div class=\"log-in-modal\">
            <p>Why not log in or create a new account?</p>
            <button onclick=\"closeModal()\">X</button>
            <span>
                    <a href=\"/log-in\">Log in</a>
                    <a href=\"/create-profile\">New user?</a>
                </span>
        </div>
    ";
        }
    }

    // line 84
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 85
        echo "    ";
        if ( !($context["user"] ?? null)) {
            // line 86
            echo "        <script>
            \$(document).ready(function(){
                setTimeout(function(){
                    \$('.log-in-modal').css('bottom', \"20px\");
                }, 3000);
            });
            closeModal = () => {
                \$('.log-in-modal').css('opacity', 0);
            }
        </script>
    ";
        }
        // line 97
        echo "
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
        return array (  306 => 97,  293 => 86,  290 => 85,  286 => 84,  273 => 74,  271 => 73,  268 => 72,  264 => 70,  261 => 69,  249 => 63,  244 => 61,  240 => 60,  232 => 59,  228 => 58,  224 => 56,  218 => 55,  215 => 54,  212 => 53,  209 => 52,  204 => 51,  202 => 50,  194 => 46,  191 => 45,  189 => 44,  184 => 42,  176 => 39,  170 => 37,  165 => 36,  163 => 35,  153 => 30,  147 => 29,  141 => 28,  135 => 27,  129 => 23,  114 => 21,  110 => 20,  104 => 19,  98 => 15,  94 => 14,  86 => 11,  83 => 10,  80 => 9,  76 => 8,  67 => 7,  62 => 5,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Posters{% endblock %}
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
    <h1 class=\"title\">All posters</h1>
    <form method=\"get\" action=\"\">
        <label for=\"color-select\">Colors</label>
        <select name=\"color\" id=\"color-select\" onchange=\"this.form.submit()\">
            <option value=\"all\" {% if selectedColor == 0 %}selected{% endif %}>All</option>
            {% for color in colors %}
                <option value=\"{{ color.name|lower }}\" {% if selectedColor == color.id %}selected{% endif %}>{{ color.name }}</option>
            {% endfor %}
        </select>

        <label for=\"order-select\">Sort by</label>
        <select name=\"order\" id=\"order-select\" onchange=\"this.form.submit()\">
            <option value=\"0\" {% if selectedOrder == 0 %}selected{% endif %}>Name</option>
            <option value=\"1\" {% if selectedOrder == 1 %}selected{% endif %}>Lowest Price</option>
            <option value=\"2\" {% if selectedOrder == 2 %}selected{% endif %}>Highest Price</option>
            <option value=\"3\" {% if selectedOrder == 3 %}selected{% endif %}>Most likes</option>
        </select>
    </form>
    <div class=\"poster-container\">

        {% if posters|length > 0 %}
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
                                    From {{ price }} kr
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
                                    <input type=\"hidden\" name=\"location\" value=\"{{ url }}\">
                                    <button type=\"submit\" class=\"clickable like-button\"><img src=\"/assets/heart{{ like }}.png\" alt=\"\"></button>
                                </form>
                                <p class=\"poster-likes\">{{ poster.likes }}</p>
                            </li>
                        </ul>
                    </div>
                </a>
            {% endfor %}
        {% else %}
            <p>No result found</p>
        {% endif %}
    </div>
    {% if not user %}
        <div class=\"log-in-modal\">
            <p>Why not log in or create a new account?</p>
            <button onclick=\"closeModal()\">X</button>
            <span>
                    <a href=\"/log-in\">Log in</a>
                    <a href=\"/create-profile\">New user?</a>
                </span>
        </div>
    {% endif %}
{% endblock %}
{% block script %}
    {% if not user %}
        <script>
            \$(document).ready(function(){
                setTimeout(function(){
                    \$('.log-in-modal').css('bottom', \"20px\");
                }, 3000);
            });
            closeModal = () => {
                \$('.log-in-modal').css('opacity', 0);
            }
        </script>
    {% endif %}

{% endblock %}", "main.posters.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\main.posters.twig");
    }
}
