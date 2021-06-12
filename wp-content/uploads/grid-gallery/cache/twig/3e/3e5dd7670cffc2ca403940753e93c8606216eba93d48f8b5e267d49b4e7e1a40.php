<?php

/* @galleries/settings.twig */
class __TwigTemplate_707fd9f936bb4ef4b86b0d353b0bd22679c3d9c31362822e2422d14bc6cb5bd6 extends Twig_SupTwg_Template
{
    public function __construct(Twig_SupTwg_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("grid-gallery.twig", "@galleries/settings.twig", 1);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'tabs' => array($this, 'block_tabs'),
            'preview' => array($this, 'block_preview'),
            'figcaption_after' => array($this, 'block_figcaption_after'),
            'gallery_preview_figure_attributes' => array($this, 'block_gallery_preview_figure_attributes'),
            'gallery_preview_image_attributes' => array($this, 'block_gallery_preview_image_attributes'),
            'settginsFigCaption' => array($this, 'block_settginsFigCaption'),
            'content' => array($this, 'block_content'),
            'proHiddenSettings' => array($this, 'block_proHiddenSettings'),
            'area' => array($this, 'block_area'),
            'galleryTypeSelectorItems' => array($this, 'block_galleryTypeSelectorItems'),
            'openByLink' => array($this, 'block_openByLink'),
            'browserUrlTooltipHide' => array($this, 'block_browserUrlTooltipHide'),
            'disableRightClick' => array($this, 'block_disableRightClick'),
            'mosaicImagesCount' => array($this, 'block_mosaicImagesCount'),
            'mosaicGalleryImageCountText' => array($this, 'block_mosaicGalleryImageCountText'),
            'socialSharing' => array($this, 'block_socialSharing'),
            'horizontalScroll' => array($this, 'block_horizontalScroll'),
            'horizontalScrollAfter' => array($this, 'block_horizontalScrollAfter'),
            'border' => array($this, 'block_border'),
            'shadow' => array($this, 'block_shadow'),
            'popup' => array($this, 'block_popup'),
            'popupLinkedImageText' => array($this, 'block_popupLinkedImageText'),
            'disableSourceImageForLi' => array($this, 'block_disableSourceImageForLi'),
            'enableDownloadPhotosButton' => array($this, 'block_enableDownloadPhotosButton'),
            'popupAfter' => array($this, 'block_popupAfter'),
            'lazyload' => array($this, 'block_lazyload'),
            'preload' => array($this, 'block_preload'),
            'attributes' => array($this, 'block_attributes'),
            'additionalCaptionSettings' => array($this, 'block_additionalCaptionSettings'),
            'post' => array($this, 'block_post'),
            'captionSettingsType' => array($this, 'block_captionSettingsType'),
            'overlaySettings' => array($this, 'block_overlaySettings'),
            'backgroundImageForHoverEffect' => array($this, 'block_backgroundImageForHoverEffect'),
            'backgroundColorForShowOnHover' => array($this, 'block_backgroundColorForShowOnHover'),
            'icons' => array($this, 'block_icons'),
            'proCaptionAndIconSettings' => array($this, 'block_proCaptionAndIconSettings'),
            'exifCaptionSettings' => array($this, 'block_exifCaptionSettings'),
            'categories' => array($this, 'block_categories'),
            'pagination' => array($this, 'block_pagination'),
            'watermark' => array($this, 'block_watermark'),
            'form' => array($this, 'block_form'),
            'captionEffectInPro' => array($this, 'block_captionEffectInPro'),
            'iconsEffects' => array($this, 'block_iconsEffects'),
            'modals' => array($this, 'block_modals'),
            'icon_wrap_item_class' => array($this, 'block_icon_wrap_item_class'),
            'settingsOtherPro' => array($this, 'block_settingsOtherPro'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "grid-gallery.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 5
        $context["borderTypes"] = array("solid" => "Solid", "dotted" => "Dotted", "dashed" => "Dashed", "double" => "Double", "groove" => "Groove", "ridge" => "Ridge", "inset" => "Inset", "outset" => "Outset", "none" => "None");
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 17
    public function block_header($context, array $blocks = array())
    {
        // line 18
        echo "    ";
        // line 19
        echo "    <nav id=\"supsystic-breadcrumbs\" class=\"supsystic-breadcrumbs\" style=\"float: left; padding-top: 20px;\">
        ";
        // line 38
        echo "        ";
        // line 39
        echo "        ";
        // line 40
        echo "        <a href=\"";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "generateUrl", array(0 => "galleries"), "method"), "html", null, true);
        echo "\">";
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Galleries")), "html", null, true);
        echo "</a>
        <i class=\"fa fa-angle-right\"></i>
        <a href=\"";
        // line 42
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "generateUrl", array(0 => "galleries", 1 => "view", 2 => array("gallery_id" => $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()))), "method"), "html", null, true);
        echo "\">";
        echo $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "title", array());
        echo "</a>
    </nav>

    <h2 class=\"form-tabs\">
        <a class=\"nav-tab change-tab\" href=\"area\">
            <i class=\"fa fa-home\"></i>
\t\t\t<span class=\"nav-tab-item-span\">";
        // line 48
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Main")), "html", null, true);
        echo "</span>
        </a>

        <a class=\"nav-tab change-tab\" href=\"overlay\">
            <i class=\"fa fa-info\"></i>
\t\t\t<span class=\"nav-tab-item-span\">";
        // line 53
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Captions and icons")), "html", null, true);
        echo "</span>
        </a>

        <a class=\"nav-tab change-tab\" href=\"cats\">
            <i class=\"fa fa-bookmark-o\"></i>
\t\t\t<span class=\"nav-tab-item-span\">";
        // line 58
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Categories and Pagination")), "html", null, true);
        echo "</span>
        </a>

        <a class=\"nav-tab change-tab\" href=\"post\">
            <i class=\"fa fa-columns\"></i>
\t\t\t<span class=\"nav-tab-item-span\">";
        // line 63
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Posts")), "html", null, true);
        echo "</span>
        </a>

        <a class=\"nav-tab change-tab\" href=\"water-m-tab\">
            <i class=\"fa fa-fw fa-certificate\"></i>
\t\t\t<span class=\"nav-tab-item-span\">";
        // line 68
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Watermark")), "html", null, true);
        echo "</span>
        </a>
        ";
        // line 70
        $this->displayBlock('tabs', $context, $blocks);
        // line 71
        echo "    </h2>
";
    }

    // line 70
    public function block_tabs($context, array $blocks = array())
    {
    }

    // line 74
    public function block_preview($context, array $blocks = array())
    {
        // line 75
        echo "    ";
        if ($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "watermark", array(), "any", true, true)) {
            // line 76
            echo "        ";
            $context["settingsWatermark"] = Twig_SupTwg_array_merge($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "watermark", array()), array("galleryId" => $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array())));
            // line 77
            echo "        ";
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('set_attachment_settings')->getCallable(), array("watermark", (isset($context["settingsWatermark"]) ? $context["settingsWatermark"] : null))), "html", null, true);
            echo "
    ";
        }
        // line 79
        echo "    ";
        $context["style"] = $this->loadTemplate("@galleries/shortcode/style.twig", "@galleries/settings.twig", 79);
        // line 80
        echo "    ";
        $context["attachment"] = $this->loadTemplate("@galleries/helpers/attachment.twig", "@galleries/settings.twig", 80);
        // line 81
        echo "\t";
        $context["form"] = $this->loadTemplate("@core/form.twig", "@galleries/settings.twig", 81);
        // line 82
        echo "
\t";
        // line 83
        ob_start();
        // line 84
        echo "\t\t";
        $this->displayBlock('figcaption_after', $context, $blocks);
        // line 86
        echo "\t";
        $context["var_figcaption_after"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 87
        echo "\t";
        // line 88
        echo "\t";
        ob_start();
        // line 89
        echo "\t\t<div class=\"sggFigCaptionIconsEntry ggSettingsDisplNone

\t\t\thi-icon-wrap ";
        // line 91
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_slice($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "effect", array()), 0, ((isset($context["length"]) ? $context["length"] : null) - 1)), "html", null, true);
        echo " ";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "effect", array()), "html", null, true);
        echo "\">

\t\t\t";
        // line 93
        $context["videoIcon"] = ((Twig_SupTwg_in_filter("youtu", $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "photos", array()), 0, array(), "array"), "attachment", array()), "video", array()))) ? ("fa-youtube-play") : ("fa-vimeo"));
        // line 94
        echo "\t\t\t";
        ob_start();
        // line 95
        echo "\t\t\t\t";
        if ( !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "margin", array()))) {
            // line 96
            echo "\t\t\t\t\tmargin-left:";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "margin", array()), "html", null, true);
            echo "px;
\t\t\t\t\tmargin-right:";
            // line 97
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "margin", array()), "html", null, true);
            echo "px;
\t\t\t\t";
        }
        // line 99
        echo "\t\t\t";
        $context["iconStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 100
        echo "\t\t\t<a href=\"#\" class=\"hi-icon gg-icon-video fa ";
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["videoIcon"]) ? $context["videoIcon"] : null), "html", null, true);
        echo "\" style=\"";
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["iconStyle"]) ? $context["iconStyle"] : null)), "html", null, true);
        echo "\"></a>
\t\t\t<a href=\"#\" class=\"hi-icon gg-icon-link fa fa-link\" style=\"";
        // line 101
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["iconStyle"]) ? $context["iconStyle"] : null)), "html", null, true);
        echo "\"></a>
\t\t\t<a href=\"#\" class=\"hi-icon gg-icon-popup fa fa-expand\" style=\"";
        // line 102
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["iconStyle"]) ? $context["iconStyle"] : null)), "html", null, true);
        echo "\"></a>
            <a href=\"#\" class=\"hi-icon gg-icon-download fa fa-download\" style=\"";
        // line 103
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["iconStyle"]) ? $context["iconStyle"] : null)), "html", null, true);
        echo "\"></a>
\t\t</div>
\t";
        $context["simpleIconsEntryVal"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 106
        echo "
    <div id=\"preview\" class=\"gallery-preview\">
        <section class=\"supsystic-bar-preview\" id=\"single-gallery-toolbar\">
            <ul class=\"supsystic-bar-controls\">
                ";
        // line 117
        echo "
                <li title=\"";
        // line 118
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Upload new images")), "html", null, true);
        echo "\">
                    <button class=\"button button-primary gallery import-to-gallery\" data-gallery-id=\"";
        // line 119
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
        echo "\">
                        <i class=\"fa fa-fw fa-camera\"></i>
                        ";
        // line 121
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Add Images")), "html", null, true);
        echo "
                    </button>
                </li>

                <li>
                    <a class=\"button\"
                       href=\"";
        // line 127
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "generateUrl", array(0 => "galleries", 1 => "view", 2 => array("gallery_id" => $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()))), "method"), "html", null, true);
        echo "\">
                        <i class=\"fa fa-list fa-fw\"></i>
                        ";
        // line 129
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Images list")), "html", null, true);
        echo "
                    </a>
                </li>

                <li>
                    <button class=\"button button-primary\" id=\"btnSave\">
                        <i class=\"fa fa-fw fa-check\"></i>
                        ";
        // line 136
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Save")), "html", null, true);
        echo "
                    </button>
                </li>
            </ul>
        </section>
        ";
        // line 141
        if ( !Twig_SupTwg_test_empty($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "photos", array()))) {
            // line 142
            echo "            <div style=\"
            ";
            // line 143
            if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "settings", array()), "area", array()), "photo_width_unit", array()) == 0) &&  !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "settings", array()), "area", array()), "photo_width", array())))) {
                // line 144
                echo "                width:";
                echo Twig_SupTwg_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "settings", array()), "area", array()), "photo_width", array()) + 40), "html", null, true);
                echo "px;
            ";
            }
            // line 146
            echo "            margin: 10px auto;
            max-width: 330px;
            clear:both;
            \">
                <figure
\t\t\t\t\t";
            // line 151
            $this->displayBlock('gallery_preview_figure_attributes', $context, $blocks);
            // line 157
            echo "\t\t\t\t\t>
\t\t\t\t\t";
            // line 158
            list($context["width"], $context["height"], $context["crop"]) =             array(0, 0, 0);
            // line 159
            echo "
                    ";
            // line 160
            if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width_unit", array()) == 0)) {
                // line 161
                echo "                        ";
                $context["width"] = $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array());
                // line 162
                echo "                    ";
            }
            // line 163
            echo "
                    ";
            // line 164
            if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height_unit", array()) == 0)) {
                // line 165
                echo "                        ";
                $context["height"] = $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array());
                // line 166
                echo "                    ";
            }
            // line 167
            echo "
                    ";
            // line 168
            if (((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == 0) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "2")) || ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()) == "3"))) {
                // line 169
                echo "                        ";
                $context["crop"] = 1;
                // line 170
                echo "                    ";
            } else {
                // line 171
                echo "                        ";
                $context["height"] = 0;
                // line 172
                echo "                    ";
            }
            // line 173
            echo "
                    ";
            // line 174
            if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "cropQuality", array(), "any", true, true)) {
                // line 175
                echo "                        ";
                $context["cropQuality"] = $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "cropQuality", array());
                // line 176
                echo "                    ";
            } else {
                // line 177
                echo "                        ";
                $context["cropQuality"] = null;
                // line 178
                echo "                    ";
            }
            // line 179
            echo "                    <img
\t\t\t\t\t\t";
            // line 180
            $this->displayBlock('gallery_preview_image_attributes', $context, $blocks);
            // line 201
            echo "\t\t\t\t\t\t/>
\t\t\t\t\t";
            // line 202
            ob_start();
            // line 203
            echo "\t\t\t\t\t\t<figcaption style=\"";
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["figcaptionStyle"]) ? $context["figcaptionStyle"] : null)), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t<div style=\"display: table; height: 100%; width: 100%;\" class=\"sggFigcaptionCaptionWrapper\">
\t\t\t\t\t\t\t\t<div class=\"grid-gallery-figcaption-wrap\" style=\"display: table-cell;\">
\t\t\t\t\t\t\t\t\t<span ";
            // line 206
            if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "rtl", array()) == true)) {
                echo "dir=\"rtl\" class=\"ggRtlClass\"";
            }
            echo ">Gallery by Supsystic</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
            // line 209
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["simpleIconsEntryVal"]) ? $context["simpleIconsEntryVal"] : null), "html", null, true);
            echo "
\t\t\t\t\t\t</figcaption>
\t\t\t\t\t\t";
            // line 211
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["var_figcaption_after"]) ? $context["var_figcaption_after"] : null), "html", null, true);
            echo "
\t\t\t\t\t";
            $context["figcaptionBlockFree"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
            // line 213
            echo "
\t\t\t\t\t";
            // line 214
            $this->displayBlock('settginsFigCaption', $context, $blocks);
            // line 217
            echo "                </figure>
            </div>
        ";
        } else {
            // line 220
            echo "            <div style=\"clear: both;\"></div>
            <h2 style=\"text-align: center;\">
                ";
            // line 222
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("There're no images in the gallery.")), "html", null, true);
            echo "<br>
                <a class=\"import-to-gallery\" href=\"#\">Add Images</a>
            </h2>
        ";
        }
        // line 226
        echo "
        <div style=\"clear: both;\"></div>

        <div class=\"shortcode-wrap\" style=\"margin-top: 20px\">
\t\t\t<div class=\"shortcode\">";
        // line 230
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shortcode:")), "html", null, true);
        echo "
\t\t\t\t<input type=\"text\" id=\"shortcode\" class=\"gallery-shortcode\" value=\"[";
        // line 231
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "config", array()), "get", array(0 => "shortcode_name"), "method"), "html", null, true);
        echo " id=";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
        echo "]\" onclick=\"this.select();\" size=\"42\" style=\"font-size: 12px;\" readonly>
\t\t\t\t";
        // line 232
        echo $context["form"]->getshow_tooltip("sgg-shortcode");
        echo "
\t\t\t</div>
\t\t\t<div class=\"shortcode\">";
        // line 234
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("PHPCode:")), "html", null, true);
        echo "
\t\t\t\t<input type=\"text\" id=\"shortcode\" class=\"gallery-shortcode\" value=\"";
        // line 235
        echo Twig_SupTwg_escape_filter($this->env, (("<?php echo do_shortcode('[supsystic-gallery id=" . $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array())) . "]') ?>"), "html", null, true);
        echo "\" onclick=\"this.select();\" size=\"42\" style=\"font-size: 12px;\" readonly>
\t\t\t\t";
        // line 236
        echo $context["form"]->getshow_tooltip("sgg-php-code");
        echo "
\t\t\t</div>
        </div>

        <small style=\"left:25px;position:absolute;top:10px;display:none;\">Oops! Transparency doesn't work in live preview. </small>
        <div class=\"separator\"></div>

        <div style=\"margin: 20px 0\" class=\"gg-preview-bottom-bar\">
\t\t\t<a class=\"button button-primary\" target=\"_blank\"
\t\t\t   href=\"";
        // line 245
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "generateUrl", array(0 => "galleries", 1 => "preview", 2 => array("gallery_id" => $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()))), "method"), "html", null, true);
        echo "\">
\t\t\t\t<i class=\"fa fa-fw fa-eye\"></i>
\t\t\t\t";
        // line 247
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Preview")), "html", null, true);
        echo "
\t\t\t</a>

            <a class=\"button\" id=\"openSettingsImportDialog\" href=\"\"><i class=\"fa fa-copy\"></i> ";
        // line 250
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Import settings")), "html", null, true);
        echo "</a>
\t\t\t<a class=\"button\" id=\"ggCreateClone\" href=\"#\" target=\"_blank\" data-url=\"";
        // line 251
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "generateUrl", array(0 => "galleries", 1 => "settings", 2 => array("_wpnonce" => (isset($context["_wpnonce"]) ? $context["_wpnonce"] : null))), "method"), "html", null, true);
        echo "\">
\t\t\t\t<i class=\"fa fa-clone\"></i>
\t\t\t\t";
        // line 253
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Clone")), "html", null, true);
        echo "
\t\t\t</a>
        </div>
\t\t<div class=\"gg-sett-preview-other-plugin\">
\t\t\t<label for=\"enableForMembership\" class=\"gg-sett-plugin-member-lbl\">";
        // line 257
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable for Membership:")), "html", null, true);
        echo "</label>
\t\t\t";
        // line 258
        if (($this->getAttribute((isset($context["pageOptions"]) ? $context["pageOptions"] : null), "isMembershipPluginActive", array()) == "true")) {
            // line 259
            echo "\t\t\t\t<select id=\"enableForMembership\" style=\"width: auto;\" name=\"plugins[membership][enable]\" ";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["disableMembershipOpt"]) ? $context["disableMembershipOpt"] : null), "html", null, true);
            echo " >
\t\t\t\t\t<option value=\"0\" ";
            // line 260
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "plugins", array()), "membership", array()), "enable", array()) == "0")) {
                echo "selected=\"selected\"";
            }
            echo ">
\t\t\t\t\t\t";
            // line 261
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No")), "html", null, true);
            echo "
\t\t\t\t\t</option>
\t\t\t\t\t<option value=\"1\" ";
            // line 263
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "plugins", array()), "membership", array()), "enable", array()) == "1")) {
                echo "selected=\"selected\"";
            }
            echo ">
\t\t\t\t\t\t";
            // line 264
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes")), "html", null, true);
            echo "
\t\t\t\t\t</option>
\t\t\t\t</select>
\t\t\t";
        } else {
            // line 268
            echo "                <select id=\"enableForMembershipFake\" style=\"width: auto;\" name=\"membership_feick\" >
                    <option value=\"0\" selected=\"selected\">
                        ";
            // line 270
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No")), "html", null, true);
            echo "
                    </option>
                    <option value=\"1\">
                        ";
            // line 273
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes")), "html", null, true);
            echo "
                    </option>
                </select>
\t\t\t\t<div class=\"gg-membership-plug-info\" style=\"display: none;\">
\t\t\t\t\t";
            // line 277
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("You need to install Membership by Supsystic to use this feature. ")), "html", null, true);
            echo "
\t\t\t\t\t<a target=\"_blank\" href=\"";
            // line 278
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["pageOptions"]) ? $context["pageOptions"] : null), "membershipInstallUrl", array()), "html", null, true);
            echo "\">Install</a>
\t\t\t\t\t";
            // line 279
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array(" plugin from your admin area, or visit it's official page on Wordpress.org ")), "html", null, true);
            echo "
\t\t\t\t\t<a target=\"_blank\" href=\"";
            // line 280
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["pageOptions"]) ? $context["pageOptions"] : null), "membershipInstallWpUrl", array()), "html", null, true);
            echo "\">here</a>
\t\t\t\t</div>
\t\t\t";
        }
        // line 283
        echo "\t\t</div>
    </div>
\t<input type=\"hidden\" id=\"ggMsgCloningGallery\" value=\"";
        // line 285
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Cloning gallery...")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgServerInternalError\" value=\"";
        // line 286
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Server internal error")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgImgOptimizationErrorOcured\" value=\"";
        // line 287
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery image optimization error ocured.")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggIoParams\" value=\"";
        // line 288
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["ioServiceParams"]) ? $context["ioServiceParams"] : null), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggCdnParams\" value=\"";
        // line 289
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["cdnServiceParams"]) ? $context["cdnServiceParams"] : null), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgOptimized\" value=\"";
        // line 290
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Optimized")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgTransfer\" value=\"";
        // line 291
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Transfered")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgOf\" value=\"";
        // line 292
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("of")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgImages\" value=\"";
        // line 293
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("images")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgGalleryImageOptimizing\" value=\"";
        // line 294
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery Image optimizing...")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgGalleryTransferToCnd\" value=\"";
        // line 295
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Tranfer images to CDN")), "html", null, true);
        echo "\"/>

\t<div id=\"ggCloneModalWndId\" style=\"display: none;\">
\t\t<label for=\"ggCloneTypeSelector\">";
        // line 298
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select clone type:")), "html", null, true);
        echo "</label>
\t\t";
        // line 299
        echo $context["form"]->getselect("CloneTypeSelector", array("0" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select clone type")), "1" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Clone with images")), "2" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Clone without images"))), 0, array("style" => "width: auto;", "id" => "ggCloneTypeSelector"));
        // line 307
        echo "
\t</div>

";
    }

    // line 84
    public function block_figcaption_after($context, array $blocks = array())
    {
        // line 85
        echo "\t\t";
    }

    // line 151
    public function block_gallery_preview_figure_attributes($context, array $blocks = array())
    {
        // line 152
        echo "\t\t\t\t\t\tclass=\"grid-gallery-caption\" data-grid-gallery-type=\"center\" style=\"float: none !important;\"
\t\t\t\t\t\t";
        // line 153
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "personal", array()) == "true")) {
            // line 154
            echo "\t\t\t\t\t\t\tdata-thumb-overlay-personal=\"1\"
\t\t\t\t\t\t";
        }
        // line 156
        echo "\t\t\t\t\t";
    }

    // line 180
    public function block_gallery_preview_image_attributes($context, array $blocks = array())
    {
        // line 181
        echo "                            ";
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "photos", array(), "any", false, true), 0, array(), "array", false, true), "attachment", array(), "any", false, true), "isRemoteImage", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "photos", array()), 0, array(), "array"), "attachment", array()), "isRemoteImage", array()) == 1))) {
            // line 182
            echo "\t\t\t\t\t\t\t   src=\"";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "photos", array()), 0, array(), "array"), "attachment", array()), "thumbUrl", array()), "html", null, true);
            echo "\"
                            ";
        } else {
            // line 184
            echo "                                src=\"";
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('get_attachment')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "photos", array()), 0, array(), "array"), "attachment", array()), "id", array()), (isset($context["width"]) ? $context["width"] : null), (isset($context["height"]) ? $context["height"] : null), (isset($context["crop"]) ? $context["crop"] : null), (isset($context["cropQuality"]) ? $context["cropQuality"] : null))), "html", null, true);
            echo "\"
                            ";
        }
        // line 186
        echo "                            data-src=\"";
        echo Twig_SupTwg_escape_filter($this->env, ("holder.js/350x250?theme=simple&text=" . $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "title", array())), "html", null, true);
        echo "\" alt=\"";
        echo $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "title", array());
        echo "\"
\t\t\t\t\t\t\tstyle=\"
\t\t\t\t\t\t\t\tmax-width: 290px; max-height: 290px;
\t\t\t\t\t\t\t\t";
        // line 189
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width_unit", array()) == 0) &&  !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array())))) {
            // line 190
            echo "\t\t\t\t\t\t\t\t\twidth:";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array()), "html", null, true);
            echo "px;
\t\t\t\t\t\t\t\t";
        } else {
            // line 192
            echo "\t\t\t\t\t\t\t\t\twidth: auto;
\t\t\t\t\t\t\t\t";
        }
        // line 194
        echo "\t\t\t\t\t\t\t\t";
        if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height_unit", array()) == 0) &&  !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array())))) {
            // line 195
            echo "\t\t\t\t\t\t\t\t\theight: ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array()), "html", null, true);
            echo "px;
\t\t\t\t\t\t\t\t";
        } else {
            // line 197
            echo "\t\t\t\t\t\t\t\t\theight: auto;
\t\t\t\t\t\t\t\t";
        }
        // line 199
        echo "\t\t\t\t\t\t\t\t\"
\t\t\t\t\t\t";
    }

    // line 214
    public function block_settginsFigCaption($context, array $blocks = array())
    {
        // line 215
        echo "\t\t\t\t\t\t";
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["figcaptionBlockFree"]) ? $context["figcaptionBlockFree"] : null), "html", null, true);
        echo "
\t\t\t\t\t";
    }

    // line 312
    public function block_content($context, array $blocks = array())
    {
        // line 313
        echo "    ";
        $context["form"] = $this->loadTemplate("@core/form.twig", "@galleries/settings.twig", 313);
        // line 314
        echo "    ";
        $context["f"] = $this;
        // line 315
        echo "
\t<div class=\"gg-wraper-anchor-nav-links\" style=\"display: none;\">
\t\t<a href=\"#gg-anl-main\" class=\"gg-anchor-nav-links\">";
        // line 317
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Type")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-mosaic-image-count-text-wrapper\" class=\"gg-anchor-nav-links ggSettingsDisplNone\" id=\"gg-anl-mosaic-settings-link\">";
        // line 318
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image Count Settings")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-soc-share\" class=\"gg-anchor-nav-links\">";
        // line 319
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Social")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-load-more\" class=\"gg-anchor-nav-links\" id=\"gg-anl-load-more-link\">";
        // line 320
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Load More")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-cust-button\" class=\"gg-anchor-nav-links\">";
        // line 321
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons")), "html", null, true);
        echo "</a>
        <a href=\"#gg-anl-horiz-scroll\" class=\"gg-anchor-nav-links\">";
        // line 322
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Scroll")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-border-type\" class=\"gg-anchor-nav-links\">";
        // line 323
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Border")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-shadow\" class=\"gg-anchor-nav-links\">";
        // line 324
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shadow")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-popup\" class=\"gg-anchor-nav-links\">";
        // line 325
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Lightbox")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-lazyload\" class=\"gg-anchor-nav-links\">";
        // line 326
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("LazyLoad")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-preloader\" class=\"gg-anchor-nav-links\">";
        // line 327
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Loader")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-attributes\" class=\"gg-anchor-nav-links\">";
        // line 328
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Attributes")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-caption-add-sett\" class=\"gg-anchor-nav-links\">";
        // line 329
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Caption Transformations")), "html", null, true);
        echo "</a>
\t</div>
    <div class=\"settings-wrap\" data-leave-confirm=\"";
        // line 331
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Your changes not saved. You really want to leave without saving?")), "html", null, true);
        echo "\">
        ";
        // line 332
        echo $context["form"]->getopen("post", $this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "generateUrl", array(0 => "galleries", 1 => "saveSettings", 2 => array("gallery_id" => $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "_wpnonce" => (isset($context["_wpnonce"]) ? $context["_wpnonce"] : null))), "method"), array("id" => "form-settings", "class" => "form-gall-settings"));
        echo "
        <input id=\"currentPresetTitle\" name=\"title\" type=\"hidden\" value=\"";
        // line 333
        echo Twig_SupTwg_escape_filter($this->env, (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "title", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "title", array()), "")) : ("")), "html", null, true);
        echo "\"/>
        <input name=\"previewImage\" type=\"hidden\" value=\"";
        // line 334
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "settings", array()), "previewImage", array()), "html", null, true);
        echo "\"/>
        <input name=\"sort[sortto]\" type=\"hidden\" value=\"";
        // line 335
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "sort", array()), "sortto", array()), "html", null, true);
        echo "\"/>
        <input name=\"sort[sortby]\" type=\"hidden\" value=\"";
        // line 336
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "sort", array()), "sortby", array()), "html", null, true);
        echo "\"/>
\t\t";
        // line 337
        echo $context["form"]->gethidden("plugins[membership][enable]", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "plugins", array()), "membership", array()), "enable", array()), array("id" => "hiddenInpMembershipEnableVal"));
        echo "
\t\t";
        // line 338
        $this->displayBlock('proHiddenSettings', $context, $blocks);
        // line 339
        echo "
        <div data-tab=\"area\">
            ";
        // line 341
        $this->displayBlock('area', $context, $blocks);
        // line 519
        echo "
            ";
        // line 520
        $this->displayBlock('mosaicImagesCount', $context, $blocks);
        // line 522
        echo "
\t\t\t";
        // line 523
        $this->displayBlock('mosaicGalleryImageCountText', $context, $blocks);
        // line 525
        echo "
            ";
        // line 526
        $this->displayBlock('socialSharing', $context, $blocks);
        // line 697
        echo "
            <div class=\"load-more-button-preview\" id=\"gg-anl-load-more\">
                <h1 style=\"line-height: 1;\">
                    ";
        // line 700
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Load more gallery images with scroll or button")), "html", null, true);
        echo "
                    </br>
                    <a class=\"button get-pro\" href=\"";
        // line 702
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=show-more&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "translate", array(0 => "Get PRO"), "method"), "html", null, true);
        echo "</a>
                </h1>
                <div>
                    <a href=\"";
        // line 705
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=show-more&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">
                        <img src=\"";
        // line 706
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "module", array(0 => "galleries"), "method"), "getLocationUrl", array(), "method"), "html", null, true);
        echo "/assets/img/load_more_button_pro.jpg\" />
                    </a>
                </div>
                <div class=\"separator\"></div>
            </div>

            <div class=\"custom-buttons-preview\" id=\"gg-anl-cust-button\">
                <table class=\"form-table\">
                    <thead>
                        ";
        // line 715
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Custom Buttons")),         // line 716
$context["form"]->getbutton("buttons-presets-editor-preview", "Show preset Editor", array("class" => "button button-primary")), "custom-buttons-preview", true);
        echo "
                    </thead>
                </table>
                <div class=\"separator\"></div>
            </div>

\t\t\t";
        // line 722
        $this->displayBlock('horizontalScroll', $context, $blocks);
        // line 790
        echo "
            ";
        // line 791
        $this->displayBlock('border', $context, $blocks);
        // line 824
        echo "
            ";
        // line 825
        $this->displayBlock('shadow', $context, $blocks);
        // line 894
        echo "
            ";
        // line 895
        $this->displayBlock('popup', $context, $blocks);
        // line 1283
        echo "
\t\t\t";
        // line 1284
        $this->displayBlock('lazyload', $context, $blocks);
        // line 1335
        echo "
            ";
        // line 1336
        $this->displayBlock('preload', $context, $blocks);
        // line 1389
        echo "
            ";
        // line 1390
        $this->displayBlock('attributes', $context, $blocks);
        // line 1404
        echo "
\t\t\t";
        // line 1405
        $this->displayBlock('additionalCaptionSettings', $context, $blocks);
        // line 1435
        echo "\t\t\t";
        echo $context["form"]->gethidden("adminPage[slimScrollStartPos]", (($this->getAttribute($this->getAttribute(        // line 1437
(isset($context["settings"]) ? $context["settings"] : null), "adminPage", array(), "any", false, true), "slimScrollStartPos", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "adminPage", array(), "any", false, true), "slimScrollStartPos", array()), 0)) : (0)), array("id" => "slimScrollStartPos"));
        // line 1439
        echo "
        </div>

        ";
        // line 1442
        $this->displayBlock('post', $context, $blocks);
        // line 1460
        echo "
\t\t<div data-tab=\"overlay\">
\t\t\t";
        // line 1463
        echo "\t\t\t";
        $context["effects"] = array("none" => "None", "center" => "Middle", "quarter-appear" => "Appear", "quarter-disappear" => "Disappear", "quarter-slide-up" => "Quarter Slide Up", "quarter-slide-side" => "Quarter Slide Side", "quarter-fall-in" => "Quarter Fall in", "quarter-two-step" => "Quarter Two-step", "quarter-zoom" => "Quarter Caption Zoom", "cover-fade" => "Cover Fade", "cover-push-right" => "Cover Push Right", "revolving-door-left" => "Revolving Door Left", "revolving-door-right" => "Revolving Door Right", "revolving-door-top" => "Revolving Door Top", "revolving-door-bottom" => "Revolving Door Bottom", "revolving-door-original-left" => "Revolving Door Original Left", "revolving-door-original-right" => "Revolving Door Original Right", "revolving-door-original-top" => "Revolving Door Original Top", "revolving-door-original-bottom" => "Revolving Door Original Bottom", "cover-slide-top" => "Cover Slide Top", "offset" => "Caption Offset", "guillotine-reverse" => "Guillotine Reverse", "half-slide" => "Half Slide", "sqkwoosh" => "Skwoosh", "tunnel" => "Tunnel", "direction-aware" => "Direction Aware", "phophorus-rotate" => "Phosphorus Rotate", "phophorus-offset" => "Phosphorus Offset", "phophorus-scale" => "Phosphorus Scale", "cube" => "Cube", "polaroid" => "Polaroid", "3d-cube" => "3D Cube", "show-on-hover" => "Show on Hover", "swing" => "Swing");
        // line 1499
        echo "\t\t\t";
        $context["iconsWithCaptionsEffects"] = array("icons" => "Default", "icons-scale" => "Scale", "icons-sodium-left" => "Sodium Left", "icons-sodium-top" => "Sodium Top", "icons-nitrogen-top" => "Nitrogen Top");
        // line 1506
        echo "\t\t\t";
        $context["enableCaptions"] = ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "enabled", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "enabled", array()), "true")) : ("true")) == "true");
        // line 1507
        echo "\t\t\t";
        $context["polaroidIsEnable"] = ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "effect", array()) == "polaroid")) ? ("true") : ("false"));
        // line 1508
        echo "
            ";
        // line 1509
        $this->displayBlock('captionSettingsType', $context, $blocks);
        // line 1539
        echo "\t\t\t";
        echo $context["form"]->gethidden("thumbnail[overlay][effect]", (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1541
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "effect", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "effect", array()), "quarter-appear")) : ("quarter-appear")), array("id" => "overlayEffect"));
        // line 1543
        echo "
\t\t\t";
        // line 1544
        echo         // line 1545
$context["form"]->gethidden("icons[effect]", $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "effect", array()), array("id" => "iconsEffectName"));
        // line 1546
        echo "

\t\t\t<div class=\"ggCaptionBuilderWrap\">
\t\t\t\t<div class=\"caption-type\" data-gg-cb-type=\"captions-icons\">
\t\t\t\t\t";
        // line 1550
        $this->displayBlock('overlaySettings', $context, $blocks);
        // line 1793
        echo "
\t\t\t\t\t";
        // line 1794
        $this->displayBlock('icons', $context, $blocks);
        // line 1933
        echo "\t\t\t\t</div>
\t\t\t\t<div class=\"caption-type\" data-gg-cb-type=\"caption-builder\">
\t\t\t\t\t";
        // line 1935
        $this->displayBlock('proCaptionAndIconSettings', $context, $blocks);
        // line 1937
        echo "\t\t\t\t</div>
\t\t\t\t<div class=\"exit-info\">
\t\t\t\t\t";
        // line 1939
        $this->displayBlock('exifCaptionSettings', $context, $blocks);
        // line 1956
        echo "\t\t\t\t</div>
\t\t\t</div>
        </div>

        ";
        // line 1960
        $this->displayBlock('categories', $context, $blocks);
        // line 1993
        echo "
        ";
        // line 1994
        $this->displayBlock('watermark', $context, $blocks);
        // line 2007
        echo "
        ";
        // line 2008
        $this->displayBlock('form', $context, $blocks);
        // line 2010
        echo "
        ";
        // line 2011
        echo $context["form"]->getclose();
        echo "

        <div id=\"saveDialog\" title=\"";
        // line 2013
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Save settings as preset")), "html", null, true);
        echo "\">
            <div>
                <label for=\"presetTitle\">
                    ";
        // line 2016
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Preset title:")), "html", null, true);
        echo "
                </label>
            </div>
            <div>
                <input id=\"presetTitle\" type=\"text\" name=\"title\" style=\"width:100%;\" value=\"";
        // line 2020
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["preset"]) ? $context["preset"] : null), "title", array()), "html", null, true);
        echo "\"/>
                <input id=\"settingsId\" type=\"hidden\" name=\"settings_id\" value=\"";
        // line 2021
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "\"/>
            </div>
        </div>

        <div id=\"deletePreset\" title=\"";
        // line 2025
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Delete preset")), "html", null, true);
        echo "\">
            <p>
                ";
        // line 2027
        echo Twig_SupTwg_escape_filter($this->env, sprintf(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Are you really want to delete preset \"%s\"?")), $this->getAttribute((isset($context["preset"]) ? $context["preset"] : null), "title", array())), "html", null, true);
        echo "
            </p>
            <input type=\"hidden\" id=\"presetId\" value=\"";
        // line 2029
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["preset"]) ? $context["preset"] : null), "id", array()), "html", null, true);
        echo "\">
        </div>

        <div id=\"loadPreset\" title=\"";
        // line 2032
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Load settings from presets")), "html", null, true);
        echo "\">
            <div>
                <label for=\"presetList\">";
        // line 2034
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select preset:")), "html", null, true);
        echo "</label>
            </div>
            <div>
                <select id=\"presetList\" name=\"presetList\" style=\"width:100%\"></select>
            </div>
            <div id=\"presetListError\">
                <p id=\"presetLoadingFailed\" style=\"display:none\">
                    ";
        // line 2041
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Failed to load the presets.")), "html", null, true);
        echo "
                </p>

                <p id=\"presetEmpty\" style=\"display:none\">
                    ";
        // line 2045
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Currently you have no presets.")), "html", null, true);
        echo "
                </p>
            </div>
        </div>

        <div id=\"themeDialog\" title=\"";
        // line 2050
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select \"Big image\" theme")), "html", null, true);
        echo "\">
            <h1>
                ";
        // line 2052
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select a theme")), "html", null, true);
        echo "
            </h1>
\t\t\t<div class=\"popupPlacementTypeWrapper\">
\t\t\t\t";
        // line 2055
        $context["popupPlacementType"] = ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "popup", array()), "placementType", array()) == null)) ? (0) : ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "popup", array()), "placementType", array())));
        // line 2056
        echo "\t\t\t\t<h4>";
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("How to fit image in lightbox")), "html", null, true);
        echo "</h4>
\t\t\t\t";
        // line 2057
        echo ((((((((        // line 2058
$context["form"]->getradio("popup[placementType]", "0", Twig_SupTwg_array_merge(array("id" => "popupPlacementTypeFts", "class" => "popupPlacementTypeRadio"), (((        // line 2061
(isset($context["popupPlacementType"]) ? $context["popupPlacementType"] : null) == 0)) ? (array("checked" => "checked")) : (array())))) .         // line 2063
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Fit To Screen")), "popupPlacementTypeFts")) . "<br/>") .         // line 2067
$context["form"]->getradio("popup[placementType]", "1", Twig_SupTwg_array_merge(array("id" => "popupPlacementTypeFw", "class" => "popupPlacementTypeRadio"), (((        // line 2070
(isset($context["popupPlacementType"]) ? $context["popupPlacementType"] : null) == 1)) ? (array("checked" => "checked")) : (array()))))) .         // line 2072
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Fit Width")), "popupPlacementTypeFw")) . "<br/>") .         // line 2076
$context["form"]->getradio("popup[placementType]", "2", Twig_SupTwg_array_merge(array("id" => "popupPlacementTypeSo", "class" => "popupPlacementTypeRadio"), (((        // line 2079
(isset($context["popupPlacementType"]) ? $context["popupPlacementType"] : null) == 2)) ? (array("checked" => "checked")) : (array()))))) .         // line 2081
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show Original")), "popupPlacementTypeSo")) . "<br/>");
        // line 2086
        echo "
\t\t\t</div>
            <div>
                ";
        // line 2089
        $context["bigImageThemes"] = array("theme_1" => "Theme 1", "theme_2" => "Theme 2", "theme_3" => "Theme 3", "theme_4" => "Theme 4", "theme_5" => "Theme 5", "theme_6" => "Theme 6", "theme_7" => "Theme 7");
        // line 2098
        echo "
                ";
        // line 2099
        if ($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "isPro", array(), "method")) {
            // line 2100
            echo "                    ";
            $context["bigImageThemes"] = Twig_SupTwg_array_merge((isset($context["bigImageThemes"]) ? $context["bigImageThemes"] : null), array("theme_1_pro" => "Fullscreen popup"));
            // line 2101
            echo "                ";
        }
        // line 2102
        echo "
                ";
        // line 2103
        $context['_parent'] = $context;
        $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["bigImageThemes"]) ? $context["bigImageThemes"] : null));
        foreach ($context['_seq'] as $context["value"] => $context["name"]) {
            // line 2104
            echo "                    <div class=\"grid-gallery-caption ";
            if (($context["value"] == $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array()), "theme", array()))) {
                echo "gg-active";
            }
            echo "\">
                        <img data-name=\"";
            // line 2105
            echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\" data-val=\"";
            echo Twig_SupTwg_escape_filter($this->env, $context["value"], "html", null, true);
            echo "\" class=\"theme dialog-image\"
                             src=\"";
            // line 2106
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "getModule", array(0 => "colorbox"), "method"), "getThemeScreenshotUrl", array(0 => $context["value"]), "method"), "html", null, true);
            echo "\" alt=\"";
            echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\"
                             title=\"";
            // line 2107
            echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\"/>
                        <div class=\"select-element\">
                            <h3>";
            // line 2109
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
            echo "</h3>
                        </div>
\t\t\t\t\t\t<div class=\"gg-selected-theme\">
\t\t\t\t\t\t\t<div class=\"gg-selected-theme-txt\">";
            // line 2112
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array(("Selected " . $context["name"]))), "html", null, true);
            echo "</div>
\t\t\t\t\t\t</div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['value'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2116
        echo "
            </div>
        </div>

        <div id=\"effectDialog\" title=\"";
        // line 2120
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select overlay effect")), "html", null, true);
        echo "\">
            <div id=\"effectsPreview\" style=\"margin-top: 10px;\">
                ";
        // line 2122
        $context['_parent'] = $context;
        $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["effects"]) ? $context["effects"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["type"] => $context["name"]) {
            // line 2123
            echo "                    ";
            if (($context["type"] == "direction-aware")) {
                // line 2124
                echo "                        <figure class=\"grid-gallery-caption\" data-grid-gallery-type=\"";
                echo Twig_SupTwg_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                            <div class=\"box\">
                                <div class=\"box__right\">Right → Left</div>
                                <div class=\"box__left\">Left → Right</div>
                                <div class=\"box__top\">Top → Bottom</div>
                                <div class=\"box__bottom\">Bottom → Top</div>
                                <div class=\"box__center\">
                                </div>
                                <img data-src=\"holder.js/150x150?theme=industrial&text=";
                // line 2132
                echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
                echo "\" class=\"dialog-image\">
                            </div>
                            <div class=\"select-element\">
                                ";
                // line 2135
                echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
                echo "
                            </div>
                        </figure>
\t\t\t\t\t";
            } elseif (Twig_SupTwg_in_filter(            // line 2138
$context["type"], array(0 => "show-on-hover", 1 => "fade-in", 2 => "grow", 3 => "shrink", 4 => "rotate-z", 5 => "square-to-circle"))) {
                // line 2139
                echo "\t\t\t\t\t\t";
                $this->displayBlock('captionEffectInPro', $context, $blocks);
                // line 2156
                echo "                    ";
            } elseif (($context["type"] == "3d-cube")) {
                // line 2157
                echo "                        <figure class=\"grid-gallery-caption\" data-grid-gallery-type=\"";
                echo Twig_SupTwg_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                            <div class=\"box-3d-cube-scene\" style=\"perspective: 300px;-webkit-perspective: 300px\">
                                <div class=\"box-3d-cube\"
                                     style=\"
                                         transform-origin:50% 50% -75px;
                                         -ms-transform-origin: 50% 50% -75px;
                                         -webkit-transform-origin: 50% 50% -75px;
                                         width:150px; height:150px
                                     \"
                                >
                                    <div class=\"face front\" style=\"width:150px; height:150px\">
                                        <img data-src=\"holder.js/150x150?theme=industrial&text=";
                // line 2168
                echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
                echo "\" class=\"dialog-image\">
                                    </div>
                                    <div style=\"";
                // line 2170
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["figcaptionStyle"]) ? $context["figcaptionStyle"] : null)), "html", null, true);
                echo "width:150px; height:150px\" class=\"face back\">
                                        <div class=\"grid-gallery-figcaption-wrap\">
                                            <span ";
                // line 2172
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "rtl", array()) == true)) {
                    echo "dir=\"rtl\" class=\"ggRtlClass\"";
                }
                echo ">";
                echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
                echo "</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"select-element\">
                                ";
                // line 2178
                echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
                echo "
                            </div>
                        </figure>
                    ";
            } else {
                // line 2182
                echo "                        <figure class=\"grid-gallery-caption\" data-grid-gallery-type=\"";
                echo Twig_SupTwg_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                            <img data-src=\"holder.js/150x150?theme=industrial&text=";
                // line 2183
                echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
                echo "\" class=\"dialog-image\">
                            <figcaption style=\"";
                // line 2184
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["figcaptionStyle"]) ? $context["figcaptionStyle"] : null)), "html", null, true);
                echo "\">
                                <div class=\"grid-gallery-figcaption-wrap\" style=\"width:100%;height:100%;top:0;\">
                                    <div style=\"display:table;width:100%;height:100%;\">
                                        <span ";
                // line 2187
                if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "rtl", array()) == true)) {
                    echo "dir=\"rtl\" class=\"ggRtlClass\"";
                }
                echo " style=\"display:table-cell;font-size:";
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
                echo ";padding:10px;vertical-align:";
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
                echo ";\">Caption</span>
                                    </div>
                                </div>
                            </figcaption>
                            <div class=\"select-element\">
                                ";
                // line 2192
                echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
                echo "
                            </div>
                        </figure>
                    ";
            }
            // line 2196
            echo "                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2197
        echo "                <div class=\"grid-gallery-clearfix\" style=\"clear: both;\"></div>
\t\t\t\t";
        // line 2198
        if (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "captionBuilder", array()), "enabled", array()) != "1")) {
            // line 2199
            echo "\t\t\t\t\t<div class=\"captions-effect-with-icons\" data-confirm=\"";
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("This effect requires icons be enabled. Enable Icons?")), "html", null, true);
            echo "\">
\t\t\t\t\t\t<h3>Captions effects with icons</h3>
\t\t\t\t\t\t";
            // line 2201
            $this->displayBlock('iconsEffects', $context, $blocks);
            // line 2225
            echo "\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 2227
        echo "            </div>
        </div>

        <div id=\"shadowDialog\" title=\"";
        // line 2230
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select shadow preset")), "html", null, true);
        echo "\">
            <h1>
                ";
        // line 2232
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select shadow")), "html", null, true);
        echo "
            </h1>
            <div class=\"shadow-dialog-wrapper\">
                ";
        // line 2235
        $context["shadowPresets"] = array("effect_1" => array("name" => "Effect 1", "offset_x" => "8", "offset_y" => "8", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_2" => array("name" => "Effect 2", "offset_x" => "-8", "offset_y" => "-8", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_3" => array("name" => "Effect 3", "offset_x" => "-8", "offset_y" => "8", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_4" => array("name" => "Effect 4", "offset_x" => "8", "offset_y" => "-8", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_5" => array("name" => "Effect 5", "offset_x" => "8", "offset_y" => "0", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_6" => array("name" => "Effect 6", "offset_x" => "-8", "offset_y" => "0", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_7" => array("name" => "Effect 7", "offset_x" => "0", "offset_y" => "-8", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_8" => array("name" => "Effect 8", "offset_x" => "0", "offset_y" => "8", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_9" => array("name" => "Effect 9", "offset_x" => "0", "offset_y" => "4", "blur" => "10", "color" => "rgba(0, 0, 0, 1.0)"), "effect_10" => array("name" => "Effect 10", "offset_x" => "0", "offset_y" => "-4", "blur" => "8", "color" => "rgba(0, 0, 0, 1.0)"));
        // line 2307
        echo "

                ";
        // line 2309
        $context['_parent'] = $context;
        $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["shadowPresets"]) ? $context["shadowPresets"] : null));
        foreach ($context['_seq'] as $context["value"] => $context["effect"]) {
            // line 2310
            echo "                    <div class=\"grid-gallery-caption\" style=\"float: left; margin-left: 15px; cursor: pointer;\">
                        <div class=\"shadow-preset\" data-offset-x=\"";
            // line 2311
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "offset_x", array()), "html", null, true);
            echo "\" data-offset-y=\"";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "offset_y", array()), "html", null, true);
            echo "\" data-blur=\"";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "blur", array()), "html", null, true);
            echo "\" data-color=\"";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "color", array()), "html", null, true);
            echo "\"
                             style=\"margin: 20px; box-shadow: ";
            // line 2312
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "offset_x", array()), "html", null, true);
            echo "px ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "offset_y", array()), "html", null, true);
            echo "px ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "blur", array()), "html", null, true);
            echo "px ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "color", array()), "html", null, true);
            echo ";\">
                            <img data-src=\"holder.js/150x150?theme=industrial&text=";
            // line 2313
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "name", array()), "html", null, true);
            echo "\" class=\"dialog-image\"/>
                        </div>
                        <div class=\"select-element\">
                            ";
            // line 2316
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
            echo "
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['value'], $context['effect'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2320
        echo "
            </div>
        </div>

        <div id=\"reviewNotice\" title=\"Review\" hidden>
            <h3>Hey, I noticed you just use Gallery by Supsystic over a week – that’s awesome!</h3>
            <p>Could you please do me a BIG favor and give it a 5-star rating on WordPress? Just to help us spread the word and boost our motivation.</p>

            <ul style=\"list-style: circle; padding-left: 30px;\">
                <li>
                    <button class=\"button button-primary\"><a href=\"//wordpress.org/support/view/plugin-reviews/gallery-by-supsystic?rate=5#postform\" target=\"_blank\" class=\"bupSendStatistic\" data-statistic-code=\"is_shown\" style=\"color:#000000 !important;\">Ok, you deserve it</a></button>
                </li>
                <li>
                    <button class=\"button button-primary\"><span class=\"toeLikeLink bupSendStatistic\" data-statistic-code=\"is_shown\">Nope, maybe later</span></button>
                </li>
                <li>
                    <button class=\"button button-primary\"><span class=\"toeLikeLink bupSendStatistic\" data-statistic-code=\"is_shown\">I already did</span></button>
                </li>
            </ul>
        </div>

        <div id=\"settingsImportDialog\" title=\"Import\" hidden>
            <div class=\"import\" style=\"display:none\">
                <p>";
        // line 2343
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Import settings from gallery")), "html", null, true);
        echo "</p>
                <select class=\"list\"></select>
            </div>
            <div class=\"import-not-available\" style=\"display:none\">
                <p>";
        // line 2347
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Here you can import settings from other galleries, but right now, you have only one gallery, create more - and see how it works")), "html", null, true);
        echo "</p>
            </div>
            <div class=\"import-gallery-loading\">
                <p>";
        // line 2350
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Loading gallery list...")), "html", null, true);
        echo "</p>
            </div>
        </div>

\t\t<div id=\"videoUrlAddDialog\" title=\"";
        // line 2354
        echo "Add video url";
        echo "\" style=\"display:none;\" data-gallery-id=\"";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()), "html", null, true);
        echo "\">
\t\t\t<div class=\"sggVideoUrlAddWr\">
\t\t\t\t<div class=\"sggTableRow\">
\t\t\t\t\t<div class=\"sggTableColumn6\">
\t\t\t\t\t\t<div class=\"sggDlgVideoTypeH3\">";
        // line 2358
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Video type:")), "html", null, true);
        echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"sggTableColumn6\">
\t\t\t\t\t\t";
        // line 2361
        echo ((((        // line 2362
$context["form"]->getradio("sggDlgVideoType", "youtube", array("id" => "sggDlgYoutubeVideoType", "class" => "sggDlgVideoTypeRadio", "checked" => "checked")) .         // line 2367
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Youtube url")), "sggDlgYoutubeVideoType")) . "<br/>") .         // line 2371
$context["form"]->getradio("sggDlgVideoType", "vimeo", array("id" => "sggDlgVimeoVideoType", "class" => "sggDlgVideoTypeRadio"))) .         // line 2376
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Vimeo url")), "sggDlgVimeoVideoType"));
        // line 2380
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"sggTableRow\">
\t\t\t\t\t<div class=\"sggTableColumn6\">
\t\t\t\t\t\t<div class=\"sggDlgVideoTypeH3\">";
        // line 2385
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Video url:")), "html", null, true);
        echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"sggTableColumn6\">
\t\t\t\t\t\t";
        // line 2388
        echo         // line 2389
$context["form"]->getinput("text", "sggDlgUrlVideoValue", "", array("id" => "sggDlgUrlVideoInp", "class" => ""));
        // line 2395
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"sggTableRow sggAduHiden\" id=\"sggAduErrorText\"></div>
\t\t\t</div>
\t\t</div>

        ";
        // line 2402
        $context["importTypes"] = $this->loadTemplate("@galleries/shortcode/import.twig", "@galleries/settings.twig", 2402);
        // line 2403
        echo "        <div id=\"importDialog\" title=\"";
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select source to import from")), "html", null, true);
        echo "\" style=\"display: none;\">
            ";
        // line 2404
        echo $context["importTypes"]->getshow(400, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "id", array()));
        echo "
        </div>

        <div class=\"buttons-edit-preset-dialog-preview\" title=\"";
        // line 2407
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons preset editor for Paginations, Categories and Load More buttons")), "html", null, true);
        echo "\">
            <a href=\"";
        // line 2408
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=show-more&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">
                <img src=\"";
        // line 2409
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "module", array(0 => "galleries"), "method"), "getLocationUrl", array(), "method"), "html", null, true);
        echo "/assets/img/custom_button_icon_pro.jpg\" />
            </a>
        </div>

        <div class=\"loader-dialog-preview\" title=\"";
        // line 2413
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Improve free version")), "html", null, true);
        echo "\" style=\"line-height: 200%;\">
            Please be advised that this option is available only in <u>Pro version</u>. You can
            <a  href=\"";
        // line 2415
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=loader&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\" class=\"button\">
                Get PRO
            </a>
            today and get this and other PRO options for Galleries!
        </div>
    </div>

    ";
        // line 2422
        $this->displayBlock('modals', $context, $blocks);
        // line 2478
        echo "
\t";
        // line 2479
        $this->displayBlock('settingsOtherPro', $context, $blocks);
    }

    // line 338
    public function block_proHiddenSettings($context, array $blocks = array())
    {
    }

    // line 341
    public function block_area($context, array $blocks = array())
    {
        // line 342
        echo "                <table class=\"form-table\" name=\"area\" id=\"gg-anl-main\">
                    <thead>
\t\t\t\t\t\t";
        // line 344
        $this->displayBlock('galleryTypeSelectorItems', $context, $blocks);
        // line 363
        echo "
                        <tr id=\"generalColumnsRow\" hidden>
                            <th scope=\"row\">
                                <label style=\"margin: 0 !important;\">
                                    ";
        // line 367
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Number of Columns")), "html", null, true);
        echo "
        \t\t\t\t\t\t\t";
        // line 368
        echo $context["form"]->getshow_tooltip("columns");
        echo "
        \t\t\t\t\t\t\t<br />
        \t\t\t\t\t\t\t<label><a href=\"http://supsystic.com/fixed-columns-gallery-example/\" style=\"color: #0074a2; font-size: 10px; text-decoration: none;\">More Info</a> </label>
                                </label>
                            </th>
                            <td>
                                <input type=\"number\" name=\"general[columns][number]\" value=\"";
        // line 374
        echo Twig_SupTwg_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array()), 3)) : (3)), "html", null, true);
        echo "\">
                            </td>
                        </tr>

                        ";
        // line 378
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Responsive columns")), (((((((((((((        // line 379
$context["form"]->getinput("number", "general[responsiveColumns][desktop][width]", (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "desktop", array(), "any", false, true), "width", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "desktop", array(), "any", false, true), "width", array()), 1200)) : (1200)), array("style" => array("width" => "60px;"))) . $context["form"]->getspan("", "px")) .         // line 380
$context["form"]->getinput("number", "general[responsiveColumns][desktop][columns]", (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "desktop", array(), "any", false, true), "columns", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "desktop", array(), "any", false, true), "columns", array()), (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array()), 3)) : (3)))) : ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array()), 3)) : (3)))), array("style" => array("width" => "40px;")))) . $context["form"]->getspan("", "columns")) . "<br>") .         // line 382
$context["form"]->getinput("number", "general[responsiveColumns][tablet][width]", (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "tablet", array(), "any", false, true), "width", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "tablet", array(), "any", false, true), "width", array()), 768)) : (768)), array("style" => array("width" => "60px;")))) . $context["form"]->getspan("", "px")) .         // line 383
$context["form"]->getinput("number", "general[responsiveColumns][tablet][columns]", (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "tablet", array(), "any", false, true), "columns", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "tablet", array(), "any", false, true), "columns", array()), (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array()), 3)) : (3)))) : ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array()), 3)) : (3)))), array("style" => array("width" => "40px;")))) . $context["form"]->getspan("", "columns")) . "<br>") .         // line 385
$context["form"]->getinput("number", "general[responsiveColumns][mobile][width]", (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(        // line 386
(isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "mobile", array(), "any", false, true), "width", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "mobile", array(), "any", false, true), "width", array()), 320)) : (320)), array("style" => array("width" => "60px;")))) . $context["form"]->getspan("", "px")) .         // line 387
$context["form"]->getinput("number", "general[responsiveColumns][mobile][columns]", (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "mobile", array(), "any", false, true), "columns", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "mobile", array(), "any", false, true), "columns", array()), (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array()), 3)) : (3)))) : ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array()), 3)) : (3)))), array("style" => array("width" => "40px;")))) . $context["form"]->getspan("", "columns")), "responsive-columns");
        echo "

                        ";
        // line 391
        echo "
    \t\t\t\t\t";
        // line 392
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery Name:")),         // line 393
$context["form"]->getinput("text", "title", $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : null), "title", array()), array("style" => array("width" => "232px;"))), "title");
        // line 394
        echo "

\t\t\t\t\t\t";
        // line 396
        echo $context["form"]->getrow($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "translate", array(0 => "Gallery alignment"), "method"),         // line 397
$context["form"]->getselect("area[position]", array(0 => "Left", 1 => "Center", 2 => "Right"), (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array(), "any", false, true), "position", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array(), "any", false, true), "position", array()), 1)) : (1)), array("style" => "width: 100px;")), "gallery-align");
        echo "


\t\t\t\t\t\t";
        // line 400
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Distance between images")), (        // line 401
$context["form"]->getinput("number", "area[distance]", $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "distance", array()), array("style" => array("width" => "140px;"))) .         // line 402
$context["form"]->getspan("", "pixels")), "distance");
        echo "

                        ";
        // line 404
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery width")), (        // line 405
$context["form"]->getinput("number", "area[width]", $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "width", array()), array("style" => array("width" => "140px"))) .         // line 406
$context["form"]->getselect("area[width_unit]", array(0 => "pixels", 1 => "percents"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "width_unit", array()), array("style" => "margin-top: -2px; height: 27px;"))), "area-width");
        echo "

                        ";
        // line 409
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Full screen width")),         // line 410
$context["form"]->getcheckbox("fullscreen", "1", (($this->getAttribute(        // line 413
(isset($context["settings"]) ? $context["settings"] : null), "fullscreen", array())) ? (array("checked" => "checked")) : (array()))), "full-screen-width");
        // line 416
        echo "

                        ";
        // line 418
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery padding")), (        // line 419
$context["form"]->getinput("number", "area[padding]", (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array(), "any", false, true), "padding", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array(), "any", false, true), "padding", array()), 0)) : (0)), array("style" => array("width" => "140px"))) . $context["form"]->getspan("", "pixels")), "area-padding");
        echo "

                        ";
        // line 426
        echo "
                        ";
        // line 427
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image width")), (        // line 428
$context["form"]->getinput("number", "area[photo_width]", $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width", array()), array("style" => array("width" => "140px"))) .         // line 429
$context["form"]->getselect("area[photo_width_unit]", array(0 => "pixels", 1 => "percents"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_width_unit", array()), array("style" => "margin-top: -2px; height: 27px; width: 85px;"))), "photo-width");
        echo "


                        ";
        // line 432
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image height")), (        // line 433
$context["form"]->getinput("number", "area[photo_height]", $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height", array()), array("style" => array("width" => "140px"))) .         // line 434
$context["form"]->getselect("area[photo_height_unit]", array(0 => "pixels"), $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "area", array()), "photo_height_unit", array()), array("style" => "margin-top: -2px; height: 27px; width: 85px;"))), "photo-height");
        echo "

                        ";
        // line 436
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image radius")), (        // line 437
$context["form"]->getinput("number", "thumbnail[border][radius]", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "radius", array()), array("style" => array("width" => "140px"))) .         // line 438
$context["form"]->getselect("thumbnail[border][radius_unit]", array(0 => "pixels", 1 => "percents"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "radius_unit", array()), array("style" => "margin-top: -2px; height: 27px; width: 85px;"))), "border-radius");
        echo "

                        ";
        // line 441
        echo "                        ";
        $context["qualityList"] = array("100" => "100%", "90" => "90%", "80" => "80%", "70" => "70%", "60" => "60%", "50" => "50%", "40" => "40%", "30" => "30%", "20" => "20%", "10" => "10%");
        // line 453
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image crop quality")),         // line 454
$context["form"]->getselect("thumbnail[cropQuality]",         // line 456
(isset($context["qualityList"]) ? $context["qualityList"] : null), (($this->getAttribute($this->getAttribute(        // line 457
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "cropQuality", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "cropQuality", array()), "100")) : ("100"))), "cropQuality");
        // line 460
        echo "

                        ";
        // line 462
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Display only first image")),         // line 463
$context["form"]->getcheckbox("displayFirstPhoto", "on", ((($this->getAttribute(        // line 466
(isset($context["settings"]) ? $context["settings"] : null), "displayFirstPhoto", array()) == "on")) ? (array("checked" => "checked")) : (array()))), "display-first-photo", null, "display-first-photo-row");
        // line 471
        echo "

                        ";
        // line 473
        $this->displayBlock('openByLink', $context, $blocks);
        // line 481
        echo "
\t\t\t\t\t\t";
        // line 482
        $this->displayBlock('browserUrlTooltipHide', $context, $blocks);
        // line 491
        echo "
\t\t\t\t\t\t";
        // line 492
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable image title")),         // line 493
$context["form"]->getcheckbox("disableImageTitle", 1, ((($this->getAttribute(        // line 496
(isset($context["settings"]) ? $context["settings"] : null), "disableImageTitle", array()) == 1)) ? (array("checked" => "checked")) : (array()))), null, null, null);
        // line 499
        echo "

                        ";
        // line 501
        $this->displayBlock('disableRightClick', $context, $blocks);
        // line 503
        echo "
\t\t\t\t\t\t";
        // line 504
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Use these settings by default")),         // line 505
$context["form"]->getcheckbox("defaultsettings", "1", (($this->getAttribute(        // line 508
(isset($context["settings"]) ? $context["settings"] : null), "defaultsettings", array())) ? (array("checked" => "checked")) : (array()))), "default-settings");
        // line 511
        echo "



                    </thead>
                </table>
                <div class=\"separator\"></div>
            ";
    }

    // line 344
    public function block_galleryTypeSelectorItems($context, array $blocks = array())
    {
        // line 345
        echo "\t\t\t\t\t\t\t";
        $context["galleryTypeObj"] = array(0 => array("value" => "0", "title" => "Fixed"), 1 => array("value" => "1", "title" => "Vertical"), 2 => array("value" => "2", "title" => "Horizontal"), 3 => array("value" => "3", "title" => "Fixed Columns"), 4 => array("value" => "4", "title" => (("Mosaic(" . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Available in Pro"))) . ")"), "disabled" => 1));
        // line 352
        echo "
\t\t\t\t\t\t\t";
        // line 353
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery Type")),         // line 354
$context["form"]->getselectWithElem("area[grid]",         // line 356
(isset($context["galleryTypeObj"]) ? $context["galleryTypeObj"] : null), $this->getAttribute($this->getAttribute(        // line 357
(isset($context["settings"]) ? $context["settings"] : null), "area", array()), "grid", array()), array("style" => "width: auto;")), "grid-type", "gallery-types", "columns");
        // line 361
        echo "
\t\t\t\t\t\t";
    }

    // line 473
    public function block_openByLink($context, array $blocks = array())
    {
        // line 474
        echo "                            ";
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Open by link in popup")), "utm_source=plugin&utm_medium=open-by-link&utm_campaign=gallery", "open-by-link",         // line 477
$context["form"]->getcheckbox("openByLink", "on", array("disabled" => "disabled")));
        // line 479
        echo "
                        ";
    }

    // line 482
    public function block_browserUrlTooltipHide($context, array $blocks = array())
    {
        // line 483
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Hide browser url tooltip on image hover")), "utm_source=plugin&utm_medium=browser-url-tooltip-hide&utm_campaign=gallery", "browserUrlTooltipHideFree",         // line 486
$context["form"]->getcheckbox("browserUrlTooltipHideFree", "on", array("disabled" => "disabled")));
        // line 488
        echo "

\t\t\t\t\t\t";
    }

    // line 501
    public function block_disableRightClick($context, array $blocks = array())
    {
        // line 502
        echo "                        ";
    }

    // line 520
    public function block_mosaicImagesCount($context, array $blocks = array())
    {
        // line 521
        echo "            ";
    }

    // line 523
    public function block_mosaicGalleryImageCountText($context, array $blocks = array())
    {
        // line 524
        echo "\t\t\t";
    }

    // line 526
    public function block_socialSharing($context, array $blocks = array())
    {
        // line 527
        echo "                <table class=\"form-table\" id=\"gg-anl-soc-share\">
                    <thead>
                    ";
        // line 529
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Social Sharing")), (((        // line 530
$context["form"]->getradio("socialSharing[enabled]", true, Twig_SupTwg_array_merge(array("id" => "social-sharing-enable"), (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "enabled", array())) ? (array("checked" => "checked")) : (array())))) .         // line 531
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "social-sharing-enable")) .         // line 532
$context["form"]->getradio("socialSharing[enabled]", false, Twig_SupTwg_array_merge(array("id" => "social-sharing-disable"), (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "enabled", array())) ? (array()) : (array("checked" => "checked")))))) .         // line 533
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "social-sharing-disable")), "social-sharing", true);
        echo "
                    </thead>
                    <tbody style=\"display: none;\">
                    ";
        // line 536
        if ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "pluginInstalled", array())) {
            // line 537
            echo "                        ";
            if (Twig_SupTwg_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "projectsList", array()))) {
                // line 538
                echo "

                            ";
                // line 540
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Social Buttons Project")),                 // line 541
$context["form"]->getselect("socialSharing[projectId]", $this->getAttribute($this->getAttribute(                // line 542
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "projectsList", array()), $this->getAttribute($this->getAttribute(                // line 543
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "projectId", array()), array("style" => "width: 200px")), "social-buttons-project");
                // line 545
                echo "

                            ";
                // line 548
                echo "                            ";
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Social setup")),                 // line 549
$context["form"]->getbutton("button-social-setup", "Show social setup", array("class" => "button button-primary")), "social-setup-dialog", false);
                // line 550
                echo "


                            ";
                // line 553
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery Sharing")),                 // line 554
$context["form"]->getcheckbox("socialSharing[gallerySharing][enabled]", true, (($this->getAttribute($this->getAttribute($this->getAttribute(                // line 557
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "gallerySharing", array()), "enabled", array())) ? (array("checked" => "checked")) : (array()))), "gallery-social-sharing", "h4");
                // line 561
                echo "

                            ";
                // line 563
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons position")),                 // line 564
$context["form"]->getselect("socialSharing[gallerySharing][buttonsPosition]", array("top" => "top", "bottom" => "bottom", "all" => "top and bottom"), $this->getAttribute($this->getAttribute($this->getAttribute(                // line 570
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "gallerySharing", array()), "buttonsPosition", array()), array("style" => "width: 200px")), "gallery-sharing-buttons-position");
                // line 572
                echo "

                            ";
                // line 574
                echo $context["form"]->getrow("",                 // line 575
$context["form"]->getcheckbox("socialSharing[imageSharing][enabled]", "0", array("checked" => "checked")), "image-sharing-hidden");
                echo "

                            ";
                // line 577
                $context["enabled"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "imageSharing", array()), "enabled", array());
                // line 578
                echo "                            ";
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image Sharing")),                 // line 579
$context["form"]->getcheckbox("socialSharing[imageSharing][enabled]", true, (((                // line 582
(isset($context["enabled"]) ? $context["enabled"] : null) != "0")) ? (array("checked" => "checked")) : (array()))), "image-social-sharing", "h4");
                // line 586
                echo "

                            ";
                // line 588
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons position")),                 // line 589
$context["form"]->getselect("socialSharing[imageSharing][buttonsPosition]", array("top" => "top", "bottom" => "bottom", "left" => "left", "right " => "right "), $this->getAttribute($this->getAttribute($this->getAttribute(                // line 596
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "imageSharing", array()), "buttonsPosition", array()), array("style" => "width: 200px")), "image-sharing-buttons-position");
                // line 598
                echo "

                            ";
                // line 600
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons align")),                 // line 601
$context["form"]->getselect("socialSharing[imageSharing][buttonsAlignHorizontal]", array("left" => "left", "center" => "center", "right" => "right"), $this->getAttribute($this->getAttribute($this->getAttribute(                // line 607
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "imageSharing", array()), "buttonsAlignHorizontal", array()), array("style" => "width: 200px")), "image-sharing-buttons-align-horizontal");
                // line 609
                echo "

                            ";
                // line 611
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons align")),                 // line 612
$context["form"]->getselect("socialSharing[imageSharing][buttonsAlignVertical]", array("top" => "top", "middle" => "middle", "bottom" => "bottom"), $this->getAttribute($this->getAttribute($this->getAttribute(                // line 618
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "imageSharing", array()), "buttonsAlignVertical", array()), array("style" => "width: 200px")), "image-sharing-buttons-align-vertical");
                // line 620
                echo "

                            ";
                // line 622
                echo $context["form"]->getrow("",                 // line 623
$context["form"]->getcheckbox("socialSharing[popupImageSharing][enabled]", "0", array("checked" => "checked")), "popup-sharing-hidden");
                echo "

                            ";
                // line 625
                $context["enabled"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "popupImageSharing", array()), "enabled", array());
                // line 626
                echo "                            ";
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Popup Image Sharing")),                 // line 627
$context["form"]->getcheckbox("socialSharing[popupImageSharing][enabled]", true, (((                // line 630
(isset($context["enabled"]) ? $context["enabled"] : null) != "0")) ? (array("checked" => "checked")) : (array()))), "popup-social-sharing", "h4");
                // line 634
                echo "

                            ";
                // line 636
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons position")),                 // line 637
$context["form"]->getselect("socialSharing[popupImageSharing][buttonsPosition]", array("top" => "top", "bottom" => "bottom", "left" => "left", "right " => "right "), $this->getAttribute($this->getAttribute($this->getAttribute(                // line 644
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "popupImageSharing", array()), "buttonsPosition", array()), array("style" => "width: 200px")), "popup-sharing-buttons-position");
                // line 646
                echo "

                            ";
                // line 648
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons align")),                 // line 649
$context["form"]->getselect("socialSharing[popupImageSharing][buttonsAlignHorizontal]", array("left" => "left", "center" => "center", "right" => "right"), $this->getAttribute($this->getAttribute($this->getAttribute(                // line 655
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "popupImageSharing", array()), "buttonsAlignHorizontal", array()), array("style" => "width: 200px")), "popup-sharing-buttons-align-horizontal");
                // line 657
                echo "

                            ";
                // line 659
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons align")),                 // line 660
$context["form"]->getselect("socialSharing[popupImageSharing][buttonsAlignVertical]", array("top" => "top", "middle" => "middle", "bottom" => "bottom"), $this->getAttribute($this->getAttribute($this->getAttribute(                // line 666
(isset($context["settings"]) ? $context["settings"] : null), "socialSharing", array()), "popupImageSharing", array()), "buttonsAlignVertical", array()), array("style" => "width: 200px")), "popup-sharing-buttons-align-vertical");
                // line 668
                echo "

                        ";
            } else {
                // line 671
                echo "                            <tr>
                                <td colspan=\"2\">
                                    <span>";
                // line 673
                echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("You have no Social Sharing projects for now.")), "html", null, true);
                echo " </span>
                                    <a href=\"/wp-admin/admin.php?page=supsystic-social-sharing&module=projects&action=add\"
                                       target=\"_blank\" rel=\"noopener noreferrer\"
                                    >";
                // line 676
                echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Create your first project")), "html", null, true);
                echo "</a>
                                    <span> ";
                // line 677
                echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("then just reload page with your Gallery settings, and you will see list with available Social Projects for your Gallery.")), "html", null, true);
                echo "</span>
                                </td>
                            </tr>
                        ";
            }
            // line 681
            echo "                    ";
        } else {
            // line 682
            echo "                        <tr>
                            <td colspan=\"2\">
                                <span>";
            // line 684
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("You need to install Social Share Buttons by Supsystic to use this feature.")), "html", null, true);
            echo " </span>
                                <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"/wp-admin/plugin-install.php?tab=search&type=term&s=Social+Share+Buttons+by+Supsystic\"
                                >";
            // line 686
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Install plugin")), "html", null, true);
            echo "</a>
                                <span> ";
            // line 687
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("from your admin area, or visit it's official page on Wordpress.org")), "html", null, true);
            echo " </span>
                                <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://wordpress.org/plugins/social-share-buttons-by-supsystic/\"> ";
            // line 688
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("here.")), "html", null, true);
            echo "</a>
                            </td>

                        </tr>
                    ";
        }
        // line 693
        echo "                    </tbody>
                </table>
                <div class=\"separator\"></div>
            ";
    }

    // line 722
    public function block_horizontalScroll($context, array $blocks = array())
    {
        // line 723
        echo "\t\t\t\t<table class=\"form-table\" id=\"gg-anl-horiz-scroll\">
\t\t\t\t\t<thead>
\t\t\t\t\t";
        // line 725
        $context["horizontalScrollEnabled"] = ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "horizontalScroll", array(), "any", false, true), "enabled", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "horizontalScroll", array(), "any", false, true), "enabled", array()), "false")) : ("false")) == "true");
        // line 726
        echo "\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Horizontal Scroll")), (((        // line 727
$context["form"]->getradio("horizontalScroll[enabled]", "true", Twig_SupTwg_array_merge(array("id" => "horizontal-scroll-enable"), (((isset($context["horizontalScrollEnabled"]) ? $context["horizontalScrollEnabled"] : null)) ? (array("checked" => "checked")) : (array())))) .         // line 728
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "horizontal-scroll-enable")) .         // line 729
$context["form"]->getradio("horizontalScroll[enabled]", "false", Twig_SupTwg_array_merge(array("id" => "horizontal-scroll-disable"), (((isset($context["horizontalScrollEnabled"]) ? $context["horizontalScrollEnabled"] : null)) ? (array()) : (array("checked" => "checked")))))) .         // line 730
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "horizontal-scroll-disable")), "horizontal-scroll", true);
        echo "
\t\t\t\t\t</thead>
\t\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 733
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Scroll Bar Color")),         // line 734
$context["form"]->gettext("horizontalScroll[color]", $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "horizontalScroll", array()), "color", array()), array("class" => "gg-color-picker")), "horizontal-scroll-color");
        echo "

\t\t\t\t\t";
        // line 736
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Scroll Bar Transparency")),         // line 737
$context["form"]->getselect("horizontalScroll[transparency]", array("0" => "0%", "10" => "10%", "20" => "20%", "30" => "30%", "40" => "40%", "50" => "50%", "60" => "60%", "70" => "70%", "80" => "80%", "90" => "90%", "100" => "100%"), (($this->getAttribute($this->getAttribute(        // line 751
(isset($context["settings"]) ? $context["settings"] : null), "horizontalScroll", array(), "any", false, true), "transparency", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "horizontalScroll", array(), "any", false, true), "transparency", array()), "60")) : ("60")), array("style" => "width: auto")), "horizontal-scroll-transparency");
        // line 752
        echo "

\t\t\t\t\t";
        // line 754
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Mouse Wheel Scroll Step")),         // line 755
$context["form"]->gettext("horizontalScroll[mouseWheelStep]", (($this->getAttribute($this->getAttribute(        // line 757
(isset($context["settings"]) ? $context["settings"] : null), "horizontalScroll", array(), "any", false, true), "mouseWheelStep", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "horizontalScroll", array(), "any", false, true), "mouseWheelStep", array()), 20)) : (20)), array()), "hscroll-mouse-wheel");
        // line 761
        echo "

\t\t\t\t\t";
        // line 763
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Touch Scroll Step")),         // line 764
$context["form"]->gettext("horizontalScroll[touchStep]", (($this->getAttribute($this->getAttribute(        // line 766
(isset($context["settings"]) ? $context["settings"] : null), "horizontalScroll", array(), "any", false, true), "touchStep", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "horizontalScroll", array(), "any", false, true), "touchStep", array()), 200)) : (200)), array()), "hscroll-touch-gest");
        // line 770
        echo "

\t\t\t\t\t";
        // line 772
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Responsive Mode")),         // line 773
$context["form"]->getselect("horizontalScroll[responsiveMode]", array("0" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("None")), "1" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("One by One"))), (($this->getAttribute($this->getAttribute(        // line 778
(isset($context["settings"]) ? $context["settings"] : null), "horizontalScroll", array(), "any", false, true), "responsiveMode", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "horizontalScroll", array(), "any", false, true), "responsiveMode", array()), "0")) : ("0")), array("style" => "width: auto")), "hScrollResponsiveMode");
        // line 782
        echo "

\t\t\t\t\t";
        // line 784
        $this->displayBlock('horizontalScrollAfter', $context, $blocks);
        // line 786
        echo "\t\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t\t<div class=\"separator\"></div>
\t\t\t";
    }

    // line 784
    public function block_horizontalScrollAfter($context, array $blocks = array())
    {
        // line 785
        echo "\t\t\t\t\t";
    }

    // line 791
    public function block_border($context, array $blocks = array())
    {
        // line 792
        echo "                <table class=\"form-table\" name=\"border\" id=\"gg-anl-border-type\">
                    <thead>
                        ";
        // line 809
        echo "
                        ";
        // line 810
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Border Type")), (        // line 811
$context["form"]->getselect("thumbnail[border][type]", (isset($context["borderTypes"]) ? $context["borderTypes"] : null), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "type", array()), array("style" => "width: auto;")) .         // line 812
$context["form"]->getinput("text", "border-type", "Example", array("style" => "margin-top: -2px; height: 27px; width: 70px; border: 1px solid black; display:none;"))), "border-type", "gallery-borders");
        echo "

                        ";
        // line 814
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Border color")),         // line 815
$context["form"]->getinput("text", "thumbnail[border][color]", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "color", array()), array("class" => "gg-color-picker")), "border-color");
        echo "

                        ";
        // line 817
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Border width")), (        // line 818
$context["form"]->getinput("number", "thumbnail[border][width]", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "border", array()), "width", array()), array("style" => array("width" => "140px;"))) .         // line 819
$context["form"]->getspan("", "pixels")), "border-width");
        echo "
                    </thead>
                </table>
                <div class=\"separator\"></div>
            ";
    }

    // line 825
    public function block_shadow($context, array $blocks = array())
    {
        // line 826
        echo "                <table class=\"form-table\" name=\"shadow\" id=\"gg-anl-shadow\">
                    <thead>
                        <tr id=\"useShadowRow\">
                            <th scope=\"row\">
                                <h3 style=\"margin: 0 !important;\">
                                    ";
        // line 831
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shadow")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 832
        echo $context["form"]->getshow_tooltip("sgg-t-shadow");
        echo "
                                </h3>
                            </th>
                            <td>
                                <input type=\"radio\" id=\"showShadow\" name=\"use_shadow\" value=\"1\" ";
        // line 836
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "use_shadow", array()) == "1")) {
            echo "checked";
        }
        echo ">
                                    ";
        // line 837
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "html", null, true);
        echo "
                                <input type=\"radio\" id=\"hideShadow\" name=\"use_shadow\" value=\"0\" ";
        // line 838
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "use_shadow", array()) != "1")) {
            echo "checked";
        }
        echo ">
                                    ";
        // line 839
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "html", null, true);
        echo "
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope=\"row\">
                                ";
        // line 846
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shadow effect preset")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t";
        // line 847
        echo $context["form"]->getshow_tooltip("sgg-t-shadow-eff-preset");
        echo "
                            </th>
                            <td>
                                <button id=\"chooseShadowPreset\" class=\"button bordered\" type=\"button\">
                                    ";
        // line 851
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose preset")), "html", null, true);
        echo "
                                </button>
                            </td>
                        </tr>

                        <tr id=\"useMouseShadowRow\">
                            <th scope=\"row\">
                                ";
        // line 858
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("When mouse is over")), "html", null, true);
        echo "
                                ";
        // line 859
        echo $context["form"]->getshow_tooltip("when-mouse-is-over");
        echo "
                            </th>
                            <td>
                                <select id=\"useMouseOverShadow\" style=\"width: auto;\" name=\"mouse_shadow\">
                                    <option value=\"0\" ";
        // line 863
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "mouse_shadow", array()) == "0")) {
            echo "selected=\"selected\"";
        }
        echo ">
                                        ";
        // line 864
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Off")), "html", null, true);
        echo "
                                    </option>
                                    <option value=\"1\" ";
        // line 866
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "mouse_shadow", array()) == "1")) {
            echo "selected=\"selected\"";
        }
        echo ">
                                        ";
        // line 867
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show mouse on")), "html", null, true);
        echo "
                                    </option>
                                    <option value=\"2\" ";
        // line 869
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "mouse_shadow", array()) == "2")) {
            echo "selected=\"selected\"";
        }
        echo ">
                                        ";
        // line 870
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Hide mouse on")), "html", null, true);
        echo "
                                    </option>
                                </select>
                            </td>
                        </tr>

                        ";
        // line 876
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Overlay image with shadow")),         // line 877
$context["form"]->getselect("thumbnail[shadow][overlay]", array(0 => "Off", 1 => "On"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "overlay", array()), array("style" => "width: auto;")), "overlay-type");
        echo "

                        ";
        // line 879
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shadow color")),         // line 880
$context["form"]->gettext("thumbnail[shadow][color]", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "color", array()), array("style" => array("width" => "300px"), "class" => "gg-color-picker")), "shadow-color");
        echo "

                        ";
        // line 882
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shadow blur")),         // line 883
$context["form"]->getinput("number", "thumbnail[shadow][blur]", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "blur", array()), array("style" => array("width" => "auto"))), "shadow-blur");
        echo "

                        ";
        // line 885
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shadow X")),         // line 886
$context["form"]->getinput("number", "thumbnail[shadow][x]", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "x", array()), array("style" => array("width" => "auto"))), "shadow-x");
        echo "

                        ";
        // line 888
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shadow Y")),         // line 889
$context["form"]->getinput("number", "thumbnail[shadow][y]", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "shadow", array()), "y", array()), array("style" => array("width" => "auto"))), "shadow-y");
        echo "
                    </tbody>
                </table>
                <div class=\"separator\"></div>
            ";
    }

    // line 895
    public function block_popup($context, array $blocks = array())
    {
        // line 896
        echo "                <table class=\"form-table\" id=\"gg-anl-popup\">
                    <thead>
                        ";
        // line 899
        echo "                        ";
        $context["popUpEnabled"] = ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "enabled", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "enabled", array()), "true")) : ("true")) == "true");
        // line 900
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Pop-up Image")), (((        // line 901
$context["form"]->getradio("box[enabled]", "true", Twig_SupTwg_array_merge(array("id" => "box-enable"), ((        // line 904
(isset($context["popUpEnabled"]) ? $context["popUpEnabled"] : null)) ? (array("checked" => "checked")) : (array())))) .         // line 906
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "box-enable")) .         // line 910
$context["form"]->getradio("box[enabled]", "false", Twig_SupTwg_array_merge(array("id" => "box-disable"), ((        // line 913
(isset($context["popUpEnabled"]) ? $context["popUpEnabled"] : null)) ? (array()) : (array("checked" => "checked")))))) .         // line 915
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "box-disable")), "box", true);
        // line 919
        echo "
                    </thead>
                    <tbody>
                        ";
        // line 923
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Popup box theme")), ((        // line 924
$context["form"]->getbutton("chooseTheme", call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose theme")), array("class" => "button bordered", "id" => "chooseTheme")) .         // line 929
$context["form"]->gethidden("box[type]", $this->getAttribute($this->getAttribute(        // line 931
(isset($context["settings"]) ? $context["settings"] : null), "box", array()), "type", array()))) .         // line 933
$context["form"]->gethidden("box[theme]", $this->getAttribute($this->getAttribute(        // line 935
(isset($context["settings"]) ? $context["settings"] : null), "box", array()), "theme", array()), array("id" => "bigImageTheme"))), "sgg-t-popup-theme");
        // line 938
        echo "

                        ";
        // line 941
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable popup border")),         // line 942
$context["form"]->getcheckbox("popup[border][enable]", "on", ((($this->getAttribute($this->getAttribute($this->getAttribute(        // line 945
(isset($context["settings"]) ? $context["settings"] : null), "popup", array()), "border", array()), "enable", array()) == "on")) ? (array("checked" => "checked")) : (array()))), "popup-border-enable");
        // line 948
        echo "

                        ";
        // line 950
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Pop up border type")),         // line 951
$context["form"]->getselect("popup[border][type]", (isset($context["borderTypes"]) ? $context["borderTypes"] : null), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "popup", array()), "border", array()), "type", array()), array("style" => "width: auto;")), "border-type-popup");
        // line 952
        echo "

                        ";
        // line 954
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Pop up border color")),         // line 955
$context["form"]->getinput("text", "popup[border][color]", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "popup", array()), "border", array()), "color", array()), array("class" => "gg-color-picker")), "border-color-popup");
        echo "

                        ";
        // line 957
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Pop up border width")), (        // line 958
$context["form"]->getinput("number", "popup[border][width]", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "popup", array()), "border", array()), "width", array()), array("style" => array("width" => "140px;"))) .         // line 959
$context["form"]->getspan("", "pixels")), "border-width-popup");
        echo "

                        ";
        // line 962
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable on mobile")),         // line 963
$context["form"]->getcheckbox("box[mobile]", "on", ((($this->getAttribute($this->getAttribute(        // line 966
(isset($context["settings"]) ? $context["settings"] : null), "box", array()), "mobile", array()) == "on")) ? (array("checked" => "checked")) : (array()))), "mobile");
        // line 969
        echo "

                        ";
        // line 972
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Popup Image Text")),         // line 973
$context["form"]->getselect("box[imageText]", array("data-caption" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Caption")), "data-title" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Title")), "alt" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Alt text")), "data-description" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Description"))), (($this->getAttribute($this->getAttribute(        // line 981
(isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "imageText", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "imageText", array()), "data-description")) : ("data-description")), array("style" => "width: 150px")), "popup-image-text");
        // line 984
        echo "

                        ";
        // line 987
        echo "                        ";
        $this->displayBlock('popupLinkedImageText', $context, $blocks);
        // line 1012
        echo "
\t\t\t\t\t\t";
        // line 1014
        echo "\t\t\t\t\t\t";
        $this->displayBlock('disableSourceImageForLi', $context, $blocks);
        // line 1033
        echo "
                        ";
        // line 1035
        echo "                        ";
        $this->displayBlock('enableDownloadPhotosButton', $context, $blocks);
        // line 1054
        echo "
                        ";
        // line 1056
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Hide Popup Captions")),         // line 1057
$context["form"]->getcheckbox("box[captions]", "on", ((($this->getAttribute($this->getAttribute(        // line 1060
(isset($context["settings"]) ? $context["settings"] : null), "box", array()), "captions", array()) == "on")) ? (array("checked" => "checked")) : (array()))), "captions");
        // line 1063
        echo "

\t\t\t\t\t\t";
        // line 1065
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Hide long captions")),         // line 1066
$context["form"]->getcheckbox("hideLongTooltipTitles", "on", ((($this->getAttribute(        // line 1069
(isset($context["settings"]) ? $context["settings"] : null), "hideLongTooltipTitles", array()) == "on")) ? (array("checked" => "checked")) : (array()))), "hide-long-tooltip-titles");
        // line 1071
        echo "

                        ";
        // line 1074
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Background color")),         // line 1075
$context["form"]->gettext("box[background]", $this->getAttribute($this->getAttribute(        // line 1077
(isset($context["settings"]) ? $context["settings"] : null), "box", array()), "background", array()), array("class" => "gg-color-picker")), "box-background");
        // line 1081
        echo "

                        ";
        // line 1084
        echo "\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Background transparency")),         // line 1085
$context["form"]->getselect("box[transparency]", array("0" => "0%", "10" => "10%", "20" => "20%", "30" => "30%", "40" => "40%", "50" => "50%", "60" => "60%", "70" => "70%", "80" => "80%", "90" => "90%", "100" => "100%"), (($this->getAttribute($this->getAttribute(        // line 1100
(isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "transparency", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "transparency", array()), 30)) : (30)), array("style" => "width: auto")), "box-transparency");
        // line 1103
        echo "

                        ";
        // line 1106
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Slideshow")),         // line 1107
$context["form"]->getselect("box[slideshow]", array("true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable"))), (($this->getAttribute($this->getAttribute(        // line 1110
(isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "slideshow", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "slideshow", array()), "false")) : ("false")), array("style" => "width: auto")), "slideshow", "h4");
        // line 1115
        echo "

                        ";
        // line 1118
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Slideshow speed")),         // line 1119
$context["form"]->getinput("number", "box[slideshowSpeed]", (($this->getAttribute($this->getAttribute(        // line 1122
(isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "slideshowSpeed", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "slideshowSpeed", array()), 2500)) : (2500)), array("style" => array("width" => "auto")), "box-slideshowSpeed"), "sgg-t-popup-slide-show-speed");
        // line 1126
        echo "

                        ";
        // line 1129
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Slideshow pause on hover")),         // line 1130
$context["form"]->getselect("box[popupHoverStop]", array("true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes")), "false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No"))), (($this->getAttribute($this->getAttribute(        // line 1133
(isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "popupHoverStop", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "popupHoverStop", array()), "true")) : ("true")), array("style" => "width: auto"), "box-popupHoverStop"), "popupHoverStop");
        // line 1138
        echo "

                        ";
        // line 1141
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Slideshow autostart")),         // line 1142
$context["form"]->getselect("box[slideshowAuto]", array("true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes")), "false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No"))), (($this->getAttribute($this->getAttribute(        // line 1145
(isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "slideshowAuto", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "box", array(), "any", false, true), "slideshowAuto", array()), "false")) : ("false")), array("style" => "width: auto"), "box-slideshowAuto"), "sgg-t-popup-slideshow-autostart");
        // line 1149
        echo "

                        ";
        // line 1152
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Popup Image size")), (((        // line 1153
$context["form"]->getinput("number", "box[popupwidth]", $this->getAttribute($this->getAttribute(        // line 1156
(isset($context["settings"]) ? $context["settings"] : null), "box", array()), "popupwidth", array()), array("style" => array("width" => "60px"))) .         // line 1159
$context["form"]->getspan("", "x")) .         // line 1160
$context["form"]->getinput("number", "box[popupheight]", $this->getAttribute($this->getAttribute(        // line 1163
(isset($context["settings"]) ? $context["settings"] : null), "box", array()), "popupheight", array()), array("style" => array("width" => "60px")))) .         // line 1166
$context["form"]->getspan("", "pixels")), "box-popupsize");
        // line 1168
        echo "


                        ";
        // line 1172
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable browser history")),         // line 1174
$context["form"]->getcheckbox("box[disableHistory]", "true", ((($this->getAttribute($this->getAttribute(        // line 1177
(isset($context["settings"]) ? $context["settings"] : null), "box", array()), "disableHistory", array()) == "true")) ? (array("checked" => "checked")) : (array()))), "box-disableHistory");
        // line 1180
        echo "

                        ";
        // line 1183
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable change url")),         // line 1185
$context["form"]->getcheckbox("box[disableChangeUrl]", "true", ((($this->getAttribute($this->getAttribute(        // line 1188
(isset($context["settings"]) ? $context["settings"] : null), "box", array()), "disableChangeUrl", array()) == "true")) ? (array("checked" => "checked")) : (array()))), "box-disableChangeUrl");
        // line 1191
        echo "

                        ";
        // line 1194
        echo "                        ";
        $this->displayBlock('popupAfter', $context, $blocks);
        // line 1274
        echo "                    </tbody>
                </table>
\t\t\t\t";
        // line 1276
        echo $context["form"]->gethidden("popup[placementType]", (($this->getAttribute($this->getAttribute(        // line 1278
(isset($context["settings"]) ? $context["settings"] : null), "popup", array(), "any", false, true), "placementType", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "popup", array(), "any", false, true), "placementType", array()), 0)) : (0)), array("id" => "popupPlacementTypeHidden"));
        // line 1280
        echo "
                <div class=\"separator\"></div>
            ";
    }

    // line 987
    public function block_popupLinkedImageText($context, array $blocks = array())
    {
        // line 988
        echo "                            <tr>
                                <th scope=\"row\">
                                    <label style=\"margin: 0 !important;\">
                                        ";
        // line 991
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Popup Linked Image Text")), "html", null, true);
        echo "
                                        ";
        // line 992
        echo $context["form"]->getshow_tooltip("popupLinkedImageTextPro");
        echo "
                                        <br />
                                        <label><a href=\"";
        // line 994
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=linkedImageText&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\" style=\"color: #0074a2; font-size: 10px; text-decoration: none;\">PRO Option</a> </label>
                                    </label>
                                </th>
                                <td>
                                    ";
        // line 998
        echo $context["form"]->getselect("box[linkedImageTextFree]", array("data-title" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Title")), "alt" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Alt text")), "data-description" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Description"))), "data-title", array("style" => "width: 150px", "disabled" => "", "id" => "ptsLinkTextChoose"));
        // line 1008
        echo "
                                </td>
                            </tr>
                        ";
    }

    // line 1014
    public function block_disableSourceImageForLi($context, array $blocks = array())
    {
        // line 1015
        echo "\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label style=\"margin: 0 !important;\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1018
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable source image for Linked Images")), "html", null, true);
        echo "
                                        ";
        // line 1019
        echo $context["form"]->getshow_tooltip("disableSourceImageForLiPro");
        echo "
\t\t\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t\t\t<label><a href=\"";
        // line 1021
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=linkedImageText&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\" style=\"color: #0074a2; font-size: 10px; text-decoration: none;\">PRO Option</a> </label>
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t";
        // line 1025
        echo $context["form"]->getcheckbox("box[disableSourceImageForLiFree]", "1", array("disabled" => "disabled"));
        // line 1029
        echo "
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
    }

    // line 1035
    public function block_enableDownloadPhotosButton($context, array $blocks = array())
    {
        // line 1036
        echo "                            <tr>
                                <th scope=\"row\">
                                    <label style=\"margin: 0 !important;\">
                                        ";
        // line 1039
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable Download Photos Button")), "html", null, true);
        echo "
                                        ";
        // line 1040
        echo $context["form"]->getshow_tooltip("enableDownloadPhotosButtonPro");
        echo "
                                        <br />
                                        <label><a href=\"";
        // line 1042
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=linkedImageText&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\" style=\"color: #0074a2; font-size: 10px; text-decoration: none;\">PRO Option</a> </label>
                                    </label>
                                </th>
                                <td>
                                    ";
        // line 1046
        echo $context["form"]->getcheckbox("box[enableDownloadPhotosButtonFree]", "1", array("disabled" => "disabled"));
        // line 1050
        echo "
                                </td>
                            </tr>
                        ";
    }

    // line 1194
    public function block_popupAfter($context, array $blocks = array())
    {
        // line 1195
        echo "                            ";
        // line 1196
        echo "                            ";
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Video size")), "utm_source=plugin&utm_medium=video&utm_campaign=gallery", "video.size", (((        // line 1199
$context["form"]->gettext("popup[video][width]", (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1201
(isset($context["settings"]) ? $context["settings"] : null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "width", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "width", array()), "853")) : ("853")), array("style" => array("width" => "40px"), "disabled" => "")) .         // line 1204
$context["form"]->getspan("", "x")) .         // line 1205
$context["form"]->gettext("popup[video][height]", (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1207
(isset($context["settings"]) ? $context["settings"] : null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "height", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "height", array()), "480")) : ("480")), array("style" => array("width" => "40px"), "disabled" => ""))) .         // line 1210
$context["form"]->getspan("", "pixels")));
        // line 1211
        echo "

                            ";
        // line 1214
        echo "                            ";
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Autoplay video")), "utm_source=plugin&utm_medium=video&utm_campaign=gallery", "video.autoplay",         // line 1217
$context["form"]->getselect("popup[video][autoplay]", array("false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No")), "true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes"))), (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1220
(isset($context["settings"]) ? $context["settings"] : null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "autoplay", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "autoplay", array()), "false")) : ("false")), array("disabled" => "")));
        // line 1223
        echo "

                            ";
        // line 1226
        echo "                            ";
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("When video ends")), "utm_source=plugin&utm_medium=video&utm_campaign=gallery", "video.onEnd",         // line 1229
$context["form"]->getselect("popup[video][onEnd]", array("0" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Do nothing")), "1" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Open next slide")), "2" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Close popup"))), (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1236
(isset($context["settings"]) ? $context["settings"] : null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "onEnd", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "onEnd", array()), "0")) : ("0")), array("disabled" => "")));
        // line 1239
        echo "

\t\t\t\t\t\t\t";
        // line 1241
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show rotate button")), "utm_source=plugin&utm_medium=popup_show_rotate_btn&utm_campaign=gallery", "box[freeSRB]",         // line 1244
$context["form"]->getcheckbox("box[freeSRB]", 1, array("disabled" => "")));
        // line 1249
        echo "

\t\t\t\t\t\t\t";
        // line 1251
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show details button")), "utm_source=plugin&utm_medium=popup_show_details_button&utm_campaign=gallery", "box[freeSLB]",         // line 1254
$context["form"]->getcheckbox("box[freeSLB]", 1, array("disabled" => "")));
        // line 1259
        echo "



\t\t\t\t\t\t\t";
        // line 1263
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show On hover thumbnail")), "utm_source=plugin&utm_medium=popup_show_thumbnail_on_hover&utm_campaign=gallery", "box[freeSTFOH]",         // line 1266
$context["form"]->getcheckbox("box[freeSTFOH]", 1, array("disabled" => "")));
        // line 1271
        echo "

                        ";
    }

    // line 1284
    public function block_lazyload($context, array $blocks = array())
    {
        // line 1285
        echo "\t\t\t\t<table class=\"form-table\" name=\"lazyload\" id=\"gg-anl-lazyload\">
\t\t\t\t\t<thead>
\t\t\t\t\t";
        // line 1288
        echo "\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Lazy Load")), (((        // line 1289
$context["form"]->getradio("lazyload[enabled]", "1", Twig_SupTwg_array_merge(array("id" => "lazyLoadEnabled"), ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "lazyload", array()), "enabled", array()) == "1")) ? (array("checked" => "checked")) : (array())))) .         // line 1290
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "lazyLoadEnabled")) .         // line 1291
$context["form"]->getradio("lazyload[enabled]", "0", Twig_SupTwg_array_merge(array("id" => "lazyLoadDisabled"), ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "lazyload", array()), "enabled", array()) == "1")) ? (array()) : (array("checked" => "checked")))))) .         // line 1292
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "lazyLoadDisabled")), "sgg-t-lazyload-enable", true, "sggLazyLoadEnableRow");
        echo "
\t\t\t\t\t</thead>
\t\t\t\t\t<tbody>
\t\t\t\t\t\t";
        // line 1295
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Hide loader")),         // line 1297
$context["form"]->getcheckbox("lazyload[hideLoader]", "true", ((($this->getAttribute($this->getAttribute(        // line 1300
(isset($context["settings"]) ? $context["settings"] : null), "lazyload", array()), "hideLoader", array()) == "true")) ? (array("checked" => "checked")) : (array()))), "lazyload-hideLoader");
        // line 1303
        echo "
                        ";
        // line 1304
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Animation effect")),         // line 1306
$context["form"]->getselect("lazyload[animationEffect]", array("show" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("show")), "fadeIn" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("fade")), "slideDown" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("slide"))), (($this->getAttribute($this->getAttribute(        // line 1313
(isset($context["settings"]) ? $context["settings"] : null), "lazyload", array(), "any", false, true), "animationEffect", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "lazyload", array(), "any", false, true), "animationEffect", array()), "0")) : ("0"))));
        // line 1315
        echo "
                        ";
        // line 1316
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Effect duration")),         // line 1318
$context["form"]->getselect("lazyload[effectDuration]", array("400" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("default")), "0" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("none")), "200" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("fast")), "600" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("slow")), "2000" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("very slow"))), (($this->getAttribute($this->getAttribute(        // line 1327
(isset($context["settings"]) ? $context["settings"] : null), "lazyload", array(), "any", false, true), "effectDuration", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "lazyload", array(), "any", false, true), "effectDuration", array()), "400")) : ("400"))));
        // line 1329
        echo "
\t\t\t\t\t\t<input type=\"hidden\" value=\"";
        // line 1330
        echo Twig_SupTwg_escape_filter($this->env, ((isset($context["pluginUrl"]) ? $context["pluginUrl"] : null) . "/assets/img/loading.gif"), "html", null, true);
        echo "\" name=\"lazyload[defaultImgUrl]\"/>
\t\t\t\t\t\t<input type=\"hidden\" value=\"";
        // line 1331
        echo Twig_SupTwg_escape_filter($this->env, ((isset($context["pluginUrl"]) ? $context["pluginUrl"] : null) . "/assets/img/leer.png"), "html", null, true);
        echo "\" name=\"lazyload[leerImgUrl]\"/>
\t\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t";
    }

    // line 1336
    public function block_preload($context, array $blocks = array())
    {
        // line 1337
        echo "                <table class=\"form-table\" name=\"preload\" id=\"gg-anl-preloader\">
                    <thead>
                        ";
        // line 1339
        $context["preloadEnabled"] = ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "preload", array(), "any", false, true), "enabled", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "preload", array(), "any", false, true), "enabled", array()), "true")) : ("true")) == "true");
        // line 1340
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery Loader")), (((        // line 1341
$context["form"]->getradio("preload[enabled]", "true", Twig_SupTwg_array_merge(array("id" => "preload-enable"), (((isset($context["preloadEnabled"]) ? $context["preloadEnabled"] : null)) ? (array("checked" => "checked")) : (array())))) .         // line 1342
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "preload-enable")) .         // line 1343
$context["form"]->getradio("preload[enabled]", "false", Twig_SupTwg_array_merge(array("id" => "preload-disable"), (((isset($context["preloadEnabled"]) ? $context["preloadEnabled"] : null)) ? (array()) : (array("checked" => "checked")))))) .         // line 1344
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "preload-disable")), "preload", true);
        echo "
                    </thead>
                ";
        // line 1346
        if ( !$this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "isPro", array(), "method")) {
            // line 1347
            echo "                    <tbody>
                        <tr id=\"preload-background\">
                            <th scope=\"row\">
                                <label style=\"margin: 0 !important;\">
                                    ";
            // line 1351
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Background color")), "html", null, true);
            echo "
                                    <br />
                                    <label><a href=\"";
            // line 1353
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=loader&utm_campaign=gallery")), "html", null, true);
            echo "\" target=\"_blank\" style=\"color: #0074a2; font-size: 10px; text-decoration: none;\">PRO Option</a> </label>
                                </label>
                            </th>
                            <td>
                                ";
            // line 1357
            echo $context["form"]->gettext("preload[background]", "#0073AA", array("class" => "gg-color-picker", "id" => "preloadColor-free"));
            echo "
                            </td>
                        </tr>
                        ";
            // line 1360
            $context["piconImg"] = ('' === $tmp = "                            <div class=\"gallery-loading\">
                                <div class=\"blocks\">
                                    <div class=\"block\"></div>
                                    <div class=\"block\"></div>
                                    <div class=\"block\"></div>
                                    <div class=\"block\"></div>
                                </div>
                            </div>
                        ") ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
            // line 1370
            echo "
                        <tr>
                            <th scope=\"row\">
                                <label style=\"margin: 0 !important;\">
                                    ";
            // line 1374
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose Icon")), "html", null, true);
            echo "
                                    ";
            // line 1375
            echo $context["form"]->getshow_tooltip("chooseIconPro");
            echo "
                                    <br />
                                    <label><a href=\"";
            // line 1377
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=loader&utm_campaign=gallery")), "html", null, true);
            echo "\" target=\"_blank\" style=\"color: #0074a2; font-size: 10px; text-decoration: none;\">PRO Option</a> </label>
                                </label>
                            </th>
                            <td>
                                ";
            // line 1381
            echo $context["form"]->getbutton("buttons-preload-icon", "Choose Icon", array("class" => "button button-primary", "id" => "choosePreicon-free"));
            echo "
                                ";
            // line 1382
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["piconImg"]) ? $context["piconImg"] : null), "html", null, true);
            echo "
                            </td>
                        </tr>
                    </tbody>
                ";
        }
        // line 1387
        echo "                </table>
            ";
    }

    // line 1390
    public function block_attributes($context, array $blocks = array())
    {
        // line 1391
        echo "                <table class=\"form-table\" name=\"attributes\" id=\"gg-anl-attributes\">
                    <thead>
                    \t";
        // line 1393
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Custom Attributes")), "utm_source=plugin&utm_campaign=gallery", "customAttributes", (((        // line 1396
$context["form"]->getradio("attributes[enabled]", "true", array("id" => "attributes-enable", "disabled" => "disabled")) .         // line 1397
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "attributes-enable")) .         // line 1398
$context["form"]->getradio("attributes[enabled]", "false", array("id" => "attributes-disable", "checked" => "checked", "disabled" => "disabled"))) .         // line 1399
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "attributes-disable")), true, 1);
        // line 1400
        echo "
                    </thead>
                </table>
            ";
    }

    // line 1405
    public function block_additionalCaptionSettings($context, array $blocks = array())
    {
        // line 1406
        echo "\t\t\t\t<table class=\"form-table\" name=\"captionAdditSett\" id=\"gg-anl-caption-add-sett\">
\t\t\t\t\t<thead>
\t\t\t\t\t\t";
        // line 1408
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Thumbnail transformations")), "utm_source=plugin&utm_medium=additinalCaptionSettings&utm_campaign=gallery", "additionalCaptionSettingInPro", (((        // line 1411
$context["form"]->getradio("captionEffectSettings[Enable]", 1, array("id" => "captEffSettEnable", "class" => "captAdditEffectSettEnbl", "disabled" => "disabled")) .         // line 1416
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "captEffSettEnable")) .         // line 1420
$context["form"]->getradio("captionEffectSettings[Enable]", 0, array("id" => "captEffDisable", "class" => "captAdditEffectSettEnbl", "checked" => "checked", "disabled" => "disabled"))) .         // line 1425
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "captEffDisable")), true, 1);
        // line 1431
        echo "
\t\t\t\t\t</thead>
\t\t\t\t</table>
\t\t\t";
    }

    // line 1442
    public function block_post($context, array $blocks = array())
    {
        // line 1443
        echo "            <div data-tab=\"post\">
                <h1 style=\"line-height: 1;\">
                    ";
        // line 1445
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Posts layout")), "html", null, true);
        echo "
                    ";
        // line 1446
        echo $context["form"]->getshow_tooltip("postsLayoutPro");
        echo "
                    </br>
                    <a class=\"button get-pro\" target=\"_blank\"
                       href=\"";
        // line 1449
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=postfeed&utm_campaign=gallery")), "html", null, true);
        echo "\">Get
                        PRO for 39\$</a>
                </h1>

                <div>
                    <a href=\"";
        // line 1454
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=postfeed&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">
                        <img style=\"max-width:796px;\" src=\"";
        // line 1455
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "getModule", array(0 => "core"), "method"), "getCdnUrl", array(), "method"), "html", null, true);
        echo "_assets/gallery/img/settings/posts_layout.gif\" title=\"Available in PRO version\" />
                    </a>
                </div>
            </div>
        ";
    }

    // line 1509
    public function block_captionSettingsType($context, array $blocks = array())
    {
        // line 1510
        echo "\t\t\t\t<table class=\"form-table captions-settings-type\" name=\"captionSettingsType\">
\t\t\t\t\t<tbody>
\t\t\t\t\t\t";
        // line 1512
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Use Caption Builder")), "utm_source=plugin&utm_medium=caption_settings_type&utm_campaign=gallery", "caption-settings-type-pro", (((        // line 1515
$context["form"]->getradio("captionBuilder[enabled]", 1, array("id" => "ggsShowUserCaptionBuilder", "class" => "ggUserCaptionBuilderCl", "disabled" => "disabled")) .         // line 1520
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "ggsShowUserCaptionBuilder")) .         // line 1524
$context["form"]->getradio("captionBuilder[enabled]", 0, array("id" => "ggsHideUserCaptionBuilder", "class" => "ggUserCaptionBuilderCl", "disabled" => "disabled", "checked" => "checked"))) .         // line 1529
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "ggsHideUserCaptionBuilder")), "useCaptionBuilder", true);
        // line 1535
        echo "
\t\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t";
    }

    // line 1550
    public function block_overlaySettings($context, array $blocks = array())
    {
        // line 1551
        echo "\t\t\t\t\t\t<table class=\"form-table\" name=\"captions\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t";
        // line 1554
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Captions")), (((        // line 1555
$context["form"]->getradio("thumbnail[overlay][enabled]", "true", Twig_SupTwg_array_merge(array("id" => "showCaptions"), ((        // line 1558
(isset($context["enableCaptions"]) ? $context["enableCaptions"] : null)) ? (array("checked" => "checked")) : (array())))) .         // line 1560
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "showCaptions")) .         // line 1564
$context["form"]->getradio("thumbnail[overlay][enabled]", "false", Twig_SupTwg_array_merge(array("id" => "hideCaptions"), ((        // line 1567
(isset($context["enableCaptions"]) ? $context["enableCaptions"] : null)) ? (array()) : (array("checked" => "checked")))))) .         // line 1569
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "hideCaptions")), "sgg-ci-caption-enable", true, "useCaptions");
        // line 1574
        echo "

\t\t\t\t\t\t\t";
        // line 1577
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Effect")),         // line 1578
$context["form"]->getbutton("", call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose effect")), array("id" => "chooseEffect", "class" => "button bordered")), "chooseEffect");
        // line 1584
        echo "

\t\t\t\t\t\t\t";
        // line 1587
        echo "\t\t\t\t\t\t\t";
        $this->displayBlock('backgroundImageForHoverEffect', $context, $blocks);
        // line 1602
        echo "
\t\t\t\t\t\t\t";
        // line 1604
        echo "\t\t\t\t\t\t\t";
        $this->displayBlock('backgroundColorForShowOnHover', $context, $blocks);
        // line 1617
        echo "
\t\t\t\t\t\t\t";
        // line 1619
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Personal captions")),         // line 1620
$context["form"]->getselect("thumbnail[overlay][personal]", array("true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable"))), (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1623
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "personal", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "personal", array()), "false")) : ("false")), array("style" => "width: auto;")), "overlay-personal");
        // line 1627
        echo "

\t\t\t\t\t\t\t";
        // line 1630
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Polaroid Style")),         // line 1631
$context["form"]->getselect("", array("true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable"))),         // line 1634
(isset($context["polaroidIsEnable"]) ? $context["polaroidIsEnable"] : null), array("style" => "width: auto;", "class" => "polaroid-effect-class")), "polaroid-effect", "h4");
        // line 1639
        echo "

\t\t\t\t\t\t\t";
        // line 1642
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Polaroid Image Animation")),         // line 1643
$context["form"]->getselect("thumbnail[overlay][polaroidAnimation]", array("true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable"))), (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1646
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidAnimation", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidAnimation", array()), "true")) : ("true")), array("style" => "width: auto;")), "polaroid-animation");
        // line 1650
        echo "

\t\t\t\t\t\t\t";
        // line 1653
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Polaroid Image Scattering ")),         // line 1654
$context["form"]->getselect("thumbnail[overlay][polaroidScattering]", array("true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable"))), (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1657
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidScattering", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidScattering", array()), "true")) : ("true")), array("style" => "width: auto;")), "polaroid-scattering");
        // line 1661
        echo "

\t\t\t\t\t\t\t";
        // line 1664
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Polaroid Frame Width")),         // line 1665
$context["form"]->getinput("number", "thumbnail[overlay][polaroidFrameWidth]", (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1668
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidFrameWidth", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidFrameWidth", array()), 20)) : (20)), array("style" => array("width" => "140px"))), "polaroid-frame-width", null, "polaroid-fram-width-row");
        // line 1674
        echo "

\t\t\t\t\t\t\t";
        // line 1677
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Background color")),         // line 1678
$context["form"]->gettext("thumbnail[overlay][background]", $this->getAttribute($this->getAttribute($this->getAttribute(        // line 1680
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "background", array()), array("class" => "gg-color-picker")), "overlay-background");
        // line 1684
        echo "

\t\t\t\t\t\t\t";
        // line 1687
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Text color")),         // line 1688
$context["form"]->gettext("thumbnail[overlay][foreground]", $this->getAttribute($this->getAttribute($this->getAttribute(        // line 1690
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "foreground", array()), array("class" => "gg-color-picker")), "overlay-foreground");
        // line 1694
        echo "

\t\t\t\t\t\t\t";
        // line 1697
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Transparency")),         // line 1698
$context["form"]->getselect("thumbnail[overlay][transparency]", array(0 => "0%", 1 => "10%", 2 => "20%", 3 => "30%", 4 => "40%", 5 => "50%", 6 => "60%", 7 => "70%", 8 => "80%", 9 => "90%", 10 => "100%"), (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1701
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "transparency", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "transparency", array()), 9)) : (9)), array("style" => "width: auto;")), "overlay-transparency");
        // line 1705
        echo "

\t\t\t\t\t\t\t";
        // line 1708
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Text size")), (        // line 1709
$context["form"]->getinput("number", "thumbnail[overlay][text_size]", $this->getAttribute($this->getAttribute($this->getAttribute(        // line 1712
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size", array()), array("style" => array("width" => "140px"))) .         // line 1715
$context["form"]->getselect("thumbnail[overlay][text_size_unit]", array(0 => "pixels", 1 => "percents", 2 => "ems"), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 1718
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array("style" => "margin-top: -2px; height: 27px"))), "text-size");
        // line 1722
        echo "

\t\t\t\t\t\t\t";
        // line 1725
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Text horizontal align")),         // line 1726
$context["form"]->getselect("thumbnail[overlay][text_align]", array("left" => "Left", "right" => "Right", "center" => "Center", "auto" => "Auto"), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 1729
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_align", array()), array("style" => "width: auto;")), "text-align");
        // line 1733
        echo "

\t\t\t\t\t\t\t";
        // line 1736
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Text vertical align")),         // line 1737
$context["form"]->getselect("thumbnail[overlay][position]", array("top" => "Top", "middle" => "Middle", "bottom" => "Bottom"), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 1740
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "position", array()), array("style" => "width: auto;")), "overlay-position");
        // line 1744
        echo "

\t\t\t\t\t\t\t";
        // line 1747
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Font family")),         // line 1748
$context["form"]->getselectv("thumbnail[overlay][font_family]",         // line 1750
(isset($context["fontList"]) ? $context["fontList"] : null), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 1751
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "font_family", array()), array("style" => "width: auto;")), "font-family");
        // line 1755
        echo "


\t\t\t\t\t\t\t";
        // line 1759
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Hide image title")),         // line 1760
$context["form"]->getselect("thumbnail[tooltip]", array("false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No")), "true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes"))), $this->getAttribute($this->getAttribute(        // line 1763
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "tooltip", array()), array("style" => "width: auto;")), "tooltip");
        // line 1767
        echo "

\t\t\t\t\t\t\t";
        // line 1770
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Always show captions on mobile")),         // line 1771
$context["form"]->getselect("thumbnail[isMobile]", array("false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No")), "true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes"))), (($this->getAttribute($this->getAttribute(        // line 1774
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "isMobile", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "isMobile", array()), "false")) : ("false"))), "ismobile");
        // line 1777
        echo "

\t\t\t\t\t\t\t";
        // line 1780
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable captions on mobile")),         // line 1781
$context["form"]->getselect("thumbnail[isDisableMobileCaption]", array("false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No")), "true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes"))), (($this->getAttribute($this->getAttribute(        // line 1784
(isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "isDisableMobileCaption", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array(), "any", false, true), "isDisableMobileCaption", array()), "false")) : ("false"))), "isDisableMobileCaption");
        // line 1787
        echo "
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t</table>

\t\t\t\t\t\t<div class=\"separator\"></div>
\t\t\t\t\t";
    }

    // line 1587
    public function block_backgroundImageForHoverEffect($context, array $blocks = array())
    {
        // line 1588
        echo "\t\t\t\t\t\t\t\t";
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image on hover")), "utm_source=plugin&utm_medium=hover_caption_image_bg&utm_campaign=gallery", "overlay-effect-image-on-hover-enable",         // line 1591
$context["form"]->getselect("thumbnail[overlay][imageOnHoverEnable]", array("0" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "1" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable"))), "0", array("disabled" => "disabled")));
        // line 1600
        echo "
\t\t\t\t\t\t\t";
    }

    // line 1604
    public function block_backgroundColorForShowOnHover($context, array $blocks = array())
    {
        // line 1605
        echo "\t\t\t\t\t\t\t\t";
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Background color for \"Show on hover\"")), "utm_source=plugin&utm_medium=caption-show-on-hover&utm_campaign=gallery", "backgroundColorForShowOnHoverFree",         // line 1608
$context["form"]->getselect("thumbnail[overlay][backgroundFoShowOnHover]", array("0" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable"))), 0, array("disabled" => "disabled")));
        // line 1615
        echo "
\t\t\t\t\t\t\t";
    }

    // line 1794
    public function block_icons($context, array $blocks = array())
    {
        // line 1795
        echo "\t\t\t\t\t\t<table class=\"form-table\" name=\"icons\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t";
        // line 1797
        $context["iconsEnabled"] = ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "enabled", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "enabled", array()), "false")) : ("false")) == "true");
        // line 1798
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Icons")), (((        // line 1799
$context["form"]->getradio("icons[enabled]", "true", Twig_SupTwg_array_merge(array("id" => "icons-enable"), (((isset($context["iconsEnabled"]) ? $context["iconsEnabled"] : null)) ? (array("checked" => "checked")) : (array())))) .         // line 1800
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "icons-enable")) .         // line 1801
$context["form"]->getradio("icons[enabled]", "false", Twig_SupTwg_array_merge(array("id" => "icons-disable"), (((isset($context["iconsEnabled"]) ? $context["iconsEnabled"] : null)) ? (array()) : (array("checked" => "checked")))))) .         // line 1802
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "icons-disable")), "photo-icon", true);
        // line 1803
        echo "
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t";
        // line 1806
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Animation effects")),         // line 1807
$context["form"]->getbutton(null, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Animation")), array("class" => "button bordered", "id" => "selectIconsEffect")), "ci-icons-animation-effects");
        // line 1809
        echo "
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsColor\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1813
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Icons color")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1814
        echo $context["form"]->getshow_tooltip("ci-icons-color");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"iconsColor\" class=\"gg-color-picker\" value=\"";
        // line 1818
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "color", array()), "html", null, true);
        echo "\" name=\"icons[color]\"/>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsHoverColor\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1824
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Icons hover color")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1825
        echo $context["form"]->getshow_tooltip("ci-icons-hover-color");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"iconsHoverColor\" class=\"gg-color-picker\" value=\"";
        // line 1829
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "hover_color", array()), "html", null, true);
        echo "\" name=\"icons[hover_color]\"/>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsBackgroundColor\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1835
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Background color")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1836
        echo $context["form"]->getshow_tooltip("ci-icons-bg-color");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"iconsBackgroundColor\" class=\"gg-color-picker\" value=\"";
        // line 1840
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "background", array()), "html", null, true);
        echo "\" name=\"icons[background]\"/>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsBackgroundHoverColor\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1846
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Background hover color")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1847
        echo $context["form"]->getshow_tooltip("ci-icons-hover-bg-color");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"iconsBackgroundHoverColor\" class=\"gg-color-picker\" value=\"";
        // line 1851
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "background_hover", array()), "html", null, true);
        echo "\" name=\"icons[background_hover]\"/>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsSize\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1857
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Icons size")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1858
        echo $context["form"]->getshow_tooltip("ci-icons-hover-size");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"number\" pattern=\"[0-9]\" id=\"iconsSize\"  name=\"icons[size]\" value=\"";
        // line 1862
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "size", array()), "html", null, true);
        echo "\"/>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsMargin\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1868
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Distance between icons")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1869
        echo $context["form"]->getshow_tooltip("ci-icons-distance");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"number\" pattern=\"[0-9]\" id=\"iconsMargin\"  name=\"icons[margin]\" value=\"";
        // line 1873
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "margin", array()), "html", null, true);
        echo "\"/>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsOverlay\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1879
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show overlay")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1880
        echo $context["form"]->getshow_tooltip("ci-icons-show-overlay");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<select id=\"iconsOverlay\" name=\"icons[overlay_enabled]\" style=\"width: auto;\">
\t\t\t\t\t\t\t\t\t\t<option value=\"true\" ";
        // line 1885
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_enabled", array()), "true");
        echo ">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1886
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"false\" ";
        // line 1888
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_enabled", array()), "false");
        echo ">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1889
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr class=\"icons-overlay-toggle\">
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsOverlayColor\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1897
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Overlay color")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1898
        echo $context["form"]->getshow_tooltip("ci-icons-overlay-color");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"iconsOverlayColor\" class=\"gg-color-picker\" value=\"";
        // line 1902
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_color", array()), "html", null, true);
        echo "\" name=\"icons[overlay_color]\"/>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr class=\"icons-overlay-toggle\">
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsOverlayTransparency\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1908
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Overlay transparency")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1909
        echo $context["form"]->getshow_tooltip("ci-icons-overlay-transparency");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<select id=\"iconsOverlayTransparency\" name=\"icons[overlay_transparency]\" style=\"width: auto;\">
\t\t\t\t\t\t\t\t\t\t<option value=\"0\" ";
        // line 1914
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_transparency", array()), 0);
        echo ">0%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"1\" ";
        // line 1915
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_transparency", array()), 1);
        echo ">10%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"2\" ";
        // line 1916
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_transparency", array()), 2);
        echo ">20%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"3\" ";
        // line 1917
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_transparency", array()), 3);
        echo ">30%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"4\" ";
        // line 1918
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_transparency", array()), 4);
        echo ">40%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"5\" ";
        // line 1919
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_transparency", array()), 5);
        if ( !$this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "overlay_transparency", array(), "any", true, true)) {
            echo "selected=\"selected\"";
        }
        echo ">50%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"6\" ";
        // line 1920
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_transparency", array()), 6);
        echo ">60%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"7\" ";
        // line 1921
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_transparency", array()), 7);
        echo ">70%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"8\" ";
        // line 1922
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_transparency", array()), 8);
        echo ">80%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"9\" ";
        // line 1923
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_transparency", array()), 9);
        echo ">90%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"10\" ";
        // line 1924
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_transparency", array()), 10);
        echo ">100%</option>
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t";
        // line 1928
        echo $this->getAttribute($this, "showFewIconsBy", array(0 => (isset($context["settings"]) ? $context["settings"] : null), 1 => (isset($context["form"]) ? $context["form"] : null), 2 => 0), "method");
        echo "
\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t</table>
\t\t\t\t\t\t<div class=\"separator\"></div>
\t\t\t\t\t";
    }

    // line 1935
    public function block_proCaptionAndIconSettings($context, array $blocks = array())
    {
        // line 1936
        echo "\t\t\t\t\t";
    }

    // line 1939
    public function block_exifCaptionSettings($context, array $blocks = array())
    {
        // line 1940
        echo "\t\t\t\t\t<table class=\"form-table\" name=\"captions\">
\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<h1 style=\"line-height: 1;\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1945
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show EXIF data")), "html", null, true);
        echo "
                                        ";
        // line 1946
        echo $context["form"]->getshow_tooltip("showExifDataPro");
        echo "</br>
\t\t\t\t\t\t\t\t\t\t<a class=\"button get-pro\" href=\"";
        // line 1947
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=exif-data&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1948
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("GetPRO for 39\$")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</h1>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t\t";
    }

    // line 1960
    public function block_categories($context, array $blocks = array())
    {
        // line 1961
        echo "            <div data-tab=\"cats\">
                <h1 style=\"line-height: 1;\">
                    ";
        // line 1963
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Categories")), "html", null, true);
        echo "
                    ";
        // line 1964
        echo $context["form"]->getshow_tooltip("categoriesPro");
        echo "</br>
                    </br>
                    <a class=\"button get-pro\" target=\"_blank\"
                       href=\"";
        // line 1967
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=categories&utm_campaign=gallery")), "html", null, true);
        echo "\">Get PRO</a>
                </h1>

                <div>
                    <a href=\"";
        // line 1971
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=categories&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">
                        <img style=\"max-width:600px;\" src=\"";
        // line 1972
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "getModule", array(0 => "core"), "method"), "getCdnUrl", array(), "method"), "html", null, true);
        echo "_assets/gallery/img/settings/categories.gif\" title=\"Available in PRO version\" />
                    </a>
                </div>
                ";
        // line 1975
        $this->displayBlock('pagination', $context, $blocks);
        // line 1991
        echo "            </div>
        ";
    }

    // line 1975
    public function block_pagination($context, array $blocks = array())
    {
        // line 1976
        echo "                    <h1 style=\"line-height: 1;\">
                        ";
        // line 1977
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Pagination")), "html", null, true);
        echo "
                        ";
        // line 1978
        echo $context["form"]->getshow_tooltip("paginationPro");
        echo "</br>
                        </br>
                        <a class=\"button get-pro\" target=\"_blank\"
                           href=\"";
        // line 1981
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=pages&utm_campaign=gallery")), "html", null, true);
        echo "\">Get PRO</a>
                    </h1>
                    <div name=\"pagination\">
                        <div>
                            <a href=\"";
        // line 1985
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=pages&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">
                                <img style=\"max-width:600px;\" src=\"";
        // line 1986
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "getModule", array(0 => "core"), "method"), "getCdnUrl", array(), "method"), "html", null, true);
        echo "_assets/gallery/img/settings/pagination.gif\" title=\"Available in PRO version\" />
                            </a>
                        </div>
                    </div>
                ";
    }

    // line 1994
    public function block_watermark($context, array $blocks = array())
    {
        // line 1995
        echo "            <div data-tab=\"water-m-tab\">
                <h1 style=\"line-height: 1em;\">
                    <a class=\"button get-pro\" target=\"_blank\"
                       href=\"";
        // line 1998
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=watermarks&utm_campaign=gallery")), "html", null, true);
        echo "\">Get PRO for 39\$</a>
                </h1>
                <div>
                    <a href=\"";
        // line 2001
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=watermarks&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">
                        <img src=\"";
        // line 2002
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["environment"]) ? $context["environment"] : null), "module", array(0 => "galleries"), "method"), "getLocationUrl", array(), "method"), "html", null, true);
        echo "/assets/img/water_m_pro-min.png\" />
                    </a>
                </div>
            </div>
        ";
    }

    // line 2008
    public function block_form($context, array $blocks = array())
    {
        // line 2009
        echo "        ";
    }

    // line 2139
    public function block_captionEffectInPro($context, array $blocks = array())
    {
        // line 2140
        echo "\t\t\t\t\t\t\t<figure class=\"grid-gallery-caption available-in-pro\" data-grid-gallery-type=\"";
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
        // line 2141
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=caption-show-on-hover&utm_campaign=gallery")), "html", null, true);
        echo "\" class=\"caption-available-in-pro-link\">
\t\t\t\t\t\t\t\t\t<img data-src=\"holder.js/150x150?theme=industrial&text=";
        // line 2142
        echo Twig_SupTwg_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "\" class=\"dialog-image\">
\t\t\t\t\t\t\t\t\t<figcaption style=\"";
        // line 2143
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["figcaptionStyle"]) ? $context["figcaptionStyle"] : null)), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"grid-gallery-figcaption-wrap\" style=\"width:100%;height:100%;top:0;\">
\t\t\t\t\t\t\t\t\t\t\t<div style=\"display:table;width:100%;height:100%;\">
\t\t\t\t\t\t\t\t\t\t\t\t<span ";
        // line 2146
        if (($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "rtl", array()) == true)) {
            echo "dir=\"rtl\" class=\"ggRtlClass\"";
        }
        echo " style=\"display:table-cell;font-size:";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
        echo ";padding:10px;vertical-align:";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
        echo ";\">Caption</span>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</figcaption>
\t\t\t\t\t\t\t\t\t<div class=\"get-in-pro-element\">
\t\t\t\t\t\t\t\t\t\t";
        // line 2151
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Pro Feature")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</figure>
\t\t\t\t\t\t";
    }

    // line 2201
    public function block_iconsEffects($context, array $blocks = array())
    {
        // line 2202
        echo "\t\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["iconsWithCaptionsEffects"]) ? $context["iconsWithCaptionsEffects"] : null));
        foreach ($context['_seq'] as $context["type"] => $context["name"]) {
            // line 2203
            echo "\t\t\t\t\t\t\t\t<figure class=\"grid-gallery-caption\" data-type=\"icons\" data-grid-gallery-type=\"";
            echo Twig_SupTwg_escape_filter($this->env, $context["type"], "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t<img data-src=\"holder.js/150x150?theme=industrial&text=";
            // line 2204
            echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\" class=\"dialog-image\"/>
\t\t\t\t\t\t\t\t\t<figcaption style=\"";
            // line 2205
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter((isset($context["figcaptionStyle"]) ? $context["figcaptionStyle"] : null)), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"hi-icon-wrap\" style=\"width: 48px; height: 48px; margin-top: 30%; position:relative;\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"hi-icon icon-link\" style=\"border:1px solid #ccc; border-radius:50%;margin:auto;position:absolute;left:0;right:0;top: 0;bottom: 0;\">
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</figcaption>
\t\t\t\t\t\t\t\t\t<div class=\"caption-with-";
            // line 2211
            echo Twig_SupTwg_escape_filter($this->env, $context["type"], "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t<div style=\"display: table; height:100%; width:100%;\">
\t\t\t\t\t\t\t\t\t\t\t<span style=\"padding: 10px;display:table-cell;font-size:";
            // line 2213
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\tvertical-align:";
            // line 2214
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
            echo ";\">
\t\t\t\t\t\t\t\t\t\t\t\tCaption
\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"select-element\">
\t\t\t\t\t\t\t\t\t\t";
            // line 2220
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</figure>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2224
        echo "\t\t\t\t\t\t";
    }

    // line 2422
    public function block_modals($context, array $blocks = array())
    {
        // line 2423
        echo "        <div id=\"iconsPreview\" title=\"";
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select icons effects")), "html", null, true);
        echo "\">
            ";
        // line 2425
        $context["iconsEffects"] = array("hi-icon-effect-1a" => array("padding" => "0", "bg" => "41ab6b"), "hi-icon-effect-1b" => array("padding" => "0", "bg" => "41ab6b"), "hi-icon-effect-2a" => array("padding" => "0", "bg" => "eea303"), "hi-icon-effect-2b" => array("padding" => "0", "bg" => "eea303"), "hi-icon-effect-3a" => array("padding" => "0", "bg" => "f06060"), "hi-icon-effect-3b" => array("padding" => "0", "bg" => "f06060"), "hi-icon-effect-5a" => array("padding" => "0", "bg" => "702fa8"), "hi-icon-effect-5b" => array("padding" => "0", "bg" => "702fa8"), "hi-icon-effect-5c" => array("padding" => "0", "bg" => "702fa8"), "hi-icon-effect-5d" => array("padding" => "0", "bg" => "702fa8"), "hi-icon-effect-7a" => array("padding" => "0", "bg" => "d54f30"), "hi-icon-effect-7b" => array("padding" => "0", "bg" => "d54f30"), "hi-icon-effect-9a" => array("padding" => "0", "bg" => "96a94b"), "hi-icon-effect-9b" => array("padding" => "0", "bg" => "96a94b"));
        // line 2442
        echo "            ";
        ob_start();
        // line 2443
        echo "                ";
        $this->displayBlock('icon_wrap_item_class', $context, $blocks);
        // line 2446
        echo "            ";
        $context["var_icon_wrap_item_class"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 2447
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = Twig_SupTwg_ensure_traversable((isset($context["iconsEffects"]) ? $context["iconsEffects"] : null));
        foreach ($context['_seq'] as $context["name"] => $context["p"]) {
            // line 2448
            echo "                <div class=\"hi-icon-wrap ";
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_slice($this->env, $context["name"], 0, ((isset($context["length"]) ? $context["length"] : null) - 1)), "html", null, true);
            echo " ";
            echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
            echo " holderjs\" style=\"display: inline-block; padding: ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["p"], "padding", array()), "html", null, true);
            echo "; width: 150px; height: 150px; background-color: #434A52; background-repeat: no-repeat; overflow: hidden;\">
                    <a href=\"#\" class=\"hi-icon ";
            // line 2449
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["var_icon_wrap_item_class"]) ? $context["var_icon_wrap_item_class"] : null), "html", null, true);
            echo "\" data-effect=\"";
            echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\" data-effect-base=\"";
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_slice($this->env, $context["name"], 0, ((isset($context["length"]) ? $context["length"] : null) - 1)), "html", null, true);
            echo "\" title=\"";
            echo Twig_SupTwg_escape_filter($this->env, ((call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Click on the icon to select effect")) . " ") . $context["name"]), "html", null, true);
            echo "\" style=\"\">Select</a>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2452
        echo "        </div>
\t\t<style id=\"sggSettingsIconSizeStyle\">
\t\t\t.hi-icon {
\t\t\t\twidth: ";
        // line 2455
        echo Twig_SupTwg_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "size", array()) * 2), "html", null, true);
        echo "px !important;
\t\t\t\theight: ";
        // line 2456
        echo Twig_SupTwg_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "size", array()) * 2), "html", null, true);
        echo "px !important;
\t\t\t}
\t\t</style>
\t\t<style id=\"sggSettingsIconColorStyle\">
\t\t\t.hi-icon {color: ";
        // line 2460
        echo Twig_SupTwg_escape_filter($this->env, GridGallery_Galleries_Module::hexToRgbaStr($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "color", array()), (1 - ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_transparency", array()) / 10))), "html", null, true);
        echo " !important;}
\t\t</style>
\t\t<style id=\"sggSettingsIconBgColorStyle\">
\t\t\t.hi-icon { background: ";
        // line 2463
        echo Twig_SupTwg_escape_filter($this->env, GridGallery_Galleries_Module::hexToRgbaStr($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "background", array()), (1 - ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "bgTransparency", array()) / 10))), "html", null, true);
        echo " !important; }
\t\t</style>
\t\t<style id=\"sggSettingHiIconHoverColorStyle\">
\t\t\t.hi-icon:hover { color: ";
        // line 2466
        echo Twig_SupTwg_escape_filter($this->env, GridGallery_Galleries_Module::hexToRgbaStr($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "hover_color", array()), (1 - ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "overlay_transparency", array()) / 10))), "html", null, true);
        echo " !important; }
\t\t</style>
\t\t<style id=\"sggSettingHiIconHoverBgStyle\">
\t\t\t.hi-icon:hover { background: ";
        // line 2469
        echo Twig_SupTwg_escape_filter($this->env, GridGallery_Galleries_Module::hexToRgbaStr($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "background_hover", array()), (1 - ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "bgTransparency", array()) / 10))), "html", null, true);
        echo " !important; }
\t\t</style>
\t\t<style id=\"sggSettingHiIconBeforeFontSizeStyle\">
\t\t\t.hi-icon:before {
\t\t\t\tfont-size: ";
        // line 2473
        echo Twig_SupTwg_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "size", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "size", array()), 16)) : (16)), "html", null, true);
        echo "px !important;
\t\t\t\tline-height: ";
        // line 2474
        echo Twig_SupTwg_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "size", array()) * 2), "html", null, true);
        echo "px !important;
\t\t\t}
\t\t</style>
    ";
    }

    // line 2443
    public function block_icon_wrap_item_class($context, array $blocks = array())
    {
        // line 2444
        echo "\t\t\t\t\ticon-fullscreen
                ";
    }

    // line 2479
    public function block_settingsOtherPro($context, array $blocks = array())
    {
        // line 2480
        echo "\t";
    }

    // line 2
    public function getlabel($__label__ = null, $__for__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "label" => $__label__,
            "for" => $__for__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 3
            echo "    <label for=\"";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["for"]) ? $context["for"] : null), "html", null, true);
            echo "\">";
            echo Twig_SupTwg_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true);
            echo "</label>
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

    // line 2483
    public function getshowFewIconsBy($__settings__ = null, $__form__ = null, $__isCaptionBuilder__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "settings" => $__settings__,
            "form" => $__form__,
            "isCaptionBuilder" => $__isCaptionBuilder__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2484
            echo "
\t";
            // line 2485
            $context["isShowRow"] = 0;
            // line 2486
            echo "\t";
            if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "captionBuilder", array()), "enabled", array()) == 1) && ((isset($context["isCaptionBuilder"]) ? $context["isCaptionBuilder"] : null) == 1))) {
                // line 2487
                echo "\t\t";
                $context["isShowRow"] = 1;
                // line 2488
                echo "\t";
            } elseif ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "captionBuilder", array()), "enabled", array()) != 1) && ((isset($context["isCaptionBuilder"]) ? $context["isCaptionBuilder"] : null) != 1))) {
                // line 2489
                echo "\t\t";
                $context["isShowRow"] = 1;
                // line 2490
                echo "\t";
            }
            // line 2491
            echo "    ";
            $context["showDownIcon"] = "";
            // line 2492
            echo "    ";
            if ((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "captionBuilder", array()), "enabled", array()) != 1) && ((isset($context["isCaptionBuilder"]) ? $context["isCaptionBuilder"] : null) != 1))) {
                // line 2493
                echo "        ";
                $context["showDownIcon"] = $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "show_tooltip", array(0 => "downloadIconPro"), "method");
                // line 2494
                echo "    ";
            }
            // line 2495
            echo "
\t";
            // line 2496
            if (((isset($context["isShowRow"]) ? $context["isShowRow"] : null) == 1)) {
                // line 2497
                echo "\t\t";
                echo $this->getAttribute(                // line 2498
(isset($context["form"]) ? $context["form"] : null), "row", array(0 => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show few icons by")), 1 => $this->getAttribute(                // line 2500
(isset($context["form"]) ? $context["form"] : null), "select", array(0 => "icons[showFewIcons]", 1 => array("default" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Default")), "params" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("By params"))), 2 => (($this->getAttribute($this->getAttribute(                // line 2506
(isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "showFewIcons", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "icons", array(), "any", false, true), "showFewIcons", array()), "default")) : ("default")), 3 => array("style" => "width: auto;", "id" => "showFewIconsSel")), "method"), 2 => "capt-showt-few-icons-by", 3 => "h4"), "method");
                // line 2512
                echo "
\t\t";
                // line 2513
                echo $this->getAttribute(                // line 2514
(isset($context["form"]) ? $context["form"] : null), "row", array(0 => "", 1 => (((((((($this->getAttribute(                // line 2516
(isset($context["form"]) ? $context["form"] : null), "checkbox", array(0 => "icons[isVideoIcon]", 1 => "1", 2 => Twig_SupTwg_array_merge(array("id" => "showVideoIconInp", "class" => "sggCheckboxInOneRow"), ((($this->getAttribute($this->getAttribute(                // line 2519
(isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "isVideoIcon", array()) == 1)) ? (array("checked" => "checked")) : (array())))), "method") . $this->getAttribute(                // line 2520
(isset($context["form"]) ? $context["form"] : null), "label", array(0 => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show video icon, if exists")), 1 => "showVideoIconInp", 2 => array("class" => "sggCheckboxLabelInOneRow")), "method")) . $this->getAttribute(                // line 2525
(isset($context["form"]) ? $context["form"] : null), "checkbox", array(0 => "icons[isLinkIcon]", 1 => "1", 2 => Twig_SupTwg_array_merge(array("id" => "showLinkIconInp", "class" => "sggCheckboxInOneRow"), ((($this->getAttribute($this->getAttribute(                // line 2528
(isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "isLinkIcon", array()) == 1)) ? (array("checked" => "checked")) : (array())))), "method")) . $this->getAttribute(                // line 2529
(isset($context["form"]) ? $context["form"] : null), "label", array(0 => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show link icon, if exists")), 1 => "showLinkIconInp", 2 => array("class" => "sggCheckboxLabelInOneRow")), "method")) . $this->getAttribute(                // line 2534
(isset($context["form"]) ? $context["form"] : null), "checkbox", array(0 => "icons[isPopupIcon]", 1 => "1", 2 => Twig_SupTwg_array_merge(array("id" => "showPopupIconInp", "class" => "sggCheckboxInOneRow"), ((($this->getAttribute($this->getAttribute(                // line 2537
(isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "isPopupIcon", array()) == 1)) ? (array("checked" => "checked")) : (array())))), "method")) . $this->getAttribute(                // line 2538
(isset($context["form"]) ? $context["form"] : null), "label", array(0 => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show popup")), 1 => "showPopupIconInp", 2 => array("class" => "sggCheckboxLabelInOneRow")), "method")) . $this->getAttribute(                // line 2543
(isset($context["form"]) ? $context["form"] : null), "checkbox", array(0 => "icons[isDownloadIcon]", 1 => "1", 2 => Twig_SupTwg_array_merge(Twig_SupTwg_array_merge(array("id" => "showDownloadIconInp", "class" => "sggCheckboxInOneRow"), (((($this->getAttribute($this->getAttribute(                // line 2546
(isset($context["settings"]) ? $context["settings"] : null), "icons", array()), "isDownloadIcon", array()) == 1) && ($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "captionBuilder", array()), "enabled", array()) == 1))) ? (array("checked" => "checked")) : (array()))), (((($this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "captionBuilder", array()), "enabled", array()) != 1) && ((isset($context["isCaptionBuilder"]) ? $context["isCaptionBuilder"] : null) != 1))) ? (array("data-disabled" => "disabled")) : (array())))), "method")) . $this->getAttribute(                // line 2547
(isset($context["form"]) ? $context["form"] : null), "label", array(0 => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show download")), 1 => "showDownloadIconInp", 2 => array("class" => "sggCheckboxLabelInOneRow")), "method")) .                 // line 2551
(isset($context["showDownIcon"]) ? $context["showDownIcon"] : null)), 2 => "capt-showv-few-icons-by", 3 => null, 4 => "sggFewIconsShowingRow"), "method");
                // line 2556
                echo "
\t";
            }
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
        return "@galleries/settings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  3862 => 2556,  3860 => 2551,  3859 => 2547,  3858 => 2546,  3857 => 2543,  3856 => 2538,  3855 => 2537,  3854 => 2534,  3853 => 2529,  3852 => 2528,  3851 => 2525,  3850 => 2520,  3849 => 2519,  3848 => 2516,  3847 => 2514,  3846 => 2513,  3843 => 2512,  3841 => 2506,  3840 => 2500,  3839 => 2498,  3837 => 2497,  3835 => 2496,  3832 => 2495,  3829 => 2494,  3826 => 2493,  3823 => 2492,  3820 => 2491,  3817 => 2490,  3814 => 2489,  3811 => 2488,  3808 => 2487,  3805 => 2486,  3803 => 2485,  3800 => 2484,  3786 => 2483,  3766 => 3,  3753 => 2,  3749 => 2480,  3746 => 2479,  3741 => 2444,  3738 => 2443,  3730 => 2474,  3726 => 2473,  3719 => 2469,  3713 => 2466,  3707 => 2463,  3701 => 2460,  3694 => 2456,  3690 => 2455,  3685 => 2452,  3670 => 2449,  3661 => 2448,  3656 => 2447,  3653 => 2446,  3650 => 2443,  3647 => 2442,  3645 => 2425,  3640 => 2423,  3637 => 2422,  3633 => 2224,  3623 => 2220,  3614 => 2214,  3610 => 2213,  3605 => 2211,  3596 => 2205,  3592 => 2204,  3587 => 2203,  3582 => 2202,  3579 => 2201,  3570 => 2151,  3555 => 2146,  3549 => 2143,  3545 => 2142,  3541 => 2141,  3536 => 2140,  3533 => 2139,  3529 => 2009,  3526 => 2008,  3517 => 2002,  3513 => 2001,  3507 => 1998,  3502 => 1995,  3499 => 1994,  3490 => 1986,  3486 => 1985,  3479 => 1981,  3473 => 1978,  3469 => 1977,  3466 => 1976,  3463 => 1975,  3458 => 1991,  3456 => 1975,  3450 => 1972,  3446 => 1971,  3439 => 1967,  3433 => 1964,  3429 => 1963,  3425 => 1961,  3422 => 1960,  3410 => 1948,  3406 => 1947,  3402 => 1946,  3398 => 1945,  3391 => 1940,  3388 => 1939,  3384 => 1936,  3381 => 1935,  3372 => 1928,  3365 => 1924,  3361 => 1923,  3357 => 1922,  3353 => 1921,  3349 => 1920,  3342 => 1919,  3338 => 1918,  3334 => 1917,  3330 => 1916,  3326 => 1915,  3322 => 1914,  3314 => 1909,  3310 => 1908,  3301 => 1902,  3294 => 1898,  3290 => 1897,  3279 => 1889,  3275 => 1888,  3270 => 1886,  3266 => 1885,  3258 => 1880,  3254 => 1879,  3245 => 1873,  3238 => 1869,  3234 => 1868,  3225 => 1862,  3218 => 1858,  3214 => 1857,  3205 => 1851,  3198 => 1847,  3194 => 1846,  3185 => 1840,  3178 => 1836,  3174 => 1835,  3165 => 1829,  3158 => 1825,  3154 => 1824,  3145 => 1818,  3138 => 1814,  3134 => 1813,  3128 => 1809,  3126 => 1807,  3125 => 1806,  3120 => 1803,  3118 => 1802,  3117 => 1801,  3116 => 1800,  3115 => 1799,  3113 => 1798,  3111 => 1797,  3107 => 1795,  3104 => 1794,  3099 => 1615,  3097 => 1608,  3095 => 1605,  3092 => 1604,  3087 => 1600,  3085 => 1591,  3083 => 1588,  3080 => 1587,  3071 => 1787,  3069 => 1784,  3068 => 1781,  3066 => 1780,  3062 => 1777,  3060 => 1774,  3059 => 1771,  3057 => 1770,  3053 => 1767,  3051 => 1763,  3050 => 1760,  3048 => 1759,  3043 => 1755,  3041 => 1751,  3040 => 1750,  3039 => 1748,  3037 => 1747,  3033 => 1744,  3031 => 1740,  3030 => 1737,  3028 => 1736,  3024 => 1733,  3022 => 1729,  3021 => 1726,  3019 => 1725,  3015 => 1722,  3013 => 1718,  3012 => 1715,  3011 => 1712,  3010 => 1709,  3008 => 1708,  3004 => 1705,  3002 => 1701,  3001 => 1698,  2999 => 1697,  2995 => 1694,  2993 => 1690,  2992 => 1688,  2990 => 1687,  2986 => 1684,  2984 => 1680,  2983 => 1678,  2981 => 1677,  2977 => 1674,  2975 => 1668,  2974 => 1665,  2972 => 1664,  2968 => 1661,  2966 => 1657,  2965 => 1654,  2963 => 1653,  2959 => 1650,  2957 => 1646,  2956 => 1643,  2954 => 1642,  2950 => 1639,  2948 => 1634,  2947 => 1631,  2945 => 1630,  2941 => 1627,  2939 => 1623,  2938 => 1620,  2936 => 1619,  2933 => 1617,  2930 => 1604,  2927 => 1602,  2924 => 1587,  2920 => 1584,  2918 => 1578,  2916 => 1577,  2912 => 1574,  2910 => 1569,  2909 => 1567,  2908 => 1564,  2907 => 1560,  2906 => 1558,  2905 => 1555,  2903 => 1554,  2899 => 1551,  2896 => 1550,  2889 => 1535,  2887 => 1529,  2886 => 1524,  2885 => 1520,  2884 => 1515,  2883 => 1512,  2879 => 1510,  2876 => 1509,  2867 => 1455,  2863 => 1454,  2855 => 1449,  2849 => 1446,  2845 => 1445,  2841 => 1443,  2838 => 1442,  2831 => 1431,  2829 => 1425,  2828 => 1420,  2827 => 1416,  2826 => 1411,  2825 => 1408,  2821 => 1406,  2818 => 1405,  2811 => 1400,  2809 => 1399,  2808 => 1398,  2807 => 1397,  2806 => 1396,  2805 => 1393,  2801 => 1391,  2798 => 1390,  2793 => 1387,  2785 => 1382,  2781 => 1381,  2774 => 1377,  2769 => 1375,  2765 => 1374,  2759 => 1370,  2749 => 1360,  2743 => 1357,  2736 => 1353,  2731 => 1351,  2725 => 1347,  2723 => 1346,  2718 => 1344,  2717 => 1343,  2716 => 1342,  2715 => 1341,  2713 => 1340,  2711 => 1339,  2707 => 1337,  2704 => 1336,  2696 => 1331,  2692 => 1330,  2689 => 1329,  2687 => 1327,  2686 => 1318,  2685 => 1316,  2682 => 1315,  2680 => 1313,  2679 => 1306,  2678 => 1304,  2675 => 1303,  2673 => 1300,  2672 => 1297,  2671 => 1295,  2665 => 1292,  2664 => 1291,  2663 => 1290,  2662 => 1289,  2660 => 1288,  2656 => 1285,  2653 => 1284,  2647 => 1271,  2645 => 1266,  2644 => 1263,  2638 => 1259,  2636 => 1254,  2635 => 1251,  2631 => 1249,  2629 => 1244,  2628 => 1241,  2624 => 1239,  2622 => 1236,  2621 => 1229,  2619 => 1226,  2615 => 1223,  2613 => 1220,  2612 => 1217,  2610 => 1214,  2606 => 1211,  2604 => 1210,  2603 => 1207,  2602 => 1205,  2601 => 1204,  2600 => 1201,  2599 => 1199,  2597 => 1196,  2595 => 1195,  2592 => 1194,  2585 => 1050,  2583 => 1046,  2576 => 1042,  2571 => 1040,  2567 => 1039,  2562 => 1036,  2559 => 1035,  2552 => 1029,  2550 => 1025,  2543 => 1021,  2538 => 1019,  2534 => 1018,  2529 => 1015,  2526 => 1014,  2519 => 1008,  2517 => 998,  2510 => 994,  2505 => 992,  2501 => 991,  2496 => 988,  2493 => 987,  2487 => 1280,  2485 => 1278,  2484 => 1276,  2480 => 1274,  2477 => 1194,  2473 => 1191,  2471 => 1188,  2470 => 1185,  2468 => 1183,  2464 => 1180,  2462 => 1177,  2461 => 1174,  2459 => 1172,  2454 => 1168,  2452 => 1166,  2451 => 1163,  2450 => 1160,  2449 => 1159,  2448 => 1156,  2447 => 1153,  2445 => 1152,  2441 => 1149,  2439 => 1145,  2438 => 1142,  2436 => 1141,  2432 => 1138,  2430 => 1133,  2429 => 1130,  2427 => 1129,  2423 => 1126,  2421 => 1122,  2420 => 1119,  2418 => 1118,  2414 => 1115,  2412 => 1110,  2411 => 1107,  2409 => 1106,  2405 => 1103,  2403 => 1100,  2402 => 1085,  2400 => 1084,  2396 => 1081,  2394 => 1077,  2393 => 1075,  2391 => 1074,  2387 => 1071,  2385 => 1069,  2384 => 1066,  2383 => 1065,  2379 => 1063,  2377 => 1060,  2376 => 1057,  2374 => 1056,  2371 => 1054,  2368 => 1035,  2365 => 1033,  2362 => 1014,  2359 => 1012,  2356 => 987,  2352 => 984,  2350 => 981,  2349 => 973,  2347 => 972,  2343 => 969,  2341 => 966,  2340 => 963,  2338 => 962,  2333 => 959,  2332 => 958,  2331 => 957,  2326 => 955,  2325 => 954,  2321 => 952,  2319 => 951,  2318 => 950,  2314 => 948,  2312 => 945,  2311 => 942,  2309 => 941,  2305 => 938,  2303 => 935,  2302 => 933,  2301 => 931,  2300 => 929,  2299 => 924,  2297 => 923,  2292 => 919,  2290 => 915,  2289 => 913,  2288 => 910,  2287 => 906,  2286 => 904,  2285 => 901,  2283 => 900,  2280 => 899,  2276 => 896,  2273 => 895,  2264 => 889,  2263 => 888,  2258 => 886,  2257 => 885,  2252 => 883,  2251 => 882,  2246 => 880,  2245 => 879,  2240 => 877,  2239 => 876,  2230 => 870,  2224 => 869,  2219 => 867,  2213 => 866,  2208 => 864,  2202 => 863,  2195 => 859,  2191 => 858,  2181 => 851,  2174 => 847,  2170 => 846,  2160 => 839,  2154 => 838,  2150 => 837,  2144 => 836,  2137 => 832,  2133 => 831,  2126 => 826,  2123 => 825,  2114 => 819,  2113 => 818,  2112 => 817,  2107 => 815,  2106 => 814,  2101 => 812,  2100 => 811,  2099 => 810,  2096 => 809,  2092 => 792,  2089 => 791,  2085 => 785,  2082 => 784,  2075 => 786,  2073 => 784,  2069 => 782,  2067 => 778,  2066 => 773,  2065 => 772,  2061 => 770,  2059 => 766,  2058 => 764,  2057 => 763,  2053 => 761,  2051 => 757,  2050 => 755,  2049 => 754,  2045 => 752,  2043 => 751,  2042 => 737,  2041 => 736,  2036 => 734,  2035 => 733,  2029 => 730,  2028 => 729,  2027 => 728,  2026 => 727,  2024 => 726,  2022 => 725,  2018 => 723,  2015 => 722,  2008 => 693,  2000 => 688,  1996 => 687,  1992 => 686,  1987 => 684,  1983 => 682,  1980 => 681,  1973 => 677,  1969 => 676,  1963 => 673,  1959 => 671,  1954 => 668,  1952 => 666,  1951 => 660,  1950 => 659,  1946 => 657,  1944 => 655,  1943 => 649,  1942 => 648,  1938 => 646,  1936 => 644,  1935 => 637,  1934 => 636,  1930 => 634,  1928 => 630,  1927 => 627,  1925 => 626,  1923 => 625,  1918 => 623,  1917 => 622,  1913 => 620,  1911 => 618,  1910 => 612,  1909 => 611,  1905 => 609,  1903 => 607,  1902 => 601,  1901 => 600,  1897 => 598,  1895 => 596,  1894 => 589,  1893 => 588,  1889 => 586,  1887 => 582,  1886 => 579,  1884 => 578,  1882 => 577,  1877 => 575,  1876 => 574,  1872 => 572,  1870 => 570,  1869 => 564,  1868 => 563,  1864 => 561,  1862 => 557,  1861 => 554,  1860 => 553,  1855 => 550,  1853 => 549,  1851 => 548,  1847 => 545,  1845 => 543,  1844 => 542,  1843 => 541,  1842 => 540,  1838 => 538,  1835 => 537,  1833 => 536,  1827 => 533,  1826 => 532,  1825 => 531,  1824 => 530,  1823 => 529,  1819 => 527,  1816 => 526,  1812 => 524,  1809 => 523,  1805 => 521,  1802 => 520,  1798 => 502,  1795 => 501,  1789 => 488,  1787 => 486,  1785 => 483,  1782 => 482,  1777 => 479,  1775 => 477,  1773 => 474,  1770 => 473,  1765 => 361,  1763 => 357,  1762 => 356,  1761 => 354,  1760 => 353,  1757 => 352,  1754 => 345,  1751 => 344,  1740 => 511,  1738 => 508,  1737 => 505,  1736 => 504,  1733 => 503,  1731 => 501,  1727 => 499,  1725 => 496,  1724 => 493,  1723 => 492,  1720 => 491,  1718 => 482,  1715 => 481,  1713 => 473,  1709 => 471,  1707 => 466,  1706 => 463,  1705 => 462,  1701 => 460,  1699 => 457,  1698 => 456,  1697 => 454,  1695 => 453,  1692 => 441,  1687 => 438,  1686 => 437,  1685 => 436,  1680 => 434,  1679 => 433,  1678 => 432,  1672 => 429,  1671 => 428,  1670 => 427,  1667 => 426,  1662 => 419,  1661 => 418,  1657 => 416,  1655 => 413,  1654 => 410,  1652 => 409,  1647 => 406,  1646 => 405,  1645 => 404,  1640 => 402,  1639 => 401,  1638 => 400,  1632 => 397,  1631 => 396,  1627 => 394,  1625 => 393,  1624 => 392,  1621 => 391,  1616 => 387,  1615 => 386,  1614 => 385,  1613 => 383,  1612 => 382,  1611 => 380,  1610 => 379,  1609 => 378,  1602 => 374,  1593 => 368,  1589 => 367,  1583 => 363,  1581 => 344,  1577 => 342,  1574 => 341,  1569 => 338,  1565 => 2479,  1562 => 2478,  1560 => 2422,  1550 => 2415,  1545 => 2413,  1538 => 2409,  1534 => 2408,  1530 => 2407,  1524 => 2404,  1519 => 2403,  1517 => 2402,  1508 => 2395,  1506 => 2389,  1505 => 2388,  1499 => 2385,  1492 => 2380,  1490 => 2376,  1489 => 2371,  1488 => 2367,  1487 => 2362,  1486 => 2361,  1480 => 2358,  1471 => 2354,  1464 => 2350,  1458 => 2347,  1451 => 2343,  1426 => 2320,  1416 => 2316,  1410 => 2313,  1400 => 2312,  1390 => 2311,  1387 => 2310,  1383 => 2309,  1379 => 2307,  1377 => 2235,  1371 => 2232,  1366 => 2230,  1361 => 2227,  1357 => 2225,  1355 => 2201,  1349 => 2199,  1347 => 2198,  1344 => 2197,  1330 => 2196,  1323 => 2192,  1308 => 2187,  1302 => 2184,  1298 => 2183,  1293 => 2182,  1286 => 2178,  1273 => 2172,  1268 => 2170,  1263 => 2168,  1248 => 2157,  1245 => 2156,  1242 => 2139,  1240 => 2138,  1234 => 2135,  1228 => 2132,  1216 => 2124,  1213 => 2123,  1196 => 2122,  1191 => 2120,  1185 => 2116,  1175 => 2112,  1169 => 2109,  1164 => 2107,  1158 => 2106,  1152 => 2105,  1145 => 2104,  1141 => 2103,  1138 => 2102,  1135 => 2101,  1132 => 2100,  1130 => 2099,  1127 => 2098,  1125 => 2089,  1120 => 2086,  1118 => 2081,  1117 => 2079,  1116 => 2076,  1115 => 2072,  1114 => 2070,  1113 => 2067,  1112 => 2063,  1111 => 2061,  1110 => 2058,  1109 => 2057,  1104 => 2056,  1102 => 2055,  1096 => 2052,  1091 => 2050,  1083 => 2045,  1076 => 2041,  1066 => 2034,  1061 => 2032,  1055 => 2029,  1050 => 2027,  1045 => 2025,  1038 => 2021,  1034 => 2020,  1027 => 2016,  1021 => 2013,  1016 => 2011,  1013 => 2010,  1011 => 2008,  1008 => 2007,  1006 => 1994,  1003 => 1993,  1001 => 1960,  995 => 1956,  993 => 1939,  989 => 1937,  987 => 1935,  983 => 1933,  981 => 1794,  978 => 1793,  976 => 1550,  970 => 1546,  968 => 1545,  967 => 1544,  964 => 1543,  962 => 1541,  960 => 1539,  958 => 1509,  955 => 1508,  952 => 1507,  949 => 1506,  946 => 1499,  943 => 1463,  939 => 1460,  937 => 1442,  932 => 1439,  930 => 1437,  928 => 1435,  926 => 1405,  923 => 1404,  921 => 1390,  918 => 1389,  916 => 1336,  913 => 1335,  911 => 1284,  908 => 1283,  906 => 895,  903 => 894,  901 => 825,  898 => 824,  896 => 791,  893 => 790,  891 => 722,  882 => 716,  881 => 715,  869 => 706,  865 => 705,  857 => 702,  852 => 700,  847 => 697,  845 => 526,  842 => 525,  840 => 523,  837 => 522,  835 => 520,  832 => 519,  830 => 341,  826 => 339,  824 => 338,  820 => 337,  816 => 336,  812 => 335,  808 => 334,  804 => 333,  800 => 332,  796 => 331,  791 => 329,  787 => 328,  783 => 327,  779 => 326,  775 => 325,  771 => 324,  767 => 323,  763 => 322,  759 => 321,  755 => 320,  751 => 319,  747 => 318,  743 => 317,  739 => 315,  736 => 314,  733 => 313,  730 => 312,  723 => 215,  720 => 214,  715 => 199,  711 => 197,  705 => 195,  702 => 194,  698 => 192,  692 => 190,  690 => 189,  681 => 186,  675 => 184,  669 => 182,  666 => 181,  663 => 180,  659 => 156,  655 => 154,  653 => 153,  650 => 152,  647 => 151,  643 => 85,  640 => 84,  633 => 307,  631 => 299,  627 => 298,  621 => 295,  617 => 294,  613 => 293,  609 => 292,  605 => 291,  601 => 290,  597 => 289,  593 => 288,  589 => 287,  585 => 286,  581 => 285,  577 => 283,  571 => 280,  567 => 279,  563 => 278,  559 => 277,  552 => 273,  546 => 270,  542 => 268,  535 => 264,  529 => 263,  524 => 261,  518 => 260,  513 => 259,  511 => 258,  507 => 257,  500 => 253,  495 => 251,  491 => 250,  485 => 247,  480 => 245,  468 => 236,  464 => 235,  460 => 234,  455 => 232,  449 => 231,  445 => 230,  439 => 226,  432 => 222,  428 => 220,  423 => 217,  421 => 214,  418 => 213,  413 => 211,  408 => 209,  400 => 206,  393 => 203,  391 => 202,  388 => 201,  386 => 180,  383 => 179,  380 => 178,  377 => 177,  374 => 176,  371 => 175,  369 => 174,  366 => 173,  363 => 172,  360 => 171,  357 => 170,  354 => 169,  352 => 168,  349 => 167,  346 => 166,  343 => 165,  341 => 164,  338 => 163,  335 => 162,  332 => 161,  330 => 160,  327 => 159,  325 => 158,  322 => 157,  320 => 151,  313 => 146,  307 => 144,  305 => 143,  302 => 142,  300 => 141,  292 => 136,  282 => 129,  277 => 127,  268 => 121,  263 => 119,  259 => 118,  256 => 117,  250 => 106,  244 => 103,  240 => 102,  236 => 101,  229 => 100,  226 => 99,  221 => 97,  216 => 96,  213 => 95,  210 => 94,  208 => 93,  201 => 91,  197 => 89,  194 => 88,  192 => 87,  189 => 86,  186 => 84,  184 => 83,  181 => 82,  178 => 81,  175 => 80,  172 => 79,  166 => 77,  163 => 76,  160 => 75,  157 => 74,  152 => 70,  147 => 71,  145 => 70,  140 => 68,  132 => 63,  124 => 58,  116 => 53,  108 => 48,  97 => 42,  89 => 40,  87 => 39,  85 => 38,  82 => 19,  80 => 18,  77 => 17,  73 => 1,  71 => 5,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_SupTwg_Source("", "@galleries/settings.twig", "/home/dannytua/kaodesign.vn.2020/wp-content/plugins/gallery-by-supsystic/src/GridGallery/Galleries/views/settings.twig");
    }
}
