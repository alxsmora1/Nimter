<?php

/* home.twig */
class __TwigTemplate_56684632adf37bfe7f484097fd0f88514277ffc3ae7dc68caf5e30171bbd23cc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->loadTemplate("overall/head.twig", "home.twig", 2)->display($context);
        // line 3
        echo "<body>
\t";
        // line 4
        $this->loadTemplate("overall/topnav.twig", "home.twig", 4)->display($context);
        // line 5
        echo "\t<div class=\"container\">
\t\t<br>
\t\t<div class=\"jumbotron mt-3\">
\t\t\t<h1 class=\"display-3\"><i class=\"fas fa-rocket\"></i> ";
        // line 8
        echo twig_escape_filter($this->env, ($context["Title"] ?? null), "html", null, true);
        echo "</h1>
\t\t\t<p class=\"lead\">Framework compacto hecho en PHP 7.0, con componentes de Symfony y Twig como motor de Plantillas.</p>
\t\t\t<hr class=\"m-y-md\">
\t\t\t<p>Soporte Mysqli y estructura MVC, configuración sencilla y depurador de codigo.</p>
\t\t\t<p class=\"lead\">
\t\t\t\t<a class=\"btn btn-primary btn-lg\" href=\"/Horizon/README.md\" role=\"button\"><i class=\"fas fa-book\"></i> Aprender más...</a>
\t\t\t</p>
\t\t</div>
\t</div>
";
        // line 17
        $this->loadTemplate("overall/footer.twig", "home.twig", 17)->display($context);
        // line 18
        echo "</body>
</html>";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 18,  43 => 17,  31 => 8,  26 => 5,  24 => 4,  21 => 3,  19 => 2,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "home.twig", "C:\\xampp\\htdocs\\Horizon\\App\\Templates\\home.twig");
    }
}
