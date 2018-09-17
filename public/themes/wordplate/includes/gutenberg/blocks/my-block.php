<?php

declare(strict_types=1);

if (!defined('ABSPATH')) { exit(); }

add_action('enqueue_block_assets', function() {
    wp_enqueue_style(
        'my-block-frontend-style',
        mix('styles/gutenberg/blocks/my-block/frontend.css'),
        ['wp-blocks']
    );
});

add_action('enqueue_block_editor_assets', function() {
    wp_enqueue_script(
        'my-block-editor-script',
        mix('scripts/gutenberg/blocks/my-block/editor.js'),
        ['wp-blocks', 'wp-editor', 'wp-element']
    );

    wp_enqueue_style(
        'my-block-editor-style',
        mix('styles/gutenberg/blocks/my-block/editor.css'),
        ['wp-edit-blocks']
    );
});

add_action('init', function() {
    if (!function_exists('register_block_type')) { return; }

    register_block_type('wordplate/my-block', [
        'style' => 'my-block-frontend-style',
        'editor_script' => 'my-block-editor-script',
        'editor_style' => 'my-block-editor-style',
    ]);
});
