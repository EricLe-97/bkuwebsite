
<nav class="navbar navbar-expand-lg navbar-light bg-light" data-spy="affix" data-offset-top="200">
    <div class="container text-center">
      <ul class="navbar-nav ">
          <li class="nav-item active uppercase">
              <a class="nav-link" href="index.php">Home</a>
          </li>  
          
          <li class="nav-item active dropdown ">
            <a class="nav-link dropdown-toggle test uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Laptop
            </a>
            <ul class="dropdown-menu">
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">Laptop <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="?page=product">Asus</a></li>
                  <li><a tabindex="-1" href="#">Acer</a></li>
                  <li><a tabindex="-1" href="#">Dell</a></li>
                  <li><a tabindex="-1" href="#">Mac</a></li>
                  <li><a tabindex="-1" href="#">Lenovo</a></li>
                </ul>  
              </li>
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">Accessories<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Mouse</a></li>
                  <li><a tabindex="-1" href="#">Key Board<i class="fa fa-keyboard-o"></i></a></li>
                  <li><a tabindex="-1" href="#">Pad</a></li>
                  <li><a tabindex="-1" href="#">Headset</a></li>
                  <li><a tabindex="-1" href="#">Gaming accessories</a></li>
                </ul>  
              </li>
            </ul>  
          </li>

          <li class="nav-item active dropdown ">
            <a class="nav-link dropdown-toggle test uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              FAQ
            </a>
            <ul class="dropdown-menu">
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">Laptop <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Refund</a></li>
                  <li><a tabindex="-1" href="#">Cancel Order</a></li>
                  <li><a tabindex="-1" href="#">Quaranty</a></li>
                  <li><a tabindex="-1" href="#">How to</a></li>
                  <li><a tabindex="-1" href="#">Helps</a></li>
                </ul>  
              </li>
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">Accessories <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Refund</a></li>
                  <li><a tabindex="-1" href="#">Cancel Order</a></li>
                  <li><a tabindex="-1" href="#">Quaranty</a></li>
                  <li><a tabindex="-1" href="#">How to</a></li>
                  <li><a tabindex="-1" href="#">Helps</a></li>
                </ul>  
              </li>
            </ul>  
          </li>

          <li class="nav-item active dropdown ">
            <a class="nav-link dropdown-toggle test uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Apple
            </a>
            <ul class="dropdown-menu">
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">Macbook <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">2016</a></li>
                  <li><a tabindex="-1" href="#">2017</a></li>
                  <li><a tabindex="-1" href="#">2018</a></li>
                  <li><a tabindex="-1" href="#">2019</a></li>
                  <li><a tabindex="-1" href="#">2020</a></li>
                </ul>  
              </li>
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">Iphone/Ipad <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Iphone </a></li>
                  <li><a tabindex="-1" href="#">Ipad</a></li>
                </ul>  
              </li>
              <li class="dropdown-submenu">
                <a class="test" tabindex="-1" href="#">Imac <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">2018 </a></li>
                  <li><a tabindex="-1" href="#">2019</a></li>
                  <li><a tabindex="-1" href="#">2020</a></li>

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
