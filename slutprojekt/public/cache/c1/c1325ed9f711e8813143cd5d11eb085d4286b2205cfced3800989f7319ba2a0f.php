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

/* main.search.twig */
class __TwigTemplate_4b859fc11970fbd423c4257753d0ee8ee74ae2a56abe1e9adeb7d195755737a3 extends Template
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
        $this->parent = $this->loadTemplate("base.twig", "main.search.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Search";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <link rel=\"stylesheet\" href=\"css/search.css\">
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
        echo "    <form autocomplete=\"off\" action=\"/posters\" method=\"get\" class=\"s-form\">
        <label for=\"myInput\" class=\"s-header\">Search</label>
        <br>
        <div class=\"autocomplete\" style=\"width:300px;\">
            <input id=\"myInput\" type=\"text\" name=\"search\" placeholder=\"Posters\" class=\"s-bar\">
        </div>
        <input type=\"submit\" value=\">\" class=\"s-submit\">
    </form>

";
    }

    // line 26
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "    <script>
        let countries = ";
        // line 28
        echo json_encode(($context["products"] ?? null));
        echo ";
        function autocomplete(inp, arr) {
            /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
            let currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener(\"input\", function(e) {
                let a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) { return false;}
                currentFocus = -1;
                /*create a DIV element that will contain the items (values):*/
                a = document.createElement(\"DIV\");
                a.setAttribute(\"id\", this.id + \"autocomplete-list\");
                a.setAttribute(\"class\", \"autocomplete-items\");
                /*append the DIV element as a child of the autocomplete container:*/
                this.parentNode.appendChild(a);
                /*for each item in the array...*/
                for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        /*create a DIV element for each matching element:*/
                        b = document.createElement(\"DIV\");
                        /*make the matching letters bold:*/
                        b.innerHTML = \"<strong>\" + arr[i].substr(0, val.length) + \"</strong>\";
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += \"<input type='hidden' value='\" + arr[i] + \"'>\";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener(\"click\", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName(\"input\")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener(\"keydown\", function(e) {
                let x = document.getElementById(this.id + \"autocomplete-list\");
                if (x) x = x.getElementsByTagName(\"div\");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus let iable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus let iable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the \"active\" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });
            function addActive(x) {
                /*a function to classify an item as \"active\":*/
                if (!x) return false;
                /*start by removing the \"active\" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class \"autocomplete-active\":*/
                x[currentFocus].classList.add(\"autocomplete-active\");
            }
            function removeActive(x) {
                /*a function to remove the \"active\" class from all autocomplete items:*/
                for (let i = 0; i < x.length; i++) {
                    x[i].classList.remove(\"autocomplete-active\");
                }
            }
            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                let x = document.getElementsByClassName(\"autocomplete-items\");
                for (let i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener(\"click\", function (e) {
                closeAllLists(e.target);
            });
        }
        autocomplete(document.getElementById(\"myInput\"), countries);
    </script>
";
    }

    public function getTemplateName()
    {
        return "main.search.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 28,  115 => 27,  111 => 26,  98 => 15,  94 => 14,  86 => 11,  83 => 10,  80 => 9,  76 => 8,  67 => 7,  62 => 5,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.twig\" %}

{% block title %}Search{% endblock %}
{% block head %}
    <link rel=\"stylesheet\" href=\"css/search.css\">
{% endblock %}
{% block favicon %}{% if cartAmount is not same as(0) %}-cart{% endif %}{% endblock %}
{% block cartAmount %}
    {% if cartAmount is same as(0) %}
    {% else %}
        {{ cartAmount }}
    {% endif %}
{% endblock %}
{% block content %}
    <form autocomplete=\"off\" action=\"/posters\" method=\"get\" class=\"s-form\">
        <label for=\"myInput\" class=\"s-header\">Search</label>
        <br>
        <div class=\"autocomplete\" style=\"width:300px;\">
            <input id=\"myInput\" type=\"text\" name=\"search\" placeholder=\"Posters\" class=\"s-bar\">
        </div>
        <input type=\"submit\" value=\">\" class=\"s-submit\">
    </form>

{% endblock %}

{% block script %}
    <script>
        let countries = {{ products | json_encode | raw }};
        function autocomplete(inp, arr) {
            /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
            let currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener(\"input\", function(e) {
                let a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) { return false;}
                currentFocus = -1;
                /*create a DIV element that will contain the items (values):*/
                a = document.createElement(\"DIV\");
                a.setAttribute(\"id\", this.id + \"autocomplete-list\");
                a.setAttribute(\"class\", \"autocomplete-items\");
                /*append the DIV element as a child of the autocomplete container:*/
                this.parentNode.appendChild(a);
                /*for each item in the array...*/
                for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        /*create a DIV element for each matching element:*/
                        b = document.createElement(\"DIV\");
                        /*make the matching letters bold:*/
                        b.innerHTML = \"<strong>\" + arr[i].substr(0, val.length) + \"</strong>\";
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += \"<input type='hidden' value='\" + arr[i] + \"'>\";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener(\"click\", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName(\"input\")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener(\"keydown\", function(e) {
                let x = document.getElementById(this.id + \"autocomplete-list\");
                if (x) x = x.getElementsByTagName(\"div\");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus let iable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus let iable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the \"active\" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });
            function addActive(x) {
                /*a function to classify an item as \"active\":*/
                if (!x) return false;
                /*start by removing the \"active\" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class \"autocomplete-active\":*/
                x[currentFocus].classList.add(\"autocomplete-active\");
            }
            function removeActive(x) {
                /*a function to remove the \"active\" class from all autocomplete items:*/
                for (let i = 0; i < x.length; i++) {
                    x[i].classList.remove(\"autocomplete-active\");
                }
            }
            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                let x = document.getElementsByClassName(\"autocomplete-items\");
                for (let i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener(\"click\", function (e) {
                closeAllLists(e.target);
            });
        }
        autocomplete(document.getElementById(\"myInput\"), countries);
    </script>
{% endblock %}", "main.search.twig", "C:\\code\\slutprojekt-18eg-KevinTexas\\app\\views\\main.search.twig");
    }
}
