<?php
/*
Plugin Name: Lewe Bootstrap Visuals
Plugin URI:  https://www.lewe.com/shortcode-bootstrap-visuals/
Description: This plugin provides shortcodes for the most common Bootstrap 4 visual elements.
Version:     2.2.2
Date:        2022-10-15
Author:      George Lewe
Author URI:  https://www.lewe.com
License:     GPLv3
License URI: https://www.gnu.org/licenses/gpl.html
*/
/*
CREDITS
-------
This plugin uses the awesome work of the Bootstrap team providing an open source
tooltkit for developing websites (https://getbootstrap.com/).

The plugin icon is based on the original one.

LEWE BOOTSTRAP VISUALS
---------------------------
The Lewe Bootstrap Visuals plugin provides shortcodes for Wordpress, converting them
into Bootstrap 4 visual objects. The Bootstrap Javascript is not included. Only
objects based on CSS are supported at this point.
The plugin uses custom style names so they don't interfere with other theme
styles that may be based on the default Bootstrap styles.

LICENSE
-------
This program is free software. You can redistribute it and/or modify
it under the terms of the GNU General Public License v3:
https://www.gnu.org/licenses/gpl.html

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

// ============================================================================
/*
 * No direct access
 */
defined('ABSPATH') or die('Oops');

// ============================================================================
/*
 * Includes
 */
include_once(dirname(__FILE__) . '/inc/Bootstrap.class.php');
include_once(dirname(__FILE__) . '/inc/shortcodes.php');

// ============================================================================
/*
 * Plugin Action Links
 */
add_filter('plugin_action_links', 'bsv_action_links', 10, 5);
function bsv_action_links($actions, $plugin_file)
{
    static $plugin;
    if (!isset($plugin)) $plugin = plugin_basename(__FILE__);
    if ($plugin == $plugin_file) {
        $documentation = array('documentation' => '<a href="https://lewe.gitbook.io/lewe-bootstrap-visuals/" target="_blank">Documentation</a>');
        $actions = array_merge($documentation, $actions);
        // $settings = array('settings' => '<a href="options-general.php?page=chordpress">' . __('Settings', 'General') . '</a>');
        // $actions = array_merge($settings, $actions);
    }
    return $actions;
}

// ============================================================================
/*
 * Plugin Meta Links
 */
function bsv_meta_links($links, $file)
{
    if (strpos($file, 'shortcode-bootstrap-visuals.php')) {
        $support_link = "https://georgelewe.atlassian.net/servicedesk/customer/portal/5";
        $donate_link = "https://www.paypal.me/GeorgeLewe";
        $review_link = "https://wordpress.org/support/plugin/shortcode-bootstrap-visuals/reviews/?filter=5#new-post";

        $links[] = '<a href="' . esc_url($support_link) . '" target="_blank" title="' . __('Support') . '"><span style="color:#999999;margin-right:4px;" class="dashicons dashicons-sos"></span>' . __('Support') . '</a>';
        $links[] = '<a href="' . esc_url($donate_link) . '" target="_blank" title="' . __('Donate') . '"><span style="color:#999999;margin-right:4px;" class="dashicons dashicons-heart"></span>' . __('Donate') . '</a>';
        $links[] = '<a href="' . esc_url($review_link) . '" target="_blank"><span style="color:#999999;margin-right:4px;" class="dashicons dashicons-thumbs-up"></span>' . __('Rate and Review!', 'shortcode-bootstrap-visuals') . '</a>';
    }
    return $links;
}
add_filter('plugin_row_meta', 'bsv_meta_links', 10, 2);

// ============================================================================
/*
 * Scripts and Stylesheets
 */
function bsv_scripts()
{
    wp_enqueue_style('bsv', plugin_dir_url(__FILE__) . 'assets/css/bootstrapvisuals.css', null, '4.4.1');
    wp_enqueue_script('bsv', plugin_dir_url(__FILE__) . 'assets/js/bootstrapvisuals.js', array('jquery'), '4.4.1');
}
add_action('wp_enqueue_scripts', 'bsv_scripts');


// ============================================================================
/*
 * TinyMCE Buttons
 */
add_action('after_setup_theme', 'bsv_theme_setup');
if (!function_exists('bsv_theme_setup')) {
    function bsv_theme_setup()
    {
        add_action('init', 'bsv_buttons');
    }
}

if (!function_exists('bsv_buttons')) {
    function bsv_buttons()
    {
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
            return;
        }
        if (get_user_option('rich_editing') !== 'true') {
            return;
        }
        add_filter('mce_external_plugins', 'bsv_add_buttons');
        add_filter('mce_buttons', 'bsv_register_buttons');
    }
}

if (!function_exists('bsv_add_buttons')) {
    function bsv_add_buttons($plugin_array)
    {
        $plugin_array['bsvbtn'] = plugins_url('assets/js/tinymce_buttons.js', __FILE__);
        return $plugin_array;
    }
}

if (!function_exists('bsv_register_buttons')) {
    function bsv_register_buttons($buttons)
    {
        array_push($buttons, '|');
        array_push($buttons, 'bsvbtn');
        return $buttons;
    }
}

// ============================================================================
/*
 * Update Message
 */
function bsv_update_message($data, $response)
{
    if (isset($data['upgrade_notice'])) {
        echo '<style>#bsv-upgrade-notice p::before{content:none;}</style>';
        echo '<div id="bsv-upgrade-notice"" style="padding:10px;margin-top:10px"><strong style="color:#d54e21;">Important Upgrade Notice:</strong><br>' . wpautop($data['upgrade_notice']), '</div>';
    }
}
add_action('in_plugin_update_message-shortcode-bootstrap-visuals/shortcode-bootstrap-visuals.php', 'bsv_update_message', 10, 2);
