<?php
/*
 * Plugin Name: Testimonials by Archon
 * Plugin URI: http://archonweb.com/testimonials-by-archon/
 * Description: Provides both widgets and shortcodes to help you display and manage your testimonials across your site.
 * Version: 1.0
 * Author: Cody Greene
 * Author URI: https://github.com/toymakercody
 * License: GPL2
 *
 */

/*
 * Assign global variables
 */

$plugin_url = WP_PLUGIN_URL . '/testimonials-by-archon.php';
$plugin_table = 'testimonials_by_archon';


/*
 * Check for testimonials options page input
 */
if(isset($_POST['testimonial_content']) && isset($_POST['testimonial_author'])){
	global $wpdb;
	$content = $_POST['testimonial_content'];
	$author = $_POST['testimonial_author'];
	$table_name = $wpdb->base_prefix . 'testimonials_by_archon';
	$wpdb->insert($table_name, array('content' => $content,'author' => $author));
}

/*
 * create the database table needed for plugin when plugin is activated
 */

function tba_create_table(){
	global $wpdb;
	$table_name = $wpdb->base_prefix . 'testimonials_by_archon';
	$sql = "CREATE TABLE $table_name (
		id int(11) NOT NULL AUTO_INCREMENT,
		content text(255) DEFAULT NULL,
		author varchar(255) DEFAULT NULL,
		UNIQUE KEY id (id)
	);";
	$wpdb->query($sql);
}
register_activation_hook(__FILE__, 'tba_create_table');

/*
 * delete the database table needed for plugin when plugin is deactivated
 */

function tba_delete_table(){
	global $wpdb;
	$table_name = $wpdb->base_prefix . 'testimonials_by_archon';
	$sql = "DROP TABLE $table_name";
	$wpdb->query($sql);
}
register_deactivation_hook(__FILE__, 'tba_delete_table');


/*
 * Add a link to our plugin in the admin menu
 * under 'Settings > Treehouse Badges'
 *
 */

function testimonials_by_archon_menu(){
	/*
	 * Use the add_options_page function
	 * add_options_page($page_title, $menu_title, $capability, $menu_slug, $function);
	 */
	
	add_options_page(
		'Testimonials by Archon Plugin',
		'Testimonials by Archon',
		'manage_options',
		'testimonials-by-archon',
		'testimonials_by_archon_options_page'
	);
}
add_action('admin_menu', 'testimonials_by_archon_menu');


function testimonials_by_archon_options_page(){
	if(!current_user_can('manage_options')){
		wp_die('You do not have sufficient permissions to access this page.');
	}

	global $plugin_url;
	
	require('inc/options-page-wrapper.php');
}

function get_testimonial_by_id($id){
	global $wpdb;
	global $plugin_table;
	$table_name = $wpdb->prefix . $plugin_table;
	$row = $wpdb->get_row( $wpdb->prepare('SELECT * FROM '.$table_name.' WHERE id = %d', $id) );
	return $row;
}

function tesimonial_by_archon_shortcode( $atts ) {
	global $wpdb;
	global $plugin_table;
	$table_name = $wpdb->prefix . $plugin_table;

    $a = shortcode_atts( array(
        'id' => null,
    ), $atts );
    
    if($a['id'] == null){
    	$row = $wpdb->get_row('SELECT * FROM ' . $table_name . ' ORDER BY id DESC limit 1');
    }else{
    	$id = $a['id'];
		$row = $wpdb->get_row( $wpdb->prepare('SELECT * FROM ' . $table_name . ' WHERE id = %d', $id) );
    }
    
	$htmlString = null;
	$htmlString .= '<div class="tesimonial_content">' . $row->content . '</div>';
	$htmlString .= '<div class="tesimonial_author">' . $row->author . '</div>';
	return $htmlString;

}
add_shortcode( 'tesimonial', 'tesimonial_by_archon_shortcode' );

?>