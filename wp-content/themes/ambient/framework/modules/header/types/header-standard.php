<?php
namespace AmbientElatedNamespace\Modules\Header\Types;

use AmbientElatedNamespace\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Standard layout and option
 *
 * Class HeaderStandard
 */
class HeaderStandard extends HeaderType {
    protected $heightOfTransparency;
    protected $heightOfCompleteTransparency;
    protected $headerHeight;
    protected $mobileHeaderHeight;

    /**
     * Sets slug property which is the same as value of option in DB
     */
    public function __construct() {
        $this->slug = 'header-standard';

        if(!is_admin()) {

            $menuAreaHeight       = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('menu_area_height_header_standard'));
            $this->menuAreaHeight = $menuAreaHeight !== '' ? intval($menuAreaHeight) : 80;

            $mobileHeaderHeight       = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('mobile_header_height'));
            $this->mobileHeaderHeight = $mobileHeaderHeight !== '' ? intval($mobileHeaderHeight) : 80;

            add_action('wp', array($this, 'setHeaderHeightProps'));

            add_filter('ambient_elated_js_global_variables', array($this, 'getGlobalJSVariables'));
            add_filter('ambient_elated_per_page_js_vars', array($this, 'getPerPageJSVariables'));
        }
    }

    /**
     * Loads template file for this header type
     *
     * @param array $parameters associative array of variables that needs to passed to template
     */
    public function loadTemplate($parameters = array()) {

        if(ambient_elated_get_header_behaviour() == 'fixed-on-scroll'){
            $parameters['header_bottom_margin'] = 'margin-bottom:' . $this->calculateHeaderHeight() . 'px;';
        } else {
            $parameters['header_bottom_margin'] = '';
        }

        $parameters = apply_filters('ambient_elated_header_standard_parameters', $parameters);

        ambient_elated_get_module_template_part('templates/types/'.$this->slug, $this->moduleName, '', $parameters);
    }

    /**
     * Sets header height properties after WP object is set up
     */
    public function setHeaderHeightProps(){
        $this->heightOfTransparency         = $this->calculateHeightOfTransparency();
        $this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
        $this->headerHeight                 = $this->calculateHeaderHeight();
        $this->mobileHeaderHeight           = $this->calculateMobileHeaderHeight();
    }

    /**
     * Returns total height of transparent parts of header
     *
     * @return int
     */
    public function calculateHeightOfTransparency() {
        $id = ambient_elated_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'eltdf_menu_area_background_transparency_header_standard_meta', true) !== '1' && get_post_meta($id, 'eltdf_menu_area_background_transparency_header_standard_meta', true) !== ''){
            $menuAreaTransparent = true;
        } else if (ambient_elated_options()->getOptionValue('menu_area_background_transparency_header_standard') !== '1' && ambient_elated_options()->getOptionValue('menu_area_background_transparency_header_standard') !== '') {
            $menuAreaTransparent = true;
        } else if (is_404() && ambient_elated_options()->getOptionValue('404_menu_area_background_transparency_header') !== '1' && ambient_elated_options()->getOptionValue('404_menu_area_background_transparency_header') !== '') {
            $menuAreaTransparent = true;
        } else {
            $menuAreaTransparent = false;
        }

        if($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;

            if(ambient_elated_is_top_bar_enabled() || ambient_elated_is_top_bar_enabled() && ambient_elated_is_top_bar_transparent()) {
                $transparencyHeight += ambient_elated_get_top_bar_height();
            }
        }

        return $transparencyHeight;
    }

    /**
     * Returns height of completely transparent header parts
     *
     * @return int
     */
    public function calculateHeightOfCompleteTransparency() {
        $id = ambient_elated_get_page_id();
        $transparencyHeight = 0;

        $menuAreaTransparent = ambient_elated_options()->getOptionValue('fixed_header_transparency') === '0';

        if($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;
        }

        return $transparencyHeight;
    }

    /**
     * Returns total height of header
     *
     * @return int|string
     */
    public function calculateHeaderHeight() {
        $headerHeight = $this->menuAreaHeight;
        if(ambient_elated_is_top_bar_enabled()) {
            $headerHeight += ambient_elated_get_top_bar_height();
        }

        return $headerHeight;
    }

    /**
     * Returns total height of mobile header
     *
     * @return int|string
     */
    public function calculateMobileHeaderHeight() {
        $mobileHeaderHeight = $this->mobileHeaderHeight;

        return $mobileHeaderHeight;
    }

    /**
     * Returns global js variables of header
     *
     * @param $globalVariables
     * @return int|string
     */
    public function getGlobalJSVariables($globalVariables) {
        $globalVariables['eltdfLogoAreaHeight'] = 0;
        $globalVariables['eltdfMenuAreaHeight'] = $this->headerHeight;
        $globalVariables['eltdfMobileHeaderHeight'] = $this->mobileHeaderHeight;

        return $globalVariables;
    }

    /**
     * Returns per page js variables of header
     *
     * @param $perPageVars
     * @return int|string
     */
    public function getPerPageJSVariables($perPageVars) {
        //calculate transparency height only if header has no sticky behaviour
        if(!in_array(ambient_elated_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            $perPageVars['eltdfHeaderTransparencyHeight'] = $this->headerHeight - (ambient_elated_get_top_bar_height() + $this->heightOfCompleteTransparency);
        }else{
            $perPageVars['eltdfHeaderTransparencyHeight'] = 0;
        }

        return $perPageVars;
    }
}