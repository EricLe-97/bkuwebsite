
<?php if (isset($_SESSION['name'])){ ?>
  <?php if ($_SESSION['level'] > 0) {?>
      <html>
      <div class="header">
        <a class="logo" style="margin:5px;" href="?page=home"><img src="image/logo.png" width="80px" height="80px" ></a>
        <div class="header-right">
          <strong style="font-size:20px; padding:15px;"><?php echo $_SESSION['name']; ?> </strong>
          <button class="btn btn-info"><a href="?page=insert-form">INSERT</a></button>
          <button class="btn btn-warning"><a href="?page=logout">LOGOUT</a></button>
        </div>
      </div>
    </html>
    <?php } else {?>

    <html>
      <div class="header">
        <a class="logo" style="margin:5px;" href="?page=home"><img src="image/logo.png" width="80px" height="80px" ></a>
        <div class="header-right">
          <strong style="font-size:20px; padding:15px;"><?php echo $_SESSION['name']; ?> </strong>
          <button class="btn btn-warning"><a href="?page=logout">LOGOUT</a></button>
        </div>
      </div>
    </html>
    <?php } ?>
    
<?php    } else { ?>
  <html>
    <div class="header">
        <a class="logo" style="margin:5px;" href="?page=home"><img src="image/logo.png" width="80px" height="80px" ></a>

        <div class="header-right">
          <button class="btn btn-info"><a href="?page=register-form">Register</a></button>
          <button class="btn btn-warning"><a href="?page=login-form">Login</a></button>
        </div>

        <div class="app">
        <nav class="nav" >
        <div class="nav__cart" >
        <button @mouseover="showCart = !showCart" @mouseleave="showCart = !showCart">
        <img src="image/icon/trolley.png" style="width:50px;height:50px"/>
        </button>
        <span class="total-quantity">{{ totalQuantity }}</span>

        <div v-if="showCart" class="cart-dropdown">
            <ul class="cart-dropdown__list">
            <li
                v-for="product in cart"
                :key="product.id"
            >
                <img v-bind:src="product.path" style="width:50px;height:50px"/> {{ product.name }} ({{ product.quantity }})
            </li>
            </ul>
        </div>
        </div>
    </nav>
</div>
</div>    
</html>
<?php } ?>

<style>
    * {
  box-sizing: border-box;
  font-weight: normal;
  margin: 0;
  padding: 0;
}

html {
  font-size: 10px;
}
.nav {
  float:right;
}
.nav .nav__cart{
  top: 20px;
  position:relative;
}
.nav .nav__cart button  {
  background-color:Transparent;
  background-repeat:no-repeat;
  border: none;
  cursor:pointer;
  overflow: hidden;
  outline:none;
}
.nav .nav__cart .total-quantity {
      border:none;
      align-items: center;
      background: lightblue;
      border-radius: 50%;
      display: flex;
      font-weight: bold;
      height: 2rem;
      justify-content: center;
      padding: 0.5rem;
      position: absolute;
      right: -10px;
      top: -10px;
      width: 2rem;
}
.nav .nav__cart .cart-dropdown {
  background:white;
  border:1px solid black;
  position: fixed;
  z-index:1;
  border-radius: 5px;
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
}
.nav .nav__cart .cart-dropdown .cart-dropdown__list{
  list-style: none;
}
.cart {
  margin-top: 2rem;
  text-align: center;
}


</style>

<script>

const app = new Vue({
  
    el: '.app',
  data() {
    return {
      products: [
        {
          id: 1,
          name: 'Product 1',
          description: 'This is an incredibly awesome product',
          quantity: 0,
          path: 'image/new1.JPG',
        },
        {
          id: 2,
          name: 'Product 2',
          description: 'This is an incredibly awesome product',
          quantity: 0,
          path: 'image/new2.JPG',
        },
        {
          id: 3,
          name: 'Product 3',
          description: 'This is an incredibly awesome product',
          quantity: 0,
          path: 'image/new3.JPG',
        }
      ],
      showCart: false
    };
  },
  
 
  computed: {
    cart() {
      return this.products.filter(product => product.quantity > 0);
    },
    totalQuantity() {
      return this.products.reduce(
        (total, product) => total + product.quantity,
        0
      );
    }
  },
    
   
    methods: {
      updateCart(product, updateType) {      
        for (let i = 0; i < this.products.length; i++) {
          if (this.products[i].id === product.id) {
            if (updateType === 'subtract') {
              if (this.products[i].quantity !== 0) {
                this.products[i].quantity--;
              }
            } else {
              this.products[i].quantity++;
            }
            break;
          }
        }
      }
    }
  });
  
</script>

  
          
    