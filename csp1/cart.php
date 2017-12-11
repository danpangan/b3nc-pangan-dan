<script type="text/javascript">

	function removeFromCart(productId) {
		$('tr#'+ productId).remove();
		var productId = productId.replace('product','');

		$.ajax({
			type: 'POST',
			data: {productId:productId, axn:'delete'},
			url: "cart-action.php",
			success: function(result) {
				$('#modal-content').html('You have successfully deleted item from cart!');
				$('#modal1').modal('open');	
			}
		});

		computeTotalAmount();
	}

	function computeTotal(productId, val) {
		var priceId = productId + 'Price';
		var totalId = productId + 'Total';
		var price = document.getElementById(priceId).value;
		var totalPrice = 0;

		totalPrice = val * price;

		document.getElementById(totalId).value = totalPrice;
		addToCart(productId);
		computeTotalAmount();
	}

	function computeTotalAmount() {
		var values = $('.totalPrice').map(function() { return this.value; }).get();
		var totalAmount = 0;
		var x =0;
		var len = values.length;
		for (x=0; x<len; x++) {
			totalAmount = parseFloat(totalAmount) + parseFloat(values[x]);
		}

		document.getElementById('totalAmount').innerHTML = totalAmount;
	}

	function addToCart(productId) {
		var productId = productId.replace('product','');

		$.ajax({
			type: 'POST',
			data: {productId:productId},
			url: "cart-action.php",
			success: function(result) {
			/*alert(result);*/
			}
		});
	}

</script>

<style type="text/css">
	
input, input:default {
	margin: 0 !important;
	border: none !important;
	color: #000 !important;
}

table,
table tr,
table tr td {
	padding: 0 !important;
}

</style>

<?php

	$transactions = new Transaction();

	$productTotal = 0;
	$totalAmount = 0;
	$disabled = "";
?>

<div class="container">
	<div class="section">
		<div class="row">
			<div class="col s12">
				<div class="card">
					<div class="card-content">
						<span class="card-title">
							<i class="material-icons">shopping_cart</i>
							Your Shopping Cart
						</span>
<?php if($transactions->data()) { ?>            
						<table class="bordered">
							<thead>
								<tr>
									<th></th>
									<th>Item Name</th>
									<th class="center hide-on-small-only">Item Price</th>
									<th class="center">Qty</th>
									<th class="center hide-on-small-only">Total</th>
								</tr>
							</thead>

							<tbody>


<?php

	foreach ($transactions->data() as $transaction) {
		$productTotal = $transaction->iQty * $transaction->dPrice;
		$totalAmount += $productTotal;
?>
								<tr id="product<?php echo $transaction->iProductId; ?>">
									<td class="center" 
										style="width: 5%; 
										cursor: pointer;">
										<i class="material-icons 
												red-text 
												text-darken-1" 
											onclick="removeFromCart('product<?php echo $transaction->iProductId; ?>')">delete
										</i>
									</td>
									<td><?php echo $transaction->vProductName; ?></td>
									<td class="center hide-on-small-only" 
										style="width: 15%;">Php 
										<input class="center" 
												type="text" 
												id="product<?php echo $transaction->iProductId; ?>Price" 
												disabled 
												value="<?php echo $transaction->dPrice; ?>" 
												style="width: 60px;"/>
									</td>
									<td class="center" 
										style="width: 10%;">
										<input class="center" 
												type="number" 
												min="1"" 
												step="1" 
												value="<?php echo $transaction->iQty; ?>" 
												style="width: 40px;" 
												onchange="computeTotal('product<?php echo $transaction->iProductId; ?>', this.value)">
									</td>
									<td class="center hide-on-small-only" 
										style="width: 15%;">Php 
										<input class="totalPrice center" 
												type="text" 
												id="product<?php echo $transaction->iProductId; ?>Total" 
												disabled 
												value="<?php echo $productTotal; ?>" 
												style="width: 60px;"/>
									</td>
								</tr>
<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="4">
										<h4 class="right">Total Amount Php </h4>
									</td>
									<td class="center">
										<h4><span id="totalAmount"><?php echo $totalAmount; ?></span></h4>
									</td>
								</tr>
							</tfoot>
						</table>
<?php
	} else {
	$disabled = "disabled";
		echo "<h3>Your Cart is Empty.</h3>";
	}
?>
					</div> <!-- /.card-content -->
					<div class="card-action center-align">
						<a class="btn" type="button" onclick="javascript: history.go(-1)">
							<i class="material-icons">arrow_back</i> 
							<span>Continue</span>
						</a>
						<a href="?page=checkout" class="btn <?php echo $disabled; ?>" type="button">
							<span>Check out</span> 
							<i class="material-icons">arrow_forward</i>
						</a>   
					</div> <!-- /.card-action -->
				</div> <!-- /.card -->
			</div>
		</div>
	</div>
</div>

<?php include('shopping-cart-modal.php'); ?>