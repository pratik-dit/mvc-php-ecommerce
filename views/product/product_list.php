<?php
use thecodeholic\phpmvc\form\Form;
?>
<?php 
  if (isset($status) && $status === 200): 
   require_once __DIR__ . '/../../views/success_message.php';
  endif;
  if (isset($status) && $status === 400):
   require_once __DIR__ . '/../../views/error_message.php';
  endif; 
?>
<h1 class="text-center"> Products </h1>
<div class="row" id="login">
  <div class="col-md-5">
    <div class="form-group">
      <label for="form_need">Filter by Product Category</label>
      <select id="category" name="category_id" class="select form-control">
          <option value="" selected>Please select product category</option>
          <?php foreach ($categories as $category) { ?>
          <option value="<?php echo $category['id']?>"><?php echo $category['title']?></option>
          <?php } ?>
      </select>
    </div>
  </div>
  <div class="col-md-5 mx-auto pt-4">
    <div class="form-group">
      <label for="form_need">&nbsp;</label>
      <button type="button" id="reset-btn" class="btn btn-primary mb-2">Reset Filter</button>
    </div>
  </div>  
  <div class="col-md-12 mx-auto">
    <div class="card card-body">
      <table class="table">
        <thead class="black white-text">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Inventory</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product) { ?>
          <tr>
            <th scope="row"><?php echo $product['id']?></th>
            <td><?php echo $product['title']?></td>
            <td><?php echo $product['slug']?></td>
            <td><?php echo $product['category_name']?></td>
            <td><?php echo $product['price']?></td>
            <td><?php echo $product['inventory']?></td>
            <td><span class="badge <?php echo $product['active'] == 1 ? 'badge-primary' : 'badge-danger'; ?>"><?php echo $product['active'] ? 'Active' : 'In-Active';?></span></td>
            <td>
              <a href="/product/<?php echo $product['slug']; ?>">
                <span class="badge badge-primary">Edit</span>
              </a>
              <a href="/product/delete/<?php echo $product['id']; ?>">
                <span class="badge badge-danger">Delete</span>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
  $("#category").change(function(){
    var category_id = $(this).val();
    window.location.href = "/product?category_id="+category_id;
  });
  $("#reset-btn").click(function(){
    window.location.href = "/product";
  });
});
</script>