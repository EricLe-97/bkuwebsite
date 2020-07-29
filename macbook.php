<?php

include "header.php"; 
include "navbar.php";
?>

<div class="products">
<div v-for="product in products" :key="product.id" class="product">
<img v-bind:src="product.path" class="product__image"/>


<div class="pretty p-icon p-round p-tada">
    <input type="checkbox"  value="like" @change="likecheck" />
    <div class="state p-primary-o">
        <i class="icon mdi mdi-heart" ></i>
        <label></label>
    </div>
</div>


<h3 class="product__header">{{ product.name }}  -  {{product.price}} VND</h3>
<div class="cart__buy">
<button @click="updateCart(product,'add')"> Add to Cart <i class="fa fa-cart-plus" aria-hidden="true"></i> </button>

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
      width:80%;
      height:50px;
      margin-left: 50px;
      margin-right: auto;
      opacity:0.5;
      transition: 1s;

    }
    .product button:hover {
      animation: pulse 1s;
      box-shadow: 0 0 0 2em rgba(#fff,0);
      opacity:1;
      
    }

      
</style>

<script>

const products = new Vue({
  
    el: '.products',
  
  
  data() {
    return {
      products: [],
      showCart: app.showCart,
      showModal: app.showModal,
      ipadd:'',
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
    },
    totalPrice() {
      return app.products.reduce(
        (total,product) => total + product.quantity*product.price,0
      )
    }
  },
    methods: {
      async updateCart(product, updateType) {   
        var dict={};   
        for (let i = 0; i < this.products.length; i++) {
          if (app.products[i].id === product.id) {
            if (updateType === 'subtract') {
              if (app.products[i].quantity !== 0) {
                app.products[i].quantity--;
              }
            } else {
              app.products[i].quantity++;
              if(localStorage.getItem('cartUser')){
                await localStorage.setItem('cartUser',JSON.stringify(app.products));
              }
              else{
                
                // console.log(this.products);
                await localStorage.setItem('cartTemp',JSON.stringify(app.products));
              }

            }
            break;
          }
        }
      },
      async fetchIp(){
        await axios.get('https://www.cloudflare.com/cdn-cgi/trace')
        .then(res => {
            let temp = res.data;
            let find = temp.indexOf('ip=');
            let findS = temp.indexOf('ts=');
            let ip = temp.slice(find+3,findS);
            this.ipadd = ip;
        })
        .catch(err => console.log(err));
        
      },
      likecheck(e){
        if(e.target.checked === true){
          if(this.ipadd ===''){
            this.fetchIp();
            // console.log(this.products);
            console.log(this.ipadd);
          }
          else{

            console.log(this.ipadd);
            alert('you had rated this products!');
          }
        }
       
      },

      
    },
    created(){
    axios.get('storagedata.json')
      .then(res => {
        // if(localStorage.getItem('cartTemp')){
        //   this.products = JSON.parse(localStorage.getItem('cartTemp'));
        // }  
        // else{
          console.log(res.data);
          this.products = res.data;
        // }        
      })
      .catch(err => console.log(err));
  }
  });
  
</script>




