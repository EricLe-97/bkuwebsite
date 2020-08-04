
<?php if (isset($_SESSION['username'])){ ?>
  <?php if ((isset($_SESSION['fb_username']))||isset($_SESSION['gg_username'])) {?>
      <html>
      <div class="header">
        <a class="logo" style="margin:5px;" href="index.php"><img src="image/logobk.png" width="80px" height="80px" ></a>
        <div class="header-right">
          <strong style="font-size:20px; padding:15px;"><?php if(isset($_SESSION['fb_username'])){echo fb_username;}else{echo gg_username;}; ?> </strong>
          <button class="btn btn-info"><a href="?page=insert-form">INSERT</a></button>
          <button class="btn btn-warning"><a href="?page=logout">LOGOUT</a></button>
        </div>
        <div class="app">
        <nav class="nav" >
        <div class="nav__cart" >
        <button @mouseover="showCart = !showCart" @mouseleave="showCart = !showCart" @click="showModal = true">
        <img src="image/icon/trolley.png" style="width:50px;height:50px"/>
        </button>
        <modal v-if="showModal" @close="showModal = false" v-for="product in cart" :key="product.id" v-bind:product="product" >
        <h3 slot="header">Your total order</h3>
        <div slot="body" class="nav__cart__modal" v-for="product in cart" :key="product.id">
        <img v-bind:src="product.path" style="width:100px;height:100px"/>{{product.name}}
        <button style="margin-left:250px" @click="app.removeItem(product)"> X </button>
        <div style="box-sizing:boder ">
        
        <button @click="app.updateCart(product,'subtract')"><i class="fa fa-minus" aria-hidden="true"></i></button>
        <span style="border-radius:5px;border:1px solid black;text-align:center;font-weight:bold;padding:0 50px;"> {{product.quantity}}</span>
        <button @click="app.updateCart(product,'add')"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
        </div>
        <div slot="body-total"><h4> TOTAL - {{totalPrice}}  </h4>
        </div>
        <div slot="footer">
        <form method="POST" action="?page=checkout" @click="">
        <input type="submit" name="checkout" value="checkout">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        </form>
        </div>
        </modal>
        <modal v-if="showModal && totalQuantity === 0" @close="showModal = false" v-bind:product="'Empty'">
          <h3 slot="header"> Empty Cart </h3>
          <div slot="body"> <p></p></div> 
          <div slot="modal-body"> <p></p></div>          
        </modal>
        <span class="total-quantity">{{ totalQuantity }}</span>
        <transition name="dropdown">
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
        </transition>
        </div>
    </nav>
</div>
</div>    
</html>
    <?php } else {      ?>

    <html>
      <div class="header">
        <a class="logo" style="margin:5px;" href="index.php"><img src="image/logobk.png" width="80px" height="80px" ></a>
        <div id="logout">
        <div class="header-right">
          <strong style="font-size:20px; padding:15px;"><?php echo $_SESSION['username']; ?> </strong>
          <button class="btn btn-warning" @click="logout()" ><a href="###" >LOGOUT</a></button>
        </div>
        </div>
        <div class="app">
        <nav class="nav" >
        <div class="nav__cart" >
        <button @mouseover="showCart = !showCart" @mouseleave="showCart = !showCart" @click="showModal = true">
        <img src="image/icon/trolley.png" style="width:50px;height:50px"/>
        </button>
        <modal v-if="showModal" @close="showModal = false" v-for="product in cart" :key="product.id" v-bind:product="product" >
        <h3 slot="header">Your total order</h3>
        <div slot="body" class="nav__cart__modal" v-for="product in cart" :key="product.id">
        <img v-bind:src="product.path" style="width:100px;height:100px"/>{{product.name}}
        <button style="margin-left:250px" @click="app.removeItem(product)"> X </button>
        <div style="box-sizing:boder ">
        
        <button @click="app.updateCart(product,'subtract')"><i class="fa fa-minus" aria-hidden="true"></i></button>
        <span style="border-radius:5px;border:1px solid black;text-align:center;font-weight:bold;padding:0 50px;"> {{product.quantity}}</span>
        <button @click="app.updateCart(product,'add')"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
        </div>
        <div slot="body-total"><h4> TOTAL - {{totalPrice}}  </h4>
        </div>
        <div slot="footer">
        <form method="POST" action="?page=checkout" @click="">
        <input type="submit" name="checkout" value="checkout">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        </form>
        </div>
        </modal>
        <modal v-if="showModal && totalQuantity === 0" @close="showModal = false" v-bind:product="'Empty'">
          <h3 slot="header"> Empty Cart </h3>
          <div slot="body"> <p></p></div> 
          <div slot="modal-body"> <p></p></div>          
        </modal>
        <span class="total-quantity">{{ totalQuantity }}</span>
        <transition name="dropdown">
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
        </transition>
        </div>
    </nav>
</div>
</div>    
</html>
    <?php } ?>
    
<?php    } else { 
  ?>

  
  <html>
    <div class="header">
        <a class="logo" style="margin:5px;" href="index.php"><img src="image/logobk.png" width="80px" height="80px" ></a>

        <div class="header-right">
          <button class="btn btn-info"><a href="?page=register-form">Register</a></button>
          <button class="btn btn-warning"><a href="?page=login-form">Login</a></button>
        </div>

        <div class="app">
        <nav class="nav" >
        <div class="nav__cart" >
        <button @mouseover="showCart = !showCart" @mouseleave="showCart = !showCart" @click="showModal = true">
        <img src="image/icon/trolley.png" style="width:50px;height:50px"/>
        </button>
        <modal v-if="showModal" @close="showModal = false" v-for="product in cart" :key="product.id" v-bind:product="product" >
        <h3 slot="header">Your total order</h3>
        <div slot="body" class="nav__cart__modal" v-for="product in cart" :key="product.id">
        <img v-bind:src="product.path" style="width:100px;height:100px"/>{{product.name}}
        <button style="margin-left:250px" @click="app.removeItem(product)"> X </button>
        <div style="box-sizing:boder ">
        
        <button @click="app.updateCart(product,'subtract')"><i class="fa fa-minus" aria-hidden="true"></i></button>
        <span style="border-radius:5px;border:1px solid black;text-align:center;font-weight:bold;padding:0 50px;"> {{product.quantity}}</span>
        <button @click="app.updateCart(product,'add')"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
        </div>
        <div slot="body-total"><h4> TOTAL - {{totalPrice}}  </h4>
        </div>
        <div slot="footer">
        <form method="POST" action="?page=checkout" @click="">
        <input type="submit" name="checkout" value="checkout">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        </form>
        </div>
        </modal>
        <modal v-if="showModal && totalQuantity === 0" @close="showModal = false" v-bind:product="'Empty'">
          <h3 slot="header"> Empty Cart </h3>
          <div slot="body"> <p></p></div> 
          <div slot="modal-body"> <p></p></div>          
        </modal>
        <span class="total-quantity">{{ totalQuantity }}</span>
        <transition name="dropdown">
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
        </transition>
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
  border:1px solid black;
  position: fixed;
  z-index:1;
  border-radius: 5px;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(144,144,144,.2);
  transition: all .5s;
  background: inherit;
}
.nav .nav__cart .nav__cart__modal button{
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  border: 2px solid black;
  opacity:50%;
  transition: 0.5s ;
}
.nav .nav__cart .nav__cart__modal button:hover{
  background-color: black;
  text:white;
}
.nav .nav__cart .cart-dropdown .cart-dropdown__list{
  list-style: none;
}
.cart {
  margin-top: 2rem;
  text-align: center;
}
.modal-mask {
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  z-index: 2;
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 500px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
  z-index:9998;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}
.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
.dropdown-enter,
.dropdown-leave-to {
  transform: scaleY(0.7);
  opacity: 0;
}
 
.dropdown-enter-to,
.dropdown-leave {
  opacity: 1;
  transform: scaleY(1);
}
 
.dropdown-enter-active,
.dropdown-leave-active {
  transition: all 0.3s ease-out;
  transform-origin: top center;
}
</style>

<script>

const app = new Vue({
  
    el: '.app',
  
  data() {
    return {
      products: [],
      showCart: false,
      showModal: false,
      cartTemp: [],
    };
  },
  components:{
    'modal':{
      props:['product'],
      template:'#modal-template',
    }
  },
  computed: {
    cart() {
      return this.products.filter(product => product.quantity > 0);
    },
    totalQuantity() {
      let temp = this.products.reduce(
        (total, product) => total + product.quantity,0
      );
      return temp;
    },
    totalPrice(){
      let temp = this.products.reduce(
        (total,product) => total + product.quantity*product.price,0
      );
      return temp;
    }
  },
    
    methods: {
      async updateCart(product, updateType) {      
        var dict=[];
        for (let i = 0; i < this.products.length; i++) {
          if (this.products[i].id === product.id) {
            if (updateType === 'subtract') {
              if (this.products[i].quantity !== 0) {
                this.products[i].quantity--;
                if(localStorage.getItem('cartUser')){
                  await localStorage.setItem('cartUser',JSON.stringify(this.products));
                }
                else{
                  await localStorage.setItem('cartTemp',JSON.stringify(this.products));
                }
              }
            } else {
              this.products[i].quantity++;
              if(localStorage.getItem('cartUser')){
                await localStorage.setItem('cartUser',JSON.stringify(this.products));
              }
              else{
                await localStorage.setItem('cartTemp',JSON.stringify(this.products));
                console.log(localStorage.getItem('cartTemp'));

              }
            }
            break;
          }
        }
      },
      async removeItem(product){
        let temp = this.products.filter(x => x.quantity > 0 && x.id === product.id);
        temp.forEach((x) => x.quantity=0);
        if(localStorage.getItem('cartUser')){
          await localStorage.setItem('cartUser',JSON.stringify(this.products));
        }
        else{
          await localStorage.setItem('cartTemp',JSON.stringify(this.products));
        }
      },
    },
    created(){
    axios.post('checkLogin.php')
      .then(res => {
        
        if(res.data === ''){
          axios.get('storagedata.json')
          .then(res => {
          if(localStorage.getItem('cartTemp')){
            this.products = JSON.parse(localStorage.getItem('cartTemp'));
            // console.log('hello');
            }  
          else{
            this.products = res.data;
            console.log(this.products);

          }        
          })
          .catch(err => console.log(err));
        }
        else{
          
         

          let data = [];
          let find = res.data.indexOf(';');
          do{
              data.push(res.data.slice(0,find));
              res.data = res.data.slice(find+1);
              find = res.data.indexOf(';');
              if(find == -1){
                  data.push(res.data.slice(0));
              }
          }while(find != -1);



          axios.post('fetchorder.php',{
            username: data[0],
            email: data[1],
            phonenumber: data[2]
          })
            .then(res => {
              if(localStorage.getItem('cartUser')){
                this.products = JSON.parse(localStorage.getItem('cartUser'));
              }
              else if(res.data != ''){

                this.products = res.data;
                localStorage.setItem('cartUser',JSON.stringify(this.products));
              }
              else {

                axios.get('storagedata.json')
                .then(res => {
                  this.products = res.data;
                  localStorage.setItem('cartUser',JSON.stringify(this.products));

                })
                .catch(err => console.log(err));
              }
            })
            .catch(err => console.log(err));
        }
      })
      .catch(err => console.log(err));
    },
  });

  const logout = new Vue({
    el:'#logout',

    methods:{
      logout(){

        console.log('logout');
        let cartuser = JSON.parse(localStorage.getItem('cartUser'));
        cartuser = JSON.stringify(cartuser);
        axios.post('checkLogin.php')
        .then(res => {
          let data = [];
          let find = res.data.indexOf(';');
          do{
              data.push(res.data.slice(0,find));
              res.data = res.data.slice(find+1);
              find = res.data.indexOf(';');
              if(find == -1){
                  data.push(res.data.slice(0));
              }
          }while(find != -1);
          // [0]:username
          // [1]:email
          // [2]:phonenumber
          // console.log(data);
          axios.post('fetchorder.php',{
          updatecart: cartuser,
          uname: data[0],
          email:data[1],
          phonenumber: data[2]
          })
          .then(res => {
            console.log(res.data);
            if(res.data == '') {
              
              localStorage.removeItem('cartUser');
            }
            })
          .catch(err => console.log());
        })
        .catch(err=>console.log(err));
          }
    },
  });
</script>
<script type="text/x-template" id="modal-template">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper"@click="$emit('close')" >
            <div class="modal-container">

              <div class="modal-header">
                <slot name="header" >
                  default header 
                </slot>
              </div>
              <div class="modal-body">
                <slot name="body">
                  default body
                </slot>
                <slot name="body-total">
                  empty
                </slot>
              </div>
              <div class="modal-footer" >
                <slot name="footer" >
                  <button name="footer-button" class="modal-default-button" @click="$emit('close')">
                    Ok
                  </button>
                </slot>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </script>
  
          
    