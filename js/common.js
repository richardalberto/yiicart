$(document).ready(function() {
    $('#checkall').on('click', function(){        
        $("table tr td:nth-child(1) input[type=checkbox]").prop("checked", this.checked);
    });
});

function addToCart(product_id, quantity) {
    quantity = typeof(quantity) != 'undefined' ? quantity : 1;

    $.ajax({
        url: urls['cartUrl'] + '/add',
        type: 'post',
        data: 'product_id=' + product_id + '&quantity=' + quantity,
        dataType: 'json',
        success: function(json) {
            $('.alert-success').remove();
			
            if (json['redirect']) {
                location = json['redirect'];
            }
			
            if (json['success']) {
                $('#notification').html('<div class="alert alert-success">' + json['success'] + '<button data-dismiss="alert" class="close" type="button">×</button></div>');
				
                //$('.alert-success').fadeIn('slow');
				
                $('#cart-total').html(json['total']);
				
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow'); 
            }	
        }
    });
}
function addToWishList(product_id) {
    $.ajax({
        url: urls['wishlistUrl'] + '/add',
        type: 'post',
        data: 'product_id=' + product_id,
        dataType: 'json',
        success: function(json) {
            $('.success, .warning, .attention, .information').remove();
						
            if (json['success']) {
                $('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
				
                $('.success').fadeIn('slow');
				
                $('#wishlist-total').html(json['total']);
				
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
            }	
        }
    });
}

function addToCompare(product_id) { 
    $.ajax({
        url: urls['compareUrl'] + '/add',
        type: 'post',
        data: 'product_id=' + product_id,
        dataType: 'json',
        success: function(json) {
            $('.success, .warning, .attention, .information').remove();
						
            if (json['success']) {
                $('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
				
                $('.success').fadeIn('slow');
				
                $('#compare-total').html(json['total']);
				
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow'); 
            }	
        }
    });
}