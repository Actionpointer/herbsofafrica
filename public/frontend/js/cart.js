(function($) {
	$(document).ready(function(){
		var currency_code = $('#currency_code').val()
		var currency_symbol = $('#currency_symbol').val()

		$(document).on('click','.add_to_cart_button',function(){
			let item = $(this)
			let product_id = parseInt($(this).attr('data-product_id'));
			let product_qty = parseInt($(this).attr('data-product_qty'));
			addToCartAjax(item,product_id,product_qty)
		}); 

		function addToCartAjax(item,product_id,product_qty){
			$.ajax({
				type:'POST',
				dataType: 'json',
				url: window.location.origin+"/product/add-to-cart",
				data:{
					'_token' : $('meta[name="csrf-token"]').attr('content'),
					'product_id': product_id,
					'quantity': product_qty
				},
				beforeSend: function() {
					item.addClass('loading');
					$('.wd-empty-mini-cart').hide()
					$('.woocommerce-mini-cart,.shopping-cart-widget-footer').show()
				},
				success:function(data) {
					// console.log(data);
					item.removeClass('loading');
					$(".wd-cart-number").text(data.count);
					afterCartAction(data.data)
					$('.wd-close-side.wd-fill.showonpage').addClass('wd-close-side-opened')
					$('.cart-widget-side.wd-side-hidden.wd-right.showonpage').addClass('wd-opened')
				},
				error: function (data, textStatus, errorThrown) {
				console.log(data);
				},
			});
		}

		$(document).on('click','.close-side-widget a',function(){
			$('.wd-close-side.wd-fill').removeClass('wd-close-side-opened')
			$('.cart-widget-side.wd-side-hidden.wd-right').removeClass('wd-opened')
		})

		$(document).on('click','.remove_from_cart_button',function(){
			var product_id = parseInt($(this).attr('data-product_id'));
			$.ajax({
				type:'POST',
				dataType: 'json',
				url: window.location.origin+"/product/remove-from-cart",
				data:{
					'_token' : $('meta[name="csrf-token"]').attr('content'),
					'product_id': product_id
				},
				success:function(data) {
					console.log(data);
					$(".wd-cart-number").text(data.count);
					if(!data.count){
						$('.wd-empty-mini-cart,.show_empty_cart').show()
						$('.woocommerce-mini-cart,.shopping-cart-widget-footer,.woocommerce-cart-form,.cart-totals-section').hide()
						$('.cart-sum-total').text(0)
					}else{
						$('.mini_cart_item').hide()
						afterCartAction(data.data)
					}
					
					
				},
				error: function (data, textStatus, errorThrown) {
				console.log(data);
				},
			});
		});

		function afterCartAction(data){
			$('.woocommerce-mini-cart').html('');
			let subtotal = 0;
			$.each( data, function( key, value ) {
				let list = `
							<li class="woocommerce-mini-cart-item mini_cart_item">
								<a href="${value.url}" class="cart-item-link wd-fill">Show</a>
								<a href="#"
									class="remove remove_from_cart_button" aria-label="Remove this item"
									data-product_id="${value.product_id}" data-cart_item_key="2b38c2df6a49b97f706ec9148ce48d86"
									data-product_sku="">×
								</a>
								<a href="${value.url}" class="cart-item-image">
									<img width="300" height="300"
										src="${value.images[0]}"
										class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
										decoding="async"
										_srcset="#image2 300w, #image3 150w, #image4 768w, #image5 600w, #image6 800w"
										_sizes="(max-width: 300px) 100vw, 300px"> 
								</a>

								<div class="cart-info">
									<span class="wd-entities-title"> ${value.title} </span>
									<span class="quantity"> ${value.quantity} × 
										<span class="woocs_special_price_code">
											<span class="woocommerce-Price-amount amount">
												<bdi><span class="woocommerce-Price-currencySymbol">${currency_symbol}</span> ${value.prices[currency_code].toLocaleString()} </bdi>
											</span>
										</span>
									</span>
								</div>

							</li>`;
				$('.woocommerce-mini-cart').append(list);
				subtotal += value.amount[currency_code]
			});
			$('.cart-sum-total').text(subtotal.toLocaleString())
		}

		$(document).on('click','.qty_minus',function(){
			let clicked = $(this).closest('.quantity').find('.qty');
			let prev_quantity = parseInt(clicked.val());
			let quantity = prev_quantity - 1;
			let price = $(this).closest('.quantity').find('.cart_price').val();
			let product_id = clicked.attr('data-product_id');
			$('#cart_amount_for'+product_id).text(price * quantity)
			clicked.val(quantity)
			addToCartAjax(clicked,product_id,-1)
		})

		$(document).on('click','.just_minus',function(){
			let clicked = $(this).closest('.quantity').find('.qty');
			let prev_quantity = parseInt(clicked.val());
			let quantity = prev_quantity - 1;
			$(this).closest('#product_form').find('.single_add_to_cart_button').attr('data-product_qty',quantity);
			clicked.val(quantity)
			
		})

		

		$(document).on('click','.qty_plus',function(){
			let clicked = $(this).closest('.quantity').find('.qty');
			let prev_quantity = parseInt(clicked.val());
			let quantity = prev_quantity + 1;
			let price = $(this).closest('.quantity').find('.cart_price').val();
			let product_id = clicked.attr('data-product_id');
			$('#cart_amount_for'+product_id).text(price * quantity)
			clicked.val(quantity)
			addToCartAjax(clicked,product_id,1)
		})

		$(document).on('click','.just_plus',function(){
			let clicked = $(this).closest('.quantity').find('.qty');
			let prev_quantity = parseInt(clicked.val());
			let quantity = prev_quantity + 1;
			$(this).closest('#product_form').find('.single_add_to_cart_button').attr('data-product_qty',quantity);
			clicked.val(quantity)
			
		})
		

	});
})(jQuery);
