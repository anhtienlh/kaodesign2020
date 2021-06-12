<?php

if(!function_exists('ambient_elated_get_vc_version')) {
	/**
	 * Return Visual Composer version string
	 *
	 * @return bool|string
	 */
	function ambient_elated_get_vc_version() {
		if(ambient_elated_visual_composer_installed()) {
			return WPB_VC_VERSION;
		}

		return false;
	}
}