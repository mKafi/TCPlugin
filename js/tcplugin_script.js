jQuery.noConflict();
(function($){
	$(function() {
		$(document).ready(function(){
			$(".flip_canvas").click(function(){
				$(".flip_canvas").toggleClass('hidden');
				$(".tshirt_frame").toggleClass("unflipped");
			});
			
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
				/* console.log(a[1]); */
				
				var frnt_img_url = $(this).parent().children('.prod-wrap-front-img').val();
				var back_img_url = $(this).parent().children('.prod-wrap-back-img').val();
				
				$("#back-image").attr('src',back_img_url);
				$("#front-image").attr('src',frnt_img_url);
				
				
				/* $.post(ajaxurl,{'action':'getproduct','cat':cat},function(resp){});	 */
				
				
				
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
				if($('#txt-back span').length > 0){
					$("#txt-back span").css('color',color);
				}
			});	
			
			$("#text_field").keyup(function(e){
				console.log(e.keyCode);
				var txt = '';
				if(e.keyCode !=13){
					txt = $(this).val();
					$("#txt-back").html('<span>'+txt+'</span>');
				}
			});
			
			$("#font-chooser").change(function(){
				var fontf = $(this).val();
				$("#txt-back span").css({'font-family':fontf});
			});
			
			$("#font-size").change(function(){
				var fonts = $(this).val();
				$("#txt-back span").css({'font-size':fonts+'px'});
			});
			
			$("#search_art").click(function(){
				if((".clipart-cont").length > 0){
					$(".clipart-cont").toggleClass('hidden');
				}	
			});
			
			$(".result.tcpring img").click(function(){
				var src = $(this).attr('src');
				
				if($('.tshirt_frame').hasClass('unflipped')){
					var appclip = '<span class="clip-cont"> <img src="'+src+'" alt="" class="used-clips" id="used-clips1" /> </span>';
					$(".design-frame.back-part").append(appclip);					
				}
				else{
					var appclip = '<span class="clip-cont"> <img src="'+src+'" alt="" class="used-clips" id="" /> </span>';
					$(".design-frame.front-part").append(appclip);
					
				}
				
				var htm = '<img src="'+src+'" alt="" class="used-clips" id="" />';
				$(".clipart-used-cont").html(htm);
				$("#clipart-cont").addClass('hidden');
			});
			
			
		});	
		
		
	});
})(jQuery);

