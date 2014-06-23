<?php
add_action( 'wp_head', 'all_enq_scripts_css' );
add_action( 'admin_head', 'all_enq_scripts_css' );
/**
 * [all_enq_scripts_css description]
 * Enqueue style.css for the plugin to customize the frontend.
 */
function all_enq_scripts_css(){
	wp_enqueue_style( 'wp_head', plugin_dir_url( __FILE__ ).'style.css');
}


add_action( 'wp_footer', 'show_all_scripts');
add_action( 'admin_footer', 'show_all_scripts');
/**
 * [show_all_scripts description]
 * $wp_scripts 					: 	Global Wordpress Variable containing all the executing scripts.
 * $wp_scripts -> registered 	: 	Contains all the registered scripts.
 * $handle 						:	Contains Script handle name
 * $registered 					:	Object containing handle data.
 * $registered -> src 			:	Contains src of script registered with handle.
 * $registered -> ver 			:	Contains handle version.
 */
function show_all_scripts(){
	if(!is_user_logged_in())
		return;
?>
	<div class="wrap">
   		<center>
   			<h1>Enqueue Scripts List </h1>
		    <table id="all_enq_scripts">
    			<th>Handle</th>
    			<th>src</th>
    			<th>Version</th>
					<?php
					    global $wp_scripts;
					    foreach( $wp_scripts -> registered as $handle => $registered ){
					    	echo '<tr>';
						    	echo '<td>'.$handle.'</td>';
						    	echo '<td>'.$registered -> src.'</td>';
						    	echo '<td>';
							    	if($registered -> ver)
							    		echo 'Version : '.$registered -> ver;
						    	echo '</td>';
						    echo '</tr>';
					    }
					?>
			</table>
		</center>
    </div>
<?php
}


?>