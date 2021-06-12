<?php

if ( ! function_exists('ambient_elated_social_options_map') ) {

	function ambient_elated_social_options_map() {

		ambient_elated_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__('Social Networks', 'ambient'),
				'icon'  => 'fa fa-share-alt'
			)
		);

		/**
		 * Enable Social Share
		 */
		$panel_social_share = ambient_elated_add_admin_panel(array(
			'page'  => '_social_page',
			'name'  => 'panel_social_share',
			'title' => esc_html__('Enable Social Share', 'ambient')
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Social Share', 'ambient'),
			'description'	=> esc_html__('Enabling this option will allow social share on networks of your choice', 'ambient'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltdf_panel_social_networks, #eltdf_panel_show_social_share_on'
			),
			'parent'		=> $panel_social_share
		));

		$panel_show_social_share_on = ambient_elated_add_admin_panel(array(
			'page'  			=> '_social_page',
			'name'  			=> 'panel_show_social_share_on',
			'title' 			=> esc_html__('Show Social Share On', 'ambient'),
			'hidden_property'	=> 'enable_social_share',
			'hidden_value'		=> 'no'
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_post',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Posts', 'ambient'),
			'description'	=> esc_html__('Show Social Share on Blog Posts', 'ambient'),
			'parent'		=> $panel_show_social_share_on
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_page',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Pages', 'ambient'),
			'description'	=> esc_html__('Show Social Share on Pages', 'ambient'),
			'parent'		=> $panel_show_social_share_on
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_portfolio-item',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Portfolio Item', 'ambient'),
			'description'	=> esc_html__('Show Social Share for Portfolio Items', 'ambient'),
			'parent'		=> $panel_show_social_share_on
		));

		if(ambient_elated_is_woocommerce_installed()){
			ambient_elated_add_admin_field(array(
				'type'			=> 'yesno',
				'name'			=> 'enable_social_share_on_product',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Product', 'ambient'),
				'description'	=> esc_html__('Show Social Share for Product Items', 'ambient'),
				'parent'		=> $panel_show_social_share_on
			));
		}

		/**
		 * Social Share Networks
		 */
		$panel_social_networks = ambient_elated_add_admin_panel(array(
			'page'  			=> '_social_page',
			'name'				=> 'panel_social_networks',
			'title'				=> esc_html__('Social Networks', 'ambient'),
			'hidden_property'	=> 'enable_social_share',
			'hidden_value'		=> 'no'
		));

		/**
		 * Facebook
		 */
		ambient_elated_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'facebook_title',
			'title'		=> esc_html__('Share on Facebook', 'ambient')
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_facebook_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'ambient'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Facebook', 'ambient'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltdf_enable_facebook_share_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_facebook_share_container = ambient_elated_add_admin_container(array(
			'name'		=> 'enable_facebook_share_container',
			'hidden_property'	=> 'enable_facebook_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'facebook_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'ambient'),
			'parent'		=> $enable_facebook_share_container
		));

		/**
		 * Twitter
		 */
		ambient_elated_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'twitter_title',
			'title'		=> esc_html__('Share on Twitter', 'ambient')
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_twitter_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'ambient'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Twitter', 'ambient'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltdf_enable_twitter_share_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_twitter_share_container = ambient_elated_add_admin_container(array(
			'name'		=> 'enable_twitter_share_container',
			'hidden_property'	=> 'enable_twitter_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'twitter_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'ambient'),
			'parent'		=> $enable_twitter_share_container
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'twitter_via',
			'default_value'	=> '',
			'label'			=> esc_html__('Via', 'ambient'),
			'parent'		=> $enable_twitter_share_container
		));

		/**
		 * Google Plus
		 */
		ambient_elated_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'google_plus_title',
			'title'		=> esc_html__('Share on Google Plus', 'ambient')
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_google_plus_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'ambient'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Google Plus', 'ambient'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltdf_enable_google_plus_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_google_plus_container = ambient_elated_add_admin_container(array(
			'name'		=> 'enable_google_plus_container',
			'hidden_property'	=> 'enable_google_plus_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'google_plus_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'ambient'),
			'parent'		=> $enable_google_plus_container
		));

		/**
		 * Linked In
		 */
		ambient_elated_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'linkedin_title',
			'title'		=> esc_html__('Share on LinkedIn', 'ambient')
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_linkedin_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'ambient'),
			'description'	=> esc_html__('Enabling this option will allow sharing via LinkedIn', 'ambient'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltdf_enable_linkedin_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_linkedin_container = ambient_elated_add_admin_container(array(
			'name'		=> 'enable_linkedin_container',
			'hidden_property'	=> 'enable_linkedin_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'linkedin_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'ambient'),
			'parent'		=> $enable_linkedin_container
		));

		/**
		 * Tumblr
		 */
		ambient_elated_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'tumblr_title',
			'title'		=> esc_html__('Share on Tumblr', 'ambient')
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_tumblr_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'ambient'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Tumblr', 'ambient'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltdf_enable_tumblr_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_tumblr_container = ambient_elated_add_admin_container(array(
			'name'		=> 'enable_tumblr_container',
			'hidden_property'	=> 'enable_tumblr_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'tumblr_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'ambient'),
			'parent'		=> $enable_tumblr_container
		));

		/**
		 * Pinterest
		 */
		ambient_elated_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'pinterest_title',
			'title'		=> esc_html__('Share on Pinterest', 'ambient')
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_pinterest_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'ambient'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Pinterest', 'ambient'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltdf_enable_pinterest_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_pinterest_container = ambient_elated_add_admin_container(array(
			'name'				=> 'enable_pinterest_container',
			'hidden_property'	=> 'enable_pinterest_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'pinterest_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'ambient'),
			'parent'		=> $enable_pinterest_container
		));

		/**
		 * VK
		 */
		ambient_elated_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'vk_title',
			'title'		=> esc_html__('Share on VK', 'ambient')
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_vk_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'ambient'),
			'description'	=> esc_html__('Enabling this option will allow sharing via VK', 'ambient'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltdf_enable_vk_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_vk_container = ambient_elated_add_admin_container(array(
			'name'				=> 'enable_vk_container',
			'hidden_property'	=> 'enable_vk_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		ambient_elated_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'vk_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'ambient'),
			'parent'		=> $enable_vk_container
		));

		if(defined('ELATEDF_TWITTER_FEED_VERSION')) {
            $twitter_panel = ambient_elated_add_admin_panel(array(
                'title' => esc_html__('Twitter', 'ambient'),
                'name'  => 'panel_twitter',
                'page'  => '_social_page'
            ));

            ambient_elated_add_admin_twitter_button(array(
                'name'   => 'twitter_button',
                'parent' => $twitter_panel
            ));
        }

        if(defined('ELATEDF_INSTAGRAM_FEED_VERSION')) {
            $instagram_panel = ambient_elated_add_admin_panel(array(
                'title' => esc_html__('Instagram', 'ambient'),
                'name'  => 'panel_instagram',
                'page'  => '_social_page'
            ));

            ambient_elated_add_admin_instagram_button(array(
                'name'   => 'instagram_button',
                'parent' => $instagram_panel
            ));
        }
	}

	add_action( 'ambient_elated_options_map', 'ambient_elated_social_options_map', 13);
}