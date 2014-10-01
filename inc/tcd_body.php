<!-- left controle starts -->
<div class="left_controle same-line">
	<div id="tabs">
	  <ul>
		<li><a href="#tabs-1">Add Text</a></li>
		<li><a href="#tabs-2">Add/Upload Art</a></li>    
	  </ul>
		<div id="tabs-1">
			<label>Enter text below</label>
			<input type="text" id="text_field" value=""/>
			
			<label>Choose a font</label>
			<select>
				<option value="arial">Arial</option>
				<option value="Times New Roman">Times new roman</option>
				<option value="tahoma">Tahoma</option>
				<option value="helvetica">Helvetica</option>
			</select>
			
			<label>Text color</label>
			<div class="color-box" id="text-color"></div>
			<div class="color_pallete" id="color_pallete">
				<span class="color-icon" id="#FF0000" style="background-color:red;"></span>
				<span class="color-icon" id="#F6FF00" style="background-color:yellow;"></span>
				<span class="color-icon" id="#B5FF21" style="background-color:orange;"></span>
				<span class="color-icon" id="#3F00FF" style="background-color:blue;"></span>
				<span class="color-icon" id="#9E9E9E" style="background-color:gray;"></span>
			</div>
			
			<label>Add an outline</label>
			<select name="outline" id="outline">
				<option value="no-outline"> No outline</option>
				<option value="thin"> Thin Outline</option>
				<option value="medium"> Medium Outline</option>
				<option value="thick"> Thick Outline</option>
			</select>
			
		</div>
		<div id="tabs-2">
			<input type="button" id="search_art" value="Search for art"/>
			<span>OR</span>
			<input type="button" id="upload_own" value="Upload you own"/>
			<span class="desc">Upload you own vector & art</span>
		</div>
	</div>
</div>
<!-- left controle ends -->


<!-- middle image panel starts -->
<div class="same-line tshirt">
	<div class="flip-container">
		<div class="tshirt_frame unflipped">
			<div class="tshirt front">
				<img src="<?php echo plugins_url('front.png',__FILE__); ?>" alt=""/>
			</div>
			
			<div class="tshirt back">
				<img src="<?php echo plugins_url('back.png',__FILE__); ?>" alt=""/>
			</div>
		</div>
	</div>
	<span class="flip_canvas" id="back" >Front</div>
	<span class="flip_canvas hidden" id="front">Back</div>
</div>

<!-- middle image panel ends -->


<!-- right controle starts -->
<div class="same-line right-controle">
	<label>T-Shirt & Variant</label>
	<select name="tshirt_variant" id="">
		<option value="hoodie">Hoodie</option>
		<option value="sdf">Ilue</option>
	</select>
	<div class="tshirt_variant_cont" id="tshirt_variant_cont"></div>
	<div class="clearfix"></div>
	
	<span>Base cost</span>
	<span class="base_price">$420</span>
	
	<input type="button" name="for_step_two" id="for_step_two" value="Next step"/>
	
</div>

<!-- right controle ends -->
