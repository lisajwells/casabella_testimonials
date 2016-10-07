<?php
/**
 */

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

// Add Read More Button
add_action( 'genesis_entry_footer', 'casa_do_read_more_button' );
function casa_do_read_more_button() {
    echo '<a class="button small" href="' . get_permalink() . '">Read More</a>';
}

//* Remove the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_before_content_sidebar_wrap', 'casa_show_testimonial_page_title' );
function casa_show_testimonial_page_title() {
    echo '<p class="overline"><span>What people are saying</span></p><h2 class="title">Featured Testimonials</h2>';
}

// Initialize Genesis.
genesis();
