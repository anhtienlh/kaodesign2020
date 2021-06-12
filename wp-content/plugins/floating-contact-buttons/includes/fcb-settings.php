<?php
/**
 * Instant Support Buttons  settings class
 *
*/
class FCB_Settings
{
    private $fcb_settings;

    function __construct()
    {
        $this->fcb_settings = new FCB_Admin_Settings;
        add_action('admin_init', array($this, 'fcb_admin_section'));
        add_action('admin_menu', array($this, 'fcb_admin_menu'));
		
		
    }
  

	function fcb_admin_section()
    {
        //set the settings
        $this->fcb_settings->set_sections($this->fcb_get_settings_sections());
        $this->fcb_settings->set_fields($this->fcb_get_settings_fields());

        //initialize settings
        $this->fcb_settings->admin_init();
    }

    function fcb_admin_menu()
    {
        add_options_page('Instant Support Buttons', 'Instant Support Buttons', 'delete_posts', 'instant_support_buttons', array($this, 'fcb_plugin_page'));
    }

    function fcb_get_settings_sections()
    {
        $sections = array(
            array(
                'id' => 'fcb_basic_settings',
                'title' => __('Buttons', 'fcb2')
            ),
            array(
                'id' => 'fcb_style_settings',
                'title' => __('Style Settings', 'fcb2')
            ),
           
        );
        return $sections;
    }
	

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function fcb_get_settings_fields()
    {
		
        $settings_fields = array(
            'fcb_basic_settings' => array(
                array(
                    'name' => 'fcb_whatsapp',
                    'label' => __('Whatsapp Number', 'fcb2'),
                    //'desc' => __('Text input description', 'fcb2'),
                    'placeholder' => __('91XXXXXXXXXX', 'fcb2'),
                    'desc' => __('Required <strong>COUNTRY CODE </strong>', 'fcb2'),                    
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                    //'default' => 'Title',
                    
                ),
				array(
                    'name' => 'fcb_facebook',
                    'label' => __('Facebook Username', 'fcb2'),
                    'placeholder' => __('Enter Your Facebook Username','fcb2'),
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
				 array(
                    'name' => 'fcb_viber',
                    'label' => __('Viber Address', 'fcb2'),
                    'placeholder' => __('Enter Viber Address','fcb2'),
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
				array(
                    'name' => 'fcb_slack',
                    'label' => __('Slack Team ID', 'fcb2'),
                    'placeholder' => __('Enter Your Slack Team ID', 'fcb2'),
                    'desc' => __('Required for <strong>Slack </strong> Support Button', 'fcb2'),
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
				array(
                    'name' => 'fcb_slack_user',
                    'label' => __('Slack User ID', 'fcb2'),
                    'placeholder' => __('Enter Your Slack User ID', 'fcb2'),
                    'desc' => __('Required for <strong>Slack </strong> Support Button', 'fcb2'),
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
				array(
                    'name' => 'fcb_telegram',
                    'label' => __('Telegram Username', 'fcb2'),
                    'placeholder' => __('Enter Your Telegram Username', 'fcb2'),
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
				array(
                    'name' => 'fcb_skype',
                    'label' => __('Skype Username', 'fcb2'),
                    'placeholder' => __('Enter Your Skype Username', 'fcb2'),
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name' => 'fcb_call',
                    'label' => __('Phone Number ( for Call Now button )', 'fcb2'),
                    'desc' => __('Enter Phone Number with Country Code', 'fcb2'),
                    'placeholder' => __('91XXXXXXXXXX', 'fcb2'),
                    'desc' => __('Required <strong>COUNTRY CODE </strong>', 'fcb2'),                    
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field',
                ),
                array(
                    'name' => 'fcb_hide_call_now',
                    'label' => __(' Disable Call Now Button'),
                    'desc' => __('Select on which screen you don\'t want to display Call Now Button', 'fcb2'),
                    'type' => 'multicheck',
                    'options' => array(
                        'pc' => 'PC',
                        'mobile' => 'Mobile',
                        'tablet' => 'Tablet'
                    )
                ),
				array(
                    'name' => 'fcb_email',
                    'label' => __('Email ID', 'fcb2'),
                    'placeholder' => get_option('admin_email'),
                    'desc' => __('Required for <strong>Email Us</strong> Support Button', 'fcb2'),
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name' => 'fcb_email_to',
                    'label' => __('Email To(For Callback Request):', 'fcb2'),
                    'placeholder' => get_option('admin_email'),
                    'desc' => __('Required for <strong>Callback Request</strong> Support Button', 'fcb2'),
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name' => 'fcb_email_from',
                    'label' => __('Email From(For Callback Request):', 'fcb2'),
                    'placeholder' => get_option('admin_email'),
                    'desc' => __('Required for <strong>Callback Request</strong> Support Button', 'fcb2'),
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
            ),				

            'fcb_style_settings' => array(
                array(
                    'name' => 'fcb_show_on',
                    'label' => __('Show on Pages/Posts', 'fcb2'),
                    'desc' => __('Select where you want to display', 'fcb2'),
                    'type' => 'radio',
                    'default' => 'all',
                    'options' => array(
                        'all' => 'ALL',
                        'custom' => 'Custom'
                    )
                ),
                array(
                    'name' => 'fcb_custom_page',
                    'label' => __('Custom Page/Post Id', 'fcb2'),
                    'placeholder' => __('Enter page/post custom ID','fcb2'),
                    'desc' => __('Add Page/Post Id(where you want to display Instant Support Buttons) with comma seperator(For eg. 2036,2251).', 'fcb2'),
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name' => 'fcb_font_color',
                    'label' => __('Font Color', 'fcb2'),
                    'desc' => __('Color description', 'fcb2'),
                    'type' => 'color',
                    'default' => '#12580f'
                ),
                array(
                    'name' => 'fcb_bg_color',
                    'label' => __('Background Color', 'fcb2'),
                    'desc' => __('Color description', 'fcb2'),
                    'type' => 'color',
                    'default' => '#ffffff'
                ),
                array(
                    'name' => 'fcb_circle_color',
                    'label' => __('Circle Color', 'fcb2'),
                    'desc' => __('Color description', 'fcb2'),
                    'type' => 'color',
                    'default' => '#12580f'
                ),
			),
            
        );

        return $settings_fields;
    }

    function fcb_plugin_page()
    {
        echo '<div class="wrap">
        <h1>';
        echo esc_html( get_admin_page_title() );
        echo '</h1>';  
        $this->fcb_settings->show_navigation();
        $this->fcb_settings->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages()
    {
        $pages = get_pages();
        $pages_options = array();
        if ($pages) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }
	
	function fcb_get_option($option, $section, $default = '')
	{

	  $options = get_option($section);

	  if (isset($options[$option])) {
		return $options[$option];
	  }

	  return $default;
	}
}