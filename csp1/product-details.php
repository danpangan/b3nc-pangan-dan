<script type="text/javascript">
	window.onload = function() {
		$(document).ready(function() {
		    $('#reply-panel').hide();
		});
	}
	
	function showReplyPanel() {
		$('#reply-button').hide();
		$('#reply-panel').fadeIn(500);
	}

	function hideReplyPanel() {
		$('#reply-panel').fadeOut(500);
		$('#reply-button').show();
	}

	function addToCart(productId) {
		$.ajax({
			type: 'POST',
			data: {productId:productId},
			url: "cart-action.php",
			success: function(result) {
				/*alert('You have successfully the item to the cart');*/
				$('#modal1').modal('open');	
			}
		});
	}	
</script>

<?php
	
	if(isset($_REQUEST['productId'])) {

		$detail = new Details($_REQUEST['productId']);
	}
?>

	<div class="container">
		<div class="section">
			<div class="row">
				<div class="col s12 m8">
					<div class="card">
						<div class="card-image">
							<div class="carousel">
								<a class="carousel-item"><img src="admin/img/products/<?php echo escape($detail->data()->tProductImage1); ?>" title="<?php echo escape($detail->data()->vProductName); ?>" alt="<?php echo escape($detail->data()->vProductName); ?>"></a>
								<a class="carousel-item"><img src="admin/img/products/<?php echo escape($detail->data()->tProductImage2); ?>" title="<?php echo escape($detail->data()->vProductName); ?>" alt="<?php echo escape($detail->data()->vProductName); ?>">></a>
								<a class="carousel-item"><img src="admin/img/products/<?php echo escape($detail->data()->tProductImage3); ?>" title="<?php echo escape($detail->data()->vProductName); ?>" alt="<?php echo escape($detail->data()->vProductName); ?>">></a>
							</div>
						</div>


						<div class="card-content center">
							<h6 class="product-name">Name: <?php echo escape($detail->data()->vProductName); ?></h6>
							<h6>Price: Php <?php echo escape($detail->data()->dPrice); ?></h6>
							<div class="row center">
								<div class="col s12 m4 offset-m2 left-align"><p>Family: <?php echo escape($detail->data()->vFamilyName); ?></p></div>
								<div class="col s12 m4 left-align"><p>Sub Family: <?php echo escape($detail->data()->vSubfamilyName); ?></p></div>
								<div class="col s12 m4 offset-m2 left-align"><p>Tribe: <?php echo escape($detail->data()->vTribeName); ?></p></div>
								<div class="col s12 m4 left-align"><p>Sub Tribe: <?php echo escape($detail->data()->vSubtribeName); ?></p></div>
								<div class="col s12 m4 offset-m2 left-align"><p>Genus: <?php echo escape($detail->data()->vGenusName); ?></p></div>
							</div>
							<p><?php echo escape($detail->data()->tProductDescription); ?></p>
							
							<a class="waves-effect waves-light btn teal darken-4 z-depth-1" onclick="addToCart(<?php echo $detail->data()->iProductId; ?>)"><i class="material-icons left">add_shopping_cart</i>Add to Cart</a>
							<a class="waves-effect waves-light btn teal darken-4 z-depth-1" onclick="javascript: history.go(-1)"><i class="material-icons left">keyboard_return</i>Back</a>
						</div>
					</div>
				</div>

				<div class="col s12 m4">

					<div class="fb-follow" data-href="https://www.facebook.com/kellysgardenph/" data-layout="button_count" data-size="large" data-show-faces="true"></div>

					<div class="row">
						
						<div class="card">
						<div class="card-content">
						<span class="card-title">
							What can you say about this product?
						</span>
						<form class="row">
							<div style="border-bottom: 1px solid teal;">
								<textarea class="left" style="border: none; outline:none; resize: none;" placeholder="Enter comment here..."></textarea>
								<i class="material-icons right" style="margin-bottom: 2px;">send</i>
								<div class="clearfix"></div>
							</div>
							

						</form>

						<div class="card">
						<div class="card-content">
							

						<span class="card-title">
							<img class="comment-avatar" src="img/user-placeholder.png">
						</span>
						<p>This is so interesting. Do you have a minimum order?</p>
						</div>
						<div class="card-action">
						<a id="reply-button"><i class="material-icons" onclick="showReplyPanel()">reply</i></a>

						<form class="row">
							<div style="border-bottom: 1px solid teal;" id="reply-panel">
								<i class="material-icons right" onclick="hideReplyPanel()">close</i>
								<textarea class="left" style="border: none; outline:none; resize: none;" placeholder="Enter comment here..."></textarea>
								<i class="material-icons right" style="margin-bottom: 2px;">send</i>
								<div class="clearfix"></div>
							</div>
						</form>

						</div>
						</div>
						</div>

						</div>

					</div>
					
				</div>
			</div>
		</div>

	</div>


<?php include('shopping-cart-modal.php'); ?>