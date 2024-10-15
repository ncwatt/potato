<?php
/**
 * @package Gtctek Potato
 * @version 1.0.0
 * 
 * Plugin Name:  Potato
 * Text Domain:  gtctek-potato
 * Plugin URI:   https://gtctek.co.uk/potato
 * Description:  Potato is collection of WordPress utilities to enhance your site.
 * Version:      1.0.0
 * Author:       Gtctek
 * Author URI:   https://gtctek.co.uk
 * License:      GPL2 or later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

$gtctek_potato_ver = '1.0.0';

// Make sure we don't expose any info if called directly
if ( ! function_exists( 'add_action' ) ) {
    die( 'Invalid request. You cannot call a plugin directly.' );
    exit;
}

// Define blobal properties
define( 'GTCTEK_POTATO__VERSION', $gtctek_potato_ver );
define( 'GTCTEK_POTATO__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'GTCTEK_POTATO__PLUGIN_URI', plugin_dir_url( __FILE__ ) );
define( 'GTCTEK_POTATO__PREPEND', 'gtctek-potato' );
define( 'GTCTEK_POTATO__TEXT_DOMAIN', 'gtctek-potato' );
