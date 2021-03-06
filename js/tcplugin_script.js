jQuery.noConflict();
function set_dynamic_id(){
	var rt = 'k'+Math.random();
	return 'tctext'+rt.substring(3,6);	
}



image_name = '';
flag = false;
frate = 0;
	
(function($){
	$(function() {
		$(document).ready(function(){			
			/* field reset */
			$("#text_field").val('');
			$("#font-chooser option:first").attr('selected','selected');
			/* $("#font-size")[0].selectedIndex = 0; */
			$(".full_bg").height($(document).height());
			$(".full_bg").width($(document).width());
			$(".full_bg").click(function(){ 
				$(this).addClass('hidden'); 
				$(".clipart-cont").addClass('hidden'); 
				$(".not-logged").addClass('hidden'); 
			});
			
			function add_icon_price(){
				bpcost = parseFloat($("span.base_price").text(),10);
				bpcost += parseFloat(icon_price,10); 
				$("span.base_price").text(''+bpcost.toFixed(2));
			}
			
			function calculate_all_cost(){
				var clips = 0;
				var texts = 0;
				clips = (parseFloat($(".tshirt_frame").find(".used-clips").length,10) * parseFloat(icon_price,10));
				texts = (parseFloat($(".tshirt_frame").find(".txt-cont").length,10) * parseFloat(text_price,10));
				return (clips + texts);
			}
			
			function calculate_estimate_profit(){
				var sprice = parseFloat($('#sale-price').val(),10);
				var pcount = parseFloat($("#goal-count").val(),10);
				var bprice = parseFloat($(".base_price").text(),10);
				
				var sp = (sprice - bprice);
				$("#txt-sale-price").text(''+sp.toFixed(2));
				
				var tprofit = (sp * pcount);
				$("#estimated-profit").text(''+tprofit.toFixed(2));
				
			}
			
			$(document).on("click", ".flip_canvas", function(){
				$(".flip_canvas").toggleClass('hidden');
				$(".tshirt_frame").toggleClass("unflipped");
			});
			
			$(".header_tab").click(function(){
				if($(this).attr('id')=='step_1'){
					
					$(".step-cont").addClass('hidden');
					$(".step-cont.step_one").removeClass('hidden');
					
					$(".header_tab").removeClass('active');
					$(this).addClass('active');
					
					$(".same-line.tshirt").find('.txt_printable').css('display','block');
					$(".design-frame").css('border','1px solid gray');
					
					
				}
				else if($(this).attr('id')=='step_2'){
					if(flag){
						$(".step-cont").addClass('hidden');
						$(".step-cont.step_two").removeClass('hidden');
						
						$(".header_tab").removeClass('active');
						$(this).addClass('active');
					}
				}
				else if($(this).attr('id')=='step_3'){
					if(flag){
						$(".step-cont").addClass('hidden');
						$(".step-cont.step_three").removeClass('hidden');
						
						$(".header_tab").removeClass('active');
						$(this).addClass('active');
					}
				}
			});
			
			
			/*---------------------------------------------------------------------*/			
			jQuery( "#txt-back" ).draggable();		
			
			
			
			jQuery(document).on('mouseenter','.move',function(){			
				jQuery(this).parent().parent().draggable({ disabled:false });
			});
			
			jQuery(document).on('mouseout','.move',function(){			
				jQuery(this).parent().parent().draggable({ disabled:true });
			});
			
			jQuery(document).on('mouseenter','.icon-img-cont .used-clips',function(){			
				jQuery(this).parent().parent().draggable({ disabled:false });
			});
			
			jQuery(document).on('mouseout','.icon-img-cont .used-clips',function(){			
				jQuery(this).parent().parent().draggable({ disabled:true });
			});
			
			
			jQuery(document).on('mouseenter','.ttext-cont .txt-cont',function(){			
				jQuery(this).parent().parent().draggable({ disabled:false });
			});
			
			jQuery(document).on('mouseout','.ttext-cont .txt-cont',function(){			
				jQuery(this).parent().parent().draggable({ disabled:true });
			});
			
			
			
			/* 
			jQuery(document).on('mousedown','.text-wrap.txt-box',function(){							
				jQuery(".text-wrap.txt-box").draggable({ disabled: false });			
				$(this).draggable({ disabled: false });
			});
			
			jQuery(document).on('mouseup','.text-wrap.txt-box',function(){							
				jQuery(".text-wrap.txt-box").draggable( { disabled:true });
				$(this).draggable({ disabled:false });				
			});
			 */
			
			
			$("#goal-range").slider({
				range: "min",
				value: 10,
				min: 1,
				max: 400,
				slide: function( event, ui ) {
				$( "#goal-count" ).val( ui.value );
				}
			});
			$( "#goal-count" ).val( $( "#goal-range" ).slider( "value" ) );
			
			$( "#goal-range" ).on( "slidestop", function( event, ui ) {				
				calculate_estimate_profit();				
			} );
			
			$( "#goal-range" ).slider({
				slide: function( event, ui ) {
					$("#goal-count").val(ui.value);
					calculate_estimate_profit(ui.value);
				}
			});
			
			
		
			/*---------------------------------------------------------------------*/
			
			
			
			
			if($("#tshirt_variant").length>0){
				$("#tshirt_variant").change(function(){
					var cat = $(this).val();
					if($(".variant_loader").hasClass('hidden')){
						$(".variant_loader").removeClass('hidden');
					}
					$.post(ajaxurl,{'action':'getproduct','cat':cat},function(resp){						
						if(resp){
							var res = $.parseJSON(resp);							
							var htm = '';
							$.each(res,function(index,val){							
								
								var img = new Array();
								$.each(val.gallery,function(i,v){									
									img[i]=v;
								}); 
								
								htm += '<div class="prod-wrap" id="prodid_'+val.prod_id+'"><input type="hidden" class="prod-wrap-back-img" value="'+img[1]+'"/><input type="hidden" class="prod-wrap-front-img" value="'+img[2]+'"/><img class="tshirt-main-image" src="'+val.url+'" alt=""/><span class="ptitle">'+val.title+'</span></div>'; 						
							});
							
							if(htm !=''){
								$(".variant_loader").addClass('hidden');
								$("#tshirt_variant_cont").html(htm);
							}
						}
						else{
							$("#tshirt_variant_cont").html('<div class="no-tshirt"> No t-shirt available </div>');
						}
					});
				});
			}
			
			
			
			$(document).on('click','.tshirt-main-image',function(){
				flag = true;
				if($(".tshirt-loader").hasClass('hidden')){
					$(".tshirt-loader").removeClass('hidden');
				}
				var x = $(this).parent().attr('id');
				var a = x.split("_");
				
				
				var frnt_img_url = $(this).parent().children('.prod-wrap-front-img').val();
				var back_img_url = $(this).parent().children('.prod-wrap-back-img').val();
				
				$("#back-image").attr('src',back_img_url);
				$("#front-image").attr('src',frnt_img_url);
				
				
				$.post(ajaxurl,{'action':'getproductinfo','pid':a[1]},function(resp){
					var info = $.parseJSON(resp);
					var bprice = calculate_all_cost();
					
					bprice += parseFloat(info.sale,10);
					
					$(".design-frame").height(info.height+'px');
					$(".design-frame").width(info.width+'px');
					
					$(".base_price").text(bprice.toFixed(2));
					$(".tshirt-loader").addClass('hidden');
				});	
				
				
				
			});	

			var ccolor;
			ccolor = $(".tshirt.back").css('background-color'); 
			$(".color-icon").hover(function(){
				var hcolor = $(this).attr('id');
				$(".tshirt.back").css('background',hcolor);
				$(".tshirt.front").css('background',hcolor);
				
				$(".tshirt.front").css({'-moz-transition':'all 1s ease-in','-webkit-transition':'all 1s ease-in','-o-transition':'all 1s ease-in','transition':'all 1s ease-in'});
				
			},
			function(){			
				$(".tshirt.back").css('background',ccolor);
				$(".tshirt.front").css('background',ccolor);
			});
			
			$(".color-icon").click(function(){
				var color = $(this).attr('id');
				$(".tshirt.back").css('background',color);
				$(".tshirt.front").css('background',color);
				ccolor = color;
				
				/* off for both side color at same time with same color */
				/*
				if($('.tshirt_frame').hasClass('unflipped')){
					$(".tshirt.back").css('background',color);
				}
				else{
					$(".tshirt.front").css('background',color);
				}
				*/
			});	
			
			$(".text-color-icon").click(function(){
				var color = $(this).attr('id');				
				if($("#"+$("#selected_element").val()).length > 0){
					$("#"+$("#selected_element").val()).css('color',color);
				}
			});	
			
			
			
			
			
			$("#selected_element").val('');
			
			elem_id = set_dynamic_id(); 			
			
			$("#text_field").keyup(function(e){				
				var txt = '';
				var bpcost = 0;
				if(e.keyCode !=13){
					txt = $(this).val();
					
					if($('.tshirt_frame').hasClass('unflipped')){
						if($("#selected_element").val().length == 0){
							$(".back-part").append('<div class="text-wrap txt-box"><div class="ttext-cont"> <span class="move hidden">M</span> <span class="remove hidden">R</span>  <span class="rotate hidden">R</span> <span class="streatch hidden">S</span> <span class="txt-cont choosed" id="'+elem_id+'">'+txt+'</span>  </div></div>');
							$("#selected_element").val(elem_id);
							/* $("#selected_element").parents('.ttext-cont').css('width','auto'); */
							
							bpcost = parseFloat($("span.base_price").text(),10);
							bpcost += parseFloat(text_price); 
							$("span.base_price").text(''+bpcost.toFixed(2));
							
						}
						else if($("#selected_element").val().length > 0){
							/* $("#selected_element").parents('.ttext-cont').css('width','auto'); */
							$("#"+$("#selected_element").val()).text(txt);
						}
					}
					else{
						if($("#selected_element").val().length == 0){
							$(".front-part").append('<div class="text-wrap txt-box"><div class="ttext-cont"> <span class="move hidden">M</span> <span class="remove hidden">R</span> <span class="rotate hidden">R</span> <span class="streatch hidden">S</span> <span class="txt-cont choosed" id="'+elem_id+'">'+txt+'</span> </div> </div>');
							$("#selected_element").val(elem_id);
							
							bpcost = parseFloat($("span.base_price").text(),10);
							bpcost += parseFloat(text_price); 
							$("span.base_price").text(''+bpcost.toFixed(2));
							
						}
						else if($("#selected_element").val().length > 0){							
							$("#"+$("#selected_element").val()).text(txt);							
						}
					}
					
				}
			});
			
			$("body").click(function(e){
				if(e.target.className !== "txt-cont"){
					elem_id = set_dynamic_id();
				}
			});	
			
			
			$(".design-frame").click(function(){
				$(".txt-cont").removeClass('choosed');
				$("#selected_element").val('');
				$("#text_field").val('');
				$("#font-chooser option:first").attr('selected','selected');
				/* $("#font-size")[0].selectedIndex = 0; */
			});
			
			$(document).on('click','.txt-cont',function(){  
				var id = $(this).attr('id');
				var ctext = $(this).text();
				$("#selected_element").val(id);
				$(this).addClass('choosed');
				$("#text_field").val(ctext);
				
				
			});
			
			
			
			$("#font-chooser").change(function(){
				var fontf = $(this).val();							
				$('#'+$("#selected_element").val()).css({'font-family':fontf});
			});
			
			/* 
			$("#font-size").change(function(){
				var fonts = $(this).val();
				$('#'+$("#selected_element").val()).css({'font-size':fonts+'px'});
			});
			 */
			
			$("#search_art").click(function(){
				
					$(".full_bg").removeClass('hidden');
					$(".clipart-cont").toggleClass('hidden');
					
			});
			
			
			
			$(".result.tcpring img").click(function(){
				var src = $(this).attr('src');				
				if($('.tshirt_frame').hasClass('unflipped')){
					
					var appclip = '<div class="clip-cont">';
					appclip += '<div class="icon-img-cont"><span class="move hidden">M</span> <span class="rotate hidden">R</span> <span class="remove hidden">R</span><span class="streatch hidden">S</span>';
					appclip += '<img src="'+src+'" alt="" class="used-clips" id="" /></div> </div>';
					
					
					
					$(".design-frame.back-part").append(appclip);
					$(".full_bg").addClass('hidden');
					add_icon_price();					
				}
				else{
					/* var appclip = '<div class="clip-cont">';
					appclip += '<div class="icon-img-cont"><img src="'+baseurl+'/TCPlugin/images/rotate.png" class="rotate hidden"> <img src="'+baseurl+'/TCPlugin/images/close1.png" class="remove hidden"><img src="'+baseurl+'/TCPlugin/images/streatch.png" class="streatch hidden">';
					appclip += '<img src="'+src+'" alt="" class="used-clips" id="" /></div> </div>'; */
					
					var appclip = '<div class="clip-cont">';
					appclip += '<div class="icon-img-cont"><span class="move hidden">M</span> <span class="rotate hidden">R</span> <span class="remove hidden">R</span><span class="streatch hidden">S</span>';
					appclip += '<img src="'+src+'" alt="" class="used-clips" id="" /></div> </div>';
					
					$(".design-frame.front-part").append(appclip);
					$(".full_bg").addClass('hidden');
					add_icon_price();					
				}
				
				/* 
				var htm = '<img src="'+src+'" alt="" class="used-clips" id="" />';
				$(".clipart-used-cont").html(htm); 
				*/
				$("#clipart-cont").addClass('hidden');
			});
			
			
			/* rotate and streatch actions starts */
			
			drag = false;
			rotate = false;
			var current_elem;
			var start_x, start_y, stop_x, stop_y;
			var cur_x, cur_y;
			var inc_x, inc_y;
			var curr_width, curr_height;
			var center_x, center_y;
			var rot_key;
			$(document).mouseup(function(){  
				
				drag = false;
				rotate = false;
			});
			
			
			$(document).on('mousedown','.streatch',function(e){
				drag = true;					
				current_elem = $(this).parent();
				start_x = parseFloat(e.pageX);
				start_y = parseFloat(e.pageY);
				
				var foo_width = parseFloat(current_elem.children(".txt-cont").width(),10);
				var getcss = current_elem.children(".txt-cont").css('font-size');
				if(getcss){
					var a = getcss.split('px');			
					var ffont = parseFloat(a[0],10);
					frate = (ffont/foo_width);
				}
				curr_width = parseFloat(current_elem.width());
				curr_height = parseFloat(current_elem.height());
				
				$(this).parent().children('span').removeClass('hidden');
				
				
				
			});
			
			$(document).on('mouseup','.streatch',function(){
				drag = false;	

				$(this).parent().children('span.move,span.remove,span.rotate,span.streatch').addClass('hidden');
				
			});
			
			$(document).on('mousedown','.rotate', function(){				
				rotate = true;
				current_elem = $(this).parent();
				rot_key = $(this).parent().children('.used-clips');
				
				var offset = current_elem.offset();
				center_x = (offset.left) + (current_elem.width() / 2);
				center_y = (offset.top) + (current_elem.height() / 2);
				
				jQuery(this).parent().find('span').removeClass('hidden');
				
			});
			
			$(document).on('mouseup','.rotate', function(){				
				rotate = false;	
				drag = false;				
				jQuery(this).parent().find('.streatch, .move, .remove, .rotate').addClass('hidden');				
			});
			
			$(document).on('mouseup', '.tshirt_frame',function(){
				jQuery(this).parent().find('.streatch, .move, .remove, .rotate').addClass('hidden');	
				jQuery(this).find('.ttext-cont .txt-cont, .icon-img-cont img').css('border','0');
				jQuery(this).find('.ttext-cont').css('width','inherit');
			});
			
			$(document).mousemove( function(e){
				if(drag){						
					cur_x = parseFloat(e.pageX,10);
					cur_y = parseFloat(e.pageY,10);						
					inc_x = (cur_x - start_x);
					inc_y = (cur_y - start_y);
					
					current_elem.css({'width': curr_width + inc_x+'px', 'height': curr_height + parseInt(inc_x * (curr_height/curr_width)) + 'px' });
					current_elem.children(".used-clips").css({'border':'1px dashed #000000','padding':'0'});
					current_elem.find('span').removeClass('hidden');
					
					if(current_elem.children(".txt-cont").length > 0){
						var foo_width = parseFloat(current_elem.children(".txt-cont").width(),10);
						var fsize = parseInt(foo_width * frate);
						current_elem.children(".txt-cont").css({'font-size': fsize+'px','border':'1px dashed #000000'}); 	
					}
					
				}
				
				if(rotate){						
					
					var degree;
					var mouse_x = e.pageX;
					var mouse_y = e.pageY;
					
					var radians = Math.atan2(mouse_x - center_x, mouse_y - center_y);							
					degree = (radians * (180 / Math.PI) * -1) + 135;
					
					current_elem.css('-moz-transform', 'rotate(' + degree + 'deg)');
					
					current_elem.css('-webkit-transform', 'rotate(' + degree + 'deg)');
					
					current_elem.css('-o-transform', 'rotate(' + degree + 'deg)');
					
					current_elem.css('-ms-transform', 'rotate(' + degree + 'deg)');
					
					current_elem.css('transform', 'rotate(' + degree + 'deg)');
					
					
					
					
					
					current_elem.find('span').removeClass('hidden');
					if(current_elem.children(".txt-cont").length > 0){
						current_elem.children(".txt-cont").css({'font-size': fsize+'px','border':'1px dashed #000000','padding':'0'}); 
					}
					else{
						current_elem.children(".used-clips").css({'border':'1px dashed #000000','padding':'0'});
					}
					
				}
				
			});
			
			/* rotate and streatch actions ends */
			
			
			
			$(document).on('mouseenter','.icon-img-cont',function(){
				$(this).find('.remove').removeClass('hidden');
				$(this).find('.rotate').removeClass('hidden');
				$(this).find('.streatch').removeClass('hidden');
				$(this).find('.move').removeClass('hidden');
				
				
				
			});
			$(document).on('mouseleave','.icon-img-cont',function(){
				
					$(this).find('.remove').addClass('hidden');
					$(this).find('.rotate').addClass('hidden');
					$(this).find('.streatch').addClass('hidden');
					$(this).find('.move').addClass('hidden');
				
			});
			
			
			
			$(document).on("click",".icon-img-cont .remove",function(){
				var bpcost = 0;
				$(this).parent().parent().remove();
				
				bpcost = parseFloat($("span.base_price").text(),10);
				
				fff = parseFloat(icon_price,10);
				bpcost = ( bpcost - fff );
				
				$("span.base_price").text(''+bpcost.toFixed(2));
			});
			
			
			$(document).on("click",".text-wrap .remove",function(){
				var bpcost = 0;
				$(this).parent().remove();
				
				bpcost = parseFloat($("span.base_price").text(),10);
				bpcost -= parseFloat(text_price); 
				$("span.base_price").text(''+bpcost.toFixed(2));
			});
			
			
			
			
			
			
			/* go for next step start */
			function rotationDegrees(matrix){
				var matrix = elem.css("-webkit-transform") ||
				this.css("-moz-transform")    ||
				this.css("-ms-transform")     ||
				this.css("-o-transform")      ||
				this.css("transform");
				if(typeof matrix === 'string' && matrix !== 'none') {
				var values = matrix.split('(')[1].split(')')[0].split(',');
				var a = values[0];
				var b = values[1];
				var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
				} else { var angle = 0; }
				return angle;
			};
			
			
			$("#for_step_two").click(function(){
				/* if(flag==false){
					alert('Pleaes select a T-Shirt and design yourself and click next');	
					return false;
				}
				else{ */
					if($(".tshirt-loader").hasClass('hidden')){
						$(".tshirt-loader").removeClass('hidden');
					}
					
					$(".same-line.tshirt").find('.txt_printable').css('display','none');
					$(".design-frame").css('border','none');
					
					$(".same-line.tshirt").find('.txt_printable').remove();
					$(".design-frame").css('border','none');
					
					var shirt_htm = $(".same-line.tshirt").html();						
					
					$(".step2-shirt-cont").html(shirt_htm);
					$(".step2-shirt-cont .flip-container").append('<div class="fullwrapper"></div>');
					
					$(".step-cont").addClass('hidden');
					$(".step-cont.step_two").removeClass('hidden');
					
					calculate_estimate_profit();
					
					$(".header_tab").removeClass('active');
					$("#step_2").addClass('active');
					$(".tshirt-loader").addClass('hidden');
				/* } */
				
				
			});
			
			$("#step_2").click(function(){
				if(flag==false){
					alert('Pleaes select a T-Shirt and design yourself and click next');	
					return false;
				}
				else{
				
					$(".same-line.tshirt").find('.txt_printable').remove();
					$(".design-frame").css('border','none');
					var shirt_htm = $(".same-line.tshirt").html();						
					
					$(".step2-shirt-cont").html(shirt_htm);
					$(".step2-shirt-cont .flip-container").append('<div class="fullwrapper"></div>');
					
					$(".step-cont").addClass('hidden');
					$(".step-cont.step_two").removeClass('hidden');
					
					calculate_estimate_profit();
				}
				
			});
			
			
			$("#step_3").click(function(){
				if(flag==false){
					alert('Pleaes select a T-Shirt and design yourself and click next');	
					return false;
				}
			});
			
			
			$("#for_step_three").click(function(){
				
				var sg = $("#goal-count").val();
				var up = $("#sale-price").val();
				var upf = parseFloat($("#txt-sale-price").text(),10);
				
				$("#sales_goal").val(sg);
				$("#unit_price").val(up);
				$("#unit_profit").val(upf);
				
				
				$(".same-line.tshirt").find('.txt_printable').remove();
				
				var shirt_htm = $("#tshirt_frame_wrap").html();
				$(".step3-shirt-cont").html(shirt_htm);
				
				$(".step3-shirt-cont").append('<div class="fullwrapper"></div>');  
				
				$(".step-cont").addClass('hidden');
				$(".step-cont.step_three").removeClass('hidden');
				
				$(".header_tab").removeClass('active');
				$("#step_3").addClass('active');
				
				
			});
			
			/* go for next step ends */
			
			
			$(document).on("mouseenter",".text-wrap.txt-box", function(){			
				
					$(this).find('.remove').removeClass('hidden');
					$(this).find('.rotate').removeClass('hidden');
					$(this).find('.move').removeClass('hidden');
					$(this).find('.streatch').removeClass('hidden');
					
					$(this).find('.txt-cont').css({'border':'1px dashed #000000','padding':'0'});
				
				
			});
			
			$(document).on("mouseleave",".text-wrap.txt-box", function(){			
				
					$(this).find('.remove').addClass('hidden');
					$(this).find('.rotate').addClass('hidden');
					$(this).find('.move').addClass('hidden');
					$(this).find('.streatch').addClass('hidden');
					
					$(this).find('.txt-cont').css({'border':'0','padding':'1px'});
				
			});
			
			/* 
			$(".remove .rotate .move .streatch").hover(function(){
				if($(this).parent().children('.txt-cont').length > 0){
					$(this).parent().children('.txt-cont').css({'border':'1px dashed #000000','padding':'0'});
				}
			}, function(){
				if($(this).parent().children('.txt-cont').length > 0){
					$(this).parent().children('.txt-cont').css({'border':'none','padding':'1px'});
				}
			});
			 */
			 
			 
			$("#sale-price").keyup(function(){			
				calculate_estimate_profit();
			});	
			
			$("#goal-count").keyup(function(){
				calculate_estimate_profit();			
			});
			
		});	
		
		$("#campaign-shippingopt").click(function(){
			if($(this).is(':checked')){
				$("#shipping-address").removeClass('hidden');
			}
			else{
				$("#shipping-address").addClass('hidden');
			}			
		});
		
		
		
		function getRotationDegrees(obj) {
			
			
			var matrix = obj.css("-webkit-transform") ||
			obj.css("-moz-transform")    ||
			obj.css("-ms-transform")     ||
			obj.css("-o-transform")      ||
			obj.css("transform");
			
			if(matrix !== 'none') {
				var values = matrix.split('(')[1].split(')')[0].split(',');
				var a = values[0];
				var b = values[1];
				var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
			} else { var angle = 0; }
			/* return (angle < 0) ? angle +=360 : angle; */
			
			return angle;
		}
		
		function process_design(){
			var camp_name = $("#campaign-name").val();
			var camp_desc = $("#campaign-desc").val();
			var camp_tags = $("#campaign-tags").val();
			
			var camp_length = $("#campaign-length").val();
			var camp_url = $("#campaign-url").val();
			var img_data = '';
			var pickup = '';
			var tos = '';
			
			var sales_goal = $("#sales_goal").val();
			var unit_price = $("#unit_price").val();
			var unit_profit = $("#unit_profit").val();
			var total_profit = parseFloat((sales_goal * unit_profit),10);
			
			var shipping_first_name = $("#shipping-first-name").val();
			var shipping_last_name = $("#shipping-last-name").val();
			var shipping_first_address = $("#shipping-first-address").val();
			var shipping_second_address = $("#shipping-second-address").val();
			var shipping_city = $("#shipping-city").val();
			var shipping_state = $("#shipping-state").val();
			var shipping_zip = $("#shipping-zip").val();
			
			if($("#campaign-shippingopt").is(':checked')){
				pickup = 1;				
			}
			else{
				pickup = 0;				
			}
			
			
			if($("#campaign-agreement").is(':checked')){
				tos = 1;
			}
			else{
				tos = 0;
			}
			
			
			
			/* saving full image */
		
			var finish_it = new Array();
			var canvas = document.getElementById('myCanvas');		
			var context = canvas.getContext('2d');
			
			var parent_wrapper = $("#step3-shirt-cont");
			
			var bgcolor = $("div#backpartonly").css('background-color');
			if(bgcolor == 'transparent' || bgcolor == '#ffffff'){
				bgcolor = 'rgb(255, 255, 255)';
			}
			var parent_offset = jQuery("#step3-shirt-cont").offset();
			
			context.fillStyle = bgcolor; 	
			context.fillRect(0, 0, 530, 630);
			
			function finist_process_tree(){
				finish_it['k'] = 'lksdfjs';
			}
			
			function process_back_icons(){
				var bilen = $("#step3-shirt-cont #backpartonly .icon-img-cont").length;
				$.each($("#step3-shirt-cont #backpartonly .icon-img-cont"),function(k,bimg){	
					var imageObj2 = new Image();
					
					var fimg_offset = $(bimg).parent().offset();
					var fimg_height = $(bimg).parent().height();
					var fimg_width = $(bimg).parent().width();
					
					
					var imgpos_x = (fimg_offset.left - parent_offset.left);
					var imgpos_y = (fimg_offset.top - parent_offset.top);
					imageObj2.onload = function() {			
						context.save();
						context.translate(parseInt(imgpos_x), parseInt(imgpos_y));
						context.translate( (fimg_width/2), (fimg_height/2));
						var angle = parseInt(getRotationDegrees($(bimg)));
						if(angle != 0 || angle > 0){
							context.rotate(parseInt(angle) * (Math.PI/180));
						}							
						context.drawImage(imageObj2, -(fimg_width/2), -(fimg_height/2) , fimg_width , fimg_height); 
						context.restore();
					};			
					imageObj2.src = $(bimg).children('img').attr('src'); 
					
					if(bilen == k+1){
						finish_it['back_icon'] = true;
						finist_process_tree();
					}
				});
				
			}
			
			function process_back_texts(){
				var btlen = $("#step3-shirt-cont #backpartonly .ttext-cont").length;					
				$.each($("#step3-shirt-cont #backpartonly .ttext-cont"),function(kt,vv){	
			
					var par_spn_offset = $(vv).parent().offset();							
					var spn_height = $(vv).parent().height();
					var spn_width = $(vv).parent().width();
					
					var first_tsl_x = (par_spn_offset.left - parent_offset.left);
					var first_tsl_y = (par_spn_offset.top - parent_offset.top);
					
					context.save();						
					var angle = parseInt(getRotationDegrees($(vv)));
					
					var fsize = parseInt($(vv).children('.txt-cont').css('font-size'));
					
					context.font = $(vv).children('.txt-cont').css('font-size') +" "+$(vv).children('.txt-cont').css('font-family');
					context.fillStyle = $(vv).children('.txt-cont').css('color');
					
					if(angle != 0 || angle > 0){
						context.translate(parseInt(first_tsl_x), parseInt(first_tsl_y));						
						context.translate( (spn_width/2), (spn_height/2));
						  
						context.rotate(parseInt(angle) * (Math.PI/180));
						context.fillText($(vv).children('.txt-cont').text(), -(spn_width/2), -(spn_height/2) + fsize);
					}
					else{
						context.fillText($(vv).children('.txt-cont').text(),parseInt(first_tsl_x), parseInt(first_tsl_y) + fsize);
					}
					context.restore();	

					if(btlen == kt+1){
						finish_it['back_text'] = true;
						finist_process_tree();
					}
				});
			
			}
			
			
			
			var imageObj = new Image();
			imageObj.onload = function() {
				context.drawImage(imageObj, 0, 0, 530, 630);						
				
				var bp_icon_length = $("#step3-shirt-cont #backpartonly .icon-img-cont").length;
				var bp_text_length = $("#step3-shirt-cont #backpartonly .ttext-cont").length;		
				
				if(bp_icon_length > 0){
					process_back_icons();
				}

				if(bp_text_length > 0){
					process_back_texts();
				}

				
			}				
			imageObj.src = $("img#back-image").attr('src'); 
			
			
			
			
			
			
			
			
			
			
			
			bgcolor = $("div#frontpartonly").css('background-color');
			if(bgcolor == 'transparent' || bgcolor == '#ffffff'){
				bgcolor = 'rgb(255,255,255)';					
			}
			
			function process_front_icons(){
				var filen = $("#step3-shirt-cont #frontpartonly .icon-img-cont").length;	
				$.each($("#step3-shirt-cont #frontpartonly .icon-img-cont"),function(k2,fimg){	
					var imageObj2f = new Image();
					
					var fimg_offset = $(fimg).parent().offset();
					var fimg_height = $(fimg).parent().height();
					var fimg_width = $(fimg).parent().width();
					
					
					var imgpos_x = (fimg_offset.left - parent_offset.left);
					var imgpos_y = (fimg_offset.top - parent_offset.top);
					imageObj2f.onload = function() {			
						context.save();
						context.translate(parseInt(imgpos_x), parseInt(imgpos_y));
						context.translate( (fimg_width/2), (fimg_height/2));
						var angle = parseInt(getRotationDegrees($(fimg)));
						if(angle != 0 || angle > 0){
							context.rotate(parseInt(angle) * (Math.PI/180));
						}							
						context.drawImage(imageObj2f, -(fimg_width/2), -(fimg_height/2) , fimg_width , fimg_height); 
						context.restore();
					};			
					imageObj2f.src = $(fimg).children('img').attr('src'); 
					if(filen == k2+1){
						finish_it['front_icon'] = true;
						finist_process_tree();
					}
				});
			}
			
			function process_front_texts(){					
				var ftlen = $("#step3-shirt-cont #frontpartonly .ttext-cont").length;
				$.each($("#step3-shirt-cont #frontpartonly .ttext-cont"),function(kft,vv){ 
					var fimg_offset = $(vv).parent().offset();							
					var fimg_height = $(vv).parent().height();
					var fimg_width = $(vv).parent().width();
					
					var cent_x = (fimg_width/2);
					var cent_y = (fimg_height/2);
					
					var imgpos_x = (fimg_offset.left - parent_offset.left);
					var imgpos_y = (fimg_offset.top - parent_offset.top);
					
					context.save();
					
					var angle = parseInt(getRotationDegrees($(vv)));
					
					var ffsize = parseInt($(vv).children('.txt-cont').css('font-size'));
					
					context.font = $(vv).children('.txt-cont').css('font-size') + " "+$(vv).children('.txt-cont').css('font-family');
					context.fillStyle = $(vv).children('.txt-cont').css('color'); 
					
					if(angle != 0 || angle > 0){
						context.translate(parseInt(imgpos_x), parseInt(imgpos_y));						
						context.translate( parseInt(fimg_width/2), parseInt(fimg_height/2));
						context.rotate(parseInt(angle) * (Math.PI/180));
						context.fillText($(vv).children('.txt-cont').text(), (fimg_width/-2), (fimg_height/-2) + ffsize);  
						
					}
					else{
						context.fillText($(vv).children('.txt-cont').text(),parseInt(imgpos_x), parseInt(imgpos_y) + ffsize);
					}
					
					context.restore();
					
					if(ftlen == kft+1){
						finish_it['front_text'] = true;
						finist_process_tree();
					}
				});
			}
				
			
			
			var imageObjb = new Image();
			imageObjb.onload = function() {	
				context.fillRect(0,631, 530, 630);	
				context.fillStyle = bgcolor; 					
				context.drawImage(imageObjb, 0, 632, 530, 630);
				
				var fp_icon_length = $("#step3-shirt-cont #frontpartonly .icon-img-cont").length;
				var fp_text_length = $("#step3-shirt-cont #frontpartonly .ttext-cont").length;
				
				if(fp_icon_length > 0){						
					process_front_icons();
				}

				if(fp_text_length > 0){
					process_front_texts();	
				}
				
			}				
			imageObjb.src = $("img#front-image").attr('src'); 
			
			
			
			
			setTimeout(function(){
					
				var canvas = document.getElementById('myCanvas');
				var data = canvas.toDataURL('image/png',1.0);				
				$.post(ajaxurl,{ 'action':'save_img','data':data }, function(resp2){
					var obj2 = $.parseJSON(resp2);							
					if(obj2.action == 'done'){							
						var full_image_name = obj2.img;							
						
						var sales_goal = $("#sales_goal").val();
						
						$.post(ajaxurl, {'action':'create_camp','camp_name':camp_name,'camp_desc':camp_desc,'camp_tags':camp_tags,'camp_length':camp_length,'camp_url':camp_url,'pickup':pickup,'tos':tos,'shipping_first_name':shipping_first_name,'shipping_last_name':shipping_last_name,'shipping_first_address':shipping_first_address,'shipping_second_address':shipping_second_address,'shipping_city':shipping_city,'shipping_state':shipping_state,'shipping_zip':shipping_zip,'image_name':full_image_name,'full_image_name':full_image_name, 'unit_price':unit_price, 'unit_profit':unit_profit,'sales_goal':sales_goal, 'total_profit':total_profit }, function(plink){
							$(".tshirt-loader").addClass('hidden');								
							if(plink){																		
								window.location = plink; 									
							}
						});
					}
					else{
						alert('Please clear browser cache and try again. Image not saved.');
					}
				});
			
			},2000);
			
		}
		
		
		
		
		$("#launch-campaign").click(function(){
			flg = '';
			var camp_name = $("#campaign-name").val();
			if(camp_name=='' || camp_name == null){
				flg += '\r\nYou should must enter a campaign name';
			}
			
			var camp_desc = $("#campaign-desc").val();
			if(camp_desc=='' || camp_desc == null){
				flg += '\r\nProvide a campaign description';
			}
			
			var camp_tags = $("#campaign-tags").val();
			if(camp_tags=='' || camp_tags == null){
				flg += '\r\nEnter campaign Tag';
			}
			
			if(!$('#campaign-agreement').is(':checked')){
				flg += '\r\nYou must accept the terms and agreement';
			}
			
			if(flg){
				alert(flg);
				return false;
			}
			else{
				var xxx = $("#logged_userid").val();	
				if(xxx==0 || xxx==null || xxx == ''){				
					$(".full_bg").removeClass('hidden');
					$(".not-logged.msg_not_logged").removeClass('hidden');	
					
				}
				else{
					if($(".tshirt-loader").hasClass('hidden')){
						$(".tshirt-loader").removeClass('hidden');						
						$("div.full_bg").removeClass('hidden');
						var bgh = $(document).height();
						$("div.full_bg").css('height', bgh+'px');
					}
				
					process_design();
					
					
				}
				
				
			}
			
			
		});
		
		/* user login and save image */
		if($(".not-logged #login-btn").length > 0){
			$(".not-logged #login-btn").click(function(){
				var usr_email = $("#login-email").val();
				var usr_pass = $("#login-password").val();
				
				$.post(ajaxurl, {'action':'ajloging','usr_email':usr_email,'usr_pass':usr_pass }, function(resp){
					if(resp){																		
						if(resp != 'error' && parseInt(resp) > 0){
							process_design();
						}
					}
				});
				
			});
		}

		/* user register and save image */
		if($(".not-logged #register-btn").length > 0){
			$(".not-logged #register-btn").click(function(){
				var usr_email = $("#register-email").val();
				var usr_pass = $("#register-password").val();			
				var usr_repass = $("#register-repassword").val();
				if(usr_repass == usr_pass){
					$.post(ajaxurl, {'action':'ajregister','usr_email':usr_email,'usr_pass':usr_pass }, function(resp){
						if(resp){																		
							if(resp != 'error' && parseInt(resp) > 0){
								process_design();
							}
						}
					});
				}
				else{
					alert('Password does not matched');
				}
			});
		}

		
		$(".backit").click(function(){
			$(".level1").removeClass('hidden');
			$(".level2").addClass('hidden');
			$(this).addClass('hidden');
		});
		
		$(".parent.level1").click(function(){
			var child_cont = $(this).attr('id');
			$(".level2").addClass('hidden');
			$(".level1").addClass('hidden');
			$(".level2."+child_cont).removeClass('hidden');
			
			$(".backit").removeClass('hidden');
		});
		
		$(".closeit").click(function(){			
			$(this).parent().addClass('hidden');
			$(".full_bg").addClass('hidden');
			
		});
		
		$("#preview").click(function(){
			var back_source = $(".tshirt.back").html();
			var front_source = $(".tshirt.front").html();
			$(".preview-cont").removeClass('hidden');
			$(".full_bg").removeClass('hidden');
			$(".preview-cont").append('<div class="same_line">'+back_source+'</div>');
			$(".preview-cont").append('<div class="same_line">'+front_source+'</div>');
		});
		
		
		/* upload image from own pc starts */		
		
		$('#upload_own').die('click').live('change', function(){ 
			var tgcont;
			if($(".tshirt_frame").hasClass('unflipped')){
				tgcont = 'back-part';
			}
			else{
				tgcont = 'front-part';
			}
			
			
			
			$( '#imageform' ).ajaxForm({
				beforeSend: function() {
					$("div#imageloadstatus").css('display','block');
				},
				uploadProgress: function(event, position, total, percentComplete) {
					
					$("div.shadoe-mask").css('width', percentComplete+'%');
				},
				success: function(sf) {
					$("div#imageloadstatus").css('display','none');
				},
				complete: function(xhr) {					
					
					var appclip = '<div class="clip-cont">';
					appclip += '<div class="icon-img-cont"><span class="move hidden">M</span> <span class="rotate hidden">R</span> <span class="remove hidden">R</span><span class="streatch hidden">S</span>';
					appclip += '<img src="'+xhr.responseText+'" alt="" class="used-clips" id="" /></div> </div>';
					
					$("div#imageloadstatus").css('display','none');
					
					$("."+tgcont).append(appclip);
				}
			}).submit(); 
		});
		
		
		$("#campaign-name").keyup(function(){
			var tmp = $(this).val();			
			$("#campaign-url").val( site_url+'/campaign/'+tmp);
		});
		
		$(".more-color").click(function(){
			$(".additional-colors").toggleClass('hidden');
		});
		
		/* login popup manage starts*/
		if($(".lnk-register").length > 0){
			$(".lnk-register").click(function(){
				$(".not-logged").addClass('hidden');
				$(".not-logged.register-tcircle").removeClass('hidden');
			});
		}
		
		if($(".login-with.tcircle").length > 0){
			$(".login-with.tcircle").click(function(){
				$(".not-logged").addClass('hidden');
				$(".not-logged.login-tcircle").removeClass('hidden');
			});
		}
		
		if($(".exist-account").length > 0){
			$(".exist-account").click(function(){
				$(".not-logged").addClass('hidden');
				$(".not-logged.login-tcircle").removeClass('hidden');
			});
		}
		
		if($(".social-login").length > 0){
			$(".social-login").click(function(){
				$(".not-logged").addClass('hidden');
				$(".not-logged.msg_not_logged").removeClass('hidden');
			});
		}
		
		if($(".not-logged .close").length > 0){
			$(".not-logged .close").click(function(){
				$(".not-logged").addClass('hidden');
				$(".full_bg").addClass('hidden');
			});
		}	
		/* login popup manage ends */ 
		
	});
})(jQuery);


