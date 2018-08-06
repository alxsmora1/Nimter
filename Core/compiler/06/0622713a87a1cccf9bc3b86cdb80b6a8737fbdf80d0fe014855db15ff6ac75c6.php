<?php

/* home.twig */
class __TwigTemplate_cafe284665c5a16cfbb5293a360d8ac6ff20e695b47dd784afade211d5829a87 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("overall/template.twig", "home.twig", 2);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "overall/template.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "\t";
        $this->loadTemplate("overall/topnav.twig", "home.twig", 5)->display($context);
        // line 6
        echo "\t<div class=\"container\">
\t\t<br>
\t\t<div class=\"jumbotron\">
\t\t\t<h1 class=\"display-3\"><i class=\"fas fa-rocket\"></i> ";
        // line 9
        echo twig_escape_filter($this->env, ($context["Titulo"] ?? null), "html", null, true);
        echo "</h1>
\t\t\t<p class=\"lead\">Framework hecho en PHP 7.0, con componentes de Symfony y Twig como motor de Plantillas.</p>
\t\t\t<hr class=\"m-y-md\">
\t\t\t<p>Soporte Mysqli/PDO y estructura MVC, configuración sencilla y depurador de codigo.</p>
\t\t\t<p class=\"lead\">
\t\t\t\t<a class=\"btn btn-primary btn-lg\" href=\"https://bitbucket.org/alxsmora/horizon/wiki/Home\" target=\"_BLANK\" role=\"button\"><i class=\"fas fa-book\"></i> Documentación Oficial</a>
\t\t\t</p>
\t\t</div>
\t</div>
";
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
        return array (  39 => 9,  34 => 6,  31 => 5,  28 => 4,  11 => 2,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "home.twig", "C:\\xampp\\htdocs\\HorizonOriginal\\App\\Views\\home.twig");
    }
}
