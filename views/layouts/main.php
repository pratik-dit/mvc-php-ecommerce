<!doctype html>
<html lang="en">
  <head>
    <title>E-commerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery.min.js"></script>
  </head>
  <body>
    <?php use thecodeholic\phpmvc\Application; ?>
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
        <div class="p-4 pt-5">
          <h3><a href="/" class="logo">FatherShops</a></h3>
          <ul class="list-unstyled components mb-5">
            <?php if (Application::isGuest()): ?>
            <li>
              <a href="/login">Login</a>
            </li>
            <?php else: ?>
            <li class="active">
              <a href="#categorySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Category</a>
              <ul class="collapse list-unstyled" id="categorySubmenu">
                <li>
                  <a href="/category">List</a>
                </li>
                <li>
                  <a href="/category/create">Create</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#productSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Product</a>
              <ul class="collapse list-unstyled" id="productSubmenu">
                <li>
                  <a href="/product">List</a>
                </li>
                <li>
                  <a href="/product/create">Create</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="/logout">Sign Out</a>
            </li>
            <?php endif; ?>
          </ul>
          <div class="footer">
            <p>
              Copyright &copy;<script>document.write(new Date().getFullYear());</script>
            </p>
          </div>
        </div>
      </nav>
      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        {{content}}
      </div>
    </div>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  </body>
</html>