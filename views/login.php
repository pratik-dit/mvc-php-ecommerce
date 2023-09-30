<?php
use thecodeholic\phpmvc\form\Form;
?>
<?php 
  if (isset($status) && $status === 200): 
   require_once __DIR__ . '/../views/success_message.php';
  endif;
  if (isset($status) && $status === 400):
   require_once __DIR__ . '/../views/error_message.php';
  endif; 
?>  
<div class="pt-5">
  <h1 class="text-center"> Login </h1>
  <div class="row" id="login">  
    <div class="col-md-5 mx-auto">
    <img class="card-img-top" src="/images/logo.png" alt="Card image" style="background-color: black;">
      <div class="card card-body">
        <form id="loginForm" action="/login" method="post">
          <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">  
          <div class="form-group required">
            <lSabel for="email"> Email </lSabel>
            <input type="text" class="form-control text-lowercase" id="email" name="email" value="">  
          </div>
          <div class="form-group required">  
            <label class="d-flex flex-row align-items-center" for="password"> Password    </label>  
            <input type="password" class="form-control" id="password" name="password" value="">  
          </div>
          <div class="form-group pt-1">  
            <button class="btn btn-primary btn-block" type="submit"> Log In </button>  
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {

  $("#loginForm").validate({

    rules: {
      email: {
        required: true,
        email: true,
      },

      password: {
        required: true,
      },
    },
    messages: {
      email: {
        required: "Please enter valid email",
      },
      password: {
        required: "Please enter password",
      },
    },
  })
});
</script>