<?php

/* overall/topnav.twig */
class __TwigTemplate_96c9911354c09a5a338e848391f4b7638a3baadc512133e3413e926791d364b3 extends Twig_Template
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
  <a class=\"navbar-brand\" href=\"/home\"><i class=\"fas fa-home\"></i> Nimter</a>
  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbarCollapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    <span class=\"navbar-toggler-icon\"></span>
  </button>
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
        return new Twig_Source("", "overall/topnav.twig", "D:\\Bitbucket\\nimterV1\\App\\Views\\overall\\topnav.twig");
    }
}
