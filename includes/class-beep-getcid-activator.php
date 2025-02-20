<?php

/**
 * Fired during plugin activation
 *
 * @link       https://beepcoder.com
 * @since      1.0.0
 *
 * @package    Beep_Getcid
 * @subpackage Beep_Getcid/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Beep_Getcid
 * @subpackage Beep_Getcid/includes
 * @author     Beepcoder <hello@beepcoder.com>
 */
class Beep_Getcid_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		if ( ! get_page_by_title( 'Get Confirmation ID' ) ) {
	        // Create page object
	        $page = array(
	            'post_title'    => 'Get Confirmation ID',
	            'post_content'  => '[bc_get_confirmation_id]',
	            'post_status'   => 'publish',
	            'post_author'   => 1,
	            'post_type'     => 'page',
	        );

	        $page_id = wp_insert_post( $page );

	    }
	}

}
