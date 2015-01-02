<img class="hidden tshirt-loader" src="<?php echo plugins_url('TCPlugin').'/images/medium-loader.gif'; ?>" alt="Loading T-Shirt...."/>
<div class="full_bg hidden"></div>
<div class="row">
	
	
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
						
						<!--
						<label>Font size</label>
						<select id="font-size" class="select-list">
							<?php 
							/*
							for($i = 10; $i<200; $i++){
								?> <option value="<?php echo $i; ?>"><?php echo $i.' px'; ?></option> <?php 
							}
							*/
							?>
						</select>
						
						-->
						
						<!--
						<label>Background Color</label>
						<div class="bg-color-box" id="bg-color"></div>
						<div class="color_pallete" id="color_pallete">
							<span class="color-icon" id="#F79694" style="background-color:#F79694;"></span>
							<span class="color-icon" id="#EF7977" style="background-color:#EF7977;"></span>
							<span class="color-icon" id="#E55250" style="background-color:#E55250;"></span>
							<span class="color-icon" id="#C65B59" style="background-color:#C65B59;"></span>
							<span class="color-icon" id="#AA605F" style="background-color:#AA605F;"></span>
							<span class="color-icon" id="#AA8786" style="background-color:#AA8786;"></span>
							<span class="color-icon" id="#938989" style="background-color:#938989;"></span>
							<span class="color-icon" id="#D6C686" style="background-color:#D6C686;"></span>
							<span class="color-icon" id="#ADA174" style="background-color:#ADA174;"></span>
							
							<span class="color-icon" id="#F7ECC3" style="background-color:#F7ECC3;"></span>
							<span class="color-icon" id="#F7E499" style="background-color:#F7E499;"></span>
							<span class="color-icon" id="#F2D560" style="background-color:#F2D560;"></span>
							<span class="color-icon" id="#F2CA2B" style="background-color:#F2CA2B;"></span>
							<span class="color-icon" id="#EFC004" style="background-color:#EFC004;"></span>
							<span class="color-icon" id="#D3C17A" style="background-color:#D3C17A;"></span>
							<span class="color-icon" id="#C4C264" style="background-color:#C4C264;"></span>
							<span class="color-icon" id="#B2B03A" style="background-color:#B2B03A;"></span>
							<span class="color-icon" id="#F2EE09" style="background-color:#F2EE09;"></span>
							
							<span class="color-icon" id="#DAE8F2" style="background-color:#DAE8F2;"></span>
							<span class="color-icon" id="#A7D5F2" style="background-color:#A7D5F2;"></span>
							<span class="color-icon" id="#1598EA" style="background-color:#1598EA;"></span>
							<span class="color-icon" id="#8BACC1" style="background-color:#8BACC1;"></span>
							<span class="color-icon" id="#3C8BBC" style="background-color:#3C8BBC;"></span>
							<span class="color-icon" id="#4A6372" style="background-color:#4A6372;"></span>
							<span class="color-icon" id="#2C778E" style="background-color:#2C778E;"></span>
							<span class="color-icon" id="#526B72" style="background-color:#526B72;"></span>
							<span class="color-icon" id="#1196BF" style="background-color:#1196BF;"></span>
							
							<span class="color-icon" id="#F9ACB8" style="background-color:#F9ACB8;"></span>
							<span class="color-icon" id="#F77E90" style="background-color:#F77E90;"></span>
							<span class="color-icon" id="#F24F68" style="background-color:#F24F68;"></span>
							<span class="color-icon" id="#F91B3C" style="background-color:#F91B3C;"></span>
							<span class="color-icon" id="#E50022" style="background-color:#E50022;"></span>
							<span class="color-icon" id="#CE465A" style="background-color:#CE465A;"></span>
							<span class="color-icon" id="#BA1B33" style="background-color:#BA1B33;"></span>
							<span class="color-icon" id="#7F5E63" style="background-color:#7F5E63;"></span>
							<span class="color-icon" id="#A89497" style="background-color:#A89497;"></span>
							
							<span class="color-icon" id="#FFFA00" style="background-color:#FFFA00;"></span>
							<span class="color-icon" id="#DBD969" style="background-color:#DBD969;"></span>
							<span class="color-icon" id="#CEE7E8" style="background-color:#CEE7E8;"></span>
							<span class="color-icon" id="#4FAEAF" style="background-color:#4FAEAF;"></span>
							<span class="color-icon" id="#4600F9" style="background-color:#4600F9;"></span>
							<span class="color-icon" id="#A596CC" style="background-color:#A596CC;"></span>
							<span class="color-icon" id="#DB3B45" style="background-color:#DB3B45;"></span>
							<span class="color-icon" id="#DB1B18" style="background-color:#DB1B18;"></span>
							<span class="color-icon" id="#000000" style="background-color:#000000;"></span>
						</div>
						-->
						
						
						
						<label>Text color</label>
						<div class="text-color-box" id="text-color"></div>
						<div class="color_pallete" id="color_pallete">
							<span class="text-color-icon" id="#FFFA00" style="background-color:#FFFA00;"></span>
							<span class="text-color-icon" id="#DBD969" style="background-color:#DBD969;"></span>
							<span class="text-color-icon" id="#CEE7E8" style="background-color:#CEE7E8;"></span>
							<span class="text-color-icon" id="#4FAEAF" style="background-color:#4FAEAF;"></span>
							<span class="text-color-icon" id="#4600F9" style="background-color:#4600F9;"></span>
							<span class="text-color-icon" id="#A596CC" style="background-color:#A596CC;"></span>
							<span class="text-color-icon" id="#DB3B45" style="background-color:#DB3B45;"></span>
							<span class="text-color-icon" id="#DB1B18" style="background-color:#DB1B18;"></span>
							<span class="text-color-icon" id="#000000" style="background-color:#000000;"></span>	
							
							<span class="text-color-icon" id="#F9ACB8" style="background-color:#F9ACB8;"></span>
							<span class="text-color-icon" id="#F77E90" style="background-color:#F77E90;"></span>
							<span class="text-color-icon" id="#F24F68" style="background-color:#F24F68;"></span>
							<span class="text-color-icon" id="#F91B3C" style="background-color:#F91B3C;"></span>
							<span class="text-color-icon" id="#E50022" style="background-color:#E50022;"></span>
							<span class="text-color-icon" id="#CE465A" style="background-color:#CE465A;"></span>
							<span class="text-color-icon" id="#BA1B33" style="background-color:#BA1B33;"></span>
							<span class="text-color-icon" id="#7F5E63" style="background-color:#7F5E63;"></span>
							<span class="text-color-icon" id="#A89497" style="background-color:#A89497;"></span>
							
							<span class="text-color-icon" id="#DAE8F2" style="background-color:#DAE8F2;"></span>
							<span class="text-color-icon" id="#A7D5F2" style="background-color:#A7D5F2;"></span>
							<span class="text-color-icon" id="#1598EA" style="background-color:#1598EA;"></span>
							<span class="text-color-icon" id="#8BACC1" style="background-color:#8BACC1;"></span>
							<span class="text-color-icon" id="#3C8BBC" style="background-color:#3C8BBC;"></span>
							<span class="text-color-icon" id="#4A6372" style="background-color:#4A6372;"></span>
							<span class="text-color-icon" id="#2C778E" style="background-color:#2C778E;"></span>
							<span class="text-color-icon" id="#526B72" style="background-color:#526B72;"></span>
							<span class="text-color-icon" id="#1196BF" style="background-color:#1196BF;"></span>
							
							<span class="text-color-icon" id="#F7ECC3" style="background-color:#F7ECC3;"></span>
							<span class="text-color-icon" id="#F7E499" style="background-color:#F7E499;"></span>
							<span class="text-color-icon" id="#F2D560" style="background-color:#F2D560;"></span>
							<span class="text-color-icon" id="#F2CA2B" style="background-color:#F2CA2B;"></span>
							<span class="text-color-icon" id="#EFC004" style="background-color:#EFC004;"></span>
							<span class="text-color-icon" id="#D3C17A" style="background-color:#D3C17A;"></span>
							<span class="text-color-icon" id="#C4C264" style="background-color:#C4C264;"></span>
							<span class="text-color-icon" id="#B2B03A" style="background-color:#B2B03A;"></span>
							<span class="text-color-icon" id="#F2EE09" style="background-color:#F2EE09;"></span>
							
							<span class="text-color-icon" id="#F79694" style="background-color:#F79694;"></span>
							<span class="text-color-icon" id="#EF7977" style="background-color:#EF7977;"></span>
							<span class="text-color-icon" id="#E55250" style="background-color:#E55250;"></span>
							<span class="text-color-icon" id="#C65B59" style="background-color:#C65B59;"></span>
							<span class="text-color-icon" id="#AA605F" style="background-color:#AA605F;"></span>
							<span class="text-color-icon" id="#AA8786" style="background-color:#AA8786;"></span>
							<span class="text-color-icon" id="#938989" style="background-color:#938989;"></span>
							<span class="text-color-icon" id="#D6C686" style="background-color:#D6C686;"></span>
							<span class="text-color-icon" id="#ADA174" style="background-color:#ADA174;"></span>
							
						</div>
						
						<!--
						<div id="colorpickerHolder">
							
						</div>
						-->
						
						<!--
						<label>Add an outline</label>
						<select name="outline" id="outline">
							<option value="no-outline"> No outline</option>
							<option value="thin"> Thin Outline</option>
							<option value="medium"> Medium Outline</option>
							<option value="thick"> Thick Outline</option>
						</select>
						-->
						
					</div>
					<div id="tabs-2">
						<input type="button" id="search_art" value="Search for art"/>
						<span>OR</span>
						<form id="imageform" name="imageform" method="post" enctype="multipart/form-data" action="<?php echo admin_url('admin-ajax.php'); ?>">
							<div id='imageloadstatus' style='display:none'>
								<img src=" <?php echo plugins_url('TCPlugin').'/images/loadingAnimation.gif'; ?>" alt="Uploading...."/>
								<div class="shadoe-mask"></div>
							</div>
							<div id='imageloadbutton'>
								<input type="file" id="upload_own" name="upload_own" value="Upload your own"/>
							</div>
							<span class="tip"><label>TIP:</label> For best result, upload high resolution/vector art.</span>
							<div class="bottom-box"> 
								<span class="tip-text"><label>Max size:</label> 5MB</span>
								<span class="tip-text"><label>File type:</label> .jpg, .png, .eps</span>
								<span class="tip-text"><label>Max dimension:</label> 3000px for .jpg and .png</span>
								<span class="tip-text last-text"> By uploading an image you agree that you hold the right to reproduce and sell the design</span>
							</div>
							<input type="hidden" name="action" value="ownfileupload"/>
						</form>
						
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
			$first_cat = '';
			$t_posts = array();
			
			if(!empty($categories) && count($categories) > 0){
				$first_cat = $categories[0]->slug;
				$t_posts = get_product_by_cat_slug($first_cat);
				
				/* echo '<pre>'; print_r($t_posts); echo '</pre>';  */
				
				/* echo '<pre>'; print_r(get_post_meta($t_posts[0]['prod_id'])); echo '</pre>'; */
				
				$pr_height = esc_attr( get_option('print_area_height'));
				$pr_width = esc_attr( get_option('print_area_width'));
				
				$prod_price = get_post_meta($t_posts[0]['prod_id'],'tcplugin_10_19',true);
				$pr_height = get_post_meta($t_posts[0]['prod_id'],'pr_height',true);
				$pr_width = get_post_meta($t_posts[0]['prod_id'],'pr_width',true);
				
				
				$print_area_height = esc_attr( get_option('print_area_height') );				
				$print_area_width = esc_attr( get_option('print_area_width') );
				
				$t_shirt_colors = array();
				$colors_string = get_post_meta($t_posts[0]['prod_id'],'t_shirt_colors',true);
				
				$colors_name = explode(",",$colors_string);
				$t_shirt_colors = array();
				foreach($colors_name AS $kk=>$vv){					
					$t_shirt_colors[] = explode("-",$vv);
				}
				/* echo '<pre>'; print_r($t_shirt_colors); echo '</pre>';  */
				
			}	
			
			?>			
			<div class="same-line tshirt">				
				<div class="flip-container" id="tot_wrap">
					<img class="hidden tshirt-loader" src="<?php echo plugins_url('TCPlugin').'/images/medium-loader.gif'; ?>" alt="Loading T-Shirt...."/>
					
					<div id="tshirt_frame_wrap" class="tshirt_frame unflipped">
						
						<input type="hidden" name="selected_element" value="" id="selected_element" />
						<div class="tshirt back" id="backpartonly">
							
							<div class="" id="bicont">		
								<?php 
								if(isset($t_posts[0]['gallery'][1]) && !empty($t_posts[0]['gallery'][1])){
									?><img id="back-image" src="<?php echo $t_posts[0]['gallery'][1]; ?>" alt=""/><?php 
								}
								else{ 
									?><img id="back-image" src="<?php echo plugins_url('default_reversed.png',__FILE__); ?>" alt=""/><?php 
								}
								?>
								<div class="design-frame back-part" id="bback" style="width:<?php if($pr_width) { echo $pr_width; } else { echo $print_area_width; } ?>px; height:<?php if($pr_height) { echo $pr_height; } else { echo $print_area_height; } ?>px; ">
									<div class="txt_printable">Printable Area</div>
								</div>
							</div>
							
						</div>
						<div class="tshirt front" id="frontpartonly">
							
							<?php 
							if(isset($t_posts[0]['gallery'][2]) && !empty($t_posts[0]['gallery'][2])){
								?><img id="front-image" src="<?php echo $t_posts[0]['gallery'][2]; ?>" alt=""/><?php 
							}
							else{ 
								?><img id="front-image" src="<?php echo plugins_url('default_reversed.png',__FILE__); ?>" alt=""/><?php 
							}
							?>							
							<div class="design-frame front-part" style="width:<?php if($pr_width){ echo $pr_width; } else { echo $print_area_width; } ?>px; height:<?php if($pr_height){ echo $pr_height; } else { echo $print_area_height; } ?>px; ">
								<div class="txt_printable">Printable Area</div>
							</div>
							
						</div>
						
					</div>
				</div>
				<span class="flip_canvas" id="back" >Back</span>
				<span class="flip_canvas hidden" id="front">Front</span>
			</div>
			<!-- middle image panel ends -->


			<!-- right controle starts -->
			<div class="same-line right-controle">
				<?php 
				if(isset($t_shirt_colors) && !empty($t_shirt_colors) && count($t_shirt_colors)>0){
					?>
					<div class="color-pallet-cont">
						<div id="color_pallete" class="color_pallete tshirt-colors">
							<div class="top-colors"><?php 							
								for($i=0; $i<9; $i++){
									?><span title="<?php echo $t_shirt_colors[$i][1]; ?>" style="background-color:<?php echo $t_shirt_colors[$i][0]; ?>" id="<?php echo $t_shirt_colors[$i][0]; ?>" class="color-icon"></span><?php 
								}
							?></div><?php 							
						
							if(count($t_shirt_colors) > 8){
								?>
								<span class="more-color" title="Click here to get additional colors. Click again to off additional color box.">MC</span>
								<div class="additional-colors hidden">								
									<?php 								
									for($i=9; $i<count($t_shirt_colors); $i++){
										?><span title="<?php echo $t_shirt_colors[$i][1]; ?>" style="background-color:<?php echo $t_shirt_colors[$i][0]; ?>" id="<?php echo $t_shirt_colors[$i][0]; ?>" class="color-icon"></span><?php 
									}
									?>
								</div>
								<?php 
							}
						?>
						</div>
					</div><?php 
				}
				?>					
				
				<label>T-Shirt & Variant</label>
				<?php 
				if(!empty($categories) && count($categories) > 0){					
					/* echo '<pre>'; print_R($categories); echo '</pre>'; */
					?>
					<select name="tshirt_variant" id="tshirt_variant">
						<?php 
						
						foreach($categories AS $k=>$cat){ 
							?> <option <?php if($k == 0) echo 'selected="selected"'; ?> value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option> <?php 
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
				<img class="hidden variant_loader" src="<?php echo plugins_url('TCPlugin').'/images/ajax-loader.gif'; ?>" alt="Loading...."/>
				
				<div class="tshirt_variant_cont" id="tshirt_variant_cont">
					<?php 
						if(isset($t_posts) && !empty($t_posts) && count($t_posts)>0){
							foreach($t_posts AS $pval){								
								?>								
								<div class="prod-wrap" id="prodid_<?php echo $pval['prod_id']; ?>">
									<input type="hidden" class="prod-wrap-back-img" value="<?php echo $pval['gallery']['1']; ?>"/>
									<input type="hidden" class="prod-wrap-front-img" value="<?php echo $pval['gallery']['2']; ?>"/>
									<img class="tshirt-main-image" src="<?php echo $pval['url']; ?>" alt=""/><span class="ptitle"><?php echo $pval['title']; ?></span>
								</div>								
								<?php 
							}
						}
					?>
				</div>
				<div class="clearfix"></div>
				<div class="grand-total">
					<span>Base cost at minimum 10-19 products</span>
					<div class="basep-cont">
					<span class="doll-sym">$</span>
					<span class="base_price"><?php if(isset($prod_price) && is_numeric($prod_price) && $prod_price > 0){ echo sprintf('%0.2f', $prod_price); } else { echo '0'; } ?></span></div>
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
				<div class="step2-shirt-cont" id="step2-shirt-cont"></div>				
			</div>
			
		</div>
	</div>
	
	<div class="step-cont step_three hidden">
		<div class="pallet-cont">
			<input type="hidden" id="sales_goal" name="sales_goal" value=""/> 
			<input type="hidden" id="unit_price" name="unit_price" value=""/>
			<input type="hidden" id="unit_profit" name="unit_profit" value=""/>
			
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
					<input type="text" id="campaign-url" class="campaign-url campaign-text" name="campaign-url" value="<?php echo site_url().'/campaign/'; ?>"/> 
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
				<!-- <span class="step_forward" id="create-post">Launch your campaign</span> -->
				
				
			</div>
			
			<div class="step_two-wrap image-cont">
				
				
				<canvas id="myCanvas" width="530" height="1280"></canvas>
				<div class="ant-wrap" style="530px; width:530px; height:1280px; position:absolute; z-index:-5; background:#FFFFFF;"></div>
				<div class="step3-shirt-cont" id="step3-shirt-cont"></div>
				<div class="cleared"></div>
				
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