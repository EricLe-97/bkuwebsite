<?php include "header.php" ?>
<?php include "navbar.php" ?>


<div class="products">
<div v-for="product in products" :key="product.id" class="product">
<img v-bind:src="product.path" class="product__image"/>
<h3 class="product__header">{{ product.name }}</h3>
<div class="cart__buy">
<button @click="updateCart(product,'add')"> ADD to Cart </button>
<i class="fas fa-shopping-cart"></i>
</div>
</div>
</div>
<?php include "footer.php" ?>

<style>
    .products{
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    .product {
      border: 1px solid black;
      border-radius: 10px;
      padding: 5px;
      margin: 10px;
    }
    .product img{
      width:500px;
      height:500px;
    }
    .product button{
      background: black;
      border: 0;
      color: white;
      cursor: pointer;
      justify-content: center;

    }
    .product button:hover{
      background: white;
      border-radius:20px;
      color:black;
    }

      
</style>

<script>
const products = new Vue({
  
    el: '.products',
  
  
  data() {
    return {
      products: app.products,
      showCart: app.showCart
    };
  },
  
 
  computed: {
    cart() {
      return app.products.filter(product => product.quantity > 0);
    },
    totalQuantity() {
      return app.products.reduce(
        (total, product) => total + product.quantity,
        0
      );
    }
  },
    
   
    methods: {
      updateCart(product, updateType) {      
        for (let i = 0; i < this.products.length; i++) {
          if (app.products[i].id === product.id) {
            if (updateType === 'subtract') {
              if (app.products[i].quantity !== 0) {
                app.products[i].quantity--;
              }
            } else {
              app.products[i].quantity++;
            }
            break;
          }
        }
      }
    }
  });
  
</script>




