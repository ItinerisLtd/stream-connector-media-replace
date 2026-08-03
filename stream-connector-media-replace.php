<?php
/**
 * Plugin Name:     Stream - Media Replace
 * Plugin URI:      https://www.itineris.co.uk/
 * Description:     Media file replacement connector for Stream (Enable Media Replace + WP Media Folder)
 * Version:         0.1.0
 * Author:          Itineris Limited
 * Author URI:      https://www.itineris.co.uk/
 * Text Domain:     stream-connector-media-replace
 */

declare(strict_types=1);

namespace Itineris\StreamConnectorMediaReplace;

use function defined;

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

add_filter('wp_stream_connectors', function (array $classes): array {
    if (class_exists('EnableMediaReplace\EnableMediaReplacePlugin')) {
        $classes[] = new EnableMediaReplace();
    }

    if (defined('WPMF_VERSION')) {
        $classes[] = new WpMediaFolder();
    }

    return $classes;
});
