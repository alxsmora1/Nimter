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
        // line 1
        $this->loadTemplate("overall/head.twig", "home.twig", 1)->display($context);
        // line 2
        echo "<body>
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<h1>";
        // line 6
        echo twig_escape_filter($this->env, ($context["Title"] ?? null), "html", null, true);
        echo "</h1>
\t\t\t\t<br>
\t\t\t\t<h3></h3>
\t\t\t</div>
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<a href=\"/TMF/test\" class=\"btn btn-secondary form-control\"><i class=\"fas fa-user-plus\"></i> Insertar Usuarios</a>
\t\t\t</div>
\t\t\t<br><br>
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<table class=\"table table-bordered table-striped table-sm\">
\t\t    \t<thead>
\t\t    \t\t<tr class=\"table-header\">
\t\t    \t\t\t<th colspan=\"3\">";
        // line 18
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
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["usuarios"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["usr"]) {
            // line 28
            echo "\t\t    \t\t\t<tr>
\t\t    \t\t\t\t<td>";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["usr"], "nombre", array()), "html", null, true);
            echo "</td>
\t\t    \t\t\t\t<td>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["usr"], "email", array()), "html", null, true);
            echo "</td>
\t\t    \t\t\t\t<td>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["usr"], "username", array()), "html", null, true);
            echo "</td>
\t\t\t    \t\t</tr>
\t\t    \t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['usr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "\t\t    \t</tbody>
\t\t    </table>
\t\t\t</div>
\t\t</div>
\t</div>
";
        // line 39
        $this->loadTemplate("overall/footer.twig", "home.twig", 39)->display($context);
        // line 40
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
        return array (  87 => 40,  85 => 39,  78 => 34,  69 => 31,  65 => 30,  61 => 29,  58 => 28,  54 => 27,  42 => 18,  27 => 6,  21 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "home.twig", "C:\\xampp\\htdocs\\TMF\\App\\Templates\\home.twig");
    }
}
