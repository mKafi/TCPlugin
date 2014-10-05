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
				console.log(a[1]);
				
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
			
		});	
		
		
	});
})(jQuery);

