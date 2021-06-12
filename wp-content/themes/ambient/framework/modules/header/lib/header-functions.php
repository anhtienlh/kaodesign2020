<?php
use AmbientElatedNamespace\Modules\Header\Lib;

if(!function_exists('ambient_elated_set_header_object')) {
    function ambient_elated_set_header_object() {
        $header_type = ambient_elated_get_meta_field_intersect('header_type', ambient_elated_get_page_id());

        $object = Lib\HeaderFactory::getInstance()->build($header_type);

        if(Lib\HeaderFactory::getInstance()->validHeaderObject()) {
            $header_connector = new Lib\HeaderConnector($object);
            $header_connector->connect($object->getConnectConfig());
        }
    }

    add_action('wp', 'ambient_elated_set_header_object', 1);
}