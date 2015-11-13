<?php

/* uniMarcaBundle::layout.html.twig */
class __TwigTemplate_ed76b5d2e6d85ef4605474d894c3d15c2c057bbb6c747199ccf9f4f5e585150d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'cuerpo' => array($this, 'block_cuerpo'),
            'menuSup' => array($this, 'block_menuSup'),
            'central' => array($this, 'block_central'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_cuerpo($context, array $blocks = array())
    {
        // line 5
        echo " 
        <div id=\"menuSup\">
            ";
        // line 7
        $this->displayBlock('menuSup', $context, $blocks);
        // line 24
        echo "        </div>
 
        
        <div id=\"central\">
            
            ";
        // line 29
        $this->displayBlock('central', $context, $blocks);
        // line 32
        echo "            
        </div>
 
 
 ";
    }

    // line 7
    public function block_menuSup($context, array $blocks = array())
    {
        // line 8
        echo "                
             <ul id=\"menu-horizontal\">
                <li><a href=\"#\" title=\"Texto\">Futbol</a></li>
                <li><a href=\"#\" title=\"Texto\">Motor</a></li>
                <li><a href=\"#\" title=\"Texto\">Tenis</a>
                    <ul>
                        <li><a href=\"#\" title=\"Texto\">Muguruza</a></li>
                        <li><a href=\"#\" title=\"Texto\">Williams</a></li>
                    </ul>
                </li>
                <li><a href=\"#\" title=\"Texto\">Baloncesto</a></li>
                ";
        // line 20
        echo "                <li><a href=\"#\" title=\"Texto\">Herri kirolak</a></li>
             </ul>
             
            ";
    }

    // line 29
    public function block_central($context, array $blocks = array())
    {
        // line 30
        echo "            
            ";
    }

    public function getTemplateName()
    {
        return "uniMarcaBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 30,  79 => 29,  72 => 20,  59 => 8,  56 => 7,  48 => 32,  46 => 29,  39 => 24,  37 => 7,  33 => 5,  30 => 4,);
    }
}
