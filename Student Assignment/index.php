<?php
/*
Plugin Name: Student Assignment
Plugin URI: 
Author: Anshu Sharma
Version: 1.1
Description:This is a plugin which is used for providing assignment to the student.
*/
define('CUSTOM_PLUGIN_DIR_PATH',plugin_dir_path(__FILE__));


/*Add CSS Files*/

   /*Add Css Files*/
 	wp_enqueue_style('bootstrap-grid',plugins_url('Student Assignment','' ) .'/css/bootstrap-grid.css');
	wp_enqueue_style('bootstrap-grid.min',plugins_url('Student Assignment','' ).'/css/bootstrap-grid.min.css');
	wp_enqueue_style('bootstrap-reboot',plugins_url('Student Assignment','' ).'/css/bootstrap-reboot.css');
	wp_enqueue_style('bootstrap-reboot.min',plugins_url('Student Assignment','' ).'/css/bootstrap-reboot.min.css');
	wp_enqueue_style('bootstrap',plugins_url('Student Assignment','' ).'/css/bootstrap.css');
	/*wp_enqueue_style('bootstrap-min',plugins_url('Student Management','' ).'/css/bootstrap-min.css');
*/
	/*Add js Files*/

	wp_enqueue_script('bootstrap.bundle',plugins_url('Student Assignment','' ).'/js/bootstrap.bundle.js');
	wp_enqueue_script('bootstrap.bundle.min',plugins_url('Student Assignment','' ).'/js/bootstrap.bundle.min.js');
	wp_enqueue_script('bootstrap',plugins_url('Student Assignment','' ).'/js/bootstrap.js');
	wp_enqueue_script('bootstrap.min',plugins_url('Student Assignment','' ).'/js/bootstrap.min.js');
	wp_enqueue_script('jquery',plugins_url('Student Assignment','' ).'/js/jquery.js');





/*Add Menu to the plugin*/
function next_menu_development()
{
	add_menu_page("Stduent Assignment","Upload Assignment","manage_options","wp-student-record-plugin","wp_callback_function_menu");
   
   add_submenu_page("wp-student-record-plugin","View Assignment","View Assignment","manage_options","wp-student-assignment-plugin","wp_callback_function_menu_view");


}
add_action('admin_menu','next_menu_development'); 

function wp_callback_function_menu()
{
	include_once CUSTOM_PLUGIN_DIR_PATH .'/templates/Upload_Assignment.php';
}
function wp_callback_function_menu_view()
{
	include_once CUSTOM_PLUGIN_DIR_PATH . '/templates/View_Assignment.php';
}

wp_enqueue_script('jquery');
function uploadAssignment()
{
   global $wpdb;
   $query =  $wpdb->insert( 'wp_assignment', array(
		        "Task" => $_POST['task'],
		        "Date" => $_POST['date'],
		        "Due" => $_POST['duedate'],
		        "AssignTo" => $_POST['assignto']
			) 
		);

 
    if ( $query == false )
    {
        echo 'Error';
    }
    else 
    {
        echo "Assignment Added  successfully ";
    }

}
add_action('wp_ajax_uploadAssignment', 'uploadAssignment');

//add_action('wp_ajax_nopriv_uploadAssignment','uploadAssignment');

function getData()
{
	global $wpdb, $wp_roles;
    $all_roles = $wp_roles->roles;
    foreach ($all_roles as $key => $value){
    	$roles[] = $value['name'];
    }
	$user = $_POST['user'];
	$assignment = $wpdb->get_results($wpdb->prepare("SELECT * FROM `wp_assignment` WHERE `AssignTo` ='$user' "),ARRAY_A);
	if($assignment > 0)
	{
        foreach($assignment as $index=> $task)
        {
            $arr['Task'] = $task['Task'];
            $arr['Date'] = $task['Date'];
            $arr['Due']  = $task['Due'];
            $arr['AssignTo'] = $task['AssignTo'];
            $res[] = $arr;     
    	}
        echo json_encode($res);
        die();
	}
}
add_action('wp_ajax_getData','getData');
?>

