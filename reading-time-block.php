<?php
/*
 * Plugin Name: Reading time block
 * Plugin URI: https://marcuskober.de
 * Description: A Gutenberg block to display reading time of a post or page.
 * Version: 0.1.0
 * Author: Marcus Kober
 * Author URI: https://marcuskober.de
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Marcuskober\ReadingTimeBlock;

add_action('init', function() {
    register_block_type_from_metadata(__DIR__, [
        'render_callback' => function($attributes, $content, $block) {
            if (! isset($block->context['postId'])) {
                return;
            }

            $className   = empty($attributes['textAlign']) ? '' : "has-text-align-{$attributes['textAlign']}";
            $wrapperAttributes = get_block_wrapper_attributes(['class' => $className]);

            $postId = $block->context['postId'];
            $content = strip_tags(get_post_field('post_content', $postId));
            $words = str_word_count($content, 0, 'äöüßÄÖÜ');
            $readingTime = ceil($words / $attributes['wordsPerMinute']);

            $template = sprintf($attributes['textTemplate'], $readingTime);

            return sprintf(
                '<div %1$s><span>%2$s</span></div>',
                $wrapperAttributes,
                esc_html($template),
            );
        },
    ]);
});
