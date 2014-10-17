jQuery.noConflict();
function set_dynamic_id(){
	var rt = 'k'+Math.random();
	return 'tctext'+rt.substring(3,6);	
}

icon_price = 1.5;
text_price = 2.5;
image_name = '';	
(function($){
	$(function() {
		$(document).ready(function(){
			/* field reset */
			$("#text_field").val('');
			$("#font-chooser option:first").attr('selected','selected');
			$("#font-size")[0].selectedIndex = 0;
			$(".full_bg").height($(document).height());
			$(".full_bg").width($(document).width());
			$(".full_bg").click(function(){ $(this).addClass('hidden'); $(".clipart-cont").addClass('hidden'); });
			
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
				}
				else if($(this).attr('id')=='step_2'){
					$(".step-cont").addClass('hidden');
					$(".step-cont.step_two").removeClass('hidden');
					
					$(".header_tab").removeClass('active');
					$(this).addClass('active');
				}
				else if($(this).attr('id')=='step_3'){
					$(".step-cont").addClass('hidden');
					$(".step-cont.step_three").removeClass('hidden');
					
					$(".header_tab").removeClass('active');
					$(this).addClass('active');
				}
			});
			
			
			/*---------------------------------------------------------------------*/
			jQuery('#colorpickerHolder').ColorPicker({flat: true});
			jQuery( "#txt-back" ).draggable();		
			jQuery(document).on('mouseover','.clip-cont',function(){			
				jQuery(this).draggable();
			});
			
			jQuery(document).on('mouseover','.text-wrap.txt-box',function(){			
				jQuery(".text-wrap.txt-box").draggable();
			});
			
			$("#goal-range").slider({
				range: "min",
				value: 10,
				min: 1,
				max: 99,
				slide: function( event, ui ) {
				$( "#goal-count" ).val( ui.value );
				}
			});
			$( "#goal-count" ).val( $( "#goal-range" ).slider( "value" ) );
			
			$( "#goal-range" ).on( "slidestop", function( event, ui ) {				
				calculate_estimate_profit();				
			} );
		
			/*---------------------------------------------------------------------*/
			
			
			
			
			if($("#tshirt_variant").length>0){
				$("#tshirt_variant").change(function(){
					var cat = $(this).val();
					
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
					
					
					$(".base_price").text(bprice.toFixed(2));
					
				});	
				
				
				
			});	

			
			$(".color-icon").click(function(){
				var color = $(this).attr('id');
				
				if($('.tshirt_frame').hasClass('unflipped')){
					$(".tshirt.back").css('background',color);
				}
				else{
					$(".tshirt.front").css('background',color);
				}
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
							$(".back-part").append('<div class="text-wrap txt-box"><span class="remove hidden">X</span><span class="txt-cont choosed" id="'+elem_id+'">'+txt+'</span></div>');
							$("#selected_element").val(elem_id);
							
							bpcost = parseFloat($("span.base_price").text(),10);
							bpcost += parseFloat(text_price); 
							$("span.base_price").text(''+bpcost.toFixed(2));
							
						}
						else if($("#selected_element").val().length > 0){
							
							$("#"+$("#selected_element").val()).text(txt);
						}
					}
					else{
						if($("#selected_element").val().length == 0){
							$(".front-part").append('<div class="text-wrap txt-box"><span class="remove hidden">X</span><span class="txt-cont choosed" id="'+elem_id+'">'+txt+'</span></div>');
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
				$("#font-size")[0].selectedIndex = 0;
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
			
			$("#font-size").change(function(){
				var fonts = $(this).val();
				$('#'+$("#selected_element").val()).css({'font-size':fonts+'px'});
			});
			
			$("#search_art").click(function(){
				if((".clipart-cont").length > 0){
					$(".full_bg").removeClass('hidden');
					$(".clipart-cont").toggleClass('hidden');
				}	
			});
			
			
			
			$(".result.tcpring img").click(function(){
				var src = $(this).attr('src');
				
				if($('.tshirt_frame').hasClass('unflipped')){
					var appclip = '<span class="clip-cont"> <div class="icon-img-cont"><span class="rotate hidden">R</span> <span class="remove hidden">X</span> <img src="'+src+'" alt="" class="used-clips" id="used-clips1" /></div> </span>';
					$(".design-frame.back-part").append(appclip);
					$(".full_bg").addClass('hidden');
					add_icon_price();					
				}
				else{
					var appclip = '<span class="clip-cont"> <div class="icon-img-cont"><span class="rotate hidden">R</span><span class="remove hidden">X</span> <img src="'+src+'" alt="" class="used-clips" id="" /></div> </span>';
					$(".design-frame.front-part").append(appclip);
					$(".full_bg").addClass('hidden');
					add_icon_price();					
				}
				
					/* var htm = '<img src="'+src+'" alt="" class="used-clips" id="" />';
					$(".clipart-used-cont").html(htm); */
				$("#clipart-cont").addClass('hidden');
			});
			
			$(document).on('mouseenter','.clip-cont',function(){
				$(this).find('.remove').removeClass('hidden');
				$(this).find('.rotate').removeClass('hidden');
			});
			$(document).on('mouseleave','.clip-cont',function(){
				$(this).find('.remove').addClass('hidden');
				$(this).find('.rotate').addClass('hidden');
			});
			
			
			$(document).on("click",".icon-img-cont .remove",function(){
				var bpcost = 0;
				$(this).parent().parent().remove();
				
				bpcost = parseFloat($("span.base_price").text(),10);
				bpcost -= parseFloat(icon_price); 
				$("span.base_price").text(''+bpcost.toFixed(2));
			});
			
			
			/* 
			
			$(document).on("mousedown",".icon-img-cont .rotate",function(){
				var mouseDown = false;
				var img_cont = $(this).parent();				
				var offset = img_cont.offset();				
				$(document).mousedown(function (e) {
					mouseDown=true;
					$(document).mousemove(function(evt){
						if(mouseDown ==true){
							var center_x = (offset.left) + (img_cont.width() / 2);
							var center_y = (offset.top) + (img_cont.height() / 2);
							var mouse_x = evt.pageX;
							var mouse_y = evt.pageY;
							var radians = Math.atan2(mouse_x - center_x, mouse_y - center_y);
							var degree = (radians * (180 / Math.PI) * -1) + 90;
							img_cont.css('-moz-transform', 'rotate(' + degree + 'deg)');
							img_cont.css('-webkit-transform', 'rotate(' + degree + 'deg)');
							img_cont.css('-o-transform', 'rotate(' + degree + 'deg)');
							img_cont.css('-ms-transform', 'rotate(' + degree + 'deg)');
						}
					});
				});
				
				$(document).mouseup(function (e) {
					mouseDown = false;
				})
			});
			
			 */
			
			
			
			$(document).on("click",".icon-img-cont .remove",function(){
				var bpcost = 0;
				$(this).parent().parent().remove();
				
				bpcost = parseFloat($("span.base_price").text(),10);
				bpcost -= parseFloat(icon_price); 
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
		
			$("#for_step_two").click(function(){
				
				$(".same-line.tshirt").find('.txt_printable').remove();
				$(".design-frame").css('border','none');
				
				html2canvas([document.getElementById('tot_wrap')], {
					onrendered: function (canvas) {					
						var data = canvas.toDataURL('image/png',1.0);					
					
						$.post(ajaxurl,{'action':'save_img','data':data},function(resp){
							var obj = $.parseJSON(resp);
							if(obj.action == 'done'){
								image_name = obj.img;
								
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
								
								
							}
							else{
								alert('image not saved. Contact with Rakib sir.');
							}
						});
					}
				});
				
			});
			
			$("#step_2").click(function(){
				
				$(".same-line.tshirt").find('.txt_printable').remove();
				$(".design-frame").css('border','none');
				var shirt_htm = $(".same-line.tshirt").html();						
				
				$(".step2-shirt-cont").html(shirt_htm);
				$(".step2-shirt-cont .flip-container").append('<div class="fullwrapper"></div>');
				
				$(".step-cont").addClass('hidden');
				$(".step-cont.step_two").removeClass('hidden');
				
				calculate_estimate_profit();
				
			});
			
			
			$("#for_step_three").click(function(){
				
				$(".same-line.tshirt").find('.txt_printable').remove();
				var shirt_htm = $(".same-line.tshirt").html();						
				
				$(".step3-shirt-cont").html(shirt_htm);
				$(".step3-shirt-cont .flip-container").append('<div class="fullwrapper"></div>');
				
				$(".step-cont").addClass('hidden');
				$(".step-cont.step_three").removeClass('hidden');
				
				$(".header_tab").removeClass('active');
				$("#step_3").addClass('active');
				
			});
			
			/* go for next step ends */
			
			
			$(document).on("mouseenter",".text-wrap.txt-box", function(){			
				$(this).children('.remove').removeClass('hidden');
			});
			
			$(document).on("mouseleave",".text-wrap.txt-box", function(){			
				$(this).children('.remove').addClass('hidden');
			});
			
			$("#sale-price").keyup(function(){			
				calculate_estimate_profit();
			});	
			
			$("#goal-count").keyup(function(){
				calculate_estimate_profit();			
			});
			
		});	
		
		$("#launch-campaign").click(function(){
			var camp_name = $("#campaign-name").val();
			var camp_desc = $("#campaign-desc").val();
			var camp_tags = $("#campaign-tags").val();
			var camp_length = $("#campaign-length").val();
			var camp_url = $("#campaign-url").val();
			var img_data = '';
			
			/* html2canvas([document.getElementById('tot_wrap')], {
				onrendered: function (canvas) {					
					img_data = canvas.toDataURL('image/png',1.0);					
				}
			});
			 */
			
			
			$.post(ajaxurl, {'action':'create_camp','camp_name':camp_name,'camp_desc':camp_desc,'camp_tags':camp_tags,'camp_length':camp_length,'camp_url':camp_url,'image_name':image_name}, function(resp){						
				if(resp){
					alert('A new campaign created successfully');
				}
			});
		});
		
		
		$("#save-canvas").click(function(){
			
			html2canvas([document.getElementById('tot_wrap')], {
				onrendered: function (canvas) {					
					var data = canvas.toDataURL('image/png',1.0);					
					$.post(ajaxurl,{'action':'save_img','data':data},function(resp){
						
					}); 
					
				}
			});
			
		});
		
		$(".parent.level1").click(function(){
			var child_cont = $(this).attr('id');
			$(".level2").addClass('hidden');
			$(".level2."+child_cont).removeClass('hidden');
		});
		
		$(".closeit").click(function(){			
			$(this).parent().remove();
			$(".full_bg").addClass('hidden');
			
		});
	});
})(jQuery);


