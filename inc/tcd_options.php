<div class="wrap">
	<h2>TCircle Options</h2>
	<?php settings_errors(); ?>
	
	<h2 class="nav-tab-wrapper">
	<?php 
	$active_tab = trim($_GET['tc_tab']); 

	$active_tab = ($active_tab == "") ? 1 : $active_tab;

	$tc_option_tabs = array(1 => "General Settings", 2 => "Email Templates");

	foreach ($tc_option_tabs as $key => $value) {

		if($key == $active_tab ) $active_calss = 'nav-tab-active'; else $active_calss = '';

		echo '<a href="'.$key.'" class="nav-tab '.$active_calss.'">'.$value.'</a>';

	}
	?>
	</h2>
	
	
	<div id="tc-theme-settings" class="postbox">

	<form method="post" enctype="multipart/form-data" action="options.php">

		<?php 

		if($active_tab == 1) {

			?><div class="tc-settings-tab"><?php

			settings_fields('tc_theme_general_settings_group'); 

			do_settings_sections('tcthemeoptions1');

			?></div><?php

		} elseif ($active_tab == 2) {

			?><div class="tc-settings-tab"><?php

			settings_fields('tc_theme_social_login_group'); 

			do_settings_sections('tcthemeoptions2');

			?></div><?php

		} 
		
		?>

		<?php submit_button(); ?>	

	</form>

	</div>
	
	
	<form method="post" action="options.php">
		<?php settings_fields( 'tc-settings-group' ); ?>
		<?php do_settings_sections( 'tc-settings-group' ); ?>
		<table class="form-table">
			<tr valign="top">
			<th scope="row">Text rate (Per text)</th>
			<td><input type="text" name="rate_per_word" value="<?php echo esc_attr( get_option('rate_per_word') ); ?>" /></td>
			</tr>
			 
			<tr valign="top">
			<th scope="row">Image rate (Per Image)</th>
			<td><input type="text" name="rate_per_image" value="<?php echo esc_attr( get_option('rate_per_image') ); ?>" /></td>
			</tr>
		</table>
		
		<?php submit_button(); ?>

	</form>
</div>