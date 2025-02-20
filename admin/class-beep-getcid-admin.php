<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://beepcoder.com
 * @since      1.0.0
 *
 * @package    Beep_Getcid
 * @subpackage Beep_Getcid/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Beep_Getcid
 * @subpackage Beep_Getcid/admin
 * @author     Beepcoder <hello@beepcoder.com>
 */
class Beep_Getcid_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Beep_Getcid_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Beep_Getcid_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/beep-getcid-admin.css', array(), $this->version, 'all' );


	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Beep_Getcid_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Beep_Getcid_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( $this->plugin_name, plugins_url('js/beep-getcid-admin.js', __FILE__ ), array( 'wp-color-picker' ), $this->version, true );


	}

		/**
	 * Register the Menu for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function bc_register_admin_menus() {

		add_menu_page(
			__( 'Beep GetCID', 'beep-getcid' ),
			'Beep GetCID',
			'manage_options',
			'beep-getcid',
			array( 'Bc_Admin_Setting_Display', 'output' ),
			'dashicons-tagcloud',
			56
		);

		add_submenu_page(
			'beep-wp-getcid',
			__( 'Beep GetCID', 'beep-getcid' ),
			__( 'Beep GetCID', 'beep-getcid' ),
			'manage_options',
			'beep-getcid',
			array( 'Bc_Admin_Setting_Display', 'output' )
		);

	}


}
