<?php

/**
 * Theme Setup
 */
function excel_dental_theme_setup()
{
    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support('custom-logo', array(
        'height' => 60,
        'width' => 240,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    ));

    /* Enable Header Image in Customizer */
    add_theme_support('custom-header', array(
        'default-image' => '',
        'width' => 2000,
        'height' => 200,
        'flex-width' => true,
        'flex-height' => true,
        'header-text' => true,
    ));

    register_nav_menus([
        'primary_menu' => __('Primary Menu', 'excel-dental'),
        'footer_menu' => __('Footer Menu', 'excel-dental'),
    ]);
}
add_action('after_setup_theme', 'excel_dental_theme_setup');

/**
 * Allow SVG Upload
 */
function allow_svg_uploads($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');


/**
 * Fix SVG Mime Type
 */
function fix_svg_mime_type($data, $file, $filename, $mimes)
{
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if ($ext === 'svg') {
        $data['ext'] = 'svg';
        $data['type'] = 'image/svg+xml';
    }

    return $data;
}
add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 4);

// Admin bar
add_filter('show_admin_bar', '__return_false');

// Submenu active
function exceldental_cpt_menu_active($classes, $item)
{
    $menu_map = [
        'services' => 'services-submenu',
        'locations' => 'locations-submenu',
    ];

    foreach ($menu_map as $post_type => $menu_class) {

        if (is_singular($post_type)) {

            global $post;

            // Parent Menu Active
            if (in_array($menu_class, $classes)) {
                $classes[] = 'current-menu-parent';
            }

            // Current Submenu Active
            if (
                isset($item->url) &&
                untrailingslashit($item->url) === untrailingslashit(get_permalink($post->ID))
            ) {
                $classes[] = 'current-menu-item';
            }
        }
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'exceldental_cpt_menu_active', 10, 2);


?>