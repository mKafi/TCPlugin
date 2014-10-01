<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css"> -->
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
jQuery(function() {
jQuery( "#tabs" ).tabs();
});
</script>
  

<div class="tcd_wrapper">
	<div class="tcd-nav-cont">
		<ul class="tcd-nav" id="launch-progression">
            <li class="active-step">
				<a href="javascript:void(0);" data-step="design">1. Create your tee</a>
				<span class="right-arrow"></span>
			</li>
            <li>
				<a href="javascript:void(0);" data-step="pricing">2. Set a goal</a>
				<span class="right-arrow"></span>
			</li>
            <li>
				<a href="javascript:void(0);" data-step="details">3. Add a description</a>
				<span class="right-arrow"></span>
			</li>
        </ul>
		
		<ul id="design-actions" class="nav pull-right">
            <li>
              <a href="javascript:void(0);" data-action="save" class="asset-linked">
                <i class="icon-save"></i> Save
</a>            </li>
            
            <li>
              <a href="javascript:void(0);" data-action="preview" class="asset-linked">
                <i class="icon-eye-open"></i> Preview
</a>            </li>
        </ul>
		
		
	</div>