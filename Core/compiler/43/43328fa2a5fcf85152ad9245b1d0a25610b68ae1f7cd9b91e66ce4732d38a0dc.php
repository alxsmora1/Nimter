<?php

/* home.twig */
class __TwigTemplate_92d36e52de1395a4db96e04486497984c98b50af6b08b4537cbbd860ca2a1d97 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
<head>
\t<meta charset=\"utf-8\">
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t<title>Index</title>
\t<link rel=\"stylesheet\" href=\"\">
</head>
<body>
\t<h1>";
        // line 10
        echo twig_escape_filter($this->env, ($context["Title"] ?? null), "html", null, true);
        echo "</h1>
\t<br><br>
\t";
        // line 12
        $context["frutas"] = array(0 => "Manzana", 1 => "Pera", 2 => "Fresa", 3 => "Plátano");
        // line 13
        echo "\t<h3>";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["frutas"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 14
            echo "\t";
            echo twig_escape_filter($this->env, $context["item"], "html", null, true);
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "</h3>

    <h4>";
        // line 17
        echo twig_escape_filter($this->env, ($context["Table_Header"] ?? null), "html", null, true);
        echo "</h4>
</body>
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
        return array (  55 => 17,  51 => 15,  42 => 14,  37 => 13,  35 => 12,  30 => 10,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
<head>
\t<meta charset=\"utf-8\">
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t<title>Index</title>
\t<link rel=\"stylesheet\" href=\"\">
</head>
<body>
\t<h1>{{ Title }}</h1>
\t<br><br>
\t{% set frutas =['Manzana', 'Pera', 'Fresa', 'Plátano'] %}
\t<h3>{% for item in frutas %}
\t{{ item }}
    {% endfor %}</h3>

    <h4>{{ Table_Header }}</h4>
</body>
</html>", "home.twig", "C:\\xampp\\htdocs\\TMF\\App\\Templates\\home.twig");
    }
}
