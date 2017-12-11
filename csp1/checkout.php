<script>
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
</script>
<?php
	$transactions = new Transaction();

	$productTotal = 0;
	$totalAmount = 0;
?>

<div class="container">
	<div class="section">

		<div class="row">
			<div class="col s12">
				<div class="card">
					<div class="card-content">
						<span class="card-title">
							<i class="material-icons">shopping_cart</i>
              				Checkout
						</span>
						<table class="responsive-table">
					        <thead>
								<tr>
									<th>Item Name</th>
									<th class="center">Item Price</th>
									<th class="center">Qty</th>
									<th class="center">Total</th>
								</tr>
				            </thead>
				            <tbody>
<?php
	foreach ($transactions->data() as $transaction) {
		$productTotal = $transaction->iQty * $transaction->dPrice;
		$totalAmount += $productTotal;
?>     
								<tr>
									<td><h6><?php echo $transaction->vProductName; ?></h6></td>
									<td class="center"><h6><?php echo $transaction->dPrice; ?></h6></td>
									<td class="center"><h6><?php echo $transaction->iQty; ?></h6></td>
									<td class="center"><h6><?php echo $productTotal; ?></h6></td>
								</tr>
					        
<?php } ?>
							</tbody>
					        <tfoot>
					        	<tr>
					        		<td class="right-align" colspan="3">Total Amount Php</td>
					        		<td class="center"><?php echo $totalAmount; ?></td>
					        	</tr>
					        </tfoot>
					    </table>
						<div class="divider"></div>
						<h5 class="center">Checkout Detail Form</h5>
						<div class="row">
							<form class="col s12">
								<div class="row">
									<div class="input-field col s6">
										<input id="first_name" type="text" class="validate">
										<label for="first_name">Full Name</label>
									</div>

									<div class="input-field col s6">
										<input id="first_name" type="text" class="validate">
										<label for="first_name">Email Address</label>
									</div>

									<div class="input-field col s6">
										<input id="first_name" type="text" class="validate">
										<label for="first_name">Contact no.</label>
									</div>

									<div class="input-field col s6">
										<input id="first_name" type="text" class="validate">
										<label for="first_name">Address</label>
									</div>
								</div>
								<div class="row">
									<p class="center">
										<input type="checkbox" class="filled-in" id="filled-in-box"/>
										<label for="filled-in-box">I agree to the <a href="https://support.ecwid.com/hc/en-us/articles/207100249-English-Terms-and-Conditions-templates" target="_blank">Terms and Conditions</a></label>
									</p>
								</div>
							</form>
						</div>
					</div>
					<div class="card-action center">
						<button class="btn" type="button" onclick="javascript: history.go(-1)">
							<i class="material-icons">arrow_back</i> 
							<span>Back to Cart</span>
						</button>
						<button class="btn" type="button">
							<span>Place Order</span> 
							<i class="material-icons">arrow_forward</i>
						</button>   
					</div>
				</div>
			</div>
		</div>
	</div>
</div>