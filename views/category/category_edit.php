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
<h1 class="text-center"> Edit Category - <?php echo $category->title;?> </h1>
<div class="row" id="login">  
  <div class="col-md-10 mx-auto">
    <div class="card card-body">
      <form id="categoryForm" action="/category/<?php echo $category->id;?>" method="post">
        <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">
        <input type="hidden" name="id" value="<?php echo $category->id;?>">
        <input type="hidden" name="old_slug" value="<?php echo $category->slug;?>">  
        <div class="form-group">
          <label for="form_need">Parent Category</label>
          <select id="form_need" name="parent_id" class="form-control">
              <option value="0" selected>Select Parent Category if any</option>
              <?php foreach ($categories as $cat) { ?>
              <option value="<?php echo $cat['id']?>" <?php echo ($category->parent_id == $cat['id']) ? 'selected' : '';?>><?php echo $cat['title']?></option>
              <?php } ?>
          </select>
        </div>
        <div class="form-group required">
          <lSabel for="title"> Title </lSabel>
          <input type="text" class="form-control" id="title" name="title" value="<?php echo $category->title;?>">  
        </div>
        <div class="form-group">
          <label for="form_need">Active</label>
          <select id="form_need" name="active" class="form-control">
              <option value="1" <?php echo ($category->active == 1) ? 'selected' : '';?>>Active</option>
              <option value="0" <?php echo ($category->active == 0) ? 'selected' : '';?>>In-Active</option>
          </select>
        </div>
        <div class="form-group pt-1">  
          <button class="btn btn-primary btn-block" type="submit"> Edit </button>  
        </div>
      </form>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {

  $("#categoryForm").validate({

    rules: {
      title: {
        required: true,
      },

      active: {
        required: true,
      },
    },
    messages: {
      title: {
        required: "Please enter category name",
      },
      active: {
        required: "Please select status",
      },
    },
  })
});
</script>