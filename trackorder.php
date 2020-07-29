<?php 
    include "include.php";
?>
<html>
    <div id="search">
        <input type="text" v-model="search">
        <h3> {{message}} </h3>
        <h3> {{status}} </h3>
        <div v-if="products.length>0" v-for="product in products" v-bind:key="product.id">
        <img style="width:300px;height:300px" v-bind:src="product.path" alt="product">
        <span style="border-radius:5px;border:1px solid black;text-align:center;font-weight:bold;padding:0 50px;"> {{product.quantity}}</span>
        </div>
    </div>
</html>

<script>
    new Vue({
        el:'#search',
        data() {
            return {
                products:[],
                search:'',
                message:'Input to search your order history',
                status:''
            }
        },
        watch:{
            search(newText,oldText){
                this.message = 'Searching .......';
                this.products = [];
                this.fetchdata();
                if(newText==''&&this.products.length==0){
                    this.message = 'Thank you !';
                    this.status = '';
                }
                if(oldText!=''&&this.products.length!=0){
                    this.message = 'Founded here is your previously order!';
                }
            }
        },
        methods:{
            async fetchdata(){
                await axios.post('fetchorder.php',{
                    key:this.search,
                })
                .then(res=>{
                    if(res.data!='404'){
                        let find = res.data.indexOf(";");
                        this.status = res.data.slice(find+1);
                        this.products = JSON.parse(res.data.slice(0,find));
                    }
                })
                .catch(err=>{
                    console.log(err);
                });
            }
        }
    });

</script>