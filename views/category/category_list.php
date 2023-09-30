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
<h1 class="text-center"> Categories </h1>
<div class="row" id="login">  
  <div class="col-md-10 mx-auto">
    <div class="card card-body">
      <table class="table">
        <thead class="black white-text">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categories as $category) { ?>
          <tr>
            <th scope="row"><?php echo $category['id']?></th>
            <td><?php echo $category['title']?></td>
            <td><?php echo $category['slug']?></td>
            <td><span class="badge <?php echo $category['active'] == 1 ? 'badge-primary' : 'badge-danger'; ?>"><?php echo $category['active'] ? 'Active' : 'In-Active';?></span></td>
            <td>
              <a href="/category/<?php echo $category['slug']; ?>">
                <span class="badge badge-primary">Edit</span>
              </a>
              <a href="/category/delete/<?php echo $category['id']; ?>">
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