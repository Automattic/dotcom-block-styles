<?php
/*
 * Plugin Name:       Block Styles by Pauli
 * Plugin URI:        https://github.com/bph/pauli-block-styles 
 * Description:       Offers block styles for the core image block in context of an article on WordPress.com
 * Version:           0.1.0
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Author:            Birgit Pauli-Haack
 * Author URI:        https://profiles.wordpress.org/bph
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       pauli
 */


 // Register Block style via PHP

 function my_purple_border_styles() {
    wp_enqueue_style(
        'my-image-block-style',
        plugin_dir_url(__FILE__) . 'my-purple-border.css',
        array( 'wp-edit-blocks' ),
        '1.0'
    );
   
    register_block_style(
        'core/image',
        array(
            'name'         => 'purple-border',
            'label'        => __( 'Purple Border, slightly rounded', 'pauli' ),
            'style_handle' => 'my-image-block-style'
        )
    );
}

// Use init hook for registering block styles
add_action( 'init', 'my_purple_border_styles' );

function my_orange_border() {

    register_block_style(
        array( 'core/image' ),
        array(
            'name'         => 'orange-border',
            'label'        => __( 'Orange Border', 'pauli' ),
            'style_data'=> array(
                            'border' => array(
                            'color' => '#f5bc42',
                             'style' => 'solid',
                             'width' => '4px',
                             'radius' => '15px'
                            ),
			            'shadow' => array(
                            'var(--wp--preset--shadow--sharp)'
                            )
                        )

            )
    );
};

add_action( 'init', 'my_orange_border' );

function my_double_frame_styles() {
    register_block_style(
        'core/image',
        array(
            'name'         => 'double-frame',
            'label'        => __( 'Double-Frame', 'pauli' ),
            'inline_style' => '.wp-block-image.is-style-double-frame 
                                img { border: 10px ridge lightgreen; }'
        )
    );
}
add_action( 'init', 'my_double_frame_styles' );