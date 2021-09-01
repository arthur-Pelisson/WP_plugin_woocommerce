<?php
/**
* Plugin Name: *****
* Plugin URI: https://www.*********.com/
* Description: PLugin for ******
* Version: 1.0
* Author: PELISSON Arthur
* Author URI:
**/


define('MY_PLUGIN_PATH', plugin_dir_path(__FILE__));

//autoload require file
add_action("autoload", "myautoloadfile", 10, 1);
function myautoloadfile($path) {
	$dirs = array();
	$model = glob( $path . 'model/*.php' );
	$controller = glob( $path . 'controller/*.php' );
	$vue = glob( $path . 'vue/*.php' );
	array_push($dirs, $model, $controller, $vue);
	foreach ($dirs as $dir) {
		foreach ($dir as $file) {
			require_once($file); 
		}
	}

}
do_action("autoload", MY_PLUGIN_PATH);

function enqueuing_admin_scripts() {
    if ( isset( $_GET['page'] ) && $_GET['page'] === "Users" )
    {
        wp_enqueue_style('admin-your-css-file-handle-name', 'https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css');
        wp_enqueue_script('admin-your-js-file-handle-', 'https://code.jquery.com/jquery-3.5.1.js');
        wp_enqueue_script('admin-your-js-file-hand', 'https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js');
        wp_enqueue_script( 'wpdc-sample-script', plugins_url( 'assets/js/table.js', __FILE__ ));
    }
}
add_action( 'admin_enqueue_scripts', 'enqueuing_admin_scripts' );


//Custome notice admin
add_action( 'myadminnotices', 'custom_msg_notice', 10, 2);
function custom_msg_notice($type, $msg){
	echo '<div class="notice notice-' . $type .' is-dismissible"><p>' . $msg . '</p></div>';
}

add_action('admin_menu', 'sn_79EscapeGame');
function sn_79EscapeGame() {
    add_menu_page(
        'EscapeGame',
		'EscapeGame',
		'manage_options',
		'Users',
        'sn_display_Users',
		'dashicons-id
        ',
		6
	);
}


//===================page editing user==========================//

function hidded_submenu_page_edit_user() {
	add_submenu_page(
		'editingUser.php',
		__( 'Editing', 'profilepress' ),
		__( 'Editing', 'profilepress' ),
		'manage_options',
		'editingUser',
		'sd_editUser'
	);

}

add_action( 'admin_menu', 'hidded_submenu_page_edit_user' );

//=================Page delete User===========================//

function hidded_submenu_page_delete_user() {
	add_submenu_page(
		'deleteUser.php',
		__( 'Deleting', 'profilepress' ),
		__( 'Deleting', 'profilepress' ),
		'manage_options',
		'deleteUser',
		'sd_deleteUser'
	);
}

add_action( 'admin_menu', 'hidded_submenu_page_delete_user' );

//=================Resend Email password===========================//

function hidded_submenu_page_email_password() {
	add_submenu_page(
		'sendEmailPassword.php',
		__( 'sendEmailPassword', 'profilepress' ),
		__( 'sendEmailPassword', 'profilepress' ),
		'manage_options',
		'sendEmailPassword',
		'sn_sendEmailPassword'
	);

}

add_action( 'admin_menu', 'hidded_submenu_page_email_password' );

