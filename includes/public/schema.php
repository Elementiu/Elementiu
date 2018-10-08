<?php
/**
 * Elementiu "Schema" page for WordPress Dashboard.
 *
 * Elementiu Schema page is responsible for creating and displaying the menus and submenus in the wp-admin navigation bar.
 * Elementiu "Schema" page for WordPress dashboard.
 *
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ELMT_add_schema ( $content ) {

    $content = str_replace( '<article', '<article itemtype="https://schema.org/CreativeWork"', $content );
    $content = str_replace( 'class="elementor-post__title"', 'itemprop="headline" class="elementor-post__title"', $content ); 
    $content = str_replace( 'class="elementor-post__excerpt"', 'itemprop="text" class="elementor-post__excerpt"', $content ); 
    $content = str_replace( '<img', '<img itemprop="image"', $content );
    $content = str_replace( 'class="elementor-post-author"', 'itemtype="https://schema.org/Person" class="elementor-post-author"', $content );
    $content = str_replace( 'class="elementor-post-date"', 'itemprop="datePublished" class="elementor-post-date"', $content ); 

    $content = str_replace( 'class="elementor-heading-title', 'itemprop="headline" class="elementor-heading-title', $content );
    $content = str_replace( 'class="elementor-author-box__name"', 'itemtype="https://schema.org/Person" itemscope="itemscope" itemprop="author" class="elementor-author-box__name"', $content );
    
    return $content;

 }

 add_action ( 'elementor/widget/render_content', 'ELMT_add_schema', 10, 2 );
