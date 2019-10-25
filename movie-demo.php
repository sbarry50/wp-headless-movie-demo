<?php

/*
* Plugin Name: WP Headless Movie Demo
* Description: Demo plugin for the WP-Headless library.
* Version: 1.0.0
* Author: sbarry50
* Author URI: https://github.com/sbarry50/wp-headless-movie-demo
* Text Domain: headless-movie-demo
*/

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

$autoloader = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoloader)) {
    include_once $autoloader;
}

add_action('plugins_loaded', function () {
    SB2Media\MovieDemo\launch(__FILE__);
});
