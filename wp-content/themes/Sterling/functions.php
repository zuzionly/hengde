<?php
/**
 * Theme Functions
 *
 * DO NOT EDIT THIS FILE. THE SKY WILL FALL.
 *
 * Any custom functions should be added to your child theme's
 * functions.php file. This will prevent losing your changes
 * during a theme upgrade.
 *
 * @author   TrueThemes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 */

/**
 * Load the theme textdomain for localizing strings.
 */
load_theme_textdomain( 'tt_theme_framework', dirname( __FILE__ ) . '/languages/' );

/**
 * Ensure that error reporting is turned on if WP_DEBUG is set to true.
 */
if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
    $error_setting = ini_get( 'display_errors' );
    if ( '0' == $error_setting )
        ini_set( 'display_errors', '1' );
}

/**
 * Ensure that error reporting is turned on.
 */
$php_error_setting = ini_get( 'display_errors' );
if ( '1' == $php_error_setting )
    error_reporting( E_ALL & ~E_STRICT & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED & ~E_USER_NOTICE );

/**
 * Load the TrueThemes framework.
 */
require_once( dirname( __FILE__ ) . '/framework/framework_init.php' );

//搜索结果排除某些分类的文章
function Bing_search_filter_category( $query) {
	if ( !$query->is_admin && $query->is_search) {
		$query->set('cat','9'); //分类的ID，前面加负号表示排除；如果直接写ID，则表示只在该ID中搜索
	}
	return $query;
}
add_filter('pre_get_posts','Bing_search_filter_category');

//搜索结果排除所有页面
function search_filter_page($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}
add_filter('pre_get_posts','search_filter_page');

?>