<?php
/**
 * Helper functions.
 *
 * @package    SB2Media\MovieDemo
 * @since      1.0.0
 * @author     sbarry50
 * @link       http://example.com
 * @license    MIT
 */

namespace SB2Media\MovieDemo;

use Exception;
use Illuminate\Support\Str;
use SB2Media\Headless\File\Loader;
use SB2Media\Headless\File\FileSystem;

/**
 * Launch the application
 *
 * @since 0.1.0
 * @param string $plugin_root_file
 * @return void
 */
function launch(string $plugin_root_file)
{
    $app = app($plugin_root_file);
    $app->boot()->run();
}

/**
 * Set the Application instance / Get the available container instance.
 *
 * @since  0.1.0
 * @param  string $abstract
 * @return Plugin
 *
 * Based on Laravel's app helper
 * @copyright Taylor Otwell
 * @license   https://github.com/laravel/framework/blob/5.8/LICENSE.md MIT
 * @link      https://github.com/laravel/framework/blob/5.8/src/Illuminate/Foundation/helpers.php#L107-L123
 */
function app($abstract = null)
{
    static $app;

    if ((!$app && is_null($abstract)) || (!$app && !is_file($abstract))) {
        throw new Exception('Path to plugin root file must be passed to app() to instantiate Application');
    }

    if ($app && is_file($abstract)) {
        throw new Exception('Application has already been instantiated');
    }

    if (!$app) {
        $app = new Plugin($abstract);
    }

    if (is_null($abstract) || is_file($abstract)) {
        return $app;
    }

    return $app->get($abstract);
}

/**
 * Helper to get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @since  0.1.0
 * @param  array|string $key
 * @param  mixed        $default
 * @return Config
 *
 * */
function config($key = null, $default = null)
{
    return app()->config($key, $default);
}

/**
 * Get the path of a config file
 *
 * @since 0.1.0
 * @param string $filename
 * @return void
 */
function configPath(string $filename)
{
    return path('config') . $filename . '.php';
}

/**
 * Get the path of the plugin, subdirectory and/or file.
 *
 * @since 0.1.0
 * @param string $path      Optionally, the relative path to a subdirectory and/or file
 * @return string
 */
function path($path = '')
{
    if (!empty($path)) {
        $pathinfo = pathinfo($path);
        $subdir = $pathinfo['dirname'] !== '.' ? $pathinfo['dirname'] : '';
        $file = $pathinfo['basename'];

        if (!array_key_exists('extension', $pathinfo)) {
            $subdir = $pathinfo['dirname'] !== '.' ? $pathinfo['dirname'] . '/' . $pathinfo['basename'] : $pathinfo['basename'];
            $file = '';
        }
    } else {
        $subdir = '';
        $file = '';
    }

    if (empty($subdir) && empty($file)) {
        return app()->path();
    }

    if (!empty($subdir) && empty($file)) {
        return app()->path($subdir);
    }
    
    return app()->path($subdir, $file);
}

/**
 * Get the url of the plugin, subdirectory or file.
 *
 * @since 0.1.0
 * @param string $path      Optionally, the relative path to a subdirectory and/or file
 * @return string
 */
function url($path = '')
{
    if (!empty($path)) {
        $pathinfo = pathinfo($path);
        $subdir = $pathinfo['dirname'] !== '.' ? $pathinfo['dirname'] : '';
        $file = $pathinfo['basename'];

        if (!array_key_exists('extension', $pathinfo)) {
            $subdir = $pathinfo['dirname'] !== '.' ? $pathinfo['dirname'] . '/' . $pathinfo['basename'] : $pathinfo['basename'];
            $file = '';
        }
    } else {
        $subdir = '';
        $file = '';
    }
    
    if (empty($subdir) && empty($file)) {
        return app()->url();
    }

    if (!empty($subdir) && empty($file)) {
        return app()->url($subdir);
    }
    
    return app()->url($subdir, $file);
}

/**
 * Get the path of the plugin, subdirectory or file.
 *
 * @since 0.1.0
 * @param string $subdir    Optionally, the name of a subdirectory
 * @param string $file      Optionally, the name of a file
 * @return string
 */
function view($path = '')
{
    return app()->view($path);
}

/**
 * CURL API calls
 *
 * @since 0.1.0
 * @param string $method
 * @param string $url
 * @param mixed $data
 * @return void
 *
 * @link https://www.weichieprojects.com/blog/curl-api-calls-with-php/
 */
function callAPI($method, $url, $data)
{
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            break;
        default:
            if ($data) {
                $url = sprintf("%s?%s", $url, http_build_query($data));
            }
    }

    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'APIKEY: 111111111111111111111',
        'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    // EXECUTE:
    $result = curl_exec($curl);
    if (!$result) {
        die("Connection Failure");
    }
    curl_close($curl);
    return $result;
}

/**
 * Checks if an array is multi-dimensional
 *
 * @since  0.1.0
 * @param  string    $arr    The array to be checked
 * @return bool
 *
 * @link https://pageconfig.com/post/checking-multidimensional-arrays-in-php
 */
function isMultiArray($arr)
{
    rsort($arr);
    return isset($arr[0]) && is_array($arr[0]);
}
