<?php
/**
 * Description.
 *
 * @package     NickDavis\Module\FAQ\Custom
 * @since       1.0.0
 * @author      Nick Davis
 * @link        https://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */
namespace NickDavis\Module\FAQ\Custom;

// But don't do this for text domains...
//define( 'FAQ_MODULE_TEXT_DOMAIN', COLLAPSIBLE_CONTENT_TEXT_DOMAIN );

add_action( 'init', __NAMESPACE__ . '\register_faq_custom_post_type' );
/**
 * Register the custom post type.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_faq_custom_post_type() {

	$features = get_all_post_type_features( 'post', array(
		'excerpt',
		'comments',
		'trackbacks',
		'custom-fields',
//		'thumbnail',
	) );

	$features[] = 'page-attributes';

	$args = array(
		'description'   => 'Frequently Asked Questions (FAQ)',
		'label'         => __( 'FAQs', 'collapsible-content' ),
		'labels'        => get_post_type_labels_config(),
		'public'        => true,
		'supports'      => $features,
		'menu_icon'     => 'dashicons-editor-help',
		'has_archive'   => true,
	);

	register_post_type( 'faq', $args );
}

/**
 * Get the post type label configuation.
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_post_type_labels_config() {
	// You could do single and plural label variables for the below but I'm not sure it'll work with translation https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/
	return array(
		'name'               => _x( 'FAQs', 'post type general name', 'collapsible-content' ),
		'singular_name'      => _x( 'FAQ', 'post type singular name', 'collapsible-content' ),
		'menu_name'          => _x( 'FAQs', 'admin menu', 'collapsible-content' ),
		'name_admin_bar'     => _x( 'FAQ', 'add new on admin bar', 'collapsible-content' ),
		'add_new'            => _x( 'Add New', 'FAQ', 'collapsible-content' ),
		'add_new_item'       => __( 'Add New FAQ', 'collapsible-content' ),
		'new_item'           => __( 'New FAQ', 'collapsible-content' ),
		'edit_item'          => __( 'Edit FAQ', 'collapsible-content' ),
		'view_item'          => __( 'View FAQ', 'collapsible-content' ),
		'all_items'          => __( 'All FAQs', 'collapsible-content' ),
		'search_items'       => __( 'Search FAQs', 'collapsible-content' ),
		'parent_item_colon'  => __( 'Parent FAQs:', 'collapsible-content' ),
		'not_found'          => __( 'No FAQs found.', 'collapsible-content' ),
		'not_found_in_trash' => __( 'No FAQs found in Trash.', 'collapsible-content' )
	);
}

/**
 * Get all the post type features for the given post type.
 *
 * @since 1.0.0
 *
 * @param string $post_type Given post type
 * @param array $exclude_features Array of features to exclude
 *
 * @return array
 */
function get_all_post_type_features( $post_type = 'post', $exclude_features = array() ) {
	$configured_features = get_all_post_type_supports( $post_type );

	if ( ! $exclude_features ) {
		return array_keys( $configured_features );
	}

	$features = array();

	foreach ( $configured_features as $feature => $value ) {
		if ( in_array( $feature, $exclude_features ) ) {
			continue; // Skips the rest of the foreach
		}

		$features[] = $feature;
	}

	return $features;
}
