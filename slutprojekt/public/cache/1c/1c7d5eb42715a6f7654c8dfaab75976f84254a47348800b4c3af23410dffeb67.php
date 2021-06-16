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

/* user.profile.twig */
class __TwigTemplate_53925abeb5364a8286612bb76b4b78a14b82d68a348b816ab2ece3801a72b71f extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "user.profile.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Profile";
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
        echo "    <h1>
        Welcome
        ";
        // line 17
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "is_admin", [], "any", false, false, false, 17)) {
            // line 18
            echo "            (admin)
        ";
        }
        // line 20
        echo "        ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "fname", [], "any", false, false, false, 20), "html", null, true);
        echo "!
    </h1>
    <a href=\"/your-orders\"><h2>Your orders</h2></a>

    <form action=\"/change-setting\" class=\"settings-form\" method=\"post\">
        <label class=\"checkbox path\">
            <input id='showIndexOrdersHidden' type='hidden' value='off' name='showIndexOrdersHidden'>
            <input type=\"checkbox\" name=\"showIndexOrders\" ";
        // line 27
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "show_index_orders", [], "any", false, false, false, 27), true))) {
            echo "checked";
        }
        echo ">
            <svg viewBox=\"0 0 21 21\">
                <path d=\"M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186\"></path>
            </svg>
            Show current orders on home page
        </label>
        <div class=\"dropdown-container\">
            <label for=\"form-order\">Default order:</label>
            <select name=\"order\" id=\"form-order\">
                <option value=\"0\" ";
        // line 36
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "default_order", [], "any", false, false, false, 36), 0))) {
            echo "selected";
        }
        echo ">Name</option>
                <option value=\"1\" ";
        // line 37
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "default_order", [], "any", false, false, false, 37), 1))) {
            echo "selected";
        }
        echo ">Lowest Price</option>
                <option value=\"2\" ";
        // line 38
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "default_order", [], "any", false, false, false, 38), 2))) {
            echo "selected";
        }
        echo ">Highest Price</option>
                <option value=\"3\" ";
        // line 39
        if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "default_order", [], "any", false, false, false, 39), 3))) {
            echo "selected";
        }
        echo ">Likes</option>
            </select>
        </div>
        <button type=\"submit\" id=\"submit-data\" class=\"save-btn\" disabled=\"\">Save</button>
    </form>

    ";
        // line 45
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "is_admin", [], "any", false, false, false, 45)) {
            // line 46
            echo "        <div class=\"admin-button-container\">
            <a href=\"/admin/all-products\" class=\"admin-btn\"><p>All Products</p></a>
            <a href=\"/admin\" class=\"admin-btn\"><p>Admin page</p></a>
        </div>
    ";
        }
        // line 51
        echo "    <a href=\"/log-out\" id=\"log-out-btn\"><p>Log Out</p></a>
";
    }

    // line 53
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 54
        echo "    <script src=\"/js/disableSaveButton.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "user.profile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 54,  176 => 53,  171 => 51,  164 => 46,  162 => 45,  151 => 39,  145 => 38,  139 => 37,  133 => 36,  119 => 27,  108 => 20,  104 => 18,  102 => 17,  98 => 15,  94 => 14,  86 => 11,  83 => 10,  80 => 9,  76 => 8,  67 => 7,  62 => 5,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Profile{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"css/profile.css\">
{% endblock %}
{% block favicon %}{% if cartAmount is not same as(0) %}-cart{% endif %}{% endblock %}
{% block cartAmount %}
    {% if cartAmount is same as(0) %}
    {% else %}
        {{ cartAmount }}
    {% endif %}
{% endblock %}
{% block content %}
    <h1>
        Welcome
        {% if user.is_admin %}
            (admin)
        {% endif %}
        {{ user.fname }}!
    </h1>
    <a href=\"/your-orders\"><h2>Your orders</h2></a>

    <form action=\"/change-setting\" class=\"settings-form\" method=\"post\">
        <label class=\"checkbox path\">
            <input id='showIndexOrdersHidden' type='hidden' value='off' name='showIndexOrdersHidden'>
            <input type=\"checkbox\" name=\"showIndexOrders\" {% if user.show_index_orders == true %}checked{% endif %}>
            <svg viewBox=\"0 0 21 21\">
                <path d=\"M5,10.75 L8.5,14.25 L19.4,2.3 C18.8333333,1.43333333 18.0333333,1 17,1 L4,1 C2.35,1 1,2.35 1,4 L1,17 C1,18.65 2.35,20 4,20 L17,20 C18.65,20 20,18.65 20,17 L20,7.99769186\"></path>
            </svg>
            Show current orders on home page
        </label>
        <div class=\"dropdown-container\">
            <label for=\"form-order\">Default order:</label>
            <select name=\"order\" id=\"form-order\">
                <option value=\"0\" {% if user.default_order == 0 %}selected{% endif %}>Name</option>
                <option value=\"1\" {% if user.default_order == 1 %}selected{% endif %}>Lowest Price</option>
                <option value=\"2\" {% if user.default_order == 2 %}selected{% endif %}>Highest Price</option>
                <option value=\"3\" {% if user.default_order == 3 %}selected{% endif %}>Likes</option>
            </select>
        </div>
        <button type=\"submit\" id=\"submit-data\" class=\"save-btn\" disabled=\"\">Save</button>
    </form>

    {% if user.is_admin %}
        <div class=\"admin-button-container\">
            <a href=\"/admin/all-products\" class=\"admin-btn\"><p>All Products</p></a>
            <a href=\"/admin\" class=\"admin-btn\"><p>Admin page</p></a>
        </div>
    {% endif %}
    <a href=\"/log-out\" id=\"log-out-btn\"><p>Log Out</p></a>
{% endblock %}
{% block script %}
    <script src=\"/js/disableSaveButton.js\"></script>
{% endblock %}", "user.profile.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\user.profile.twig");
    }
}
