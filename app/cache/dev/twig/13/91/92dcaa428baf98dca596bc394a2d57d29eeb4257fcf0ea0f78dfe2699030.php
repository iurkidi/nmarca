<?php

/* uniMarcaBundle:noticias:show.html.twig */
class __TwigTemplate_139192dcaa428baf98dca596bc394a2d57d29eeb4257fcf0ea0f78dfe2699030 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("uniMarcaBundle::layout.html.twig");

        $this->blocks = array(
            'central' => array($this, 'block_central'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "uniMarcaBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_central($context, array $blocks = array())
    {
        // line 4
        echo " 
    <div class=\"detalleNot\">
        <div class=\"LineaFormulario\"></div>

        <h1 class=\"centrado\">";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "titulo"), "html", null, true);
        echo "</h1>

        <div class=\"LineaFormulario\"></div>

        <div class=\"LineaFormulario centrado\">
            <img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((("bundles/unimarca/img/" . $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "foto")) . "")), "html", null, true);
        echo "\" width=\"25%\" heigth=\"25%\"/>
        </div>

        <div class=\"LineaFormulario\">
            <h3 class=\"izquierda separarIzq20\">";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "autor"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechaPub"), "Y/m/d"), "html", null, true);
        echo "</h3>
        </div>


        <div class=\"LineaFormulario\">
            <p>";
        // line 22
        echo nl2br($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "contenido"));
        echo "</p>
        </div>


        <div class=\"LineaFormulario\"></div>
        <div class=\"LineaFormulario\"></div>

        <a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("noticias");
        echo "\"> Volver atras</a>
    </div>
";
    }

    public function getTemplateName()
    {
        return "uniMarcaBundle:noticias:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 29,  62 => 22,  52 => 17,  45 => 13,  37 => 8,  31 => 4,  28 => 3,);
    }
}
