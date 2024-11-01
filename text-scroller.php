<?php
/*
Plugin Name: Text Scroller
Plugin URI: http://nitinmaurya.com/
Description: Set Under Construction Message for website.
Version: 1.0
Author: Nitin Maurya
Author URI: http://nitinmaurya.com/
License: A "Slug" license name e.g. GPL2
*/
register_activation_hook(__FILE__,'text_scroller_install');
function text_scroller_install(){
	global $wp_version;
	if(version_compare($wp_version, "3.2.1", "<")) {
		deactivate_plugins(basename(__FILE__));
		wp_die("This plugin requires WordPress version 3.2.1 or higher.");
	}
	set_text_scroller();
}
add_action('admin_menu','text_scroller_menu');
    function text_scroller_menu(){
        add_menu_page('Text Scroller', 'Text Scroller','administrator', 'text-scroller.php', 'text_scroller_action', plugins_url('ts.png', __FILE__));
   }
   
   
function text_scroller_action(){
	$option_name1 = 'set_msg' ;
	switch($_REQUEST[act]) {
			case "save":
				set_text_scroller();
				echo '<div class="updated below-h2" id="message" style="position:relative; clear:both;"><p>Text Scroller: '.$_REQUEST['set_msg'].'</p></div>';
				break;
			default:
				
	}
	$set_msg=get_option( $option_name1 );
	require_once('form.php');
}   
   

function set_text_scroller(){
		$option_name1 = 'set_msg' ;	
				
		$new_value1 = ($_REQUEST['set_msg']=="")?'Dummy text': $_REQUEST['set_msg'];
		if ( get_option( $option_name1 ) !== false ) {
			update_option( $option_name1, $new_value1 );
		} else {
			$deprecated = null;
			$autoload = 'no';
			add_option( $option_name1, $new_value1, $deprecated, $autoload );
		}	
		
	
		
}

function show_ts($arg){
	print_r($arg);
	$option_name1 = 'set_msg' ;
	$set_msg=get_option( $option_name1 );	
	if($set_msg!=""){
		echo "<marquee behavior='scroll' direction='left'><div>".$set_msg."</div></marquee>";
	}
	
}
//add_action('wp_head', 'show_ts');
add_shortcode('show_textscroller', 'show_ts');

?>