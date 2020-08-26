<?php
/*
Plugin Name: Titan Anti-spam & Security
Plugin URI: http://wordpress.org/plugins/anti-spam/
Description: Titan Security - Anti-spam, Anti-virus, Firewall and Malware Scan
Version: 7.1.4
Author: CreativeMotion
Text Domain: titan-security
Author URI: https://cm-wp.com/
License: GPLv3
*/

// Exit if accessed directly
if( !defined('ABSPATH') ) {
	exit;
}

/**
 * Developers who contributions in the development plugin:
 *
 * Alexander Kovalev
 * ---------------------------------------------------------------------------------
 * Plugin development
 *
 * Email:         alex.kovalevv@gmail.com
 * Personal card: https://alexkovalevv.github.io
 * Personal repo: https://github.com/alexkovalevv
 * ---------------------------------------------------------------------------------
 *
 * Artem Prihodko
 * ---------------------------------------------------------------------------------
 * Plugin development.
 *
 * Email:         webtemyk@yandex.ru
 * Personal repo: https://github.com/temyk
 * ---------------------------------------------------------------------------------
 */

/**
 * -----------------------------------------------------------------------------
 * CHECK REQUIREMENTS
 * Check compatibility with php and wp version of the user's site. As well as checking
 * compatibility with other plugins from Webcraftic.
 * -----------------------------------------------------------------------------
 */

require_once(dirname(__FILE__) . '/libs/factory/core/includes/class-factory-requirements.php');

// @formatter:off
$wtitan_plugin_info = [
	'prefix' => 'titan_',
	'plugin_name' => 'titan_security',
	'plugin_title' => __('Titan security', 'titan-security'),

	// PLUGIN SUPPORT
	'support_details' => [
		'url' => 'https://titansitescanner.com',
		'pages_map' => [
			'support' => 'support',           // {site}/support
			'docs' => 'docs',               // {site}/docs
			'pricing' => 'pricing',           // {site}/prices
		]
	],

	// PLUGIN PREMIUM SETTINGS
	'has_premium' => true,
	'license_settings' => [
		'provider' => 'freemius',
		'slug' => 'antispam-premium',
		'plugin_id' => '5079',
		'public_key' => 'pk_98a99846a14067246257d4f43c04a',
		'price' => 79,
		'has_updates' => true,
		'updates_settings' => [
			'maybe_rollback' => true,
			'rollback_settings' => [
				'prev_stable_version' => '0.0.0'
			]
		]
	],

	// PLUGIN ADVERTS
	'render_adverts' => true,
	'adverts_settings' => [
		'dashboard_widget' => true, // show dashboard widget (default: false)
		'right_sidebar' => true, // show adverts sidebar (default: false)
		'notice' => true, // show notice message (default: false)
	],

	// FRAMEWORK MODULES
	'load_factory_modules' => [
		['libs/factory/bootstrap', 'factory_bootstrap_429', 'admin'],
		['libs/factory/forms', 'factory_forms_426', 'admin'],
		['libs/factory/pages', 'factory_pages_428', 'admin'],
		['libs/factory/clearfy', 'factory_clearfy_220', 'all'],
		['libs/factory/freemius', 'factory_freemius_116', 'all'],
		['libs/factory/feedback', 'factory_feedback_103', 'admin']
	],
	/*'load_plugin_components' => array(
		'hide-login-page' => array(
			'autoload' => 'libs/hide-login-page/titan.php',
			'plugin_prefix' => 'WHLP_'
		)
	)*/

];

$wtitan_compatibility = new Wbcr_Factory428_Requirements(__FILE__, array_merge($wtitan_plugin_info, [
	'plugin_already_activate' => defined('WTITAN_PLUGIN_ACTIVE'),
	'required_php_version' => '5.6',
	'required_wp_version' => '4.9.0',
	'required_clearfy_check_component' => false
]));

/**
 * If the plugin is compatible, then it will continue its work, otherwise it will be stopped,
 * and the user will throw a warning.
 */
if( !$wtitan_compatibility->check() ) {
	return;
}

/**
 * -----------------------------------------------------------------------------
 * CONSTANTS
 * Install frequently used constants and constants for debugging, which will be
 * removed after compiling the plugin.
 * -----------------------------------------------------------------------------
 */

// This plugin is activated
define('WTITAN_PLUGIN_ACTIVE', true);
define('WTITAN_PLUGIN_VERSION', $wtitan_compatibility->get_plugin_version());
define('WTITAN_PLUGIN_DIR', dirname(__FILE__));
define('WTITAN_PLUGIN_BASE', plugin_basename(__FILE__));
define('WTITAN_PLUGIN_URL', plugins_url(null, __FILE__));



/**
 * -----------------------------------------------------------------------------
 * PLUGIN INIT
 * -----------------------------------------------------------------------------
 */
require_once(WTITAN_PLUGIN_DIR . '/libs/factory/core/boot.php');
require_once(WTITAN_PLUGIN_DIR . '/includes/antispam/functions.php');
require_once(WTITAN_PLUGIN_DIR . '/includes/class-titan-security-plugin.php');

try {
	$plugin = new \WBCR\Titan\Plugin(__FILE__, array_merge($wtitan_plugin_info, [
		'plugin_version' => WTITAN_PLUGIN_VERSION,
		'plugin_text_domain' => $wtitan_compatibility->get_text_domain(),
	]));

	require_once(WTITAN_PLUGIN_DIR . '/includes/functions.php');

	if( $plugin->is_premium() ) {
		require_once(WTITAN_PLUGIN_DIR . '/libs/antispam-premium/anti-spam-premium.php');
	}
} catch( Exception $e ) {
	// Plugin wasn't initialized due to an error
	define('WTITAN_PLUGIN_THROW_ERROR', true);

	$wtitan_plugin_error_func = function () use ($e) {
		$error = sprintf("The %s plugin has stopped. <b>Error:</b> %s Code: %s", 'CreativeMotion Titan security', $e->getMessage(), $e->getCode());
		echo '<div class="notice notice-error"><p>' . $error . '</p></div>';
	};

	add_action('admin_notices', $wtitan_plugin_error_func);
	add_action('network_admin_notices', $wtitan_plugin_error_func);
}
// @formatter:on