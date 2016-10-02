<?php
/**
 */

//* Remove the entry title (requires HTML5 theme support)
//* Add the entry title as attribution to the textimonial
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_entry_footer', 'casa_do_post_title_as_attribution' );

//* Remove the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

function casa_do_post_title_as_attribution() {

    $title = apply_filters( 'genesis_post_title_text', get_the_title() );

    if ( 0 === mb_strlen( $title ) )
        return;

    // Build the output.
    $output = genesis_markup( array(
        'open'    => "<cite><span>",
        'close'   => "</span></cite>",
        'content' => $title,
        'context' => 'entry-title',
        'echo'    => false,
    ) );

    echo apply_filters( 'genesis_post_title_output', "$output \n", $title );
}

//* Add post navigation (requires HTML5 theme support)
// https://wpbeaches.com/add-custom-post-type-navigation-links-in-genesis/
// add_action( 'genesis_entry_footer', 'casa_prev_next_post_nav_name_cpt' );
add_action( 'genesis_after_entry', 'casa_prev_next_post_nav_cpt' );

// function casa_prev_next_post_nav_name_cpt() {

//     if ( ! is_singular( array( 'testimonials', 'post' ) ) )
//         return;

//     genesis_markup( array(
//         'html5'   => '<div %s>',
//         'xhtml'   => '<div class="navigation">',
//         'context' => 'adjacent-entry-pagination',
//     ) );

//     echo '<div class="pagination-previous alignleft">';
//     previous_post_link();
//     echo '</div>';

//     echo '<div class="pagination-next alignright">';
//     next_post_link();
//     echo '</div>';

//     echo '</div>';
// }

function casa_prev_next_post_nav_cpt() {

    if ( ! is_singular( array( 'testimonials', 'post' ) ) )
        return;

    genesis_markup( array(
        'html5'   => '<div %s>',
        'xhtml'   => '<div class="navigation">',
        'context' => 'adjacent-entry-pagination',
    ) );

    echo '<div class="pagination-previous alignleft">';
    previous_post_link('&laquo; %link', 'Previous Testimonial');
    echo '</div>';

    echo '<div class="pagination-next alignright">';
    next_post_link(' %link', 'Next Testimonial &raquo;');
    echo '</div>';

    echo '</div>';
}

// This file handles single entries, but only exists for the sake of child theme forward compatibility.
genesis();
