<?php
defined( 'ABSPATH' ) || exit();

/**
 * Bc_Get_CID_Admin_Action Class
 */
class Bc_Get_CID_Admin_Action{
	
	public static function init(){

	    add_action( 'admin_post_bc_save_settings', array( __CLASS__ , 'bc_save_settings') );
	}


	public static function bc_save_settings(){

		if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'bc_settings_nonce' ) ) {
			wp_die( 'No, Cheating!' );
		}

		$bc_api_key                      = ! empty( $_POST['bc_api_key'] ) ?  $_POST['bc_api_key']  : '';
		$bc_products_id                  = ! empty( $_POST['bc_products_id'] ) ?  $_POST['bc_products_id']  : '';
		$bc_panel_text_color               = ! empty( $_POST['bc_panel_text_color'] ) ?  $_POST['bc_panel_text_color']  : '';
		$bc_panel_bg_color               = ! empty( $_POST['bc_panel_bg_color'] ) ?  $_POST['bc_panel_bg_color']  : '';
		$bc_footer_bg_color              = ! empty( $_POST['bc_footer_bg_color'] ) ?  $_POST['bc_footer_bg_color']  : '';
		$bc_primary_bg_color              = ! empty( $_POST['bc_primary_bg_color'] ) ?  $_POST['bc_primary_bg_color']  : '';
		$bc_button_hover_color           = ! empty( $_POST['bc_button_hover_color'] ) ?  $_POST['bc_button_hover_color']  : '';


		$bc_api_key                        = sanitize_text_field($bc_api_key);
		$bc_products_id                    = sanitize_text_field($bc_products_id);
		$bc_panel_text_color                 = sanitize_text_field($bc_panel_text_color);
		$bc_panel_bg_color                 = sanitize_text_field($bc_panel_bg_color);
		$bc_footer_bg_color                 = sanitize_text_field($bc_footer_bg_color);
		$bc_primary_bg_color                = sanitize_text_field($bc_primary_bg_color);
		$bc_button_hover_color             = sanitize_text_field($bc_button_hover_color);


		if ($bc_api_key) {
			update_option('bc_api_key',$bc_api_key);
		}else{
			delete_option('bc_api_key');
		}

		if (!empty($bc_products_id)) {
		    $product_ids_array = array_map('intval', explode(',', $bc_products_id));
		    update_option('bc_products_id', $product_ids_array);
		} else {
		    update_option('bc_products_id', array());
		}

		if ($bc_panel_text_color) {
			update_option('bc_panel_text_color',$bc_panel_text_color);
		}else{
			delete_option('bc_panel_text_color');
		}

		if ($bc_panel_bg_color) {
			update_option('bc_panel_bg_color',$bc_panel_bg_color);
		}else{
			delete_option('bc_panel_bg_color');
		}

		if ($bc_footer_bg_color) {
			update_option('bc_footer_bg_color',$bc_footer_bg_color);
		}else{
			delete_option('bc_footer_bg_color');
		}

		if ($bc_primary_bg_color) {
			update_option('bc_primary_bg_color',$bc_primary_bg_color);
		}else{
			delete_option('bc_primary_bg_color');
		}

		if ($bc_button_hover_color) {
			update_option('bc_button_hover_color',$bc_button_hover_color);
		}else{
			delete_option('bc_button_hover_color');
		}



		wp_safe_redirect( add_query_arg( array( 'page' => 'beep-getcid' ), admin_url( 'admin.php' ) ) );

	}






}

Bc_Get_CID_Admin_Action::init();