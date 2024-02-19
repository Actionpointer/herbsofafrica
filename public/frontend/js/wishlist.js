(function($) {
	$(document).ready(function(){


		$('.wishlist_anchor').click(function(e){
			e.preventDefault()
			if($(this).hasClass('added')){
				window.location.href = $(this).attr('href')
			}else{
				let product_id = parseInt($(this).attr('data-product_id'));
				$(this).addClass('added')
				addToWishlist(product_id)
			}
			
		})

		$('.wd-wishlist-remove').click(function(e){
			let product_id = $(this).attr('data-product_id');
			removeFromWishlist(product_id);
			
		})

		$('#removeall').click(function() {
			$('.wd-wishlist-checkbox:checked').each(function(index){
				removeFromWishlist($(this).attr('data-product_id'));
			})
		})

		function addToWishlist(product_id){
			$.ajax({
				type:'POST',
				dataType: 'json',
				url: window.location.origin+"/wishlist/add",
				data:{
					'_token' : $('meta[name="csrf-token"]').attr('content'),
					'product_id': product_id
				},
				success:function(data) {
					$('.wish-counter').html(data.wish_count);
				},
				error: function (data, textStatus, errorThrown) {
				console.log(data);
				},
			});
		}

		function removeFromWishlist(product_id){
			$.ajax({
				type:'POST',
				dataType: 'json',
				url: window.location.origin+"/wishlist/remove",
				data:{
					'_token' : $('meta[name="csrf-token"]').attr('content'),
					'product_id': product_id
				},
				success:function(data) {
					$('.product-grid-item[data-product_id="'+product_id+'"]').remove()
					$('.wish-counter').html(data.wish_count);
					if(data.wish_count){
						$('#full_wishlist').show();
						$('#empty_wishlist').hide();
					}	
					else{
						$('#full_wishlist').hide();
						$('#empty_wishlist').show();
					}
						
					
				},
				error: function (data, textStatus, errorThrown) {
				console.log(data);
				},
			});
		}

		$('.wd-wishlist-checkbox').change(function(){
			if($('.wd-wishlist-checkbox:checked').length)
				$('#bulkaction').show()
			else $('#bulkaction').hide()
		})

		

		$('#selectall').click(function() {
			$('#state').text($(this).attr('data-state'))
			if($(this).attr('data-state') == 'Deselect'){
				$('.wd-wishlist-checkbox').prop('checked',true)
				$(this).attr('data-state','Select')
			}else {
				$('.wd-wishlist-checkbox').prop('checked',false)
				$(this).attr('data-state','Deselect')
			}
		})
		  


	});
})(jQuery);
