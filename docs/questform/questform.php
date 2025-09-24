<?php
/**
 * Plugin Name: WordPress Angular Plugin Demo
 * Plugin URI: https://github.com/Kevinlearynet/wordpress-angular-plugin
 * Description: Demo of an Angular.js app setup inside of a WordPress plugin.
 * Author: Q21
 * Version: 0.0.1
 * Author URI:     https://www.q21.de
 */



// Example 1 : WP Shortcode to display form on any page or post.
function custom_enqueue_stuff() {
    $plugin_url = plugin_dir_url(__FILE__);
    require 'config.php';
    // Specify the conditional tag
    if (is_page($wordpressShortcodePageName)) {

        // If page matches, then load the following files
        wp_enqueue_style('styles.css', $plugin_url . 'src/css/'. $styles. '.css', false, '1.0', 'all');
        wp_enqueue_script('my_custom_script1', $plugin_url . 'src/js/'. $runtime. '.js', array(), '', true);
        wp_enqueue_script('my_custom_script2', $plugin_url . 'src/js/'. $polyfills. '.js', array(), '', true);
        wp_enqueue_script('my_custom_script3', $plugin_url . 'src/js/'. $scripts. '.js', array(), '', true);
        wp_enqueue_script('my_custom_script4', $plugin_url . 'src/js/'. $main. '.js', array(), '', true);
        
        
        // If the condition tag does not match...
    } else {

        // ...then load the global files instead
        // wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
        // wp_enqueue_script('new-scripts.js', 'http://blinc.q21.de/wp-content/themes/evolve-child/js/main.5f44ab18.js', false, '1.0', 'all');
    }
}

// Hook into the WordPress Function
add_action('wp_enqueue_scripts', 'custom_enqueue_stuff');

function add_to_head() {
    require 'config.php';
    echo '<base href="/'. $wordpressShortcodePageName. '/">';
}

add_action('wp_head', 'add_to_head');

function angular_root() {
    return "<app-root></app-root>";
}
add_shortcode('angular', 'angular_root');

add_action('init', 'custom_rewrite_basic_angularApp');

function custom_rewrite_basic_angularApp() {
    require 'config.php';
    add_rewrite_rule(
        '^'. $wordpressShortcodePageName. '\/(.*)\/?',
        'index.php?pagename='. $wordpressShortcodePageName,
        'top'
    );
}
