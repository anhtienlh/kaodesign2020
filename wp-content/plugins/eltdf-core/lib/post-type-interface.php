<?php
namespace ElatedCore\Lib;

/**
 * interface PostTypeInterface
 * @package ElatedCore\Lib;
 */
interface PostTypeInterface {
    /**
     * @return string
     */
    public function getBase();

    /**
     * Registers custom post type with WordPress
     */
    public function register();
}