<div class="wrap">
<h2>TCircle Options</h2>
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