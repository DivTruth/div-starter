<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Div Starter Admin.
 *
 * @class 		DS_Admin 
 * @author 		Div Blend Team
 * @category 	Admin
 * @package 	DivStarter/Admin
 * @version     1.0
 */
class DS_Admin {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->includes();
	}

	/**
	 * Include any classes we need within admin.
	 */
	public function includes() {
		/* ACF Options */
		include_once( 'acf-application-options.php' );
		/* Admin Functions */
		include_once( 'class-ds-admin-functions.php' );
	}

}

return new DS_Admin();