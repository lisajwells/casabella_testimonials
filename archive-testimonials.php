<?php
/**
 */

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
        'open'    => "<cite><span>",
        'close'   => "</span></cite>",
        'content' => $title,
        'context' => 'entry-title',
        'echo'    => false,
    ) );

    echo apply_filters( 'genesis_post_title_output', "$output \n", $title );
}

// Add Read More Button
add_action( 'genesis_entry_footer', 'casa_do_read_more_button' );
function casa_do_read_more_button() {
    echo '<a class="button" href="' . get_permalink() . '">Read More</a>';
}

//* Remove the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_before_content_sidebar_wrap', 'casa_show_testimonial_page_title' );
function casa_show_testimonial_page_title() {
    echo '<p class="overline"><span>What people are saying</span></p><h2 class="title">Featured Testimonials</h2>';
}

//* Customize length of excerpt used in testimonials cpt
// function get_testimonial_excerpt(){
// $excerpt = get_the_content();
// $excerpt = preg_replace(" ([.*?])",'',$excerpt);
// $excerpt = strip_shortcodes($excerpt);
// $excerpt = strip_tags($excerpt);
// $excerpt = substr($excerpt, 0, 50);
// $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
// $excerpt = trim(preg_replace( '/s+/', ' ', $excerpt));
// $excerpt = $excerpt.'... <a href="'.$permalink.'">more</a>';
// return $excerpt;
// }

// Changing excerpt length - only works with MANUAL excerpt
// Priority of 9 is set so that read more filter function fires AFTER this one.
add_filter('get_the_excerpt', 'manual_excerpt_length', 9);
function manual_excerpt_length($excerpt) {
    global $post;
    $length = 20; //Number of characters to display in excerpt
    $new_excerpt = substr($post->post_excerpt, 0, $length); //truncate excerpt according to $len
    if(strlen($new_excerpt) < strlen($post->post_excerpt)) {
        return $new_excerpt;
    } else {
        return $excerpt;
    }
}


// Initialize Genesis.
genesis();
