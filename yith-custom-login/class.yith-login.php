<?php
/**
 * Main class
 *
 * @author  YITH <plugins@yithemes.com>
 * @package YITH Custom Login
 * @version 1.7.5
 */

if ( ! defined( 'YITH_LOGIN' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'YITH_Login' ) ) {
	/**
	 * YITH Custom Login
	 *
	 * @since 0.9.0
	 */
	class YITH_Login {
		/**
		 * Plugin version
		 *
		 * @var string
		 * @since 0.9.0
		 */
		public $version = '1.7.5';

		/**
		 * Plugin object
		 *
		 * @var string
		 * @since 0.9.0
		 */
		public $obj = null;

		/**
		 * Constructor
		 *
		 * @return mixed|YITH_Login_Admin|YITH_Login_Frontend
		 * @since 0.9.0
		 */
		public function __construct() {

			add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

			if ( is_admin() ) {
				$this->obj = new YITH_Login_Admin( $this->version );
			} else {
				$this->obj = new YITH_Login_Frontend( $this->version );
			}

			return $this->obj;
		}

		/**
		 * Loads the plugin's text domain for translation.
		 *
		 * @return void
		 * @since 1.7.5
		 */
		public function load_plugin_textdomain() {
			load_plugin_textdomain( 'yith-custom-login', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}
	}
}