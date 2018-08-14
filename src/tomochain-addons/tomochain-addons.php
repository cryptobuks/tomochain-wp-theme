<?php
/**
 * Plugin Name: TomoChain Addons
 * Description: A collection of shortcodes for Visual Composer. It was made for TomoChain website
 * Author: TomoChain
 * Author URI: http://tomochain.com
 * Version: 1.0
 * Text Domain: tomochain-addons
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'TOMOCHAIN_ADDONS_DIR', plugin_dir_path( __FILE__ ) );
define( 'TOMOCHAIN_ADDONS_URL', plugin_dir_url( __FILE__ ) );

class TomoChain_Addons {

    public function __construct() {
        $this->init();
        $this->includes();
    }

    public function init() {
        add_action( 'admin_notices', array( $this, 'check_dependencies' ) );
        load_plugin_textdomain( 'tomochain-addons', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
    }

    /**
     * Check plugin dependencies
     * Check if Visual Composer plugin is installed
     */
    public function check_dependencies() {
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            $plugin_data = get_plugin_data( __FILE__ );

            printf( '<div class="notice notice-error"><p>%s</p></div>',
                sprintf( __( '<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.',
                    'tomochain-addons' ),
                    $plugin_data['Name'] ) );
        }
    }

    /**
     * Load files
     */
    public function includes() {
        if ( defined( 'WPB_VC_VERSION' ) ) {
            include_once( TOMOCHAIN_ADDONS_DIR . 'inc/vc-extend.php' );
        }
	}
}

new TomoChain_Addons();
