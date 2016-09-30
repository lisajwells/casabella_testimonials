<?php
/**
 */

//* Remove the entry title (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

//* Remove the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

add_action( 'genesis_after_header', 'casa_show_testimonial_page_title' );
function casa_show_testimonial_page_title() {
    echo '<p>What people are saying</p><h2 class="title">Featured Testimonials</h2>';
}
// echo <p>What people are saying</p><h2 class="title">Featured Testimonials</h2>

// Initialize Genesis.
genesis();
