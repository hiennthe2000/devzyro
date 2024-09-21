<?php
/*
Plugin Name: Epal Translate Google
Plugin URI: https://epal.vn
Version: 1.0.0
Description: Google translator
Author: Epal Solutions
Author URI: https://epal.vn
Text Domain: epal
*/
function wptuts_scripts_basic()
{
    // Register the script like this for a plugin:
    wp_register_script('script', plugins_url('/js/script.js', __FILE__));
    wp_register_script('script', plugins_url('/js/jquery-3.3.1.min.js', __FILE__));
    wp_register_script('scripts-google', 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit', array('jquery'), false, true);

    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script('script');
    wp_enqueue_script('scripts-google');
    // GoogleLanguageTranslatorInit - tên hàm js
}
add_action('wp_enqueue_scripts', 'wptuts_scripts_basic');

/**
 * Registers a stylesheet.
 */
function wpdocs_register_plugin_styles()
{
    wp_register_style('epal-translate-google', plugins_url('epal-translate-google/css/style.css'));
    wp_enqueue_style('epal-translate-google');
}
// Register style sheet.
add_action('wp_enqueue_scripts', 'wpdocs_register_plugin_styles');
