<?php

/* @galleries/shortcode/helpers.twig */
class __TwigTemplate_bcf6ece33000de163a1fa9940e4e4bb9da355d3029a9a378da3c2d66ec0a0b71 extends Twig_SupTwg_Template
{
    public function __construct(Twig_SupTwg_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'ggFigureWidth' => array($this, 'block_ggFigureWidth'),
            'ggMosaicHiddenItem' => array($this, 'block_ggMosaicHiddenItem'),
            'a_attributes' => array($this, 'block_a_attributes'),
            'a_attributes_class_set' => array($this, 'block_a_attributes_class_set'),
            'a_attributes_href' => array($this, 'block_a_attributes_href'),
            'sggPopupLinkForDetailsButton' => array($this, 'block_sggPopupLinkForDetailsButton'),
            'figure_before' => array($this, 'block_figure_before'),
            'galleryTypeBlock' => array($this, 'block_galleryTypeBlock'),
            'figure_attributes' => array($this, 'block_figure_attributes'),
            'previewImageUrlVar' => array($this, 'block_previewImageUrlVar'),
            'imageAttributesStyleSize' => array($this, 'block_imageAttributesStyleSize'),
            'image_attributes' => array($this, 'block_image_attributes'),
            'figcaption_style' => array($this, 'block_figcaption_style'),
            'figcaption_class' => array($this, 'block_figcaption_class'),
            'figcaption_attributes' => array($this, 'block_figcaption_attributes'),
            'figcaption_wrap' => array($this, 'block_figcaption_wrap'),
            'ggImageCaptionEntry' => array($this, 'block_ggImageCaptionEntry'),
            'figcaption_after' => array($this, 'block_figcaption_after'),
            'figcaption_after_set_exif' => array($this, 'block_figcaption_after_set_exif'),
            'figure_after' => array($this, 'block_figure_after'),
            'oneGalleryImage' => array($this, 'block_oneGalleryImage'),
            'mosaicLastImageNumberWrapper' => array($this, 'block_mosaicLastImageNumberWrapper'),
            'mosaicFigcaptionWrapper' => array($this, 'block_mosaicFigcaptionWrapper'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "\t";
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "type", array()) != "none")) {
            // line 3
            echo "\t\tborder: ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "width", array()), "html", null, true);
            echo "px ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "type", array()), "html", null, true);
            echo " ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "color", array()), "html", null, true);
            echo ";
\t";
        }
        // line 5
        echo "\tborder-radius: ";
        echo Twig_SupTwg_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "radius", array()) . Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "radius_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
        echo ";
\t";
        // line 6
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "use_shadow", array()) == "1")) {
            // line 7
            echo "\t\tbox-shadow: ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "x", array()), "html", null, true);
            echo "px ";
            echo " ";
            echo " ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "y", array()), "html", null, true);
            echo "px ";
            echo " ";
            echo " ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "blur", array()), "html", null, true);
            echo "px ";
            echo " ";
            echo " ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "color", array()), "html", null, true);
            echo ";
\t";
        }
        // line 8
        echo ";

\t";
        // line 10
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "2")) {
            // line 11
            echo "\t\t";
            $context["newImageDistance"] = ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "distance", array()) / 2);
            // line 12
            echo "\t\tmargin: ";
            echo Twig_SupTwg_escape_filter($this->env, ((array_key_exists("newImageDistance", $context)) ? (_Twig_SupTwg_default_filter((isset($context["newImageDistance"]) ? $context["newImageDistance"] : null), 0)) : (0)), "html", null, true);
            echo "px;
\t";
        } else {
            // line 14
            echo "\t\tmargin: ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "distance", array()), "html", null, true);
            echo "px;
\t";
        }
        // line 18
        echo "\t";
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "2")) {
            // line 19
            echo "\t\theight:";
            echo Twig_SupTwg_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array()) . Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t";
        }
        // line 21
        echo "\t";
        $this->displayBlock('ggFigureWidth', $context, $blocks);
        $context["figureStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 29
        echo "
";
        // line 30
        ob_start();
        // line 31
        echo "\t";
        if (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "description", array(), "any", true, true) &&  !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "description", array())))) {
            // line 32
            echo "\t\t";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "description", array()), "html", null, true);
            echo "
\t";
        } else {
            // line 34
            echo "\t\t";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "title", array()), "html", null, true);
            echo "
\t";
        }
        $context["aTitle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 37
        echo "
";
        // line 38
        if ((array_key_exists("mosaicParams", $context) && ($this->getAttribute((isset($context["mosaicParams"]) ? $context["mosaicParams"] : null), "photoCountLeft", array()) > 0))) {
            // line 39
            echo "\t";
            $context["is_ext_link"] = false;
        } else {
            // line 41
            echo "\t";
            $context["is_ext_link"] = ($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "external_link", array(), "any", true, true) &&  !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "external_link", array())));
        }
        // line 43
        echo "
";
        // line 44
        ob_start();
        // line 45
        echo "\t";
        if (((((isset($context["is_ext_link"]) ? $context["is_ext_link"] : null) == false) && ( !$this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "video", array(), "any", true, true) || Twig_SupTwg_test_empty(Twig_SupTwg_trim_filter($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()))))) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "0"))) {
            // line 46
            echo "\t\tgg-colorbox
\t";
        }
        // line 48
        echo "
\t";
        // line 49
        if ((($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "video", array(), "any", true, true) &&  !Twig_SupTwg_test_empty(Twig_SupTwg_trim_filter($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array())))) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "0"))) {
            // line 50
            echo "\t\tgg-video
\t";
        }
        // line 52
        echo "
\t";
        // line 53
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "2") && (((isset($context["is_ext_link"]) ? $context["is_ext_link"] : null) == false) || ($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "video", array(), "any", true, true) &&  !Twig_SupTwg_test_empty(Twig_SupTwg_trim_filter($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()))))))) {
            // line 54
            echo "\t\tpbox
\t";
        }
        $context["aClass"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 57
        echo "
";
        // line 58
        ob_start();
        // line 59
        echo "\t";
        if (((isset($context["is_ext_link"]) ? $context["is_ext_link"] : null) == true)) {
            // line 60
            echo "\t\t";
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFilter('force_http')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "external_link", array()))), "html", null, true);
            echo "
\t\t";
            // line 61
            $context["link"] = true;
            // line 62
            echo "\t";
        } else {
            // line 63
            echo "\t\t";
            echo Twig_SupTwg_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "url", array()) . "?gid=") . $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array())), "html", null, true);
            echo "
\t";
        }
        $context["aHref"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 66
        echo "
";
        // line 67
        ob_start();
        // line 68
        echo "\t";
        if (((isset($context["link"]) ? $context["link"] : null) && $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "rel", array(), "any", true, true))) {
            // line 69
            echo "\t\t";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "rel", array()), "html", null, true);
            echo "
\t";
        }
        // line 71
        echo "\t";
        if ((((isset($context["link"]) ? $context["link"] : null) == false) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "enabled", array()) == "false"))) {
            // line 72
            echo "\t\tnofollow
\t";
        }
        $context["aRel"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 75
        echo "
";
        // line 76
        ob_start();
        // line 77
        echo "
\t";
        // line 78
        ob_start();
        // line 79
        echo "\t\t";
        $this->displayBlock('ggMosaicHiddenItem', $context, $blocks);
        // line 81
        echo "\t";
        $context["ggMosaicHiddenItemVar"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 82
        echo "
\t";
        // line 84
        echo "\t";
        ob_start();
        // line 85
        echo "\t\t";
        $this->displayBlock('a_attributes', $context, $blocks);
        // line 120
        echo "\t";
        $context["var_a_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 121
        echo "


\t";
        // line 124
        ob_start();
        // line 125
        echo "\t\t";
        $this->displayBlock('figure_before', $context, $blocks);
        // line 130
        echo "\t";
        $context["var_figure_before"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 131
        echo "
\t";
        // line 132
        ob_start();
        // line 133
        echo "\t\t";
        $this->displayBlock('galleryTypeBlock', $context, $blocks);
        // line 156
        echo "\t";
        $context["galleryType"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 157
        echo "
\t";
        // line 158
        ob_start();
        // line 159
        echo "\t\t";
        $this->displayBlock('figure_attributes', $context, $blocks);
        // line 182
        echo "\t";
        $context["var_figure_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 183
        echo "
\t";
        // line 184
        list($context["width"], $context["height"], $context["crop"]) =         array(0, 0, 0);
        // line 185
        echo "
\t";
        // line 186
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width_unit", array()) == 0)) {
            // line 187
            echo "\t\t";
            $context["width"] = $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array());
            // line 188
            echo "\t";
        } else {
            // line 189
            echo "\t\t";
            // line 190
            echo "\t\t";
            if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "width_unit", array()) == 0)) {
                // line 191
                echo "\t\t\t";
                $context["width"] = round((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "width", array()) / 100) * $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array())));
                // line 192
                echo "\t\t";
            } else {
                // line 193
                echo "\t\t\t";
                $context["width"] = null;
                // line 194
                echo "\t\t";
            }
            // line 195
            echo "\t";
        }
        // line 196
        echo "
\t";
        // line 197
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height_unit", array()) == 0)) {
            // line 198
            echo "\t\t";
            $context["height"] = $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array());
            // line 199
            echo "\t";
        } else {
            // line 200
            echo "\t\t";
            // line 201
            echo "\t\t";
            $context["height"] = null;
            // line 202
            echo "\t\t";
            // line 203
            echo "\t\t";
            // line 204
            echo "\t\t";
            // line 205
            echo "\t\t";
            // line 206
            echo "\t\t";
            // line 207
            echo "\t";
        }
        // line 208
        echo "
\t";
        // line 209
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == 0) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == 3))) {
            // line 210
            echo "\t\t";
            $context["crop"] = 1;
            // line 211
            echo "\t";
        }
        // line 212
        echo "
\t";
        // line 213
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == 1)) {
            // line 214
            echo "\t\t";
            $context["height"] = null;
            // line 215
            echo "\t";
        }
        // line 216
        echo "
\t";
        // line 217
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == 2)) {
            // line 218
            echo "\t\t";
            $context["width"] = null;
            // line 219
            echo "\t";
        }
        // line 220
        echo "
\t";
        // line 221
        ob_start();
        // line 222
        echo "\t\t";
        $this->displayBlock('previewImageUrlVar', $context, $blocks);
        // line 229
        echo "\t";
        $context["previewImgUrl"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 230
        echo "
\t";
        // line 231
        ob_start();
        // line 232
        echo "\t\t";
        $this->displayBlock('imageAttributesStyleSize', $context, $blocks);
        // line 243
        echo "\t";
        $context["imageAttributesStyleSizeVar"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 244
        echo "
\t";
        // line 245
        ob_start();
        // line 246
        echo "\t\t";
        $this->displayBlock('image_attributes', $context, $blocks);
        // line 274
        echo "\t";
        $context["var_image_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 275
        echo "
\t";
        // line 276
        ob_start();
        // line 277
        echo "\t\t";
        $this->displayBlock('figcaption_style', $context, $blocks);
        // line 300
        echo "\t";
        $context["figcaptionStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 301
        echo "
\t";
        // line 302
        ob_start();
        // line 303
        echo "\t\tclass=\"";
        $this->displayBlock('figcaption_class', $context, $blocks);
        echo "\"
\t\t";
        // line 304
        $this->displayBlock('figcaption_attributes', $context, $blocks);
        // line 312
        echo "\t";
        $context["var_figcaption_attributes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 313
        echo "
\t";
        // line 314
        $context["prepareImgUrl"] = (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "url", array()) . "?gid=") . $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()));
        // line 315
        echo "
\t";
        // line 316
        ob_start();
        // line 317
        echo "\t\t";
        $this->displayBlock('figcaption_wrap', $context, $blocks);
        // line 445
        echo "\t";
        $context["var_figcaption_wrap"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 446
        echo "
\t";
        // line 447
        ob_start();
        // line 448
        echo "\t\t";
        $this->displayBlock('figcaption_after', $context, $blocks);
        // line 488
        echo "\t";
        $context["var_figcaption_after"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 489
        echo "
\t";
        // line 490
        ob_start();
        // line 491
        echo "\t\t";
        $this->displayBlock('figure_after', $context, $blocks);
        // line 496
        echo "\t";
        $context["var_figure_after"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 497
        echo "
\t";
        // line 499
        echo "\t";
        $this->displayBlock('oneGalleryImage', $context, $blocks);
        // line 533
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 21
    public function block_ggFigureWidth($context, array $blocks = array())
    {
        // line 22
        echo "\t\t";
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "2")) {
            // line 23
            echo "\t\t\twidth:auto;
\t\t";
        } else {
            // line 25
            echo "\t\t\twidth:";
            echo Twig_SupTwg_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array()) . Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t\t";
        }
        // line 27
        echo "\t";
    }

    // line 79
    public function block_ggMosaicHiddenItem($context, array $blocks = array())
    {
        // line 80
        echo "\t\t";
    }

    // line 85
    public function block_a_attributes($context, array $blocks = array())
    {
        // line 86
        echo "
\t\t\tid=\"gg-";
        // line 87
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
        echo "-";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "id", array()), "html", null, true);
        echo "\"

\t\t\t";
        // line 89
        $this->displayBlock('a_attributes_class_set', $context, $blocks);
        // line 92
        echo "
         data-attachment-id=\"";
        // line 93
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "id", array()), "html", null, true);
        echo "\"

\t\t\t";
        // line 95
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["ggMosaicHiddenItemVar"]) ? $context["ggMosaicHiddenItemVar"] : null), "html", null, true);
        echo "
\t\t\t";
        // line 96
        $this->displayBlock('a_attributes_href', $context, $blocks);
        // line 100
        echo "
\t\t\t";
        // line 101
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "disableImageTitle", array()) != 1)) {
            // line 102
            echo "\t\t\t\ttitle=\"";
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["aTitle"]) ? $context["aTitle"] : null)), "html", null, true);
            echo "\"
\t\t\t";
        }
        // line 104
        echo "
\t\t\t";
        // line 105
        $this->displayBlock('sggPopupLinkForDetailsButton', $context, $blocks);
        // line 118
        echo "\t\t\tstyle=\"border-radius: ";
        echo Twig_SupTwg_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "radius", array()) . Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "radius_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
        echo ";\"
\t\t";
    }

    // line 89
    public function block_a_attributes_class_set($context, array $blocks = array())
    {
        // line 90
        echo "\t\t\t\tclass=\"gg-link ";
        echo " ";
        echo " ";
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["aClass"]) ? $context["aClass"] : null)), "html", null, true);
        echo " ";
        if ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "displayFirstPhoto", array()) == "on") && ((isset($context["index"]) ? $context["index"] : null) > 0))) {
            echo " hidden-item ";
        }
        echo "\"
\t\t\t";
    }

    // line 96
    public function block_a_attributes_href($context, array $blocks = array())
    {
        // line 97
        echo "\t\t\t\thref=\"";
        echo Twig_SupTwg_escape_filter($this->env, htmlspecialchars_decode(Twig_SupTwg_trim_filter((isset($context["aHref"]) ? $context["aHref"] : null))), "html", null, true);
        echo "\"
\t\t\t\ttarget=\"";
        // line 98
        echo Twig_SupTwg_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "target", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "target", array()), "_self")) : ("_self")), "html", null, true);
        echo "\"
\t\t\t";
    }

    // line 105
    public function block_sggPopupLinkForDetailsButton($context, array $blocks = array())
    {
        // line 106
        echo "\t\t\t\t";
        // line 107
        echo "\t\t\t\t";
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "1") && ((isset($context["link"]) ? $context["link"] : null) == false))) {
            // line 108
            echo "\t\t\t\t\tdata-rel=\"prettyPhoto[pp_gal]\"
\t\t\t\t";
        } elseif (($this->getAttribute($this->getAttribute(        // line 109
(isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()) == null)) {
            // line 110
            echo "\t\t\t\t\trel=\"";
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["aRel"]) ? $context["aRel"] : null)), "html", null, true);
            echo "\"
\t\t\t\t";
        }
        // line 112
        echo "\t\t\t\t";
        // line 113
        echo "
\t\t\t\t";
        // line 114
        if (((isset($context["link"]) ? $context["link"] : null) == true)) {
            // line 115
            echo "\t\t\t\t\tdata-type=\"link\"
\t\t\t\t";
        }
        // line 117
        echo "\t\t\t";
    }

    // line 125
    public function block_figure_before($context, array $blocks = array())
    {
        // line 126
        echo "\t\t\t";
        if (( !$this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "false"))) {
            // line 127
            echo "\t\t\t\t<a ";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["var_a_attributes"]) ? $context["var_a_attributes"] : null), "html", null, true);
            echo " >
\t\t\t";
        }
        // line 129
        echo "\t\t";
    }

    // line 133
    public function block_galleryTypeBlock($context, array $blocks = array())
    {
        // line 134
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "false")) {
            // line 135
            echo "\t\t\t\t";
            if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true"))) {
                // line 136
                echo "\t\t\t\t\ticons
\t\t\t\t";
            } else {
                // line 138
                echo "\t\t\t\t\tnone
\t\t\t\t";
            }
            // line 140
            echo "\t\t\t";
        } else {
            // line 141
            echo "\t\t\t\t";
            if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true"))) {
                // line 142
                echo "\t\t\t\t\t";
                if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "personal", array()) == "true") && Twig_SupTwg_in_filter($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "captionEffect", array()), array(0 => "icons", 1 => "icons-scale", 2 => "icons-sodium-left", 3 => "icons-sodium-top", 4 => "icons-nitrogen-top")))) {
                    // line 143
                    echo "\t\t\t\t\t\t";
                    echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "captionEffect", array()), "html", null, true);
                    echo "
\t\t\t\t\t";
                } else {
                    // line 145
                    echo "\t\t\t\t\t\t";
                    echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                    echo "
\t\t\t\t\t";
                }
                // line 147
                echo "\t\t\t\t";
            } else {
                // line 148
                echo "\t\t\t\t\t";
                if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "personal", array()) == "true")) {
                    // line 149
                    echo "\t\t\t\t\t\t";
                    echo Twig_SupTwg_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "captionEffect", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "captionEffect", array()), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()))) : ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()))), "html", null, true);
                    echo "
\t\t\t\t\t";
                } else {
                    // line 151
                    echo "\t\t\t\t\t\t";
                    echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                    echo "
\t\t\t\t\t";
                }
                // line 153
                echo "\t\t\t\t";
            }
            // line 154
            echo "\t\t\t";
        }
        // line 155
        echo "\t\t";
    }

    // line 159
    public function block_figure_attributes($context, array $blocks = array())
    {
        // line 160
        echo "\t\t\tclass=\"grid-gallery-caption
\t\t\t";
        // line 161
        if ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "displayFirstPhoto", array()) == "on") && ((isset($context["index"]) ? $context["index"] : null) > 0))) {
            echo " hidden-item ";
        }
        // line 162
        echo "\t\t\t";
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["ggMosaicHiddenItemVar"]) ? $context["ggMosaicHiddenItemVar"] : null), "html", null, true);
        echo "
\t\t\t";
        // line 163
        if ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "mouse_shadow", array()) == "1") && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "use_shadow", array()) == "1"))) {
            // line 164
            echo "\t\t\t\tshadow-show
\t\t\t";
        }
        // line 166
        echo "\t\t\t";
        if ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "mouse_shadow", array()) == "2") && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "use_shadow", array()) == "1"))) {
            // line 167
            echo "\t\t\t\tshadow-hide
\t\t\t";
        }
        // line 168
        echo "\"
\t\t\tdata-grid-gallery-type=\"";
        // line 169
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["galleryType"]) ? $context["galleryType"] : null)), "html", null, true);
        echo "\"
\t\t\tdata-index=\"";
        // line 170
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["index"]) ? $context["index"] : null), "html", null, true);
        echo "\"
\t\t\tstyle=\"display:none;";
        // line 171
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["figureStyle"]) ? $context["figureStyle"] : null)), "html", null, true);
        echo "\"
\t\t\t\t";
        // line 172
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true")) {
            // line 173
            echo "\t\t\t\t\t";
            ob_start();
            // line 174
            echo "\t\t\t\t\t\t";
            if (Twig_SupTwg_in_filter("icons", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()))) {
                // line 175
                echo "\t\t\t\t\t\t\t";
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                echo "
\t\t\t\t\t\t";
            } else {
                // line 177
                echo "\t\t\t\t\t\t\ticons
\t\t\t\t\t\t";
            }
            // line 179
            echo "\t\t\t\t\t";
            $context["galleryType"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
            // line 180
            echo "\t\t\t\t";
        }
        // line 181
        echo "\t\t";
    }

    // line 222
    public function block_previewImageUrlVar($context, array $blocks = array())
    {
        // line 223
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "isNotRealAttachment", array()) == 1)) {
            // line 224
            echo "\t\t\t\t";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "url", array()), "html", null, true);
            echo "
\t\t\t";
        } else {
            // line 226
            echo "\t\t\t\t";
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('get_attachment')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "id", array()), (isset($context["width"]) ? $context["width"] : null), (isset($context["height"]) ? $context["height"] : null), $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "cropPosition", array()), (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "cropQuality", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "cropQuality", array()), "100")) : ("100")))), "html", null, true);
            echo "
\t\t\t";
        }
        // line 228
        echo "\t\t";
    }

    // line 232
    public function block_imageAttributesStyleSize($context, array $blocks = array())
    {
        // line 233
        echo "\t\t\t";
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width_unit", array()) == 0) &&  !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array())))) {
            // line 234
            echo "\t\t\t\twidth:";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array()), "html", null, true);
            echo "px;
\t\t\t";
        }
        // line 236
        echo "\t\t\t";
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height_unit", array()) == 0) &&  !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array())))) {
            // line 237
            echo "\t\t\t\theight:";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array()), "html", null, true);
            echo "px;
                ";
            // line 238
            if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width_unit", array()) != 0) || Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array())))) {
                // line 239
                echo "\t\t\t\t\twidth:auto;
                ";
            }
            // line 241
            echo "\t\t\t";
        }
        // line 242
        echo "\t\t";
    }

    // line 246
    public function block_image_attributes($context, array $blocks = array())
    {
        // line 247
        echo "\t\t\t";
        $context["imgSrcStr"] = htmlspecialchars_decode(Twig_SupTwg_replace_filter(Twig_SupTwg_trim_filter((isset($context["previewImgUrl"]) ? $context["previewImgUrl"] : null)), "/%20\$/", ""));
        // line 248
        echo "\t\t\t";
        $context["imgClassStr"] = "ggImg";
        // line 249
        echo "\t\t\t";
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "lazyload", array()), "enabled", array()) == "1")) {
            // line 250
            echo "\t\t\t\tdata-gg-real-image-href=\"";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["imgSrcStr"]) ? $context["imgSrcStr"] : null), "html", null, true);
            echo "\"
\t\t\t\t";
            // line 252
            echo "\t\t\t\t\t";
            if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "lazyload", array()), "hideLoader", array()) != "true") && Twig_SupTwg_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "lazyload", array()), "defaultImgUrl", array())))) {
                // line 253
                echo "\t\t\t\t\t\t";
                $context["imgSrcStr"] = $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "lazyload", array()), "defaultImgUrl", array());
                // line 254
                echo "\t\t\t\t\t";
            } else {
                // line 255
                echo "\t\t\t\t\t\t";
                $context["imgSrcStr"] = $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "lazyload", array()), "leerImgUrl", array());
                // line 256
                echo "\t\t\t\t\t";
            }
            // line 257
            echo "\t\t\t\t\t";
            $context["imgClassStr"] = ((isset($context["imgClassStr"]) ? $context["imgClassStr"] : null) . " ggLazyImg");
            // line 258
            echo "\t\t\t\t";
            // line 259
            echo "\t\t\t";
        }
        // line 260
        echo "\t\t\t";
        if (((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == 2) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == 3)) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == 4))) {
            // line 261
            echo "\t\t\t\t";
            $context["imgClassStr"] = ((isset($context["imgClassStr"]) ? $context["imgClassStr"] : null) . " ggNotInitImg");
            // line 262
            echo "\t\t\t";
        }
        // line 263
        echo "\t\t\tsrc=\"";
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["imgSrcStr"]) ? $context["imgSrcStr"] : null), "html", null, true);
        echo "\"
\t\t\tclass=\"";
        // line 264
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["imgClassStr"]) ? $context["imgClassStr"] : null), "html", null, true);
        echo "\"
\t\t\talt=\"";
        // line 265
        if ((Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "alt", array())) || ($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "alt", array()) == " "))) {
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "title", array()), "html", null, true);
        } else {
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "alt", array()), "html", null, true);
        }
        echo "\"
\t\t\t";
        // line 266
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "disableImageTitle", array()) != 1)) {
            // line 267
            echo "\t\t\t\ttitle=\"";
            if ( !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "description", array()))) {
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "description", array()), "html", null, true);
            } else {
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "title", array()), "html", null, true);
            }
            echo "\"
\t\t\t";
        }
        // line 269
        echo "\t\t\tdata-description=\"";
        if ( !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "description", array()))) {
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "description", array()), "html", null, true);
        } else {
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "title", array()), "html", null, true);
        }
        echo "\"
\t\t\tdata-caption=\"";
        // line 270
        if ( !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "caption", array()))) {
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "caption", array()));
        } else {
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "title", array()));
        }
        echo "\"
\t\t\tdata-title=\"";
        // line 271
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "title", array()), "html", null, true);
        echo "\"
\t\t\tstyle=\"";
        // line 272
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["imageAttributesStyleSizeVar"]) ? $context["imageAttributesStyleSizeVar"] : null), "html", null, true);
        echo "\"
\t\t";
    }

    // line 277
    public function block_figcaption_style($context, array $blocks = array())
    {
        // line 278
        echo "\t\t\t";
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true"))) {
            // line 279
            echo "\t\t\t\tfont-family:";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "font_family", array()), "html", null, true);
            echo ";
\t\t\t\t";
            // line 280
            if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_enabled", array()) == "true")) {
                // line 281
                echo "\t\t\t\t\tbackground-color:";
                echo Twig_SupTwg_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "overlay_color", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "overlay_color", array()), "#3498db")) : ("#3498db")), "html", null, true);
                echo ";
\t\t\t\t\theight : 100%;
\t\t\t\t\t";
                // line 284
                echo "\t\t\t\t";
            } else {
                // line 285
                echo "\t\t\t\t\theight : 100%;
\t\t\t\t\tbackground-color: transparent;
\t\t\t\t";
            }
            // line 288
            echo "\t\t\t";
        } else {
            // line 289
            echo "\t\t\t\tcolor:";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "foreground", array()), "html", null, true);
            echo ";
\t\t\t\tbackground-color:";
            // line 290
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "background", array()), "html", null, true);
            echo ";
\t\t\t\tfont-size:";
            // line 291
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
            echo ";
\t\t\t\ttext-align:";
            // line 292
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_align", array()), "html", null, true);
            echo ";
\t\t\t\tfont-family:";
            // line 293
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "font_family", array()), "html", null, true);
            echo ";
\t\t\t\t";
            // line 294
            if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()) == "none") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "false"))) {
                // line 295
                echo "\t\t\t\t\topacity:1;
\t\t\t\t\tbottom:0;
\t\t\t\t";
            }
            // line 298
            echo "\t\t\t";
        }
        // line 299
        echo "\t\t";
    }

    // line 303
    public function block_figcaption_class($context, array $blocks = array())
    {
    }

    // line 304
    public function block_figcaption_attributes($context, array $blocks = array())
    {
        // line 305
        echo "\t\t\t";
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true"))) {
            // line 306
            echo "\t\t\t\tdata-alpha=\"";
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "overlay_transparency", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "overlay_transparency", array()), 5)) : (5))), "html", null, true);
            echo "\"
\t\t\t";
        } else {
            // line 308
            echo "\t\t\t\tdata-alpha=\"";
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "transparency", array())), "html", null, true);
            echo "\"
\t\t\t";
        }
        // line 310
        echo "\t\t\tstyle=\"";
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["figcaptionStyle"]) ? $context["figcaptionStyle"] : null)), "html", null, true);
        echo "\"
\t\t";
    }

    // line 317
    public function block_figcaption_wrap($context, array $blocks = array())
    {
        // line 318
        echo "\t\t\t";
        // line 319
        echo "\t\t\t";
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true"))) {
            // line 320
            echo "\t\t\t\t<div
\t\t\t\t\t\tclass=\"hi-icon-wrap ";
            // line 321
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_slice($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "effect", array()), 0, ((isset($context["length"]) ? $context["length"] : null) - 1)), "html", null, true);
            echo " ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "effect", array()), "html", null, true);
            echo "\"
\t\t\t\t\t\tdata-margin=\"";
            // line 322
            echo Twig_SupTwg_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "margin", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "margin", array()), 5)) : (5)), "html", null, true);
            echo "\"
\t\t\t\t>
\t\t\t\t\t";
            // line 325
            echo "\t\t\t\t\t";
            $context["showFewIconsVar"] = (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "showFewIcons", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "showFewIcons", array()), "default")) : ("default"));
            // line 326
            echo "\t\t\t\t\t";
            $context["isShowVideoIcon"] = 0;
            // line 327
            echo "\t\t\t\t\t";
            if (( !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array())) && ((            // line 329
(isset($context["showFewIconsVar"]) ? $context["showFewIconsVar"] : null) == "default") || ((            // line 331
(isset($context["showFewIconsVar"]) ? $context["showFewIconsVar"] : null) == "params") && ($this->getAttribute($this->getAttribute(            // line 332
(isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "isVideoIcon", array()) == "1"))))) {
                // line 336
                echo "\t\t\t\t\t\t";
                $context["isShowVideoIcon"] = 1;
                // line 337
                echo "\t\t\t\t\t";
            }
            // line 338
            echo "
\t\t\t\t\t";
            // line 339
            $context["isShowLinkIcon"] = 0;
            // line 340
            echo "\t\t\t\t\t";
            if (( !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "external_link", array())) && ((            // line 342
(isset($context["showFewIconsVar"]) ? $context["showFewIconsVar"] : null) == "default") || ((            // line 344
(isset($context["showFewIconsVar"]) ? $context["showFewIconsVar"] : null) == "params") && ($this->getAttribute($this->getAttribute(            // line 345
(isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "isLinkIcon", array()) == "1"))))) {
                // line 349
                echo "\t\t\t\t\t\t";
                $context["isShowLinkIcon"] = 1;
                // line 350
                echo "\t\t\t\t\t";
            }
            // line 351
            echo "
\t\t\t\t\t";
            // line 352
            if (((isset($context["isShowVideoIcon"]) ? $context["isShowVideoIcon"] : null) == 1)) {
                // line 353
                echo "\t\t\t\t\t\t";
                ob_start();
                // line 354
                echo "\t\t\t\t\t\t\t";
                if (Twig_SupTwg_in_filter("youtu", $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()))) {
                    // line 355
                    echo "\t\t\t\t\t\t\t\t";
                    echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()), (isset($context["youtube"]) ? $context["youtube"] : null)), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 356
                    $context["videoSource"] = "youtube";
                    // line 357
                    echo "\t\t\t\t\t\t\t";
                } elseif (Twig_SupTwg_in_filter("vimeo.com", $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()))) {
                    // line 358
                    echo "\t\t\t\t\t\t\t\t";
                    echo Twig_SupTwg_escape_filter($this->env, (call_user_func_array($this->env->getFilter('preg_replace')->getCallable(), array($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()), (isset($context["vimeoPattern"]) ? $context["vimeoPattern"] : null), (isset($context["vimeoReplace"]) ? $context["vimeoReplace"] : null))) . "?api=1"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 359
                    $context["videoSource"] = "vimeo";
                    // line 360
                    echo "\t\t\t\t\t\t\t";
                } else {
                    // line 361
                    echo "\t\t\t\t\t\t\t\t";
                    echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array())), "html", null, true);
                    echo "
\t\t\t\t\t\t\t";
                }
                // line 363
                echo "\t\t\t\t\t\t";
                $context["videoUrl"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
                // line 364
                echo "
\t\t\t\t\t\t";
                // line 365
                $context["videoIcon"] = ((Twig_SupTwg_in_filter("youtu", $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "video", array()))) ? ("icon-youtube") : ("icon-vimeo"));
                // line 366
                echo "
\t\t\t\t\t\t";
                // line 367
                ob_start();
                // line 368
                echo "\t\t\t\t\t\t\tmargin-left:";
                echo Twig_SupTwg_escape_filter($this->env, ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "margin", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "margin", array()), 5)) : (5)) . "px"), "html", null, true);
                echo ";
\t\t\t\t\t\t\tmargin-right:";
                // line 369
                echo Twig_SupTwg_escape_filter($this->env, ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "margin", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "margin", array()), 5)) : (5)) . "px"), "html", null, true);
                echo ";
\t\t\t\t\t\t";
                $context["iconStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
                // line 371
                echo "
\t\t\t\t\t\t<a href=\"";
                // line 372
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["videoUrl"]) ? $context["videoUrl"] : null)), "html", null, true);
                echo "\"
\t\t\t\t\t\t\tdata-id=\"gg-";
                // line 373
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
                echo "-";
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "id", array()), "html", null, true);
                echo "\"
\t\t\t\t\t\t\t";
                // line 374
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "disableImageTitle", array()) != 1)) {
                    // line 375
                    echo "\t\t\t\t\t\t\t\ttitle=\"";
                    echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["aTitle"]) ? $context["aTitle"] : null)), "html", null, true);
                    echo "\"
\t\t\t\t\t\t\t";
                }
                // line 377
                echo "
\t\t\t\t\t\t\tclass=\"hi-icon gg-video ";
                // line 378
                echo Twig_SupTwg_escape_filter($this->env, (isset($context["videoIcon"]) ? $context["videoIcon"] : null), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t";
                // line 379
                if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "2")) {
                    echo " pbox";
                }
                // line 380
                echo "\t\t\t\t\t\t\t\t\t\t\"
\t\t\t\t\t\t\tstyle=\"";
                // line 381
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["iconStyle"]) ? $context["iconStyle"] : null)), "html", null, true);
                echo "\"
\t\t\t\t\t\t\tdata-video-source=\"";
                // line 382
                echo Twig_SupTwg_escape_filter($this->env, (isset($context["videoSource"]) ? $context["videoSource"] : null), "html", null, true);
                echo "\"
\t\t\t\t\t\t\t\t";
                // line 384
                echo "\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "1")) {
                    // line 385
                    echo "\t\t\t\t\t\t\t\t\tdata-rel=\"prettyPhoto[pp_gal]\"
\t\t\t\t\t\t\t\t";
                } else {
                    // line 387
                    echo "\t\t\t\t\t\t\t\t\t";
                    // line 388
                    echo "\t\t\t\t\t\t\t\t\trel=\"video\"
\t\t\t\t\t\t\t\t\t";
                    // line 390
                    echo "\t\t\t\t\t\t\t\t";
                }
                // line 391
                echo "\t\t\t\t\t\t>
\t\t\t\t\t\t\t";
                // line 393
                echo "\t\t\t\t\t\t</a>
\t\t\t\t\t";
            }
            // line 395
            echo "
\t\t\t\t\t";
            // line 396
            if (((isset($context["isShowLinkIcon"]) ? $context["isShowLinkIcon"] : null) == 1)) {
                // line 397
                echo "\t\t\t\t\t\t<a
\t\t\t\t\t\t\t";
                // line 398
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "disableImageTitle", array()) != 1)) {
                    // line 399
                    echo "\t\t\t\t\t\t\t\ttitle=\"";
                    echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["aTitle"]) ? $context["aTitle"] : null)), "html", null, true);
                    echo "\"
\t\t\t\t\t\t\t";
                }
                // line 401
                echo "\t\t\t\t\t\t\tdata-id=\"gg-";
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
                echo "-";
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "id", array()), "html", null, true);
                echo "\" href=\"";
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "openByLink", array()) == "on")) {
                    echo " ";
                    echo Twig_SupTwg_escape_filter($this->env, (isset($context["prepareImgUrl"]) ? $context["prepareImgUrl"] : null), "html", null, true);
                    echo " ";
                } else {
                    echo " ";
                    echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "external_link", array()), "html", null, true);
                    echo " ";
                }
                echo " \" target=\"";
                echo Twig_SupTwg_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "target", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array(), "any", false, true), "target", array()), "_self")) : ("_self")), "html", null, true);
                echo "\" class=\"hi-icon icon-link ";
                if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "2") && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "openByLink", array()) == "on"))) {
                    echo "pbox";
                }
                echo "\" style=\"";
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["iconStyle"]) ? $context["iconStyle"] : null)), "html", null, true);
                echo "\"></a>
\t\t\t\t\t";
            }
            // line 403
            echo "
\t\t\t\t\t";
            // line 404
            $context["isShowPopupIcon"] = 0;
            // line 405
            echo "\t\t\t\t\t";
            if (((((            // line 406
(isset($context["showFewIconsVar"]) ? $context["showFewIconsVar"] : null) == "default") && Twig_SupTwg_test_empty(            // line 407
(isset($context["videoUrl"]) ? $context["videoUrl"] : null))) && Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute(            // line 408
(isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "external_link", array()))) || ((            // line 411
(isset($context["showFewIconsVar"]) ? $context["showFewIconsVar"] : null) == "params") && ($this->getAttribute($this->getAttribute(            // line 412
(isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "isPopupIcon", array()) == "1")))) {
                // line 415
                echo "\t\t\t\t\t\t";
                $context["isShowPopupIcon"] = 1;
                // line 416
                echo "\t\t\t\t\t";
            }
            // line 417
            echo "
\t\t\t\t\t";
            // line 418
            if (((isset($context["isShowPopupIcon"]) ? $context["isShowPopupIcon"] : null) == 1)) {
                // line 419
                echo "\t\t\t\t\t\t<a
\t\t\t\t\t\t\t";
                // line 420
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "disableImageTitle", array()) != 1)) {
                    // line 421
                    echo "\t\t\t\t\t\t\t\ttitle=\"";
                    echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["aTitle"]) ? $context["aTitle"] : null)), "html", null, true);
                    echo "\"
\t\t\t\t\t\t\t";
                }
                // line 423
                echo "\t\t\t\t\t\t\tdata-id=\"gg-";
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
                echo "-";
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "id", array()), "html", null, true);
                echo "\" href=\"";
                echo Twig_SupTwg_escape_filter($this->env, (isset($context["prepareImgUrl"]) ? $context["prepareImgUrl"] : null), "html", null, true);
                echo "\" class=\"hi-icon icon-fullscreen gg-colorbox";
                if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "2") &&  !array_key_exists("link", $context))) {
                    echo " pbox";
                }
                echo "\" style=\"";
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["iconStyle"]) ? $context["iconStyle"] : null)), "html", null, true);
                echo "\"
\t\t\t\t\t\t\t\t";
                // line 424
                if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()) == "1")) {
                    // line 425
                    echo "\t\t\t\t\t\t\tdata-rel=\"prettyPhoto[pp_gal]\"
\t\t\t\t\t\t\t\t";
                }
                // line 426
                echo ">Open in pop-up window</a>
\t\t\t\t\t";
            }
            // line 428
            echo "\t\t\t\t</div>
\t\t\t";
        }
        // line 430
        echo "
\t\t\t";
        // line 431
        if (( !$this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "false"))) {
            // line 432
            echo "\t\t\t\t";
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "true")) {
                // line 433
                echo "\t\t\t\t\t";
                $this->displayBlock('ggImageCaptionEntry', $context, $blocks);
                // line 442
                echo "\t\t\t\t";
            }
            // line 443
            echo "\t\t\t";
        }
        // line 444
        echo "\t\t";
    }

    // line 433
    public function block_ggImageCaptionEntry($context, array $blocks = array())
    {
        // line 434
        echo "\t\t\t\t\t\t";
        if ( !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "caption", array()))) {
            // line 435
            echo "\t\t\t\t\t\t\t<div class=\"gg-image-caption fitvidsignore ";
            if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "rtl", array()) == true)) {
                echo "ggRtlClass";
            }
            echo "\" ";
            if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "rtl", array()) == true)) {
                echo "dir=\"rtl\"";
            }
            echo " style=\"font-size:";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
            echo ";\">
\t\t\t\t\t\t\t\t<object type=\"none/none\">
\t\t\t\t\t\t\t\t\t";
            // line 437
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "caption", array()), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t</object>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        // line 441
        echo "\t\t\t\t\t";
    }

    // line 448
    public function block_figcaption_after($context, array $blocks = array())
    {
        // line 449
        echo "\t\t\t";
        if ((($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "true")) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "true"))) {
            // line 450
            echo "
\t\t\t\t";
            // line 451
            ob_start();
            // line 452
            echo "\t\t\t\t\tcolor:";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "foreground", array()), "html", null, true);
            echo ";
\t\t\t\t\tbackground-color:";
            // line 453
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "background", array()), "html", null, true);
            echo ";
\t\t\t\t\tfont-size:";
            // line 454
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
            echo ";
\t\t\t\t\tfont-family:";
            // line 455
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "font_family", array()), "html", null, true);
            echo ";
\t\t\t\t\t";
            // line 456
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_align", array()) != 3)) {
                // line 457
                echo "\t\t\t\t\t\ttext-align:";
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_align", array()), array(0 => "left", 1 => "right", 2 => "center")), "html", null, true);
                echo ";
\t\t\t\t\t";
            }
            // line 459
            echo "\t\t\t\t\t";
            if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()) == "none") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "enabled", array()) == "false"))) {
                // line 460
                echo "\t\t\t\t\t\topacity:1;
\t\t\t\t\t\tbottom:0;
\t\t\t\t\t";
            }
            // line 463
            echo "\t\t\t\t\tvertical-align:";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
            echo ";
\t\t\t\t";
            $context["captionStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
            // line 465
            echo "
\t\t\t\t";
            // line 466
            if (( !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "caption", array())) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "tooltip", array()) == "false"))) {
                // line 467
                echo "\t\t\t\t\t<div
\t\t\t\t\t\t\tclass=\"caption-with-";
                // line 468
                if (Twig_SupTwg_in_filter("icons", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()))) {
                    echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()), "html", null, true);
                } else {
                    echo "icons";
                }
                echo "\"
\t\t\t\t\t\t\tstyle=\"";
                // line 469
                echo Twig_SupTwg_escape_filter($this->env, (isset($context["captionStyle"]) ? $context["captionStyle"] : null), "html", null, true);
                echo "\"
\t\t\t\t\t\t\tdata-alpha=\"";
                // line 470
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "transparency", array())), "html", null, true);
                echo "\">
\t\t\t\t\t\t<div style=\"display: table; height:100%; width:100%;\">
\t\t\t\t\t\t\t";
                // line 472
                $context["ggCaptionText"] = $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "title", array());
                // line 473
                echo "\t\t\t\t\t\t\t";
                $context["ggCaptionTextStyle"] = ((((("padding: 10px;display:table-cell;font-size:" . $this->getAttribute($this->getAttribute($this->getAttribute(                // line 474
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size", array())) . Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em"))) . ";vertical-align:") . $this->getAttribute($this->getAttribute($this->getAttribute(                // line 475
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "position", array())) . ";");
                // line 476
                echo "\t\t\t\t\t\t\t";
                if ( !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "caption", array()))) {
                    // line 477
                    echo "\t\t\t\t\t\t\t\t";
                    $context["ggCaptionText"] = $this->getAttribute($this->getAttribute((isset($context["photo"]) ? $context["photo"] : null), "attachment", array()), "caption", array());
                    // line 478
                    echo "\t\t\t\t\t\t\t\t";
                    $context["ggCaptionTextStyle"] = ((isset($context["ggCaptionTextStyle"]) ? $context["ggCaptionTextStyle"] : null) . "font-weight: 800;");
                    // line 479
                    echo "\t\t\t\t\t\t\t";
                }
                // line 480
                echo "\t\t\t\t\t\t\t";
                $this->displayBlock('figcaption_after_set_exif', $context, $blocks);
                // line 483
                echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 486
            echo "\t\t\t";
        }
        // line 487
        echo "\t\t";
    }

    // line 480
    public function block_figcaption_after_set_exif($context, array $blocks = array())
    {
        // line 481
        echo "\t\t\t\t\t\t\t\t<span style=\"";
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["ggCaptionTextStyle"]) ? $context["ggCaptionTextStyle"] : null), "html", null, true);
        echo "\">";
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["ggCaptionText"]) ? $context["ggCaptionText"] : null), "html", null, true);
        echo "</span>
\t\t\t\t\t\t\t";
    }

    // line 491
    public function block_figure_after($context, array $blocks = array())
    {
        // line 492
        echo "\t\t\t";
        if (( !$this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "false"))) {
            // line 493
            echo "\t\t\t\t</a>
\t\t\t";
        }
        // line 495
        echo "\t\t";
    }

    // line 499
    public function block_oneGalleryImage($context, array $blocks = array())
    {
        // line 500
        echo "\t\t";
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["var_figure_before"]) ? $context["var_figure_before"] : null), "html", null, true);
        echo "
\t\t<FIGURE ";
        // line 501
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["var_figure_attributes"]) ? $context["var_figure_attributes"] : null), "html", null, true);
        echo " >
\t\t\t<div class=\"crop
\t\t\t\t";
        // line 503
        if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "overlay", array()) == "1") && ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "use_shadow", array()) == "1"))) {
            // line 504
            echo "\t\t\t\t\timage-overlay
\t\t\t\t";
        }
        // line 505
        echo "\"
\t\t\t\t style=\"
\t\t\t\t ";
        // line 507
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "0") || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "3"))) {
            // line 508
            echo "\t\t\t\t\t\t width:";
            echo Twig_SupTwg_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array()) . Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t\t\t\t\t\t height:";
            // line 509
            echo Twig_SupTwg_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array()) . Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height_unit", array()), array(0 => "px", 1 => "%"))), "html", null, true);
            echo ";
\t\t\t\t\t\t overflow:hidden;
\t\t\t\t ";
        }
        // line 511
        echo "\">

\t\t\t\t<img ";
        // line 513
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["var_image_attributes"]) ? $context["var_image_attributes"] : null), "html", null, true);
        echo " />
\t\t\t</div>
\t\t\t";
        // line 515
        $this->displayBlock('mosaicLastImageNumberWrapper', $context, $blocks);
        // line 517
        echo "\t\t\t";
        $this->displayBlock('mosaicFigcaptionWrapper', $context, $blocks);
        // line 530
        echo "\t\t</FIGURE>
\t\t";
        // line 531
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["var_figure_after"]) ? $context["var_figure_after"] : null), "html", null, true);
        echo "
\t";
    }

    // line 515
    public function block_mosaicLastImageNumberWrapper($context, array $blocks = array())
    {
        // line 516
        echo "\t\t\t";
    }

    // line 517
    public function block_mosaicFigcaptionWrapper($context, array $blocks = array())
    {
        // line 518
        echo "\t\t\t\t<FIGCAPTION ";
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["var_figcaption_attributes"]) ? $context["var_figcaption_attributes"] : null), "html", null, true);
        echo "\t>
\t\t\t\t\t<div
\t\t\t\t\t\t\tclass=\"grid-gallery-figcaption-wrap\"
\t\t\t\t\t\t\tstyle=\"
\t\t\t\t\t\t\t";
        // line 522
        if (( !$this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", true, true) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "enabled", array()) == "false"))) {
            // line 523
            echo "\t\t\t\t\t\t\t\t\tvertical-align:";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
            echo ";
\t\t\t\t\t\t\t";
        }
        // line 524
        echo "\">
\t\t\t\t\t\t";
        // line 525
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["var_figcaption_wrap"]) ? $context["var_figcaption_wrap"] : null), "html", null, true);
        echo "
\t\t\t\t\t</div>
\t\t\t\t</FIGCAPTION>
\t\t\t\t";
        // line 528
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["var_figcaption_after"]) ? $context["var_figcaption_after"] : null), "html", null, true);
        echo "
\t\t\t";
    }

    public function getTemplateName()
    {
        return "@galleries/shortcode/helpers.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1620 => 528,  1614 => 525,  1611 => 524,  1605 => 523,  1603 => 522,  1595 => 518,  1592 => 517,  1588 => 516,  1585 => 515,  1579 => 531,  1576 => 530,  1573 => 517,  1571 => 515,  1566 => 513,  1562 => 511,  1556 => 509,  1551 => 508,  1549 => 507,  1545 => 505,  1541 => 504,  1539 => 503,  1534 => 501,  1529 => 500,  1526 => 499,  1522 => 495,  1518 => 493,  1515 => 492,  1512 => 491,  1503 => 481,  1500 => 480,  1496 => 487,  1493 => 486,  1488 => 483,  1485 => 480,  1482 => 479,  1479 => 478,  1476 => 477,  1473 => 476,  1471 => 475,  1470 => 474,  1468 => 473,  1466 => 472,  1461 => 470,  1457 => 469,  1449 => 468,  1446 => 467,  1444 => 466,  1441 => 465,  1435 => 463,  1430 => 460,  1427 => 459,  1421 => 457,  1419 => 456,  1415 => 455,  1410 => 454,  1406 => 453,  1401 => 452,  1399 => 451,  1396 => 450,  1393 => 449,  1390 => 448,  1386 => 441,  1379 => 437,  1364 => 435,  1361 => 434,  1358 => 433,  1354 => 444,  1351 => 443,  1348 => 442,  1345 => 433,  1342 => 432,  1340 => 431,  1337 => 430,  1333 => 428,  1329 => 426,  1325 => 425,  1323 => 424,  1308 => 423,  1302 => 421,  1300 => 420,  1297 => 419,  1295 => 418,  1292 => 417,  1289 => 416,  1286 => 415,  1284 => 412,  1283 => 411,  1282 => 408,  1281 => 407,  1280 => 406,  1278 => 405,  1276 => 404,  1273 => 403,  1247 => 401,  1241 => 399,  1239 => 398,  1236 => 397,  1234 => 396,  1231 => 395,  1227 => 393,  1224 => 391,  1221 => 390,  1218 => 388,  1216 => 387,  1212 => 385,  1209 => 384,  1205 => 382,  1201 => 381,  1198 => 380,  1194 => 379,  1190 => 378,  1187 => 377,  1181 => 375,  1179 => 374,  1173 => 373,  1169 => 372,  1166 => 371,  1161 => 369,  1156 => 368,  1154 => 367,  1151 => 366,  1149 => 365,  1146 => 364,  1143 => 363,  1137 => 361,  1134 => 360,  1132 => 359,  1127 => 358,  1124 => 357,  1122 => 356,  1117 => 355,  1114 => 354,  1111 => 353,  1109 => 352,  1106 => 351,  1103 => 350,  1100 => 349,  1098 => 345,  1097 => 344,  1096 => 342,  1094 => 340,  1092 => 339,  1089 => 338,  1086 => 337,  1083 => 336,  1081 => 332,  1080 => 331,  1079 => 329,  1077 => 327,  1074 => 326,  1071 => 325,  1066 => 322,  1060 => 321,  1057 => 320,  1054 => 319,  1052 => 318,  1049 => 317,  1042 => 310,  1036 => 308,  1030 => 306,  1027 => 305,  1024 => 304,  1019 => 303,  1015 => 299,  1012 => 298,  1007 => 295,  1005 => 294,  1001 => 293,  997 => 292,  992 => 291,  988 => 290,  983 => 289,  980 => 288,  975 => 285,  972 => 284,  966 => 281,  964 => 280,  959 => 279,  956 => 278,  953 => 277,  947 => 272,  943 => 271,  935 => 270,  926 => 269,  916 => 267,  914 => 266,  906 => 265,  902 => 264,  897 => 263,  894 => 262,  891 => 261,  888 => 260,  885 => 259,  883 => 258,  880 => 257,  877 => 256,  874 => 255,  871 => 254,  868 => 253,  865 => 252,  860 => 250,  857 => 249,  854 => 248,  851 => 247,  848 => 246,  844 => 242,  841 => 241,  837 => 239,  835 => 238,  830 => 237,  827 => 236,  821 => 234,  818 => 233,  815 => 232,  811 => 228,  805 => 226,  799 => 224,  796 => 223,  793 => 222,  789 => 181,  786 => 180,  783 => 179,  779 => 177,  773 => 175,  770 => 174,  767 => 173,  765 => 172,  761 => 171,  757 => 170,  753 => 169,  750 => 168,  746 => 167,  743 => 166,  739 => 164,  737 => 163,  732 => 162,  728 => 161,  725 => 160,  722 => 159,  718 => 155,  715 => 154,  712 => 153,  706 => 151,  700 => 149,  697 => 148,  694 => 147,  688 => 145,  682 => 143,  679 => 142,  676 => 141,  673 => 140,  669 => 138,  665 => 136,  662 => 135,  659 => 134,  656 => 133,  652 => 129,  646 => 127,  643 => 126,  640 => 125,  636 => 117,  632 => 115,  630 => 114,  627 => 113,  625 => 112,  619 => 110,  617 => 109,  614 => 108,  611 => 107,  609 => 106,  606 => 105,  600 => 98,  595 => 97,  592 => 96,  579 => 90,  576 => 89,  569 => 118,  567 => 105,  564 => 104,  558 => 102,  556 => 101,  553 => 100,  551 => 96,  547 => 95,  542 => 93,  539 => 92,  537 => 89,  530 => 87,  527 => 86,  524 => 85,  520 => 80,  517 => 79,  513 => 27,  507 => 25,  503 => 23,  500 => 22,  497 => 21,  492 => 533,  489 => 499,  486 => 497,  483 => 496,  480 => 491,  478 => 490,  475 => 489,  472 => 488,  469 => 448,  467 => 447,  464 => 446,  461 => 445,  458 => 317,  456 => 316,  453 => 315,  451 => 314,  448 => 313,  445 => 312,  443 => 304,  438 => 303,  436 => 302,  433 => 301,  430 => 300,  427 => 277,  425 => 276,  422 => 275,  419 => 274,  416 => 246,  414 => 245,  411 => 244,  408 => 243,  405 => 232,  403 => 231,  400 => 230,  397 => 229,  394 => 222,  392 => 221,  389 => 220,  386 => 219,  383 => 218,  381 => 217,  378 => 216,  375 => 215,  372 => 214,  370 => 213,  367 => 212,  364 => 211,  361 => 210,  359 => 209,  356 => 208,  353 => 207,  351 => 206,  349 => 205,  347 => 204,  345 => 203,  343 => 202,  340 => 201,  338 => 200,  335 => 199,  332 => 198,  330 => 197,  327 => 196,  324 => 195,  321 => 194,  318 => 193,  315 => 192,  312 => 191,  309 => 190,  307 => 189,  304 => 188,  301 => 187,  299 => 186,  296 => 185,  294 => 184,  291 => 183,  288 => 182,  285 => 159,  283 => 158,  280 => 157,  277 => 156,  274 => 133,  272 => 132,  269 => 131,  266 => 130,  263 => 125,  261 => 124,  256 => 121,  253 => 120,  250 => 85,  247 => 84,  244 => 82,  241 => 81,  238 => 79,  236 => 78,  233 => 77,  231 => 76,  228 => 75,  223 => 72,  220 => 71,  214 => 69,  211 => 68,  209 => 67,  206 => 66,  199 => 63,  196 => 62,  194 => 61,  189 => 60,  186 => 59,  184 => 58,  181 => 57,  176 => 54,  174 => 53,  171 => 52,  167 => 50,  165 => 49,  162 => 48,  158 => 46,  155 => 45,  153 => 44,  150 => 43,  146 => 41,  142 => 39,  140 => 38,  137 => 37,  130 => 34,  124 => 32,  121 => 31,  119 => 30,  116 => 29,  112 => 21,  106 => 19,  103 => 18,  97 => 14,  91 => 12,  88 => 11,  86 => 10,  82 => 8,  64 => 7,  62 => 6,  57 => 5,  47 => 3,  44 => 2,  42 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_SupTwg_Source("", "@galleries/shortcode/helpers.twig", "/home/dannytua/kaodesign.vn.2020/wp-content/plugins/gallery-by-supsystic/src/GridGallery/Galleries/views/shortcode/helpers.twig");
    }
}
