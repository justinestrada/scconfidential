<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

/**
 * WooCommerce product Get Default Variation ID
 * @return integer
 */
function product_get_default_variation_id($product) {
    if ( $product->get_type() == 'variable' ) {
      $attributes = $product->get_available_variations();
      return $attributes[0]['variation_id'];
    }
    return false;
}

/**
 * WooCommerce product get attribute variation id, by attribute_name & option
 * @return integer
 */
function get_attribute_variation_id( $product = false, $attribute_name = false, $option = false) {
    if ( !$product || !$attribute_name || !$option ) {
      return false;
    }
    if ( $product->get_type() !== 'variable' ) {
      return false;
    }
    foreach( $product->get_available_variations() as $variation ) {
      if ( $variation['attributes']['attribute_' . esc_attr( sanitize_title( $attribute_name ) )] === $option ) {
        return $variation['variation_id'];
      }
    }
    return false;
}

/**
 * WooCommerce product get attribute variation id, by attribute_name & option
 * @return integer
 */
function get_attribute_variation_image_url( $product = false, $attribute_name = false, $option = false) {
    if ( !$product || !$attribute_name || !$option ) {
      return false;
    }
    if ( $product->get_type() !== 'variable' ) {
      return false;
    }
    foreach( $product->get_available_variations() as $variation ) {
      if ( $variation['attributes']['attribute_' . esc_attr( sanitize_title( $attribute_name ) )] === $option ) {
        return $variation['image']['url'];
      }
    }
    return false;
}

// TODO: DRY: Merge get_attribute_variation_id & get_attribute_variation_image_url to create get_attribute_variation_property

/**
 * Nest a WordPress Menu
 * @return array
 */
if (! function_exists('nest_menu')) {
    function nest_menu($current_menu) {
        if (!$current_menu) return;
        $nested_menu = [];
        foreach ($current_menu as $current_item) {
            $new_menu_item = array(
                'id' => $current_item->ID,
                'title' => $current_item->title,
                'url' => $current_item->url,
                'children' => array()
            );
            // if current_item does not have a parent
            if ( ! $current_item->menu_item_parent ){
                $nested_menu[] = $new_menu_item;
            } else {
                foreach($nested_menu as $key => $this_item) {
                    if ($this_item['id'] === (int)$current_item->menu_item_parent) {
                        $nested_menu[$key]['children'][] = $new_menu_item;
                    } else if ( ! empty($this_item['children']) ) {
                        foreach($this_item['children'] as $child_key => $this_child_item) {
                            if ($this_child_item['id'] === (int)$current_item->menu_item_parent) {
                                $nested_menu[$key]['children'][$child_key]['children'][] = $new_menu_item;
                            }
                        }
                    }
                }
            }
        }
        return $nested_menu;
    }
}

if (! function_exists('social_shares')) {
    function social_shares($social, $post)
    {
        $post_url = urlencode(get_permalink($post->ID));
        $post_title = urlencode(str_replace(' ', '%20', $post->post_title));
        $site_title = urlencode(str_replace(' ', '%20', get_bloginfo('name')));
        switch ($social) {
            case 'linkedin':
                return 'https://www.linkedin.com/shareArticle?mini=true&url=' . $post_url . '&amp;title=' . $post_title;
                break;
            case 'twitter':
                $twitter_url = get_field('social', 'option')['twitter'];
                $twitter_handle = ($twitter_url) ? urlencode( str_replace('https://twitter.com/', '', $twitter_url) ) : false;
                $twitter_url = 'https://twitter.com/intent/tweet?text=' . $post_title . '&amp;url=' . $post_url . '&amp;via=';
                $twitter_url .= ($twitter_handle) ? $twitter_handle : $site_title;
                return $twitter_url;
                break;
            case 'facebook':
                return 'https://www.facebook.com/sharer/sharer.php?u='. $post_url;
                break;
            case 'email':
                return 'mailto:example@email.com?subject=' . $post_title . '&body=' . $post_url;
                break;
        }

    }
}
