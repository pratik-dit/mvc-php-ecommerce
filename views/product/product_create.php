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
<h1 class="text-center"> Create Product </h1>
<div class="row" id="login">  
  <div class="col-md-10 mx-auto">
    <div class="card card-body">
      <form id="productForm" action="/product" method="post">
        <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">  
        <div class="form-group">
          <label for="form_need">Product Category</label>
          <select id="form_need" name="category_id" class="select form-control">
              <option value="" selected>Please select product category</option>
              <?php foreach ($categories as $category) { ?>
              <option value="<?php echo $category['id']?>"><?php echo $category['title']?></option>
              <?php } ?>
          </select>
        </div>
        <div class="form-group required">
          <lSabel for="title"> Title </lSabel>
          <input type="text" class="form-control" id="title" name="title" value="">  
        </div>
        <div class="form-group required">
          <lSabel for="price"> Price </lSabel>
          <input type="text" class="form-control" id="price" name="price" value="">  
        </div>
        <div class="form-group required">
          <lSabel for="title"> Inventory </lSabel>
          <input type="text" class="form-control" id="inventory" name="inventory" value="">  
        </div>
        <div class="form-group">
          <label for="form_need">Active</label>
          <select id="form_need" name="active" class="form-control">
              <option value="1" selected>Active</option>
              <option value="0">In-Active</option>
          </select>
        </div>
        <div class="form-group pt-1">  
          <button class="btn btn-primary btn-block" type="submit"> Create </button>  
        </div>
      </form>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
  $("#productForm").validate({

    rules: {
      title: {
        required: true,
      },

      active: {
        required: true,
      },

      category_id: {
        required: true,
      },

      price: {
        required: true,
        number: true
      },

      inventory: {
        required: true,
        number: true
      },
    },
    messages: {
      title: {
        required: "Please enter product name",
      },
      active: {
        required: "Please select status",
      },
      category_id: {
        required: "Please select product category",
      },
      price: {
        required: "Please enter valid price",
      },
      inventory: {
        required: "Please enter valid inventory",
      },
    },
  })
});
</script>