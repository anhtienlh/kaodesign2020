<?php
namespace AmbientElatedNamespace\Modules\Header\Types;

use AmbientElatedNamespace\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Vertical layout and option
 *
 * Class HeaderVertical
 */
class HeaderVertical extends HeaderType {
    protected $mobileHeaderHeight;

    public function __construct() {
        $this->slug = 'header-vertical';

        $mobileHeaderHeight       = ambient_elated_filter_px(ambient_elated_options()->getOptionValue('mobile_header_height'));
        $this->mobileHeaderHeight = $mobileHeaderHeight !== '' ? intval($mobileHeaderHeight) : 80;

        add_action('wp', array($this, 'setHeaderHeightProps'));

        add_filter('ambient_elated_js_global_variables', array($this, 'getGlobalJSVariables'));
        add_filter('ambient_elated_per_page_js_vars', array($this, 'getPerPageJSVariables'));
    }

    /**
     * Loads template for header type
     *
     * @param array $parameters associative array of variables to pass to template
     */
    public function loadTemplate($parameters = array()) {
        ambient_elated_get_module_template_part('templates/types/'.$this->slug, $this->moduleName, '', $parameters);
    }

    /**
     * Sets header height properties after WP object is set up
     */
    public function setHeaderHeightProps(){
        $this->mobileHeaderHeight = $this->calculateMobileHeaderHeight();
    }

    /**
     * Returns total height of transparent parts of header
     *
     * @return mixed
     */
    public function calculateHeightOfTransparency() {
        return 0;
    }

    /**
     * Returns height of header parts that are totaly transparent
     *
     * @return mixed
     */
    public function calculateHeightOfCompleteTransparency() {
        return 0;
    }

    /**
     * Returns header height
     *
     * @return mixed
     */
    public function calculateHeaderHeight() {
        return 0;
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
        $globalVariables['eltdfMenuAreaHeight'] = 0;
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
        $perPageVars['eltdfHeaderTransparencyHeight'] = 0;
        return $perPageVars;
    }
}