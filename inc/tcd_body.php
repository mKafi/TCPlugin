<link rel="stylesheet" media="screen" type="text/css" href="<?php echo plugins_url('/../css/colorpicker.css',__FILE__); ?>" />
<script type="text/javascript" src=" <?php echo plugins_url('/../js/colorpicker.js',__FILE__); ?> "></script>

<div class="row">
	<div class="full_bg hidden"></div>
	<div class="step-cont step_one">
		<div class="pallet-cont">	
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
						<select id="font-chooser" class="select-list">
							<option value="arial">Arial</option>
							<option value="Times New Roman">Times new roman</option>
							<option value="tahoma">Tahoma</option>
							<option value="helvetica">Helvetica</option>
						</select>
						
						<label>Font size</label>
						<select id="font-size" class="select-list">
							<?php 
							for($i = 10; $i<200; $i++){
								?> <option value="<?php echo $i; ?>"><?php echo $i.' px'; ?></option> <?php 
							}
							?>
						</select>
						
						<label>Background Color</label>
						<div class="bg-color-box" id="bg-color"></div>
						<div class="color_pallete" id="color_pallete">
							<span class="color-icon" id="#FF0000" style="background-color:#FF0000;"></span>
							<span class="color-icon" id="#F6FF00" style="background-color:yellow;"></span>
							<span class="color-icon" id="#B5FF21" style="background-color:orange;"></span>
							<span class="color-icon" id="#3F00FF" style="background-color:blue;"></span>
							<span class="color-icon" id="#9E9E9E" style="background-color:gray;"></span>
							<span class="color-icon" id="#2CB297" style="background-color:#2CB297;"></span>
							<span class="color-icon" id="#157F31" style="background-color:#157F31;"></span>
							<span class="color-icon" id="#E02A2A" style="background-color:#452145;"></span>
							<span class="color-icon" id="#260D63" style="background-color:#260D63;"></span>
							<span class="color-icon" id="#9677E5" style="background-color:#9677E5;"></span>
							
							<span class="color-icon" id="#FF0000" style="background-color:#FF0000;"></span>
							<span class="color-icon" id="#F6FF00" style="background-color:yellow;"></span>
							<span class="color-icon" id="#B5FF21" style="background-color:orange;"></span>
							<span class="color-icon" id="#3F00FF" style="background-color:blue;"></span>
							<span class="color-icon" id="#9E9E9E" style="background-color:gray;"></span>
							<span class="color-icon" id="#2CB297" style="background-color:#2CB297;"></span>
							<span class="color-icon" id="#157F31" style="background-color:#157F31;"></span>
							<span class="color-icon" id="#E02A2A" style="background-color:#452145;"></span>
							<span class="color-icon" id="#260D63" style="background-color:#260D63;"></span>
							<span class="color-icon" id="#9677E5" style="background-color:#9677E5;"></span>
							
							<span class="color-icon" id="#FF0000" style="background-color:#FF0000;"></span>
							<span class="color-icon" id="#F6FF00" style="background-color:yellow;"></span>
							<span class="color-icon" id="#B5FF21" style="background-color:orange;"></span>
							<span class="color-icon" id="#3F00FF" style="background-color:blue;"></span>
							<span class="color-icon" id="#9E9E9E" style="background-color:gray;"></span>
							<span class="color-icon" id="#2CB297" style="background-color:#2CB297;"></span>
							<span class="color-icon" id="#157F31" style="background-color:#157F31;"></span>
							<span class="color-icon" id="#E02A2A" style="background-color:#452145;"></span>
							<span class="color-icon" id="#260D63" style="background-color:#260D63;"></span>
							<span class="color-icon" id="#9677E5" style="background-color:#9677E5;"></span>
							
							
						</div>
						
						
						
						<label>Text color</label>
						<div class="text-color-box" id="text-color"></div>
						<div class="color_pallete" id="color_pallete">
							<span class="text-color-icon" id="#FF0000" style="background-color:#FF0000;"></span>
							<span class="text-color-icon" id="#F6FF00" style="background-color:yellow;"></span>
							<span class="text-color-icon" id="#B5FF21" style="background-color:orange;"></span>
							<span class="text-color-icon" id="#3F00FF" style="background-color:blue;"></span>
							<span class="text-color-icon" id="#9E9E9E" style="background-color:gray;"></span>
							<span class="text-color-icon" id="#2CB297" style="background-color:#2CB297;"></span>
							<span class="text-color-icon" id="#157F31" style="background-color:#157F31;"></span>
							<span class="text-color-icon" id="#E02A2A" style="background-color:#452145;"></span>
							<span class="text-color-icon" id="#260D63" style="background-color:#260D63;"></span>
							<span class="text-color-icon" id="#9677E5" style="background-color:#9677E5;"></span>
							
							<span class="text-color-icon" id="#FF0000" style="background-color:#FF0000;"></span>
							<span class="text-color-icon" id="#F6FF00" style="background-color:yellow;"></span>
							<span class="text-color-icon" id="#B5FF21" style="background-color:orange;"></span>
							<span class="text-color-icon" id="#3F00FF" style="background-color:blue;"></span>
							<span class="text-color-icon" id="#9E9E9E" style="background-color:gray;"></span>
							<span class="text-color-icon" id="#2CB297" style="background-color:#2CB297;"></span>
							<span class="text-color-icon" id="#157F31" style="background-color:#157F31;"></span>
							<span class="text-color-icon" id="#E02A2A" style="background-color:#452145;"></span>
							<span class="text-color-icon" id="#260D63" style="background-color:#260D63;"></span>
							<span class="text-color-icon" id="#9677E5" style="background-color:#9677E5;"></span>
							
							<span class="text-color-icon" id="#FF0000" style="background-color:#FF0000;"></span>
							<span class="text-color-icon" id="#F6FF00" style="background-color:yellow;"></span>
							<span class="text-color-icon" id="#B5FF21" style="background-color:orange;"></span>
							<span class="text-color-icon" id="#3F00FF" style="background-color:blue;"></span>
							<span class="text-color-icon" id="#9E9E9E" style="background-color:gray;"></span>
							<span class="text-color-icon" id="#2CB297" style="background-color:#2CB297;"></span>
							<span class="text-color-icon" id="#157F31" style="background-color:#157F31;"></span>
							<span class="text-color-icon" id="#E02A2A" style="background-color:#452145;"></span>
							<span class="text-color-icon" id="#260D63" style="background-color:#260D63;"></span>
							<span class="text-color-icon" id="#9677E5" style="background-color:#9677E5;"></span>							
						</div>
						
						<!--
						<div id="colorpickerHolder">
							
						</div>
						-->
						
						
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
						
						<div class="clipart-cont hidden" id="clipart-cont">
							<span class="closeit">X</span>
							<span class="backit hidden">BACK</span>
							<div class="symbol-cont">								
								<?php 
								
								$dir_path    = plugin_dir_path( __FILE__ ).'../clip_arts/';
								
								/* $dir_path    = 'E:\xampp\htdocs\Tcircle\wp-content\plugins\TCPlugin/clip_arts/'; */	
								
								
								$objects = scandir($dir_path);	
								$dirs = array();
								$files = array();
								foreach($objects AS $k=>$v){
									if($v != '.' && $v != '..'){
										if (is_dir($dir_path.'/'.$v)){
											$dirs[] = $v;
										}
										else{				
											$files[] = $v;														
										}
									}
								}	
								
								?><div class="parent level0"><?php 
								foreach($dirs AS $d){
									$cont_id = str_replace(' ','_',strtolower($d));
									
									?>
									<div class="parent level1" id="<?php echo $cont_id; ?>"><?php echo $d; ?></div>
									<div class="hidden level2 <?php echo $cont_id; ?>">
										<?php 
										$second_path = $dir_path.'/'.$d;
										$sub_files_path = scandir($second_path,1);
										/* echo '<pre>'; print_r($sub_files_path); echo '</pre>';  */
										
										foreach($sub_files_path AS $ss => $sf){											
											if($sf != '.' && $sf != '..'){
												if(is_dir($second_path.'/'.$sf)){
													
												}
												else{				
													?> 
													<div class="result tcpring">
														<img src="<?php echo plugins_url('TCPlugin').'/clip_arts/'.$d.'/'.$sf; ?>" alt="Icon"/> 
													</div>
													<?php
												}
											}
										}	
										
										
										?>
									</div>
									<?php 
								}
								?></div><?php 
								
								?>
								
								
								
							
							
							</div>
						</div>
						
						<div class="clipart-used-cont">
							
						</div>
						
					</div>
				</div>
			</div>
			<!-- left controle ends -->


			<!-- middle image panel starts -->
			<div class="same-line tshirt">
				<!--
				<div id="test-cont">
					<div>Another <img src="<?php echo plugins_url('tcplugin').'/clips/tion.png'; ?>" alt=""/></div>
					<span>Test text</span>
					<div>it's a div</div>
				</div>
				-->
				
				<div class="flip-container" id="tot_wrap">
					
					<div id="tshirt_frame_wrap" class="tshirt_frame unflipped">
						
						<input type="hidden" name="selected_element" value="" id="selected_element" />
						<div class="tshirt back">
							<img id="back-image" src="<?php echo plugins_url('default_reversed.png',__FILE__); ?>" alt=""/>
							<div class="design-frame back-part">
								<div class="txt_printable">Printable Area</div>
							</div>
							
						</div>
						<div class="tshirt front">
							<div class="design-frame front-part">
								
							</div>
							<img id="front-image" src="<?php echo plugins_url('default.png',__FILE__); ?>" alt=""/>
						</div>
						
					</div>
				</div>
				<span class="flip_canvas" id="back" >Front</span>
				<span class="flip_canvas hidden" id="front">Back</span>
			</div>

			<!-- middle image panel ends -->


			<!-- right controle starts -->
			<div class="same-line right-controle">
				<label>T-Shirt & Variant</label>
				<?php 
				$args = array(
					'type'                 => 'product',
					'child_of'                 => 0,
					'parent'                   => '',
					'orderby'                  => 'name',
					'order'                    => 'ASC',
					'hide_empty'               => 0,
					'hierarchical'             => 0,
					'exclude'                  => '',
					'include'                  => '',
					'number'                   => '',
					'taxonomy'                 => 'product_cat',
					'pad_counts'               => false 
				); 
				
				$categories = get_categories($args);
				if(!empty($categories) && count($categories) > 0){					
					/* echo '<pre>'; print_R($categories); echo '</pre>'; */
					?>
					<select name="tshirt_variant" id="tshirt_variant">
						<?php 
						foreach($categories AS $cat){						
							?> <option value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option> <?php 
						}
						?>
					</select>
					<?php 
				} else { 
					?>
					<div class="">There is no category yet</div>
					<?php 
				} 
				
				
				
				
				?>
				<div class="tshirt_variant_cont" id="tshirt_variant_cont"></div>
				<div class="clearfix"></div>
				
				<div class="grand-total">
					<span>Base cost at minimum 10-19 products</span>
					<div class="basep-cont">
					<span class="doll-sym">$ </span>
					<span class="base_price">0</span></div>
				</div>
				
				<input type="button" name="for_step_two" id="for_step_two" class="step_forward" value="Next step"/>
				
			</div>
			<!-- right controle ends -->
			
			
		</div>
	</div>
	
	<div class="step-cont step_two hidden">
		<div class="pallet-cont ">
			
			<div class="step_two-wrap tool-cont">
				<div class="campaign-info-cont">
					<label>Sales Goal</label>										
					
					<div id="goal-range"></div>
					<input type="text" id="goal-count" name="goal-count" value="10"/> Shirts<br/>
					<p>Your goal is the minimum number of shirts that need to be reserved before the shirts are printed!</p>
				</div>
				
				<div class="profit-counter">
					<label>Estimated profit</label>					
					<span id="estimated-profit" name="estimated-profit">0.00</span>
				</div>
				
				<div class="campaign-info-cont">
					<label>Set selling price</label>										
					<p>Set the selling price of your shirt to determine your profit and add additional products to sell your design on! </p>
					<div class="sale-price-cont">
					<input type="text" name="sale-price" id="sale-price" value="20"/>
					$ <span id="txt-sale-price">0</span>
					<span class="txt-price-sale">(Profit/Sale)</span>
					</div>
				</div>
				
				<span class="step_forward" id="for_step_three">Next step</span>
				
			</div>
			
			<div class="step_two-wrap image-cont">
				<div class="step2-shirt-cont"></div>
			</div>
			
		</div>
	</div>
	
	<div class="step-cont step_three hidden">
		<div class="pallet-cont">
			<div class="step_two-wrap tool-cont">
				<div class="campaign-info-cont">
					<label>Campaign title</label>										
					<input type="text" id="campaign-name" class="campaign-name campaign-text" name="campaign-name" value=""/> 
					<span class="desc">Summarize your campaign in 40 characters or less</span>
				</div>
				
				<div class="campaign-info-cont">
					<label>Description</label>										
					<textarea name="campaign-desc" id="campaign-desc"></textarea>
					<span class="desc">Summarize your campaign in 40 characters or less</span>
				</div>
								
				<div class="campaign-info-cont">
					<label>Tags</label>										
					<input type="text" id="campaign-tags" class="campaign-text campaign-tags" name="campaign-tags" value=""/>
					<span class="desc">Tags help buyers find your campaign. Enter up to 5 words to describe your campaign (e.g. Sports, Moms, Firefighters)</span>
				</div>
				
				<div class="campaign-info-cont">
					<label>Campaign length</label>										
					<select id="campaign-length" class="campaign-length campaign-select" name="campaign-length">            
						<option value="2">2 Days</option>
						<option value="3">3 Days</option>
						<option value="4">4 Days</option>
						<option value="5">5 Days</option>						
						<option value="6">6 Days</option>
						<option value="7">7 Days</option>
					</select>
					<span class="desc">Our orders will arrive 10-14 days after the end of the campaign.</span>
				</div>
				
				<div class="campaign-info-cont">
					<label>Choose a URL</label>										
					<input type="text" id="campaign-url" class="campaign-url campaign-text" name="campaign-url" value="<?php echo site_url().'/'; ?>"/> 
					<span class="desc">This is where you will send buyers to view your campaign</span>
				</div>
				
				<div class="campaign-info-cont checkbox-cont">
					<label>Shipping options</label>										
					<input type="checkbox" id="campaign-shippingopt" name="campaign-shippingopt" value="1"/> 
					<span>Allow buyers to pick-up their orders from you (pickup shipping is free)</span>
					<div class="shipping-address hidden" id="shipping-address">
						
						<div class="campaign-info-cont">
							<label>Fist Name</label>										
							<input type="text" id="shipping-first-name" class="shipping-first-name campaign-text" name="shipping-first-name" value=""/> 
						</div>
						
						<div class="campaign-info-cont">
							<label>Last Name</label>										
							<input type="text" id="shipping-last-name" class="shipping-last-name campaign-text" name="shipping-last-name" value=""/> 
						</div>
						
						<div class="campaign-info-cont">
							<label>Shipping address</label>										
							<input type="text" id="shipping-first-address" class="shipping-first-address campaign-text" name="shipping-first-address" value=""/> 
							<input type="text" id="shipping-second-address" class="shipping-second-address campaign-text" name="shipping-second-address" value=""/> 
						</div>
						
						
						<div class="campaign-info-cont">																
							<input type="text" id="shipping-city" class="shipping-city small-text" name="shipping-city" value="" placeholder="City"/>
							<input type="text" id="shipping-state" class="shipping-state small-text" name="shipping-state" value="" placeholder="State"/>
							<input type="text" id="shipping-zip" class="shipping-zip small-text" name="shipping-zip" value="" placeholder="Zip"/>
							
						</div>
						
						
						
					</div>
				</div>
				
				<div class="campaign-info-cont checkbox-cont">
					<input type="checkbox" id="campaign-agreement" name="campaign-agreement" value="1"/> 
					<span>I have read and agreed to the <a href="<?php $page = get_page_by_title( 'Terms of Services' ); echo get_permalink( $page->ID ); ?>">terms of service (TOS)</a>, and can confirm that the images, slogans, and content used in my campaign do not infringe upon the rights of any third party.</span>
				</div>
				
				<span class="step_forward" id="launch-campaign">Launch your campaign</span>
				
			</div>
			
			<div class="step_two-wrap image-cont">
				<div class="step3-shirt-cont"></div>
			</div>
			
		</div>
	</div>
</div>
<script src="http://html2canvas.hertzen.com/build/html2canvas.js"></script>
<script type="text/javascript">
	jQuery.noConflict();
	
	jQuery(function(){
		
	});
	
</script>