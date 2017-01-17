<?php
/**
 * Collapsible Content plugin
 *
 * @package     NickDavis\CollapsibleContent
 * @author      iamnickdavis
 * @license     GPL-2.0+
 * @link        https://iamnickdavis.com
 *
 * @wordpress-plugin
 * Plugin Name:     Collapsible Conent
 * Plugin URI:      _
 * Description:     Collapsible Content is a WordPress plugin that shows and hides content.
 * Version:         1.0.0
 * Author:          iamnickdavis
 * Author URI:      https://iamnickdavis.com
 * Text Domain:     collapsible_content
 * Requires WP:     4.7
 * Requires PHP:    5.5
 */

/*
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

namespace NickDavis\CollapsibleContent;

if ( ! defined( 'ABSPATH' ) ) {
	die( "Oh, silly, there's nothing to see here." );
}

include __DIR__ . '/src/shortcode/shortcodes.php';
