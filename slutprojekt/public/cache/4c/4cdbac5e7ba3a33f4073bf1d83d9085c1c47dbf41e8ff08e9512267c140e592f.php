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
class __TwigTemplate_1ed411c09ee751d25e2092626d065d85753fe7e8f951cd41983a315c2ab79b91 extends Template
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
        <div class=\"search-container\">
            <form action=\"\" class=\"search-form\" id=\"search-form\">
                <input type=\"text\" placeholder=\"Search\" id=\"search-input\" name=\"search\" ";
        // line 11
        if (($context["search"] ?? null)) {
            echo "value=\"";
            echo twig_escape_filter($this->env, ($context["search"] ?? null), "html", null, true);
            echo "\"";
        }
        echo ">
            </form>
            <button onclick=\"clearSearch()\">Clear</button>
        </div>
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
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 27
            echo "                    <tr  class='clickable-row clickable' data-href='/admin/user/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 27), "html", null, true);
            echo "'>
                        <td>";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 28), "html", null, true);
            echo "</td>
                        <td>";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 29), "html", null, true);
            echo "</td>
                        <td>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "fname", [], "any", false, false, false, 30), "html", null, true);
            echo "</td>
                        <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "lname", [], "any", false, false, false, 31), "html", null, true);
            echo "</td>
                        <td>";
            // line 32
            if (twig_get_attribute($this->env, $this->source, $context["user"], "is_admin", [], "any", false, false, false, 32)) {
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
        // line 35
        echo "            </tbody>
        </table>
    </div>
";
    }

    // line 39
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 40
        echo "    <script>
        clearSearch = () => {
            \$('#search-input').val('');
            \$('#search-form').submit();
        }
    </script>
    <script>
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
        return array (  145 => 40,  141 => 39,  134 => 35,  121 => 32,  117 => 31,  113 => 30,  109 => 29,  105 => 28,  100 => 27,  96 => 26,  74 => 11,  69 => 8,  65 => 7,  60 => 5,  56 => 4,  49 => 3,  38 => 1,);
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
        <div class=\"search-container\">
            <form action=\"\" class=\"search-form\" id=\"search-form\">
                <input type=\"text\" placeholder=\"Search\" id=\"search-input\" name=\"search\" {% if search %}value=\"{{ search }}\"{% endif %}>
            </form>
            <button onclick=\"clearSearch()\">Clear</button>
        </div>
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
        clearSearch = () => {
            \$('#search-input').val('');
            \$('#search-form').submit();
        }
    </script>
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
