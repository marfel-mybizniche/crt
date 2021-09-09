<?php

/**
 * Add custom body class
**/
function mbn_body_class($classes){
    // code here ...

    return $classes;
}
add_filter('body_class', 'mbn_body_class');



/*
** Submenu Classes
*/
function mbn_submenu_classes($classes, $args){
    // code here ...
    
    return $classes;
}
//add_filter('wp_nav_menu_items', 'mbn_submenu_classes', 10, 2);

function wpse_modify_taxonomy() {
    // get the arguments of the already-registered taxonomy
    $category_args = get_taxonomy( 'supplimental' ); // returns an object

    // make changes to the args
    // in this example there are three changes
    // again, note that it's an object
    $category_args->show_in_rest = true;

    // re-register the taxonomy
    register_taxonomy( 'supplimental', 'listing', (array) $category_args );
}
// hook it up to 11 so that it overrides the original register_taxonomy function
//add_action( 'init', 'wpse_modify_taxonomy', 11 );