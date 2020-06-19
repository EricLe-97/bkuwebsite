
<nav class="navbar navbar-expand-lg navbar-light bg-light" data-spy="affix" data-offset-top="200">
    <div class="container text-center">
      <ul class="navbar-nav ">
          <li class="nav-item active uppercase">
              <a class="nav-link" href="#">Home</a>
          </li>  
          
          <li class="nav-item active dropdown ">
            <a class="nav-link dropdown-toggle test uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Mens
            </a>
            <ul class="dropdown-menu">
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">Clothes <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="?page=product">Tops & T-Shirts</a></li>
                  <li><a tabindex="-1" href="#">Hoodies & Sweatshirts</a></li>
                  <li><a tabindex="-1" href="#">Jackets & Gilets</a></li>
                  <li><a tabindex="-1" href="#">Shorts</a></li>
                  <li><a tabindex="-1" href="#">Caps</a></li>
                </ul>  
              </li>
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">Shoes <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Life style</a></li>
                  <li><a tabindex="-1" href="#">Running</a></li>
                  <li><a tabindex="-1" href="#">Basketball</a></li>
                  <li><a tabindex="-1" href="#">Football</a></li>
                  <li><a tabindex="-1" href="#">Jordan</a></li>
                </ul>  
              </li>
            </ul>  
          </li>

          <li class="nav-item active dropdown ">
            <a class="nav-link dropdown-toggle test uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Womens
            </a>
            <ul class="dropdown-menu">
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">Clothes <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Tops & T-Shirts</a></li>
                  <li><a tabindex="-1" href="#">Hoodies & Sweatshirts</a></li>
                  <li><a tabindex="-1" href="#">Jackets & Gilets</a></li>
                  <li><a tabindex="-1" href="#">Shorts</a></li>
                  <li><a tabindex="-1" href="#">Caps</a></li>
                </ul>  
              </li>
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">Shoes <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Life style</a></li>
                  <li><a tabindex="-1" href="#">Running</a></li>
                  <li><a tabindex="-1" href="#">Basketball</a></li>
                  <li><a tabindex="-1" href="#">Football</a></li>
                  <li><a tabindex="-1" href="#">Jordan</a></li>
                </ul>  
              </li>
            </ul>  
          </li>

          <li class="nav-item active dropdown ">
            <a class="nav-link dropdown-toggle test uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Kids
            </a>
            <ul class="dropdown-menu">
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">Clothes <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Tops & T-Shirts</a></li>
                  <li><a tabindex="-1" href="#">Hoodies & Sweatshirts</a></li>
                  <li><a tabindex="-1" href="#">Jackets & Gilets</a></li>
                  <li><a tabindex="-1" href="#">Shorts</a></li>
                  <li><a tabindex="-1" href="#">Caps</a></li>
                </ul>  
              </li>
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">Shoes <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Life style</a></li>
                  <li><a tabindex="-1" href="#">Running</a></li>
                  <li><a tabindex="-1" href="#">Basketball</a></li>
                  <li><a tabindex="-1" href="#">Football</a></li>
                  <li><a tabindex="-1" href="#">Jordan</a></li>
                </ul>  
              </li>
            </ul>  
          </li>

          <li class="nav-item active uppercase">
              <a class="nav-link" href="?page=new-product">New Product</a>
          </li>  
      </ul>
    </div>
    <?php include "search-form.php" ?>
</nav>


  <style>

  .affix {
    top:0;
    width: 100%;
    z-index: 9 !important;
  }
  .navbar {
    margin-bottom: 0px;
    font-family: Nike TG,Helvetica Neue,Helvetica,Arial,sans-serif;
    font-weight: 400;
    letter-spacing: .5px;
  }
  .uppercase{
    text-transform: uppercase;
  }
  .dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}
.navbar-nav {
    width: 100%;
    text-align: center;
    padding: 0 300px;
    > li {
      float: none;
      display: inline-block;
    }
  }

  </style>

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>