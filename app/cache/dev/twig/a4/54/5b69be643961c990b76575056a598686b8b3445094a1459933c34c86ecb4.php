<?php

/* ::base.html.twig */
class __TwigTemplate_a4545b69be643961c990b76575056a598686b8b3445094a1459933c34c86ecb4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'cabecera' => array($this, 'block_cabecera'),
            'cuerpo' => array($this, 'block_cuerpo'),
            'pie' => array($this, 'block_pie'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        
        ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 10
        echo "        
    </head>
    <body>
        
        
        <div id=\"cabecera\">
            ";
        // line 16
        $this->displayBlock('cabecera', $context, $blocks);
        // line 19
        echo "        </div>
        
        <div id=\"contenFormularios\">
            ";
        // line 22
        $this->displayBlock('cuerpo', $context, $blocks);
        // line 24
        echo " 
        </div>
                        
        <div id=\"pie\">
            ";
        // line 28
        $this->displayBlock('pie', $context, $blocks);
        // line 32
        echo "        </div>
       
    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "nMarka";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "                <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/unimarca/css/webnoticias.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
    }

    // line 16
    public function block_cabecera($context, array $blocks = array())
    {
        // line 17
        echo "                <h1 class=\"letralogo textocentrado\"> nMARKA </h1>  
            ";
    }

    // line 22
    public function block_cuerpo($context, array $blocks = array())
    {
        // line 23
        echo "                Cuerpo
            ";
    }

    // line 28
    public function block_pie($context, array $blocks = array())
    {
        // line 29
        echo "                <p class=\"izquierda separarIzq15 negrita\">2015/2016</p>
                <p class=\"derecha separarDcha20 negrita\">Itziar Urkidi</p>
            ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  105 => 29,  102 => 28,  97 => 23,  94 => 22,  89 => 17,  86 => 16,  79 => 8,  76 => 7,  70 => 5,  62 => 32,  60 => 28,  54 => 24,  52 => 22,  47 => 19,  45 => 16,  37 => 10,  35 => 7,  30 => 5,  24 => 1,);
    }
}
