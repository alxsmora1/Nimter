<?php

/* test.twig */
class __TwigTemplate_5c4d65c1e8e0347e35f7589d15c9c0a1bf6cbfb702617c6dd41119c87e66df05 extends Twig_Template
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
        // line 1
        $this->loadTemplate("overall/head.twig", "test.twig", 1)->display($context);
        // line 2
        echo "<body>
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<h1 class=\"text-center text-uppercase\">";
        // line 6
        echo twig_escape_filter($this->env, ($context["Title"] ?? null), "html", null, true);
        echo "</h1>
\t\t\t\t<h2>";
        // line 7
        echo twig_escape_filter($this->env, ($context["param"] ?? null), "html", null, true);
        echo "</h2>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<a href=\"/TMF/home\" class=\"btn btn-info form-control\"><i class=\"fas fa-home\"></i> Home</a>
\t\t\t</div>
\t\t</div>
\t\t<br><br>
\t\t<form action=\"/TMF/test/case/1\" method=\"post\" accept-charset=\"utf-8\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<input type=\"text\" name=\"name\" class=\"form-control\" placeholder=\"Nombre\">
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<input type=\"text\" name=\"email\" class=\"form-control\" placeholder=\"Email\">
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-success form-control\">Enviar</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t</div>
";
        // line 30
        $this->loadTemplate("overall/footer.twig", "test.twig", 30)->display($context);
        // line 31
        echo "</body>
</html>";
    }

    public function getTemplateName()
    {
        return "test.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 31,  57 => 30,  31 => 7,  27 => 6,  21 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "test.twig", "C:\\xampp\\htdocs\\TMF\\App\\Templates\\test.twig");
    }
}
