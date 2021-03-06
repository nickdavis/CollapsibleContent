<?php
/**
 * Description.
 *
 * @package     NickDavis\Module\FAQ\Templates
 * @since       1.0.0
 * @author      Nick Davis
 * @link        https://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */
namespace NickDavis\Module\FAQ\Templates;

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', __NAMESPACE__ . '\do_faq_archive_loop' );
/**
 * Do the FAQ Archive Loop and render out the HTML.
 *
 * @since 1.0.0
 *
 * @return void
 */
function do_faq_archive_loop() {
	$records = get_posts_grouped_by_term( 'faq', 'topic' );
	if ( ! $records ) {
		echo '<p>Sorry, there are no FAQs.</p>';
	}

	$use_term_container = true;
	$show_term_name     = true;
	$is_calling_source  = 'template';

	foreach ( $records as $record ) {
		$term_slug = $record['term_slug'];

		include FAQ_MODULE_DIR . '/views/container.php';
	}
}

/**
 * Loop through and render out the FAQs.
 *
 * NOTE: The variables are set to call the right HTML markup in the
 * container.php view file
 *
 * @since 1.0.0
 *
 * @param array $faqs
 *
 * @return void
 */
function loop_and_render_faqs( array $faqs ) {
	$attributes = array(
		'show_icon' => 'dashicons dashicons-arrow-down-alt2',
		'hide_icon' => 'dashicons dashicons-arrow-up-alt2',
	);

	foreach ( $faqs as $faq ) {
		$hidden_content = do_shortcode( $faq['post_content'] );
		$post_title     = $faq['post_title'];

		include FAQ_MODULE_DIR . '/views/faq.php';
	}

}

genesis();
