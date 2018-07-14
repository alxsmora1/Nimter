<?php

/* overall/topnav.twig */
class __TwigTemplate_e47c07ff86e015eeb1f8b541f2a9dcd705b0901f98a14f947eaf7720e6c1ec20 extends Twig_Template
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
        echo "<nav class=\"navbar navbar-expand-md navbar-dark fixed-top bg-dark\">
  <a class=\"navbar-brand\" href=\"/Horizon/home\"><i class=\"fas fa-home\"></i> Horizon</a>
  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbarCollapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    <span class=\"navbar-toggler-icon\"></span>
  </button>
  <div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
    <ul class=\"navbar-nav mr-auto\">
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/Horizon/test\"><i class=\"fas fa-flask\"></i> Test</a>
      </li>
    </ul>
    <ul class=\"navbar-nav ml-auto\">
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/Horizon/login\"><i class=\"fas fa-sign-in-alt\"></i> Login</a>
      </li>
    </ul>
  </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "overall/topnav.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "overall/topnav.twig", "C:\\xampp\\htdocs\\Horizon\\App\\Templates\\overall\\topnav.twig");
    }
}
