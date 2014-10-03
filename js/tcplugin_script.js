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
								
								htm += '<div class="prod-wrap" id="prodid_'+val.prod_id+'"><input type="hidden" id="front_img" value="'+img[1]+'"/><input type="hidden" id="back_img" value="'+img[2]+'"/><img src="'+val.url+'" alt=""/><span class="ptitle">'+val.title+'</span></div>'; 						
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
			
			$(".prod-wrap img").click(function(){
				var x = $(this).attr('id');
				var a = x.split("_");
				$.post(ajaxurl,{'action':'getproduct','cat':cat},function(resp){});	
				
			});
		});	
	});
})(jQuery);

