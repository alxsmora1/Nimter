<?php

/* overall/template.twig */
class __TwigTemplate_bbbc9fbe9b9b81b7770092567d16f31d45590566e4c5923017351c09fd8bbbf7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"es\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
        <meta name=\"description\" content=\"\">
        <meta name=\"author\" content=\"\">
    
        <link rel=\"icon\" href=\"#\">

        <title>";
        // line 12
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 13
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 21
        echo "    </head>
    <body>
        ";
        // line 23
        $this->displayBlock('body', $context, $blocks);
        // line 24
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 33
        echo "    </body>
</html>";
    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        echo "Horizon Framework";
    }

    // line 13
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 14
        echo "        <!-- Bootstrap core CSS -->
        <link rel=\"stylesheet\" href=\"Styles/vendor/bootstrap/bootstrap.min.css\" media=\"screen\" />
        <!-- Custom styles -->
        <link rel=\"stylesheet\" href=\"Styles/css/styles.css\" media=\"screen\" />
        <!--core first + styles last-->
        <link href=\"Styles/vendor/fontawesome/css/fontawesome-all.css\" rel=\"stylesheet\" />
        ";
    }

    // line 23
    public function block_body($context, array $blocks = array())
    {
    }

    // line 24
    public function block_javascripts($context, array $blocks = array())
    {
        // line 25
        echo "        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src=\"Styles/vendor/jquery/jquery-3.2.1.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
        <script src=\"Styles/vendor/js/popper.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
        <script src=\"Styles/vendor/js/holder.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
        <script src=\"Styles/vendor/bootstrap/bootstrap.min.js\" type=\"text/javascript\" charset=\"utf-8\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "overall/template.twig";
    }

    public function getDebugInfo()
    {
        return array (  83 => 25,  80 => 24,  75 => 23,  65 => 14,  62 => 13,  56 => 12,  51 => 33,  48 => 24,  46 => 23,  42 => 21,  40 => 13,  36 => 12,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "overall/template.twig", "D:\\Bitbucket\\nimterV1\\App\\Views\\overall\\template.twig");
    }
}
