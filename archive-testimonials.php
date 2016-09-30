<?php
/**
 */

//* Remove the entry title (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

//* Remove the entry header markup (requires HTML5 theme support)
// remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
// remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

//* Remove the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

// Initialize Genesis.
genesis();
