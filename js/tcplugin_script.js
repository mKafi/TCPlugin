jQuery.noConflict();
function set_dynamic_id(){
	var rt = 'k'+Math.random();
	return 'tctext'+rt.substring(3,6);	
}

icon_price = 1.5;
text_price = 2.5;	
(function($){
	$(function() {
		$(document).ready(function(){
			$(document).on("click", ".flip_canvas", function(){
				$(".flip_canvas").toggleClass('hidden');
				$(".tshirt_frame").toggleClass("unflipped");
			});
			
			$(".header_tab").click(function(){
				if($(this).attr('id')=='step_1'){
					$(".step-cont").addClass('hidden');
					$(".step-cont.step_one").removeClass('hidden');
				}
				else if($(this).attr('id')=='step_2'){
					$(".step-cont").addClass('hidden');
					$(".step-cont.step_two").removeClass('hidden');
				}
				else if($(this).attr('id')=='step_3'){
					$(".step-cont").addClass('hidden');
					$(".step-cont.step_three").removeClass('hidden');
				}
			});
			
			
			/*---------------------------------------------------------------------*/
			jQuery('#colorpickerHolder').ColorPicker({flat: true});
			jQuery( "#txt-back" ).draggable();		
			jQuery(document).on('mouseover','.clip-cont',function(){			
				jQuery(this).draggable();
			});
			
			jQuery(document).on('mouseover','.txt-cont',function(){			
				jQuery(".txt-cont").draggable();
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
				console.log($("#goal-count").val());
				console.log($("span.base_price").text());
				
				var profit = ( parseFloat($("#goal-count").val()) * parseFloat($(".base_price").text()));
				$("#estimated-profit").text(''+profit.toFixed(2));
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
					$(".base_price").text(info.sale);
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
							$(".back-part").append('<div class="icon-img-cont"><span class="remove hidden">X</span><span class="txt-cont choosed" id="'+elem_id+'">'+txt+'</span></div>');
							$("#selected_element").val(elem_id);
							
							bpcost = parseFloat($("span.base_price").text(),10);
							bpcost += parseFloat(text_price); 
							$("span.base_price").text(''+bpcost.toFixed(2));
							
						}
						else if($("#selected_element").val().length > 0){
							if($("#"+elem_id).length > 0){
								$("#"+elem_id).text(txt);
							}							
						}
					}
					else{
						if($("#selected_element").val().length == 0){
							$(".front-part").append('<div class="icon-img-cont"><span class="remove hidden">X</span><span class="txt-cont choosed" id="'+elem_id+'">'+txt+'</span></div>');
							$("#selected_element").val(elem_id);
							
							bpcost = parseFloat($("span.base_price").text(),10);
							bpcost += parseFloat(text_price); 
							$("span.base_price").text(''+bpcost.toFixed(2));
							
						}
						else if($("#selected_element").val().length > 0){							
							if($("#selected_element").val().length > 0){
								$("#"+$("#selected_element").val()).text(txt);
							}							
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
			});
			
			$(document).on('click','.txt-cont',function(){  
				var id = $(this).attr('id');
				$("#selected_element").val(id);
				$(this).addClass('choosed'); 
				
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
					$(".clipart-cont").toggleClass('hidden');
				}	
			});
			
			$(".result.tcpring img").click(function(){
				var src = $(this).attr('src');
				
				if($('.tshirt_frame').hasClass('unflipped')){
					var appclip = '<span class="clip-cont"> <div class="icon-img-cont"><span class="remove hidden">X</span> <img src="'+src+'" alt="" class="used-clips" id="used-clips1" /></div> </span>';
					$(".design-frame.back-part").append(appclip);
					
					bpcost = parseFloat($("span.base_price").text(),10);
					bpcost += parseFloat(icon_price); 
					$("span.base_price").text(''+bpcost.toFixed(2));
				}
				else{
					var appclip = '<span class="clip-cont"> <div class="icon-img-cont"><span class="remove hidden">X</span> <img src="'+src+'" alt="" class="used-clips" id="" /></div> </span>';
					$(".design-frame.front-part").append(appclip);
					
				}
				
				var htm = '<img src="'+src+'" alt="" class="used-clips" id="" />';
				$(".clipart-used-cont").html(htm);
				$("#clipart-cont").addClass('hidden');
			});
			
			$(document).on('mouseenter','.clip-cont',function(){
				$(this).find('.remove').removeClass('hidden');
			});
			$(document).on('mouseleave','.clip-cont',function(){
				$(this).find('.remove').addClass('hidden');
			});
			
		});	
		
		$(document).on("click",".remove",function(){
			var bpcost = 0;
			$(this).parent().parent().remove();
			
			bpcost = parseFloat($("span.base_price").text(),10);
			bpcost -= parseFloat(icon_price); 
			$("span.base_price").text(''+bpcost.toFixed(2));
		});
		
		
		/* go for next step start */
		
		$("#for_step_two").click(function(){
			var shirt_htm = $(".same-line.tshirt").html();			
			console.log(shirt_htm);
			$(".step2-shirt-cont").html(shirt_htm);
			$(".step-cont").addClass('hidden');
			$(".step-cont.step_two").removeClass('hidden');
			
			var profit = ( parseFloat($("#goal-count").val(),10) * parseFloat($(".base_price").text()),10);
			$("#estimated-profit").text(''+profit.toFixed(2));
		});
		
		/* go for next step ends */
		
		
		$(document).on("mouseenter",".icon-img-cont",function(){			
			$(this).children('.remove').removeClass('hidden');
		});
		
		$(document).on("mouseleave",".icon-img-cont",function(){			
			$(this).children('.remove').addClass('hidden');
		});
		
		
		
	});
})(jQuery);

