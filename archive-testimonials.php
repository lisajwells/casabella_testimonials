<?php
/**
 */

// add background image to page
add_action( 'genesis_before_header', 'casa_do_testimonial_bkgd' );
function casa_do_testimonial_bkgd() {
    echo '<div class="testimonial-bkgd"></div>';
}

//* Remove the entry title (requires HTML5 theme support)
//* Add the entry title as attribution to the textimonial
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
add_action( 'genesis_entry_footer', 'casa_do_post_title_as_attribution' );

function casa_do_post_title_as_attribution() {

    $title = apply_filters( 'genesis_post_title_text', get_the_title() );

    if ( 0 === mb_strlen( $title ) )
        return;

    // Build the output.
    $output = genesis_markup( array(
        'open'    => "<cite class='attcontainer'><div class='attborderwrap'><div class='attborderdiv'></div></div><div class='attribution'>",
        'close'   => "</div></cite>",
        'content' => $title,
        'context' => 'entry-title',
        'echo'    => false,
    ) );

    echo apply_filters( 'genesis_post_title_output', "$output \n", $title );
}

function ld_new_excerpt_more($more) {
    global $post;
    return '<a class="more-link" href="'. get_permalink($post->ID) . '">... (Continue Reading)</a>';
}
add_filter('excerpt_more', 'ld_new_excerpt_more');

//* Remove the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_before_content_sidebar_wrap', 'casa_show_testimonial_page_title' );
function casa_show_testimonial_page_title() {
    echo '<p class="overline"><span>Casabella Stories</span></p><h2 class="title">A Few Words from our Clients</h2>';
}

// Initialize Genesis.
genesis();
