<?php
class FCB_Layout
{

    function __construct()
    {
		add_action( 'wp_footer', array($this,'fcb_generate_html') );
		add_action( 'wp_enqueue_scripts',array($this,'fcb_register_frontend_assets')); //registers js and css for frontend
		add_action( 'wp_ajax_fcb_send_email', array( $this, 'fcb_callback_send_email' ) );
		add_action( 'wp_ajax_nopriv_fcb_send_email', array( $this, 'fcb_callback_send_email' ) );
		
	}
	
	 /**
     * Ajax for sending callback request mail
     */
	function fcb_callback_send_email(){

        $FCB_Settings=new FCB_Settings();
        $fcb_email_to =  sanitize_email($FCB_Settings->fcb_get_option('fcb_email_to', 'fcb_basic_settings'));
        $fcb_email_from =  sanitize_email($FCB_Settings->fcb_get_option('fcb_email_from', 'fcb_basic_settings'));
		$fcb_phn_num = filter_var($_POST['phone_num'], FILTER_SANITIZE_NUMBER_INT);
		$site_url= get_bloginfo();
				
		$message = '<html><body>';
		$message .= '<h3>A Callback request is received by Instant Support Buttons </h3>';
		$message .= '<p><strong>Call</strong>: <a href="tel:'.$fcb_phn_num.'">'.$fcb_phn_num.'</a></p>';
		$message .= '</body></html>';

		$subject = "[$site_url]Callback Request By Instant Support Buttons ";
		
		$headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:<$fcb_email_from> \r\n";
        $headers .= "Reply-To: '.$fcb_email_from.'\r\n";
		
        $mail=wp_mail( $fcb_email_to, $subject, $message, $headers);

	}

	function fcb_generate_html(){
		global $wp_query;
		$FCB_Settings=new FCB_Settings(); 

		//  colors
		$fcb_font_color=  $FCB_Settings->fcb_get_option('fcb_font_color', 'fcb_style_settings');
		$fcb_bg_color=  $FCB_Settings->fcb_get_option('fcb_bg_color', 'fcb_style_settings');
		$fcb_circle_color=  $FCB_Settings->fcb_get_option('fcb_circle_color', 'fcb_style_settings');
		
		$select_color='';
		$font_color=(isset($fcb_font_color)&& $fcb_font_color!="") ?$fcb_font_color :"#12580f";
		$bg_color=(isset($fcb_bg_color)&& $fcb_bg_color!="") ?$fcb_bg_color :"#ffffff";
		$circle_color=(isset($fcb_circle_color)&& $fcb_circle_color!="") ?$fcb_circle_color :"#12580f";

		$select_color='.fcb-container{
			background-color:'.$circle_color.'!important;color: '.$circle_color.'!important;
		}		
		.fcb-menus-container,.fcb-menus-container a,.fcb-media-icon .fcb-icon, .fcb-callback,#fcb-success-msg h2  {
			background:'.$bg_color.'!important;
			color: '.$font_color.'!important;
		}
		#fcb-callback-submit{
			background-color:'.$font_color.'!important;
		}
		.fcb-loader-ring:after{
			border-color: '.$font_color.' transparent '.$font_color.' transparent !important;
		}
		.fcb-marque-icons .fcb-icon {
			color: '.$circle_color.'!important;
		}
		';
		//end colors 
		
		$social_media_list= fcb_social_media();
		$fcb_id_array= array();
		$social_media=  $FCB_Settings->fcb_get_option('social_media', 'fcb_basic_settings');
		$fcb_show_list=  $FCB_Settings->fcb_get_option('fcb_show_on', 'fcb_style_settings');
		$fcb_custom_page=  $FCB_Settings->fcb_get_option('fcb_custom_page', 'fcb_style_settings');       
        $fcb_email_to =  sanitize_email($FCB_Settings->fcb_get_option('fcb_email_to', 'fcb_basic_settings'));       
        $fcb_email_from =  sanitize_email($FCB_Settings->fcb_get_option('fcb_email_from', 'fcb_basic_settings'));

        $fcb_id_array= explode(',',$fcb_custom_page);
		$postid = get_the_ID();
		$fcb_show_on=  isset( $fcb_show_list ) && $fcb_show_list!=""? $fcb_show_list : 'all';
        
        $social_media=array('fcb_whatsapp','fcb_facebook','fcb_viber','fcb_slack','fcb_telegram','fcb_skype','fcb_email','fcb_phone','fcb_call');

		$deviceType = fcb_checkDevice();
		$fcb_HideCallNow_from=  $FCB_Settings->fcb_get_option('fcb_hide_call_now', 'fcb_basic_settings');		
		$fcb_HideCallNow_from= isset($fcb_HideCallNow_from) && $fcb_HideCallNow_from!=""? $fcb_HideCallNow_from: '';
		
		if(!empty($fcb_HideCallNow_from)){
			if($deviceType==0 && in_array('pc',$fcb_HideCallNow_from)){
	  			array_pop($social_media);
			}else if($deviceType==1 && in_array('mobile',$fcb_HideCallNow_from)){
	   			array_pop($social_media);
			}else if($deviceType==2 && in_array('tablet',$fcb_HideCallNow_from)){
	   			array_pop($social_media);
			}
		}



		$output=''; 
        $fcb_address=false;
        
        $output.='
        <div class="fcb-container">
			<div class="fcb-main-button" style="display:none;">
				<a id="fcb-btn">
					<div class="fcb-cross-icons">
                        <div class="fcb-marque-icons">';
								$total_media_url =array();
								$animation_count = 1;
								$output.='<span class="fcb-icon icon-fcb_chat"></span>';
                            foreach ( $social_media as $key => $value) {
                    
                                $media_link=  $FCB_Settings->fcb_get_option($value, 'fcb_basic_settings');
										  $media_url= isset( $media_link ) ? $media_link : '';
										  
                                if($media_url!=''){
                                    $total_media_url[]= $media_url;
												$output.='<span class="fcb-icon icon-'.$value.'" style="z-index: '. (99 - $animation_count) .';animation-delay:'. $animation_count.'s"></span>';
												$animation_count = $animation_count + 2;
										  }					                        
                               
									 }
									 $output.='<style>						 
										@keyframes cf4FadeInOut {
											0% {
												opacity:1;
											}
											'. (1 / $animation_count) * 100 .'% {
												opacity:1;
											}
											'. (3 / $animation_count) * 100 .'% {
												opacity:0;
											}
											'. (100 - ((2 / $animation_count) * 100)) .'% {
												opacity:0;
											}
											100% {
												opacity:1;
											}
											}
											.fcb-marque-icons .fcb-icon {
												animation-duration: '.$animation_count.'s;
												-o-animation-duration: '.$animation_count.'s;
												-moz-animation-duration: '.$animation_count.'s;
												-webkit-animation-duration: '.$animation_count.'s;
											}

										</style>';

                            if(empty($total_media_url)){
                                foreach ( $social_media as $key => $value) {
                                $output.='<span class="fcb-icon icon-'.$value.'"></span>';
                                }
                            }
                                         						
						$output.='</div>
					</div>	


					<div class="fcb-close-menu"><img class="fcb-close-img" src="'.FCB_URL . 'assets/images/fcb_close.png"></div>
				</a>
			</div>
			<div class="fcb-menus-container fcb-scale-transition fcb-scale-out" style="display:none;">';
            	foreach ( $social_media as $key => $value) {
	                $media_name=$social_media_list[$value];				
					$media_link=  $FCB_Settings->fcb_get_option($value, 'fcb_basic_settings');
					$media_url= isset( $media_link ) ? $media_link : '';
					$slack_user_id=  $FCB_Settings->fcb_get_option('fcb_slack_user', 'fcb_basic_settings');
					$slack_user= isset( $slack_user_id ) ? $slack_user_id : '';
					$url_array= array(
                        "fcb_facebook"=>"https://m.me/$media_url",
					    "fcb_email"=>"mailto:$media_url", 
					    "fcb_skype"=>"skype:live:$media_url?chat",
					    "fcb_telegram"=>"https://telegram.me/$media_url", 
					    "fcb_whatsapp"=>"https://wa.me/$media_url",
					    "fcb_viber"=>"viber://chat?number=$media_url", 
                        "fcb_slack"=>"slack://user?team=$media_url&id=$slack_user",
                        "fcb_call"=>"tel:$media_url"
                    );
						
                    if($value=='fcb_phone' && $fcb_email_to!='' &&  $fcb_email_from!=''){
                        $output.='<a id="fcb-phone" class="fcb-menus">
                        <span class="fcb-media-icon"><span class="fcb-icon icon-'.$value.'"></span></span>
                        <span class="fcb-media-name">' .$media_name. '<span>
                        </a>';
                    }
					else if($media_url!=''){
						$fcb_address=true;
                        $output.='<a href="'.$url_array[$value].'" target="__blank" class="fcb-menus" id="'.$key.'">
                            <span class="fcb-media-icon">';
                                
                            $output.='<span class="fcb-icon icon-'.$value.'"></span>';
                                
                            $output.='</span>
                            <span class="fcb-media-name">' .$media_name. '</span>
                        </a>';
					}
				}		
			    if($fcb_address!=true){
					$setting_panel=admin_url('options-general.php?page=instant_support_buttons');
					if(is_user_logged_in()){					
						$output.='<p class="fcb-config-plugin">'.__("Please configure at least one social media option in setting's page",'fcb').'. <a href="'.$setting_panel.'">'.__("Click Here",'fcb').'</a></p>';
					}
					else{
						$output.='<p class="fcb-config-plugin">'.__("Social media options not selected",'fcb').'.</p>';
					}				
				} 
				
		    $output.='</div>
				<div class="fcb-callback fcb-scale-transition fcb-scale-out" style="display:none;">
                    <div class="fcb-close-icon">
                        <img class="fcb-img" src="'.FCB_URL . 'assets/images/fcb_close.png">
                    </div>
					<div class="fcb-callback-details">
						<div id="fcb-loader-wrapper">
							<div class="fcb-loader-ring"></div>
						</div>
						<div class="fcb-callback-text">
							<span class="fcb-callback-message">'.__('Please enter your phone number and we will call you back soon','fcb').'</span>
						</div>						
						<div class="fcb-callback-form">
							<form method="post">
							<input name="phone_num" id="fcb-phn-num" class="fcb-message-callback" required="required" type="tel" data-mask="000-00-000-00-00" placeholder="+XXX-XX-XXX-XX-XX">
							<input id="fcb-callback-submit" type="submit" value="'.__('Submit','fcb').'">
							</form>
						</div>						
					</div>				
					
					<div id="fcb-success-msg">
						<h2>'.__('Thank you','fcb').'</h2>
						<p>'.__('We will call you back soon','fcb').'</p>
					</div>	
					<div id="fcb-error-msg">
						<span class="fcb-alert">'.__('Please enter valid phone number','fcb').'</span>
					</div>	
		        </div>
        </div>
        <style type="text/css">'.$select_color.'</style>';
        if ($fcb_show_on=='all' || in_array($wp_query->post->ID,$fcb_id_array)){
            wp_enqueue_style( 'fcb-css');
            wp_enqueue_style( 'fcb-fontawesome');
            wp_enqueue_script( 'fcb-js');
            wp_enqueue_script( 'fcb-mask-js');
            echo $output;
        }
	}
	
	function fcb_register_frontend_assets() 
	{ 
		
		wp_register_style( 'fcb-css', FCB_URL . 'assets/css/floating-contact-buttons.min.css', array(), null);
		wp_register_style( 'fcb-fontawesome', FCB_URL . 'assets/css/custom-icons.min.css', array(),false);
		wp_register_script( 'fcb-js', FCB_URL . 'assets/js/floating-contact-buttons.min.js', array('jquery'), false, true);
		wp_localize_script( 'fcb-js', 'fcb_callback_ajax', array( 'ajax_url' => admin_url('admin-ajax.php')) );
		wp_register_script( 'fcb-mask-js', FCB_URL . 'assets/js/jquery.mask.min.js', array('jquery'), false, true);	
		
	}
	
}