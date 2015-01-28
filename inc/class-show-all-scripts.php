<?php
Class Ravs_Show_All_Scripts extends Debug_Bar_Panel{

	function init(){
		$this->title( __( 'All Scripts' ) );
		$this->enqueue();
	}


	function render(){
		?>
		<div class="wrap">
			<table id="all_enq_scripts">
				<th>Enqueued</th>
				<th>Handle</th>
				<th>src</th>
				<th>Version</th>
				<th>Depandancies</th>
				<!-- <th>Data</th> -->
				<?php
					global $wp_scripts;
					$done_scripts = $wp_scripts->done; 

					foreach( $wp_scripts->registered as $handle => $registered ){

						//check if script is enqueued for this visit
						$list = 'enqueued';
						$statusClass = '';
						$enqueued = '';
						if( in_array( $handle, $done_scripts ) ){
							$statusClass = ' class="ravs-active"';
							$enqueued = '&#10003;';
						}

						echo '<tr'.$statusClass.'>';
							echo '<td>'.$enqueued.'</td>';
							echo '<td>'.$registered->handle.'</td>';
							echo '<td>'.$registered->src.'</td>';
							echo '<td>'.$registered->ver.'</td>';
							echo '<td>'.implode( ', ', $registered->deps).'</td>';
							// echo '<td>'.$registered->extra['data'].'</td>';
						echo '</tr>';
						}
					?>
			</table>
		</div>
		<?php
	}

	function enqueue(){
		wp_enqueue_style( 'show-all-scripts-style-css', plugins_url( 'css/style.css', dirname( __FILE__ ) ) );
	}
}