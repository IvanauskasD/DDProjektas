<?php

/* header.html.twig */
class __TwigTemplate_d52959d423bad30f419f2342106ab995df0b2856607446c2c7b773e2a120c48f extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "header.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "header.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" />
</head>
<body>

<header>
    <nav>
        <div class=\"main-wrapper\">
            <ul>
                <li><a href=\"";
        // line 13
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("homepage");
        echo "\">Home</a></li>
            </ul>
            <div class=\"nav-login\">
                ";
        // line 16
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 16, $this->source); })()), "session", array()), "get", array(0 => "u_id"), "method")) {
            // line 17
            echo "                ";
            echo "logout button";
            echo "
                ";
        } else {
            // line 19
            echo "                ";
            echo "include login somtheing";
            echo "
                <input type=\"text\" name=\"uid\" placeholder=\"Username/email\">
                <input type=\"password\" name=\"pwd\" placeholder=\"Password\">
                <button type=\"submit\" name=\"submit\">Login</button>
                ";
        }
        // line 24
        echo "
                </form>
                <a href=\"";
        // line 26
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("signup");
        echo "\">Sign up</a>
            </div>
        </div>
    </nav>
</header>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 26,  69 => 24,  60 => 19,  54 => 17,  52 => 16,  46 => 13,  35 => 5,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel=\"stylesheet\" href=\"{{ asset('css/style.css') }}\" />
</head>
<body>

<header>
    <nav>
        <div class=\"main-wrapper\">
            <ul>
                <li><a href=\"{{ path('homepage') }}\">Home</a></li>
            </ul>
            <div class=\"nav-login\">
                {% if app.session.get('u_id') %}
                {{ 'logout button' }}
                {% else %}
                {{ 'include login somtheing' }}
                <input type=\"text\" name=\"uid\" placeholder=\"Username/email\">
                <input type=\"password\" name=\"pwd\" placeholder=\"Password\">
                <button type=\"submit\" name=\"submit\">Login</button>
                {% endif %}

                </form>
                <a href=\"{{ path('signup') }}\">Sign up</a>
            </div>
        </div>
    </nav>
</header>", "header.html.twig", "/var/www/DDProject/templates/header.html.twig");
    }
}
