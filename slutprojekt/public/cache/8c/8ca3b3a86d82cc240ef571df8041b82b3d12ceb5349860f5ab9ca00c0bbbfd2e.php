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

/* user.create-user.twig */
class __TwigTemplate_b5a1e17f620770b07847ccd13ae1293d321f3f7cf1a11947103d23a336d0b2dd extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "user.create-user.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Create user";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <link rel=\"stylesheet\" href=\"css/user-form.css\">
    <link rel=\"stylesheet\" href=\"css/validationCode.css\">
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
        echo "    ";
        if (($context["userExists"] ?? null)) {
            // line 17
            echo "        <p class=\"alert\">User already exists</p>
    ";
        }
        // line 19
        echo "    ";
        if (($context["passwordsDontMatch"] ?? null)) {
            // line 20
            echo "        <p class=\"alert\">Passwords dont match</p>
    ";
        }
        // line 22
        echo "    ";
        if ( !($context["showValidCode"] ?? null)) {
            // line 23
            echo "        <form action=\"/post-user\" method=\"post\" class=\"u-form\">
            <h1 class=\"u-title\">Create User</h1>
            <input class=\"u-input\" type=\"text\" placeholder=\"Email\" name=\"email\">
            <input class=\"u-input\" type=\"text\" placeholder=\"First name\" name=\"fname\">
            <input class=\"u-input\" type=\"text\" placeholder=\"Last name\" name=\"lname\">
            <input class=\"u-input\" type=\"password\" placeholder=\"Password\" name=\"password\">
            <input class=\"u-input\" type=\"password\" placeholder=\"Confirm Password\" name=\"cpassword\">
            <button class=\"u-button\" type=\"submit\">Create Account</button>
        </form>
    ";
        } else {
            // line 33
            echo "        <div class=\"center-content\">
            <h1>Verify Email Address</h1>
            <form class=\"otc\" method=\"post\" name=\"one-time-code\" action=\"/verify-email\">
                <fieldset>
                    <legend>Validation Code</legend>
                    <label for=\"otc-1\">Number 1</label>
                    <label for=\"otc-2\">Number 2</label>
                    <label for=\"otc-3\">Number 3</label>
                    <label for=\"otc-4\">Number 4</label>
                    <label for=\"otc-5\">Number 5</label>
                    <label for=\"otc-6\">Number 6</label>
                    <div>
                        <input type=\"number\" name=\"otc-1\" pattern=\"[0-9]*\"  value=\"\" inputtype=\"numeric\" autocomplete=\"one-time-code\" id=\"otc-1\" required>
                        <input type=\"number\" name=\"otc-2\" pattern=\"[0-9]*\" min=\"0\" max=\"9\" maxlength=\"1\"  value=\"\" inputtype=\"numeric\" id=\"otc-2\" required>
                        <input type=\"number\" name=\"otc-3\" pattern=\"[0-9]*\" min=\"0\" max=\"9\" maxlength=\"1\"  value=\"\" inputtype=\"numeric\" id=\"otc-3\" required>
                        <input type=\"number\" name=\"otc-4\" pattern=\"[0-9]*\" min=\"0\" max=\"9\" maxlength=\"1\"  value=\"\" inputtype=\"numeric\" id=\"otc-4\" required>
                        <input type=\"number\" name=\"otc-5\" pattern=\"[0-9]*\" min=\"0\" max=\"9\" maxlength=\"1\"  value=\"\" inputtype=\"numeric\" id=\"otc-5\" required>
                        <input type=\"number\" name=\"otc-6\" pattern=\"[0-9]*\" min=\"0\" max=\"9\" maxlength=\"1\"  value=\"\" inputtype=\"numeric\" id=\"otc-6\" required>
                    </div>
                </fieldset>
                <input class=\"u-button clickable\" type=\"submit\" value=\"Check\">
            </form>
            <form action=\"/send-new-verify-code\" method=\"post\">
                <input type=\"hidden\" value=\"";
            // line 56
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 56), "html", null, true);
            echo "\" name=\"email\">
                <input type=\"submit\" value=\"Send new code\" class=\"u-login-button clickable\">
            </form>
        </div>
    ";
        }
        // line 61
        echo "
    <a href=\"/log-in\" class=\"u-login-button ";
        // line 62
        if (($context["showValidCode"] ?? null)) {
            echo "fixed-bottom";
        }
        echo "\">Log in</a>
";
    }

    // line 64
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 65
        echo "    <script src=\"/js/validationCode.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "user.create-user.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 65,  172 => 64,  164 => 62,  161 => 61,  153 => 56,  128 => 33,  116 => 23,  113 => 22,  109 => 20,  106 => 19,  102 => 17,  99 => 16,  95 => 15,  87 => 12,  84 => 11,  81 => 10,  77 => 9,  68 => 8,  62 => 5,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Create user{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"css/user-form.css\">
    <link rel=\"stylesheet\" href=\"css/validationCode.css\">
{% endblock %}
{% block favicon %}{% if cartAmount is not same as(0) %}-cart{% endif %}{% endblock %}
{% block cartAmount %}
    {% if cartAmount is same as(0) %}
    {% else %}
        {{ cartAmount }}
    {% endif %}
{% endblock %}
{% block content %}
    {% if userExists %}
        <p class=\"alert\">User already exists</p>
    {% endif %}
    {% if passwordsDontMatch %}
        <p class=\"alert\">Passwords dont match</p>
    {% endif %}
    {% if not showValidCode %}
        <form action=\"/post-user\" method=\"post\" class=\"u-form\">
            <h1 class=\"u-title\">Create User</h1>
            <input class=\"u-input\" type=\"text\" placeholder=\"Email\" name=\"email\">
            <input class=\"u-input\" type=\"text\" placeholder=\"First name\" name=\"fname\">
            <input class=\"u-input\" type=\"text\" placeholder=\"Last name\" name=\"lname\">
            <input class=\"u-input\" type=\"password\" placeholder=\"Password\" name=\"password\">
            <input class=\"u-input\" type=\"password\" placeholder=\"Confirm Password\" name=\"cpassword\">
            <button class=\"u-button\" type=\"submit\">Create Account</button>
        </form>
    {% else %}
        <div class=\"center-content\">
            <h1>Verify Email Address</h1>
            <form class=\"otc\" method=\"post\" name=\"one-time-code\" action=\"/verify-email\">
                <fieldset>
                    <legend>Validation Code</legend>
                    <label for=\"otc-1\">Number 1</label>
                    <label for=\"otc-2\">Number 2</label>
                    <label for=\"otc-3\">Number 3</label>
                    <label for=\"otc-4\">Number 4</label>
                    <label for=\"otc-5\">Number 5</label>
                    <label for=\"otc-6\">Number 6</label>
                    <div>
                        <input type=\"number\" name=\"otc-1\" pattern=\"[0-9]*\"  value=\"\" inputtype=\"numeric\" autocomplete=\"one-time-code\" id=\"otc-1\" required>
                        <input type=\"number\" name=\"otc-2\" pattern=\"[0-9]*\" min=\"0\" max=\"9\" maxlength=\"1\"  value=\"\" inputtype=\"numeric\" id=\"otc-2\" required>
                        <input type=\"number\" name=\"otc-3\" pattern=\"[0-9]*\" min=\"0\" max=\"9\" maxlength=\"1\"  value=\"\" inputtype=\"numeric\" id=\"otc-3\" required>
                        <input type=\"number\" name=\"otc-4\" pattern=\"[0-9]*\" min=\"0\" max=\"9\" maxlength=\"1\"  value=\"\" inputtype=\"numeric\" id=\"otc-4\" required>
                        <input type=\"number\" name=\"otc-5\" pattern=\"[0-9]*\" min=\"0\" max=\"9\" maxlength=\"1\"  value=\"\" inputtype=\"numeric\" id=\"otc-5\" required>
                        <input type=\"number\" name=\"otc-6\" pattern=\"[0-9]*\" min=\"0\" max=\"9\" maxlength=\"1\"  value=\"\" inputtype=\"numeric\" id=\"otc-6\" required>
                    </div>
                </fieldset>
                <input class=\"u-button clickable\" type=\"submit\" value=\"Check\">
            </form>
            <form action=\"/send-new-verify-code\" method=\"post\">
                <input type=\"hidden\" value=\"{{ user.email }}\" name=\"email\">
                <input type=\"submit\" value=\"Send new code\" class=\"u-login-button clickable\">
            </form>
        </div>
    {% endif %}

    <a href=\"/log-in\" class=\"u-login-button {% if showValidCode %}fixed-bottom{% endif %}\">Log in</a>
{% endblock %}
{% block script %}
    <script src=\"/js/validationCode.js\"></script>
{% endblock %}", "user.create-user.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\user.create-user.twig");
    }
}
