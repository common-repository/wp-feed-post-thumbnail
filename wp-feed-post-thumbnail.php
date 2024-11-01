<?php
/**
 * Plugin Name:       Feed Post Thumbnail
 * Plugin URI:        https://required.com/services/wordpress-plugins/wp-feed-post-thumbnail/
 * Description:       Adds MRSS namespace to the feed and uses post-thumbnail as media element in the feed. Settings available under Settings -> Reading.
 * Version:           3.0.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            required
 * Author URI:        https://required.com
 * License:           GPLv2+
 * Text Domain:       wp-feed-post-thumbnail
 *
 * Copyright (c) 2015-2023 required (email: support@required.ch)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

// phpcs:disable Generic.Arrays.DisallowLongArraySyntax -- File needs to be parsable by PHP 5.2.4.

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require dirname( __FILE__ ) . '/vendor/autoload.php';
}

// phpcs:ignore WordPress.NamingConventions -- Variable gets unset.
$requirements_check = new WP_Requirements_Check(
	array(
		'title' => 'Feed Post Thumbnail',
		'php'   => '7.4',
		'wp'    => '6.0',
		'file'  => __FILE__,
	)
);

if ( $requirements_check->passes() ) {
	// Pull in the plugin classes and initialize.
	include dirname( __FILE__ ) . '/classes/plugin.php';

	$wp_feed_post_thumbnail_plugin = new WP_Feed_Post_Thumbnail_Plugin();
	add_action( 'plugins_loaded', array( $wp_feed_post_thumbnail_plugin, 'add_hooks' ) );
}

unset( $requirements_check );
