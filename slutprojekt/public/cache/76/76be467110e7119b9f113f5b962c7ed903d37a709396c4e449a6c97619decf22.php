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

/* user.reset-password.twig */
class __TwigTemplate_e83100d58cc4624256c3dbdd801d72de107abeaa9efdaf5b59dcf8cb73d31e34 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "user.reset-password.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Forgot Password";
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
        if (( !($context["account"] ?? null) && (0 === twig_compare(($context["validCode"] ?? null), false)))) {
            // line 17
            echo "        <form action=\"/forgot-password/sendCode\" method=\"post\" class=\"u-form\">
            <h1 class=\"u-title\">Reset Password</h1>
            <input class=\"u-input\" type=\"text\" placeholder=\"Email\" name=\"email\" autocomplete=\"off\">
            <button class=\"u-button\" type=\"submit\">Send reset code</button>
        </form>
    ";
        } elseif ((0 === twig_compare(        // line 22
($context["validCode"] ?? null), false))) {
            // line 23
            echo "        <form class=\"otc\" method=\"post\" name=\"one-time-code\" action=\"/forgot-password/compareCode\">
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
            <input class=\"u-button\" type=\"submit\" value=\"Check\">
        </form>
    ";
        } else {
            // line 44
            echo "        <form action=\"/forgot-password/update-password\" method=\"post\" class=\"u-form\">
            <h1>Update password</h1>
            <input onmouseover=\"showPassword('#password-input')\" onmouseout=\"hidePassword('#password-input')\"  class=\"u-input\" type=\"password\" placeholder=\"Password\" name=\"password\" autocomplete=\"off\">
            <input onmouseover=\"showPassword('#password-input')\" onmouseout=\"hidePassword('#password-input')\" class=\"u-input\" type=\"password\" placeholder=\"Confirm Password\" name=\"cpassword\" autocomplete=\"off\">
            <button class=\"u-button\" type=\"submit\">Update password</button>
        </form>
    ";
        }
        // line 51
        echo "    <div class=\"fixed-bottom\">
        <a href=\"/log-in\" class=\"u-login-button\">Log in</a>

        <form action=\"/forgot-password/cancel\" method=\"post\">
            <input type=\"submit\" value=\"Cancel\" class=\"u-login-button clickable\">
        </form>
    </div>
";
    }

    // line 59
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 60
        echo "    <script src=\"/js/validationCode.js\"></script>
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
";
    }

    public function getTemplateName()
    {
        return "user.reset-password.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 60,  154 => 59,  143 => 51,  134 => 44,  111 => 23,  109 => 22,  102 => 17,  99 => 16,  95 => 15,  87 => 12,  84 => 11,  81 => 10,  77 => 9,  68 => 8,  62 => 5,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Forgot Password{% endblock %}
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
    {% if not account and validCode == false %}
        <form action=\"/forgot-password/sendCode\" method=\"post\" class=\"u-form\">
            <h1 class=\"u-title\">Reset Password</h1>
            <input class=\"u-input\" type=\"text\" placeholder=\"Email\" name=\"email\" autocomplete=\"off\">
            <button class=\"u-button\" type=\"submit\">Send reset code</button>
        </form>
    {% elseif validCode == false %}
        <form class=\"otc\" method=\"post\" name=\"one-time-code\" action=\"/forgot-password/compareCode\">
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
            <input class=\"u-button\" type=\"submit\" value=\"Check\">
        </form>
    {% else %}
        <form action=\"/forgot-password/update-password\" method=\"post\" class=\"u-form\">
            <h1>Update password</h1>
            <input onmouseover=\"showPassword('#password-input')\" onmouseout=\"hidePassword('#password-input')\"  class=\"u-input\" type=\"password\" placeholder=\"Password\" name=\"password\" autocomplete=\"off\">
            <input onmouseover=\"showPassword('#password-input')\" onmouseout=\"hidePassword('#password-input')\" class=\"u-input\" type=\"password\" placeholder=\"Confirm Password\" name=\"cpassword\" autocomplete=\"off\">
            <button class=\"u-button\" type=\"submit\">Update password</button>
        </form>
    {% endif %}
    <div class=\"fixed-bottom\">
        <a href=\"/log-in\" class=\"u-login-button\">Log in</a>

        <form action=\"/forgot-password/cancel\" method=\"post\">
            <input type=\"submit\" value=\"Cancel\" class=\"u-login-button clickable\">
        </form>
    </div>
{% endblock %}
{% block script %}
    <script src=\"/js/validationCode.js\"></script>
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
{% endblock %}", "user.reset-password.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\user.reset-password.twig");
    }
}
