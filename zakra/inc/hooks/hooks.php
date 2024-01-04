<?php

/**
 * Search content.
 *
 * @see zakra_search_content()
 */
add_action( 'zakra_action_search_content', 'zakra_entry_content', 10 );


/**
 * Post read more.
 *
 * @see zakra_entry_content()
 */
add_action( 'zakra_post_readmore', 'zakra_post_readmore', 10 );

/**
 * Get sidebar based on the layout.
 *
 * @see zakra_get_sidebar()
 */
add_filter( 'zakra_get_sidebar', 'zakra_get_sidebar', 10 );
