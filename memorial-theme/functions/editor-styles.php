<?php
// Adds your styles to the WordPress editor
add_action( 'init', 'add_editor_styles' );
function add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/assets/styles/style.css' );
}



/* Register a custom navigation menu
function register_custom_menu() {
    register_nav_menu('custom-menu', 'Custom Menu');
}
add_action('init', 'register_custom_menu');
*/
