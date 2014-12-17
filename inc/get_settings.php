<div class="wrap">
<h2>TCircle Settings</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'tcd-settings-group' ); ?>
    <?php do_settings_sections( 'tcd-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Per text rate <span class="required">*</span></th>
        <td>
			<input required="required" type="text" name="per_text_rate" value="<?php echo esc_attr( get_option('per_text_rate') ); ?>" />
			<div class="description">Enter a value for each word charge</div>
		</td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Per image rate <span class="required">*</span></th>
        <td>
			<input required="required" type="text" name="per_image_rate" value="<?php echo esc_attr( get_option('per_image_rate') ); ?>" />
			<div class="description">Enter a price for each image</div>
		</td>
        </tr>
    </table>
	
	 <table class="form-table">
        <tr valign="top">
        <th scope="row">Printable Area Width</th>
        <td>
			<input type="text" name="print_area_width" value="<?php echo esc_attr( get_option('print_area_width') ); ?>" />
			<div class="description">Enter pixel for print area wide. (Example: 350)</div>
		</td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Printable Area Height</th>
        <td>
			<input type="text" name="print_area_height" value="<?php echo esc_attr( get_option('print_area_height') ); ?>" />
			<div class="description">Enter pixel for print height wide. (Example: 350)</div>
		</td>
        </tr>
    </table>
	
	
    
    <?php submit_button(); ?>

</form>
</div>