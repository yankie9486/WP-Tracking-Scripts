<?php
/*
Plugin Name: WP Script Tracking
Plugin URI: https://cunisinc.com
Description: Adds a tracking scripts  Google Analytics tracking code to the <head> of your theme.
Author: Giancarlo Cunis
Version: 1.0
*/


define('WPTS_VERSION', wp_get_theme()->version);
define('WPTS_DIR', __DIR__);
define('WPTS_URI', get_template_directory_uri());

require_once(WPTS_DIR . '/vendor/autoload.php');

\A7\autoload(WPTS_DIR. '/src');


//Run Admin Page
new Script_Tracking_Admin_Page();

//Add Scripts to wp_head
new Tracking_Scripts();
