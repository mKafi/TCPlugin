<link rel="stylesheet" media="screen" type="text/css" href="<?php echo plugins_url('/../css/colorpicker.css',__FILE__); ?>" />
<script type="text/javascript" src=" <?php echo plugins_url('/../js/colorpicker.js',__FILE__); ?> "></script>

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
							<span class="color-icon" id="#FF0000" style="background-color:red;"></span>
							<span class="color-icon" id="#F6FF00" style="background-color:yellow;"></span>
							<span class="color-icon" id="#B5FF21" style="background-color:orange;"></span>
							<span class="color-icon" id="#3F00FF" style="background-color:blue;"></span>
							<span class="color-icon" id="#9E9E9E" style="background-color:gray;"></span>
						</div>
						
						
						
						<label>Text color</label>
						<div class="text-color-box" id="text-color"></div>
						<div class="color_pallete" id="color_pallete">
							<span class="text-color-icon" id="#FF0000" style="background-color:red;"></span>
							<span class="text-color-icon" id="#F6FF00" style="background-color:yellow;"></span>
							<span class="text-color-icon" id="#B5FF21" style="background-color:orange;"></span>
							<span class="text-color-icon" id="#3F00FF" style="background-color:blue;"></span>
							<span class="text-color-icon" id="#9E9E9E" style="background-color:gray;"></span>
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
							<ul>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Animals%2FFootprints%20%26%20Tracks%2FAnimal%20Print%2015.png" data-is-color="false" data-filename="Animals/Footprints &amp; Tracks/Animal Print 15.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Shapes%20%26%20Symbols%2FShapes%2FStar%205.png" data-is-color="false" data-filename="Shapes &amp; Symbols/Shapes/Star 5.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Animals%2FReptiles%2FGator.png" data-is-color="false" data-filename="Animals/Reptiles/Gator.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Careers%20%26%20Professions%2FConstruction%20%26%20Hardware%2FHammer%203.png" data-is-color="false" data-filename="Careers &amp; Professions/Construction &amp; Hardware/Hammer 3.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Shapes%20%26%20Symbols%2FSymbols%20%26%20Icons%2FTalking%20Bubble%202.png" data-is-color="false" data-filename="Shapes &amp; Symbols/Symbols &amp; Icons/Talking Bubble 2.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Music%2FMisc%2FCassette%20Tape.png" data-is-color="false" data-filename="Music/Misc/Cassette Tape.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Animals%2FFlying%2FHawk.png" data-is-color="false" data-filename="Animals/Flying/Hawk.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Events%2FBirthday%2FBirthday%20Cake%205.png" data-is-color="false" data-filename="Events/Birthday/Birthday Cake 5.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Shapes%20%26%20Symbols%2FStamps%2FStamp%2036.png" data-is-color="false" data-filename="Shapes &amp; Symbols/Stamps/Stamp 36.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Everyday%2FHome%2FBattery.png" data-is-color="false" data-filename="Everyday/Home/Battery.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Military%2FWeapons%2FRevolver%204.png" data-is-color="false" data-filename="Military/Weapons/Revolver 4.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Nature%2FBeach%2FSandbucket%20and%20Shovel.png" data-is-color="false" data-filename="Nature/Beach/Sandbucket and Shovel.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Shapes%20%26%20Symbols%2FArrows%2FBumpy%20Arrow%202.png" data-is-color="false" data-filename="Shapes &amp; Symbols/Arrows/Bumpy Arrow 2.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Nature%2FPlants%20%26%20Trees%2FTree%204.png" data-is-color="false" data-filename="Nature/Plants &amp; Trees/Tree 4.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Shapes%20%26%20Symbols%2FFlames%20%26%20Tribal%2FTribal%209.png" data-is-color="false" data-filename="Shapes &amp; Symbols/Flames &amp; Tribal/Tribal 9.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Food%20%26%20Drink%2FAlcohol%2FWine%204.png" data-is-color="false" data-filename="Food &amp; Drink/Alcohol/Wine 4.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Nature%2FFire%2FFlame%20Icon%203.png" data-is-color="false" data-filename="Nature/Fire/Flame Icon 3.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/People%2FSilhouettes%2FOld%20Man%20with%20Cane.png" data-is-color="false" data-filename="People/Silhouettes/Old Man with Cane.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Events%2FBBQ%2FBbq%20Man%202.png" data-is-color="false" data-filename="Events/BBQ/Bbq Man 2.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Holidays%2FChristmas%2FSanta%20and%20Reindeer%2010.png" data-is-color="false" data-filename="Holidays/Christmas/Santa and Reindeer 10.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Animals%2FPrimates%2FMonkey%203.png" data-is-color="false" data-filename="Animals/Primates/Monkey 3.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Holidays%2FChristmas%2FChristmas%20Tree%2010.png" data-is-color="false" data-filename="Holidays/Christmas/Christmas Tree 10.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Sports%20%26%20Games%2FSummer%20Sports%2FBaseball.png" data-is-color="false" data-filename="Sports &amp; Games/Summer Sports/Baseball.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Nature%2FWeather%2FClouds%202.png" data-is-color="false" data-filename="Nature/Weather/Clouds 2.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/People%2FFitness%2FMan%20Stretching.png" data-is-color="false" data-filename="People/Fitness/Man Stretching.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Holidays%2FChristmas%2FSanta%209.png" data-is-color="false" data-filename="Holidays/Christmas/Santa 9.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Sports%20%26%20Games%2FMisc%2FPing%20Pong%20Racquet.png" data-is-color="false" data-filename="Sports &amp; Games/Misc/Ping Pong Racquet.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Animals%2FCat%20Family%2FTiger%208.png" data-is-color="false" data-filename="Animals/Cat Family/Tiger 8.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/People%2FHeads%2FThinking%20Head%202.png" data-is-color="false" data-filename="People/Heads/Thinking Head 2.svg">
								  
								</div>
							  </li>
							  <li>
								
								<div class="result tcpring">
								  
								  <img src="http://d1b2zzpxewkr9z.cloudfront.net/vectors/Nature%2FBeach%2FBeach%20Resort.png" data-is-color="false" data-filename="Nature/Beach/Beach Resort.svg">
								  
								</div>
							  </li>
							</ul> 
						</div>
						
						<div class="clipart-used-cont">
							
						</div>
						
					</div>
				</div>
			</div>
			<!-- left controle ends -->


			<!-- middle image panel starts -->
			<div class="same-line tshirt">
				<div class="flip-container">
					<div class="tshirt_frame unflipped">
						
						<input type="hidden" name="selected_element" value="" id="selected_element" />
						<div class="tshirt back">
							<img id="back-image" src="<?php echo plugins_url('default_reversed.png',__FILE__); ?>" alt=""/>
							<div class="design-frame back-part">
								
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
				
				<span>Base cost $</span>
				<span class="base_price">0</span>
				
				<input type="button" name="for_step_two" id="for_step_two" value="Next step"/>
				
			</div>
			<!-- right controle ends -->
			
			
		</div>
	</div>
	
	<div class="step-cont step_two hidden">
		<div class="pallet-cont ">
			
			<div class="step_two-wrap tool-cont">
				<div class="shirt-counter">
					<label>Sales Goal</label>										
					
					<div id="goal-range"></div>
					<input type="text" id="goal-count" name="goal-count" value="10"/> Shirts<br/>
					<p>Your goal is the minimum number of shirts that need to be reserved before the shirts are printed!</p>
				</div>
				
				<div class="profit-counter">
					<label>Estimated profit</label>					
					<span id="estimated-profit" name="estimated-profit">0.00</span>
				</div>
				
				<div class="shirt-counter">
					<label>Set selling price</label>										
					<p>Set the selling price of your shirt to determine your profit and add additional products to sell your design on! </p>
				</div>
				
				
				
			</div>
			
			<div class="step_two-wrap image-cont">
				<div class="step2-shirt-cont"></div>
			</div>
			
		</div>
	</div>
	
	<div class="step-cont step_three hidden">
		<div class="pallet-cont">
			step three
			<div class="same_line"></div>
			<div class="same_line"></div>
			
		</div>
	</div>
</div>

<script type="text/javascript">
	jQuery.noConflict();
	
	jQuery(function(){
		
	});
</script>