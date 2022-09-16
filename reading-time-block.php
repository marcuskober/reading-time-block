<?php
/*
 * Plugin Name: Reading time block
 * Plugin URI: https://marcuskober.de
 * Description: A Gutenberg block to display reading time of a post or page.
 * Version: 0.0.1
 * Author: Marcus Kober
 * Author URI: https://marcuskober.de
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

add_action('init', function() {
    register_block_type_from_metadata(__DIR__, [
        'render_callback' => 'marcuskober_reading_time_block_render',
    ]);
});

function marcuskober_reading_time_block_render($attributes, $content, $block) {
}