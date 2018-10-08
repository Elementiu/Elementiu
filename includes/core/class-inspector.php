<?php
/**
 * Elementiu "Theme-inspector" page for WordPress Dashboard.
 *
 * Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, iusto. Blanditiis optio laborum temporibus.
 * Elementiu "Theme-inspector" page for WordPress dashboard.
 *
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Star class
 * @since 1.0.0
 */
if ( ! class_exists( 'ELMT_theme_inspector' ) ) {

	class ELMT_theme_inspector {

		/**
		 * Define the construct function
		 * @since 1.0.0
		 */

        public function ELMT_inspector() { 

            /**
             * Foreach elementor exists templates
             * @since 1.0.0
             */
            $elementor_templates = get_posts (         
                    [
                    'post_type'   => 'elementor_library',
                    'post_status' => 'publish',
                    'role'        => 'Administrator', 
                    'numberposts' => '999',
                    ]
                );

            if ( $elementor_templates ) {

                foreach ( $elementor_templates as $value ) {

                    $elementor_template_type[] = get_post_meta( $value->ID, '_elementor_template_type', true ); 
                    $elementor_template_type = array_unique( $elementor_template_type );      
                    
                    $elementor_template_sub_type[] = get_post_meta( $value->ID, '_elementor_template_sub_type', true );
                    $elementor_template_sub_type = array_unique( $elementor_template_sub_type ); 

                    $elementor_conditions[] = get_post_meta( $value->ID, '_elementor_conditions', true ) ['0'];      
                    $elementor_conditions = array_unique( $elementor_conditions );

                }                      
                //var_dump($elementor_conditions);
            }

            /**
             * Defined all static template types
             * @since 1.0.0
             */
            $theme_templates = [        
                'Header'            => 'header',
                'Footer'            => 'footer',
                'Single post'       => 'include/singular/post',
                'Category archive'  => 'include/archive/category',
                'Tag archive'       => 'include/archive/post_tag',
                'Author archive'    => 'include/archive/author',
                'Date archive'      => 'include/archive/date',
                'Search results'    => 'include/archive/search',
                'Attachment'        => 'include/singular/attachment',
                '404 page'          => 'include/singular/not_found404',
                'Single product'    => 'include/product',
                'Category products' => 'include/product_archive/product_cat',
                'Tag products'      => 'include/product_archive/product_tag'
            ];	

            /**
             * Print theme-inspector template
             * @since 1.0.0
             */
            echo '<div class="wrap">';
            echo '<h1 class="wp-heading-inline">Theme inspector</h1>';
            echo '<a href="./edit.php?post_type=elementor_library" class="page-title-action">Add template</a>';
            echo '<hr class="wp-header-end">';
            echo '<table class="wp-list-table widefat fixed striped subsubsub">';
            echo '<thead><th scope="col" id="template">Template</th><th scope="col" id="status">Status</th></thead>';
            echo '<tbody id="template-inspector-list">';	

            foreach ( $theme_templates as $key => $value ) { 
            
                echo '<tr id=' . $key . ';>';
                echo '<td class="column-title"><strong><a href="">' . $key . '</a></strong></td>';

                if ( in_array($value, $elementor_template_type) || in_array($value, $elementor_template_sub_type) || in_array($value, $elementor_conditions) ) {

                    echo '<td class="column-categories">' . '<div class="status activate" style="background:#5b9dd9;width:12px;height:12px;border-radius:100px;margin-top:10px;"></div>' . '</td>';	
                    
                } else {

                    echo '<td class="column-categories">' . '<div class="status activate" style="width:10px;height:10px;border-radius:100px;margin-top:10px;border:1px solid #5b9dd9;"></div>' . '</td>';
                
                }

            } 

            echo '</tr></tbody>';
            echo '<tfoot><th scope="col" id="template">Template</th><th scope="col" id="status">Status</th></tfoot>';

        }
    }
}
new ELMT_theme_inspector;
