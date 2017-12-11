<?php
  
  $products = new Products();



?>
<div class="container">
	<h2>Add New Product</h2>
	<div class="row">

		<div class="col s12 m10 offset-m1 center">
	      <div class="card">
	      	<form>
		        <div class="card-content">
		          <span class="card-title">New Product Form</span>
		          <div class="row">
			        <div class="input-field col s12">
			          <input id="product-name" name="product-name" type="text" class="validate" data-length="50">
			          <label for="product-name">Common Name</label>
			        </div>
			      </div>
				  <div class="row">
			        <div class="input-field col s12">
			          <input id="product-scientific-name" name="product-scientific-name" type="text" class="validate" data-length="50">
			          <label for="product-scientific-name">Scientific Name</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <textarea id="product-description" name="product-description" class="materialize-textarea"></textarea>
			          <label for="product-description">Description</label>
			        </div>
			      </div>
			      <div class="row">
				      <div class="input-field col s12 m6">
					    <select>
					      <option value="" disabled selected>choose family</option>
					      <option value="1">Option 1</option>
					      <option value="2">Option 2</option>
					      <option value="3">Option 3</option>
					    </select>
					    <label>Family</label>
					  </div>
					  <div class="input-field col s12 m6">
					    <select>
					      <option value="" disabled selected>choose sub family</option>
					      <option value="1">Option 1</option>
					      <option value="2">Option 2</option>
					      <option value="3">Option 3</option>
					    </select>
					    <label>Sub Family</label>
					  </div>
				  </div>
				  <div class="row">
					  <div class="input-field col s12 m6">
					    <select>
					      <option value="" disabled selected>choose tribe</option>
					      <option value="1">Option 1</option>
					      <option value="2">Option 2</option>
					      <option value="3">Option 3</option>
					    </select>
					    <label>Tribe</label>
					  </div>
					  <div class="input-field col s12 m6">
					    <select>
					      <option value="" disabled selected>choose sub tribe</option>
					      <option value="1">Option 1</option>
					      <option value="2">Option 2</option>
					      <option value="3">Option 3</option>
					    </select>
					    <label>Sub Tribe</label>
					  </div>
				  </div>
				  <div class="input-field col s12">
				    <select>
				      <option value="" disabled selected>choose genus</option>
				      <option value="1">Option 1</option>
				      <option value="2">Option 2</option>
				      <option value="3">Option 3</option>
				    </select>
				    <label>Genus</label>
				  </div>
			      <div class="file-field input-field">
				      <div class="btn">
				        <span>Image #1</span>
				        <input type="file">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text">
				      </div>
				    </div>
			      <div class="file-field input-field">
				      <div class="btn">
				        <span>Image #2</span>
				        <input type="file">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text">
				      </div>
				    </div>
			      <div class="file-field input-field">
				      <div class="btn">
				        <span>Image #3</span>
				        <input type="file">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text">
				      </div>
				    </div>
			      <div class="row">
			        <div class="input-field col s12 m6">
			          <input id="first_name" type="text" class="validate">
			          <label for="first_name">Price (PHP)</label>
			        </div>
			        <div class="input-field col s12 m6">
			          <input id="first_name" type="number" class="validate">
			          <label for="first_name">Stock Quantity</label>
			        </div>
			      </div>
		        </div>
		        <div class="card-action" id="product-form-button">
		        	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
		        	<div class="row">
		        		<div class="col s12 m6">
		        			<button class="btn" type="submit">
				        		<i class="material-icons">save</i>
				        		Save Product
				        	</button>
		        		</div>

		        		<div class="col s12 m6">
		        			<button class="btn" type="clear">
				        		<i class="material-icons">clear_all</i>
				        		Clear Form
				        	</button>
		        		</div>
		        	</div>
		        </div>
		    </form>
	      </div>
	    </div>

	</div>
</div>
