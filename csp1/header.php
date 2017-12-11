<script type="text/javascript">

	$(document).ready(function(){
		var cart;
		cart = document.getElementById('shopping-cart');
		cart.addEventListener('click', openCart);
	});

	function openCart() {
		window.open('?page=cart', '_self');
	}

</script>

<div class="row">
	<div id="banner"> 
		<nav>
			<div class="nav-wrapper">
				<a href="#" class="brand-logo hide-on-med-and-up">Kelly's Garden</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

				<ul class="right">
					<li><i class="material-icons" id="shopping-cart" onclick="openCart()">shopping_cart</i></li>
				</ul>
				<ul class="right hide-on-med-and-down">
					<li><a href="?page=home">Home</a></li>
					<li><a href="?page=about">About Us</a></li>
					<li><a href="?page=products">Products</a></li>
					<li><a href="?page=contact">Contact Us</a></li>
					<li><a href="?page=faq">FAQ</a></li>
				</ul>
				<ul class="side-nav grey darken-2" id="mobile-demo">
					<li class="sidenav-header teal">
						<div class="row">
							<div class="col s12 center">
							<img src="admin/img/logo.png" width="100px" alt="" class="circle responsive-img profile-image" style="margin-top:20px;" >
							</div>
						</div>
					</li>
					<li class="white">
						<a href="?page=home" class="waves-effect waves-teal">
							<i class="material-icons">home</i> Home
						</a>
					</li>
					<li class="white">
						<a href="?page=about" class="waves-effect waves-teal">
							<i class="material-icons">info</i> About Us
						</a>
					</li>
					<li class="white">
						<a href="?page=products" class="waves-effect waves-teal">
							<i class="material-icons">shopping_cart</i> Prodcts
						</a>
					</li>
					<li class="white">
						<a href="?page=contact" class="waves-effect waves-teal">
							<i class="material-icons">call</i> Contact Us
						</a>
					</li>
					<li class="white">
						<a href="?page=faq" class="waves-effect waves-teal">
							<i class="material-icons">question_answer</i> FAQ
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="hide-on-small-and-down">
			<br/>
			<h1 class="header center white-text">Kelly's Garden</h1>
		</div>
	</div>
</div>