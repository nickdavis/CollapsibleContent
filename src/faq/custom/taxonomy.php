<?php
/**
 * Taxonomy handler.
 *
 * @package     NickDavis\Module\FAQ\Custom
 * @since       1.0.0
 * @author      Nick Davis
 * @link        https://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */
namespace NickDavis\Module\FAQ\Custom;

add_action( 'init', __NAMESPACE__ . '\register_custom_taxonomy' );
/**
 * Register the custom post type.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_custom_taxonomy() {

	$args = array(
		'label'             => __( 'Topics', 'collapsible-content' ),
		'labels'            => get_taxonomy_labels_config(),
		'hierarchical'      => true,
		'show_admin_column' => true,
		'public'            => false,
		'show_ui'           => true,
	);

	register_taxonomy( 'topic', array( 'faq' ), $args );
}

/**
 * Get the taxonomy label configuation.
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_taxonomy_labels_config() {
	// You could do single and plural label variables for the below but I'm not sure it'll work with translation https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/
	return array(
		'name'                       => _x( 'Topics', 'taxonomy general name', 'collapsible-content' ),
		'singular_name'              => _x( 'Topic', 'taxonomy singular name', 'collapsible-content' ),
		'search_items'               => __( 'Search Topics', 'collapsible-content' ),
		'popular_items'              => __( 'Popular Topics', 'collapsible-content' ),
		'all_items'                  => __( 'All Topics', 'collapsible-content' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Topic', 'collapsible-content' ),
		'view_item'                  => __( 'View Topic', 'collapsible-content' ),
		'update_item'                => __( 'Update Topic', 'collapsible-content' ),
		'add_new_item'               => __( 'Add New Topic', 'collapsible-content' ),
		'new_item_name'              => __( 'New Topic Name', 'collapsible-content' ),
		'separate_items_with_commas' => __( 'Separate topics with commas', 'collapsible-content' ),
		'add_or_remove_items'        => __( 'Add or remove topics', 'collapsible-content' ),
		'choose_from_most_used'      => __( 'Choose from the most used topics', 'collapsible-content' ),
		'not_found'                  => __( 'No topics found.', 'collapsible-content' ),
		'menu_name'                  => __( 'Topics', 'collapsible-content' ),
	);
}

add_filter( 'genesis_post_meta', __NAMESPACE__ . '\filter_genesis_footer_post_meta' );
/**
 * Filter the Genesis Footer Entry Post Meta to add the post terms for our
 * custom taxonomy
 *
 * @since 1.0.0
 *
 * @param string $post_meta
 *
 * @return string
 */
function filter_genesis_footer_post_meta( $post_meta ) {

	//$post_meta .= ' [post_terms taxonomy="topic" before="' . __( 'Topic: ', 'collapsible-content') . '"]';
	$post_meta .= sprintf( ' [post_terms taxonomy="topic" before="%s"]',
		__( 'Topic: ', 'collapsible-content' )
	);

	return $post_meta;
}
