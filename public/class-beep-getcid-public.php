<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://beepcoder.com
 * @since      1.0.0
 *
 * @package    Beep_Getcid
 * @subpackage Beep_Getcid/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Beep_Getcid
 * @subpackage Beep_Getcid/public
 * @author     Beepcoder <hello@beepcoder.com>
 */
class Beep_Getcid_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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



	    // Enqueue the CSS inline
	    
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/beep-getcid-public-css.php';
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/beep-getcid-public.css', array(), $this->version, 'all' );
		wp_add_inline_style($this->plugin_name, $bc_custom_css);

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/beep-getcid-public.js', array( 'jquery' ), $this->version, false );

		wp_localize_script($this->plugin_name, 'bcGetCID', [
	        'ajax_url' => admin_url('admin-ajax.php')
	    ]);

	}

}
