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

/* admin.all-users.twig */
class __TwigTemplate_8bf055bf084eae1c06ac80345a39e1bd99de83b15ad47d12ca047b6c9c0c342f extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "admin.all-users.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "All Users";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <link rel=\"stylesheet\" href=\"/css/admin.all-items.css\">
";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    <div class=\"ad-container\">
        <form action=\"\" class=\"search-form\">
            <input type=\"text\" placeholder=\"Search\" name=\"search\">
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>EMAIL</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>IS ADMIN</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 24
            echo "                    <tr  class='clickable-row clickable' data-href='/admin/user/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 24), "html", null, true);
            echo "'>
                        <td>";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 25), "html", null, true);
            echo "</td>
                        <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 26), "html", null, true);
            echo "</td>
                        <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "fname", [], "any", false, false, false, 27), "html", null, true);
            echo "</td>
                        <td>";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "lname", [], "any", false, false, false, 28), "html", null, true);
            echo "</td>
                        <td>";
            // line 29
            if (twig_get_attribute($this->env, $this->source, $context["user"], "is_admin", [], "any", false, false, false, 29)) {
                echo "TRUE";
            } else {
                echo "FALSE";
            }
            echo "</td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "            </tbody>
        </table>
    </div>
";
    }

    // line 36
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 37
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
        return "admin.all-users.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 37,  131 => 36,  124 => 32,  111 => 29,  107 => 28,  103 => 27,  99 => 26,  95 => 25,  90 => 24,  86 => 23,  69 => 8,  65 => 7,  60 => 5,  56 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}All Users{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"/css/admin.all-items.css\">
{% endblock %}
{% block content %}
    <div class=\"ad-container\">
        <form action=\"\" class=\"search-form\">
            <input type=\"text\" placeholder=\"Search\" name=\"search\">
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>EMAIL</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>IS ADMIN</th>
                </tr>
            </thead>
            <tbody>
                {% for user in users %}
                    <tr  class='clickable-row clickable' data-href='/admin/user/{{ user.id }}'>
                        <td>{{ user.id }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.fname }}</td>
                        <td>{{ user.lname }}</td>
                        <td>{% if user.is_admin %}TRUE{% else %}FALSE{% endif %}</td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
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

{% endblock %}", "admin.all-users.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\admin.all-users.twig");
    }
}
