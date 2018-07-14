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
\t";
        // line 3
        $this->loadTemplate("overall/topnav.twig", "test.twig", 3)->display($context);
        // line 4
        echo "\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<h1 class=\"text-center text-uppercase\">";
        // line 7
        echo twig_escape_filter($this->env, ($context["Title"] ?? null), "html", null, true);
        echo "</h1>
\t\t\t\t<h2>";
        // line 8
        echo twig_escape_filter($this->env, ($context["param"] ?? null), "html", null, true);
        echo "</h2>
\t\t\t</div>
\t\t</div>
\t\t<form action=\"/Horizon/test/case/1\" method=\"post\" accept-charset=\"utf-8\">
\t\t\t<div class=\"row mt-3\">
\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t<input type=\"text\" name=\"nombre\" class=\"form-control\" placeholder=\"Nombre\" maxlength=\"128\" required=\"true\">
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t<input type=\"text\" name=\"email\" class=\"form-control\" placeholder=\"Email\" maxlength=\"64\" required=\"true\">
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t<input type=\"text\" name=\"username\" class=\"form-control\" placeholder=\"Nombre de Usuario\" maxlength=\"32\" required=\"true\">
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t<input type=\"password\" name=\"password\" class=\"form-control\" placeholder=\"Contraseña\" maxlength=\"64\" required=\"true\">
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"row mt-2\">
\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t<a href=\"/TMF/home\" class=\"btn btn-danger form-control\">Volver</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-success form-control\">Enviar</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<table class=\"table table-bordered table-striped table-sm\">
\t\t    \t<thead>
\t\t    \t\t<tr class=\"table-header\">
\t\t    \t\t\t<th colspan=\"3\">";
        // line 40
        echo twig_escape_filter($this->env, ($context["Table_Header"] ?? null), "html", null, true);
        echo "</th>
\t\t    \t\t</tr>
\t\t    \t\t<tr>
\t\t    \t\t\t<th>Nombre</th>
\t\t    \t\t\t<th>Email</th>
\t\t    \t\t\t<th>Nombre de Usuario</th>
\t\t    \t\t</tr>
\t\t    \t</thead>
\t\t    \t<tbody>
\t\t    \t\t\t";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["usuarios"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["usr"]) {
            // line 50
            echo "\t\t    \t\t\t<tr>
\t\t    \t\t\t\t<td>";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["usr"], "nombre", array()), "html", null, true);
            echo "</td>
\t\t    \t\t\t\t<td>";
            // line 52
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["usr"], "email", array()), "html", null, true);
            echo "</td>
\t\t    \t\t\t\t<td>";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["usr"], "username", array()), "html", null, true);
            echo "</td>
\t\t\t    \t\t</tr>
\t\t    \t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['usr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "\t\t    \t</tbody>
\t\t    </table>
\t\t\t</div>
\t\t</div>
\t</div>
";
        // line 61
        $this->loadTemplate("overall/footer.twig", "test.twig", 61)->display($context);
        // line 62
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
        return array (  115 => 62,  113 => 61,  106 => 56,  97 => 53,  93 => 52,  89 => 51,  86 => 50,  82 => 49,  70 => 40,  35 => 8,  31 => 7,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "test.twig", "C:\\xampp\\htdocs\\Horizon\\App\\Templates\\test.twig");
    }
}
