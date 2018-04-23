<?php

/* signup.html.twig */
class __TwigTemplate_d76cb5e04dcb0a00e6fc66f476087384630cc37d438a35427728ddbe5e7d2ff3 extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "signup.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "signup.html.twig"));

        // line 1
        $this->loadTemplate("header.html.twig", "signup.html.twig", 1)->display($context);
        // line 2
        echo "    <section class=\"main-container\">
        <div class=\"main-wrapper\">
            <h2>Signup</h2>
            <form class=\"signup-form\" action=\"includes/signup.inc.php\" method=\"POST\">
                <input type=\"text\" name=\"first\" placeholder=\"Firstname\">
                <input type=\"text\" name=\"last\" placeholder=\"Lastname\">
                <input type=\"text\" name=\"email\" placeholder=\"Email\">
                <input type=\"text\" name=\"age\" placeholder=\"Age\">
                <input type=\"text\" name=\"country\" placeholder=\"Country\">
                <input type=\"text\" name=\"city\" placeholder=\"City\">
                <input type=\"text\" name=\"username\" placeholder=\"Username\">
                <input type=\"password\" name=\"password\" placeholder=\"Password\">
                <button type=\"submit\" name=\"submit\">Sign up</button>
            </form>
        </div>
    </section>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "signup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 2,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% include 'header.html.twig' %}
    <section class=\"main-container\">
        <div class=\"main-wrapper\">
            <h2>Signup</h2>
            <form class=\"signup-form\" action=\"includes/signup.inc.php\" method=\"POST\">
                <input type=\"text\" name=\"first\" placeholder=\"Firstname\">
                <input type=\"text\" name=\"last\" placeholder=\"Lastname\">
                <input type=\"text\" name=\"email\" placeholder=\"Email\">
                <input type=\"text\" name=\"age\" placeholder=\"Age\">
                <input type=\"text\" name=\"country\" placeholder=\"Country\">
                <input type=\"text\" name=\"city\" placeholder=\"City\">
                <input type=\"text\" name=\"username\" placeholder=\"Username\">
                <input type=\"password\" name=\"password\" placeholder=\"Password\">
                <button type=\"submit\" name=\"submit\">Sign up</button>
            </form>
        </div>
    </section>
", "signup.html.twig", "C:\\xampp\\htdocs\\DDProjektas\\templates\\signup.html.twig");
    }
}
