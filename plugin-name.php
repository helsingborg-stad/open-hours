<?php

/**
 * Plugin Name:       Opening Hours (HBG)
 * Plugin URI:        (#plugin_url#)
 * Description:       Adds the ability to add opening hours and display them via shortcodes (today, full week)
 * Version:           1.0.2
 * Author:            Sebastian Thulin
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       opening-hours-slug
 * Domain Path:       /languages
 */

 // Protect agains direct file access
if (! defined('WPINC')) {
    die;
}

define('OPENHOURS_PATH', plugin_dir_path(__FILE__));
define('OPENHOURS_URL', plugins_url('', __FILE__));
define('OPENHOURS_TEMPLATE_PATH', OPENHOURS_PATH . 'templates/');

load_plugin_textdomain('(#plugin_slug#)', false, plugin_basename(dirname(__FILE__)) . '/languages');

require_once OPENHOURS_PATH . 'source/php/Vendor/Psr4ClassLoader.php';
require_once OPENHOURS_PATH . 'Public.php';

// Instantiate and register the autoloader
$loader = new openhours\Vendor\Psr4ClassLoader();
$loader->addPrefix('openhours', OPENHOURS_PATH);
$loader->addPrefix('openhours', OPENHOURS_PATH . 'source/php/');
$loader->register();

// Start application
new openhours\App();

//Options page
new openhours\Options();
