<?php
/**
 * Plugin Name:       Followupboss forms [Custom]
 * Plugin URI:        http://amitairi.ca/
 * Description:       Custom plugin to communicate with followupboss
 * Version:           1.1.0
 * Author:            Amitairi
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fub-custom-forms
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}
if (!defined('FUB_PLUGIN_NAME' ) ) define('FUB_PLUGIN_NAME', 'fub-custom-forms');

require_once('includes/admin.php');
require_once('includes/fub-functions.php');
require_once('includes/shortcodes.php');

register_activation_hook( __FILE__, 'fub_activate_plugin' );
register_uninstall_hook( __FILE__, 'fub_uninstall_plugin' );