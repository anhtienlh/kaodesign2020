<?php

/* @core/helpers.twig */
class __TwigTemplate_a6960735c658514e290aa4fa93e185f8115b109a02832ebcbd75fe3d25dd0d8e extends Twig_SupTwg_Template
{
    public function __construct(Twig_SupTwg_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
    }

    // line 1
    public function getshowTooltip($__message__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "message" => $__message__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    <i class=\"fa fa-question supsystic-tooltip\" title=\"";
            echo (isset($context["message"]) ? $context["message"] : null);
            echo "\"></i>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@core/helpers.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 2,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_SupTwg_Source("", "@core/helpers.twig", "/home/dannytua/kaodesign.vn.2020/wp-content/plugins/gallery-by-supsystic/src/GridGallery/Core/views/helpers.twig");
    }
}
