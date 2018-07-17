<?php

/* login.twig */
class __TwigTemplate_6d84d76d445a958a8609a1968527436f041beed4e0ff7976581a5664f8dfb2a9 extends Twig_Template
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
        $this->loadTemplate("overall/head.twig", "login.twig", 1)->display($context);
        // line 2
        echo "<body>
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"form-signin\" style=\"margin-top: 6.5rem;\">
\t            <div class=\"text-center mb-4\">
\t              <h4 class=\"display-4a\">Iniciar Sesión Dx2</h4>
\t            </div>
\t            <div id=\"_ALERTS_\"></div>
\t            <div class=\"form-label-group\">
\t              <input type=\"text\" id=\"user\" class=\"form-control\" placeholder=\"Nombre de usuario\" required autofocus>
\t              <label for=\"user\">Nombre de usuario</label>
\t            </div>
\t            <div class=\"form-label-group\">
\t              <input type=\"password\" id=\"pwd\" class=\"form-control\" placeholder=\"Cotraseña\" required>
\t              <label for=\"pwd\">Contraseña</label>
\t            </div>
\t            <div class=\"checkbox mb-3\">
\t              <label>
\t                <input type=\"checkbox\" value=\"recordarme\" id=\"session\"> <span class=\"text-left\">Recordarme</span> 
\t              </label>
\t              <a href=\"#\" class=\"float-right\">¿Olvido su contraseña?</a>
\t            </div>
\t            <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\" id=\"send_request\">Iniciar Sesión</button>
\t        </div>
\t\t</div>
\t</div>
";
        // line 28
        $this->loadTemplate("overall/footer.twig", "login.twig", 28)->display($context);
        // line 29
        echo "
<script type=\"text/javascript\">
\twindow.onload = function() 
    {
        document.getElementById('send_request').onclick = function() 
        {
            var connect, user, pwd, form, result;
            user = \$('#user').val();
            pwd = \$('#pwd').val();
            session = document.getElementById('session').checked ? true : false;
            //Verifica que se hayan introduciodo datos en el login
            if (user != '' && pwd != '') 
            {
                form = 'username=' + user + '&pwd=' + pwd + '&session=' + session;
                connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                connect.onreadystatechange = function() 
                {
                    //console.log(connect.responseText);
                    //console.log(form);
                    if (connect.readyState == 4 && connect.status == 200) 
                    {
                        if (parseInt(connect.responseText) == 1) 
                        {
                            //Conectado con exito y redirecciona
                            result = '<div class=\"alert alert-dismissible alert-success\" style=\"max-width:500px\">';
                            result += '<button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button>';
                            result += '<strong>Conectado: </strong> Un poco más los estamos redirigiendo...';
                            result += '</div>';
                            document.getElementById('_ALERTS_').innerHTML = result;
                            location.href = '?view=adminPanel';
                        }
                        else if (parseInt(connect.responseText) == 11)
                        {
                            //Conectado con exito y redirecciona
                            result = '<div class=\"alert alert-dismissible alert-success\" style=\"max-width:500px\">';
                            result += '<button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button>';
                            result += '<strong>Conectado: </strong> Un poco más los estamos redirigiendo...';
                            result += '</div>';
                            document.getElementById('_ALERTS_').innerHTML = result;
                            location.href = '?view=tutor';
                        }
                        else 
                        {
                            //ERROR: Los datos son incorrectos
                            result = '<div class=\"alert alert-dismissible alert-danger\" style=\"max-width:500px\">';
                            result += '<button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button>';
                            result += '<strong>ERROR: </strong> credenciales incorrectas.';
                            result += '</div>';
                            document.getElementById('_ALERTS_').innerHTML = result;
                        }
                    } 
                    else if (connect.readyState != 4) 
                    {
                        //Procesando..
                        result = '<div class=\"alert alert-dismissible alert-warning\" style=\"max-width:500px\">';
                        result += '<button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button>';
                        result += '<strong> Procesando...</strong>';
                        result += '</div>';
                        document.getElementById('_ALERTS_').innerHTML = result;
                    }
                }
                connect.open('POST', '?view=login', true);
                connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                connect.send(form);
            } 
            else 
            {
                //ERROR: Datos vacios
                result = '<div class=\"alert alert-dismissible alert-danger\" style=\"max-width:720px\">';
                result += '<button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button>';
                result += '<strong>ERROR: </strong> se requiere un usuario y contraseña.';
                result += '</div>';
                document.getElementById('_ALERTS_').innerHTML = result;
            }
        }
    }
\t</script>
</body>";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 29,  49 => 28,  21 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "login.twig", "C:\\xampp\\htdocs\\horizon\\App\\Templates\\login.twig");
    }
}
