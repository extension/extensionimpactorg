<?php
/**
 *
 * Gaea child theme functions and definitions
 * 
 * @package Gaea
 * @author  imithemes <www.imithemes.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */
function gaea_child_scripts() {
    wp_enqueue_style( 'gaea-parent-style', get_template_directory_uri(). '/style.css',array('imic_bootstrap','imic_bootstrap_theme') );
}
add_action( 'wp_enqueue_scripts', 'gaea_child_scripts' );