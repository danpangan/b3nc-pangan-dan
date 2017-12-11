<?php
  
  $products = new Products();

?>



<div class="container">
  <h3>Product Maintenance</h3>
  <div class="row">
    <div class="col s12">
      <button class="btn" type="button" onclick="window.location='?page=add-product'">
        <i class="material-icons">playlist_add</i>
        Add Product
      </button>
      <br>
      <table class="table table-bordered table-hover footable" style="margin-top: 10px;">
        <thead>
          <tr>
            <th class="col s12">Name</th>
            <th class="center" data-breakpoints="xs sm">Stocks</th>
            <th class="center" data-breakpoints="xs sm">Price</th>
            <th class="center" data-breakpoints="xs sm">Pending Orders</th>
            <th class="center" data-breakpoints="xs sm">Sold Items</th>
            <th></th>

          </tr>
        </thead>
        <tbody>

<?php
  foreach ($products->data() as $product) {   
?>

          <tr>
            <td><?php echo $product->vProductName; ?></td>
            <td class="center"><?php echo $product->iProductQuantity; ?></td>
            <td class="center"><?php echo $product->dPrice; ?></td>
            <td></td>
            <td></td>
            <td class="center">
              <a class="" href="" title="Edit"><i class="material-icons">edit</i></a>
              <a class="" href="" title="Delete"><i class="material-icons">delete</i></a>
            </td>
          </tr>

<?php
  }
?>
        </tbody>
      </table>
    </div>
  </div>
</div>