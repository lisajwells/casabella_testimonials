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



// This file handles single entries, but only exists for the sake of child theme forward compatibility.
genesis();
