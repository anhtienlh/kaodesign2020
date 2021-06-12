<?php

if(!function_exists('ambient_elated_register_required_plugins')) {
    /**
     * Registers Visual Composer, Revolution Slider, Elated Core, Elated Instagram Feed, Elatedf Twitter Feed  as required plugins. Hooks to tgmpa_register hook
     */
    function ambient_elated_register_required_plugins() {
        $plugins = array(
            array(
                'name'               => esc_html__('WPBakery Page Builder', 'ambient'),
                'slug'               => 'js_composer',
                'source'             => get_template_directory().'/includes/plugins/js_composer.zip',
                'required'           => true,
                'version'            => '6.1',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ),
            array(
                'name'               => esc_html__('Revolution Slider', 'ambient'),
                'slug'               => 'revslider',
                'source'             => get_template_directory().'/includes/plugins/revslider.zip',
                'version'            => '6.1.5',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ),
            array(
                'name'               => esc_html__('Elated Core', 'ambient'),
                'slug'               => 'eltdf-core',
                'source'             => get_template_directory().'/includes/plugins/eltdf-core.zip',
                'required'           => true,
                'version'            => '1.3',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ),
            array(
                'name'                  => esc_html__('Envato Market', 'ambient'),
                'slug'                  => 'envato-market', // The plugin slug (typically the folder name).
				'source'  				=> 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
                'required'              => true,
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
            ),
            array(
                'name'               => esc_html__('Elated Instagram Feed', 'ambient'),
                'slug'               => 'eltdf-instagram-feed',
                'source'             => get_template_directory().'/includes/plugins/eltdf-instagram-feed.zip',
                'required'           => true,
                'version'            => '1.0.1',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ),
            array(
                'name'               => esc_html__('Elated Twitter Feed', 'ambient'),
                'slug'               => 'eltdf-twitter-feed',
                'source'             => get_template_directory().'/includes/plugins/eltdf-twitter-feed.zip',
                'required'           => true,
                'version'            => '1.0.1',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ),
            array(
                'name'                  => esc_html__( 'WooCommerce', 'ambient' ),
                'slug'                  => 'woocommerce',
                'external_url'          => 'https://wordpress.org/plugins/woocommerce/',
                'required'              => false
            ),
            array(
                'name'                  => esc_html__( 'Contact Form 7', 'ambient' ),
                'slug'                  => 'contact-form-7',
                'external_url'          => 'https://wordpress.org/plugins/contact-form-7/',
                'required'              => false
            )
        );

        $config = array(
            'domain'           => 'ambient',
            'default_path'     => '',
            'parent_slug' 	   => 'themes.php',
            'capability' 	   => 'edit_theme_options',
            'menu'             => 'install-required-plugins',
            'has_notices'      => true,
            'is_automatic'     => false,
            'message'          => '',
            'strings'          => array(
                'page_title'                      => esc_html__('Install Required Plugins', 'ambient'),
                'menu_title'                      => esc_html__('Install Plugins', 'ambient'),
                'installing'                      => esc_html__('Installing Plugin: %s', 'ambient'),
                'oops'                            => esc_html__('Something went wrong with the plugin API.', 'ambient'),
                'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'ambient'),
                'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'ambient'),
                'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'ambient'),
                'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'ambient'),
                'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'ambient'),
                'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'ambient'),
                'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'ambient'),
                'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'ambient'),
                'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins', 'ambient'),
                'activate_link'                   => _n_noop('Activate installed plugin', 'Activate installed plugins', 'ambient'),
                'return'                          => esc_html__('Return to Required Plugins Installer', 'ambient'),
                'plugin_activated'                => esc_html__('Plugin activated successfully.', 'ambient'),
                'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'ambient'),
                'nag_type'                        => 'updated'
            )
        );

        tgmpa($plugins, $config);
    }

    add_action('tgmpa_register', 'ambient_elated_register_required_plugins');
}