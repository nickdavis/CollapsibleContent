<?php
/**
 * FAQ module handler.
 *
 * @package     NickDavis\Module\FAQ
 * @since       1.0.0
 * @author      Nick Davis
 * @link        https://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */
namespace NickDavis\Module\FAQ;

define( 'FAQ_MODULE_DIR', __DIR__ );

function autoload() {
	$files = array(
		'custom/post-type.php',
		'custom/taxonomy.php',
		'shortcode/shortcode.php',
		'template/helpers.php',
	);

	foreach ($files as $file ) {
		include __DIR__ . '/' . $file;
	}
}
autoload();

register_activation_hook( COLLAPSIBLE_CONTENT_PLUGIN, __NAMESPACE__ . '\activate_the_plugin' );
/**
 * Initialise the rewites for our new custom post type up on activation.
 *
 * @since 1.0.0
 *
 * @return void
 */
function activate_the_plugin() {
	Custom\register_faq_custom_post_type();
	Custom\register_custom_taxonomy();

	flush_rewrite_rules();
}

register_deactivation_hook( COLLAPSIBLE_CONTENT_PLUGIN, __NAMESPACE__ .  '\deactivate_plugin' );
/**
 * The plugin is deactivating. Delete out the rewrite rules option.
 *
 * @since 1.0.0
 *
 * @return void
 */
function deactivate_plugin() {
	delete_option( 'rewrite_rules' );
}

register_uninstall_hook( COLLAPSIBLE_CONTENT_PLUGIN, __NAMESPACE__ .  '\uninstall_plugin' );
/**
 * Plugin is being uninstalled. Clean up after ourselves.
 *
 * @since 1.0.0
 *
 * @return void
 */
function uninstall_plugin() {
	delete_option( 'rewrite_rules' );
}
