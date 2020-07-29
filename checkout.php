<?php 
    // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
    // include "include.php";
    include "header.php";
    include "navbar.php";


    
    if(isset($_SESSION['name'])){ ?>
        <!-- -->
<?php } else { ?>
        <!--  -->
        <div id="checkout">
            <table style="width:100%">
                <tr>
                    <th style="width:50%">
                        <h1>
                            INFORMATION
                        </h1>
                    </th>
                    <th>
                        <h1>
                            PAYMENT METHOD
                        </h1>
                    </th>
                    <th style="width:30%">
                        <h1 >
                            ORDER
                        </h1>
                    </th>
                </tr>
                <!--  -->
                <tr>
                    <td>
                        <div id="order">
                            <form method="POST" action="order.php">
                                <h3>Username</h3> <br> <input type="text" placeholder="username" name="username" v-model="username" required> <br>
                                <h3>Email</h3> <br> <input type="text" placeholder="email" v-model="email" name="email" required> <br>
                                <h3>Address</h3> <br> <input type="text" placeholder="address" name="address" v-model="address" required > <br>
                                <h3>Phone Number</h3> <br> <input type="number" placeholder="phone number" v-model="phone" name="phone" required> <br>
                                <input type="submit" name="order" value="order" v-on:click="onSubmit">
                            </form>
                        </div>
                    </td>
                    <td>
                        PAYMENT
                        <div id="payment">
                            <div class="pretty p-default p-curve p-thick p-smooth">
                            <input type="checkbox" id="atm" value="atm" v-model.lazy="paymentMethod" @change="uniquecheck" />
                            <div class="state p-danger-o">
                                <label>ATM</label>
                            </div>
                            </div>
                            <div class="pretty p-default p-curve p-thick p-smooth">
                            <input type="checkbox" id="cash" value="cash" v-model.lazy="paymentMethod" @change="uniquecheck" />
                            <div class="state p-danger-o">
                                <label>CASH ON DELIVERY</label>
                            </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        PRODUCT CART
                        <div id="checkoutProducts">
                            <div v-for="product in products" v-if="product.quantity > 0" v-bind:key="product.id">
                                <img v-bind:src="product.path" alt="product">
                                <button @click="app.updateCart(product,'subtract')"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                <span style="border-radius:5px;border:1px solid black;text-align:center;font-weight:bold;padding:0 50px;"> {{product.quantity}}</span>
                                <button @click="app.updateCart(product,'add')"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                <button style="margin-left:250px" @click="app.removeItem(product)"> X </button>
                                
                                <br>
                            </div>
                            <h1>{{totalPrice}} - VND</h1> 
                        </div>
                    </td>
                </tr>
            </table>
        </div>    
<?php } ?>


<style>

#checkout th {
    border-radius:5px;
    border:1px solid black;
    justify-content: center;
    text-align:center;    
}

#checkout input{
    width:100%;
    height:50px;
}

#checkoutProducts img{
    width:auto;
    height:150px;
}

#checkoutProducts button{
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    border: 2px solid black;
    opacity:50%;
    transition: 0.5s ;
}
#checkoutProducts button:hover{
    background-color: black;
    text:white;
}
</style>


<script>
    var order = new Vue({
        el:"#order",
        data(){
            return {
                username:'',
                email:'',
                phone:'',
                address:'',
                products:[],
                paymentMethod:[],
            }
        },
        methods:{
            async onSubmit(e){
                e.preventDefault();
                let key="BKU-"+uuidv4();
                if(this.paymentMethod.length === 0 ){
                    alert("Please select Payment method");
                }
                else if(this.username === ''||this.email === ''||this.phone === ''||this.address === '') {
                    alert("Please fill in the required field !");
                }
                else {
                    Email.send({
                    Host : "smtp.elasticemail.com",
                    Username : "thanhbale1812@gmail.com",
                    Password : "E4A977FEAA615D68133DA7856701484D8390",
                    To : this.email,
                    From : "thanhbale1812@gmail.com",
                    Subject : "[Orderkey]",
                    Body : key
                    })
                    .then(
                    );  


                    await axios.post('order.php',{
                        username:this.username,
                        email:this.email,
                        phone:this.phone,
                        address:this.address,
                        products:JSON.stringify(this.products),
                        payment:JSON.stringify(this.paymentMethod),
                        key: key
                    })
                    .then(res => 
                        console.log(res.data)
                    )
                    .catch(err => console.log(err));


                    // window.location.replace('index.php');

                }
            },
            
            
        },
        async created(){
            await axios.get('checkLogin.php',{})
                .then(res=>{
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
                    this.username = data[0];
                    this.email = data[1];
                    this.phone = data[2];
                })  
                .catch(err=>{
                    console.log(err);
                })

        }
    })
    var payment = new Vue ({
        el:'#payment',
        data(){
            return {
                paymentMethod:[],
                products:[],
            }
        },
        watch:{
            paymentMethod(newValue,oldValue){
                checkoutProducts.paymentMethod = this.paymentMethod;
                order.paymentMethod = this.paymentMethod;
            }
        },
        methods:{
            uniquecheck(e){
                this.paymentMethod = [];
                if(e.target.checked != false) {
                    this.paymentMethod.push(e.target.value);
                }
                if(this.paymentMethod.length===0 || e.target.checked == false){
                    this.paymentMethod.push('cash');
                    e.target.checked = true;
                }
            }
        },

    });
    var checkoutProducts = new Vue({
        el:'#checkoutProducts',
        data() {
            return {
                products:[],
                cartTemp:[],
                paymentMethod:[],
                showCart:false,
                showModal:false,
            };
        },
        computed:{
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
        method: {
            async updateCart(product, updateType) {      
                var dict=[];
                for (let i = 0; i < this.products.length; i++) {
                if (this.products[i].id === product.id) {
                    if (updateType === 'subtract') {
                    if (app.products[i].quantity !== 0) {
                        app.products[i].quantity--;
                        if(localStorage.getItem('cartUser')){
                            await localStorage.setItem('cartUser',JSON.stringify(app.products));
                        }
                        else{
                        
                        // console.log(this.products);
                            await localStorage.setItem('cartTemp',JSON.stringify(app.products));
                        }
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
        // created(){
        // axios.get('assets/storagedata.js')
        //     .then(res => {
        //     if(localStorage.getItem('cartTemp')){
        //     this.products = JSON.parse(localStorage.getItem('cartTemp'));
        // }  
        // else{
        //   this.products = res.data;
        // }        
        // })
        // .catch(err => console.log(err));
        // },
        // beforeUpdate(){
        //     this.products = JSON.parse(localStorage.getItem('cartTemp'));
        //     order.products = this.products;

        // }
        created(){
        axios.get('assets/storagedata.js')
            .then(res => {
            if(localStorage.getItem('cartUser')){
                this.products = JSON.parse(localStorage.getItem('cartUser'));
            }  
            else if(localStorage.getItem('cartTemp')){
                this.products = JSON.parse(localStorage.getItem('cartTemp'));
            } 
            else{
                this.products = res.data;
            }       
        })
        .catch(err => console.log(err));
        },
        beforeUpdate(){
            if(localStorage.getItem('cartUser')){
                this.products = JSON.parse(localStorage.getItem('cartUser'));
            }  
            else if(localStorage.getItem('cartTemp')){
                this.products = JSON.parse(localStorage.getItem('cartTemp'));
            } 
            order.products = this.products;

        }
    });     
</script>

