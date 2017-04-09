<?php 
/*
Plugin Name: Simple Page Title
Plugin URI:  https://github.com/Saurabh-developer/
Description: Awsome plugin for change the page titte like pages, archieve, and single post types. you use the function 'simple_page_title();' and short code '[simple_page_title]'.
Version:     2.0
Author:      Saurabh Jain
Author URI:  https://github.com/Saurabh-developer/Simple-Page-Title
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

/*
 * The code that runs during plugin activation.
 */
register_activation_hook( __FILE__, 'spt_activated' );
/*
 * the code that run after activate plugin.
 */ 
function spt_activated(){
   include_once('include/add-options.php');
}

// add mennu page option in admin menu.
include('include/add-mennu.php');

// page titles setting's start here..
include('include/page-titles.php');

/*
 * The code that runs during plugin deactivation.
 */
register_deactivation_hook( __FILE__, 'spt_deactivated' );
/*
 * the code that run after activate plugin.
 */ 
function spt_deactivated(){
	include_once('include/delete-options.php');
}

/*
 * plugin error file out put file.
 */
function my_save_error() 
{ 
	file_put_contents(dirname(__file__).'/error_activation.txt', ob_get_contents());
}
add_action('activated_plugin','my_save_error');

?>