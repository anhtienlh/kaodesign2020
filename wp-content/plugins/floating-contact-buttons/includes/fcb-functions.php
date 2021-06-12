<?php
function fcb_checkDevice(){
// checkDevice() : checks if user device is phone, tablet, or desktop
// RETURNS 0 for desktop, 1 for mobile, 2 for tablets
	if(isset($_SERVER['HTTP_USER_AGENT'])){
		if(is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"))){
			return is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "tablet")) ? 2 : 1 ;
		}else{
			return 0;
		}
	}
}

function fcb_social_media(){
	$select_social_media= array(
		'fcb_whatsapp' => 'Whatsapp',
		'fcb_facebook' => 'Facebook',
		'fcb_viber'    => 'Viber',
		'fcb_slack'    => 'Slack',
		'fcb_telegram' => 'Telegram',
		'fcb_skype'    => 'Skype',
		'fcb_call'     => __('Call Now','fcb'),
		'fcb_email'    => __('Email Us','fcb'),
		'fcb_phone'    => __('Callback Request','fcb')
	);
	return $select_social_media;
}
