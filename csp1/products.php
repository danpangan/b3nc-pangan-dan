<script type="text/javascript">

	/*window.onload = function() {
		$(document).ready(function(){
			$('a.add-cart-button').click(function(event) {
				alert(event.target.id);
				addToCart(event.target.id);
			});
		});
	}*/

	function addToCart(productId) {
		$.ajax({
			type: 'POST',
			data: {productId:productId},
			url: "cart-action.php",
			success: function(result) {
				/*alert('You have successfully the item to the cart');*/
				$('#modal-content').html('You have successfully added item to cart!');
				$('#modal1').modal('open');	
			}
		});
	}

</script>

<?php
	
	$products = new Products();

?>

	<div class="container">
		<div class="section">
			<div class="row">
<?php
	foreach ($products->data() as $product) {
?>
				<div class="col s12 m4">
					<div class="card">
						<div class="card-image">
							<img class="materialboxed" src="admin/img/products/<?php echo $product->tProductImage1; ?>">
						</div>
						<div class="card-content center">
							<h6 class="product-name"><a href="?page=product-details&productId=<?php echo $product->iProductId; ?>"><?php echo $product->vProductName; ?></a></h6>
							<h6>Php <?php echo $product->dPrice; ?></h6>
								
							<a class="waves-effect waves-light btn teal darken-4 z-depth-1 add-cart-button"  id="<?php echo $product->iProductId; ?>" onclick="addToCart(this.id)">
								<i class="material-icons left">add_shopping_cart</i> 
								<span>Add to Cart</span>
							</a>
						</div>
					</div>
				</div>
<?php
	}
?>
			</div>
		</div>
	</div>

<?php include('shopping-cart-modal.php'); ?>
