<template>

<div class="container">
 <h1>Edit product</h1>
 <form >
  <div class="form-group">
    <label for="name1">Product Name</label>
    <input type="text" class="form-control" id="name1" placeholder="Enter product name" v-validate="'required'" name="name"
     v-model="products.name"
    >
  
  </div>
  <div class="form-group">
    <label for="quantity1">Quantity</label>
    <input type="number" class="form-control" id="quantity1" placeholder="Enter quantity"
     v-model="products.quantity"
    >
  </div>
  <div class="form-group">
    <label for="price1">Price $</label>
    <input type="number" class="form-control" id="price1" placeholder="Enter price"
     v-model="products.price"
    >
  </div>
  
  <button @click.prevent="updateform" type="submit" class="btn btn-primary">Update</button>
</form>
</div>    
</template>

<script>
export default {

    data:function(){
        return{
            products:[]
        }
    },
    created(){
       // console.log(this.$route.params.id)
       this.getData()
    },
    methods:{
        getData:function(){
            this.$http.get("http://localhost:8000/api/getItems/"+this.$route.params.id).then(function(data){
                console.log(data)
                this.products=data.body.items
            })
        },
        updateform:function(){
            this.$http.put("http://localhost:8000/api/editItem/"+this.$route.params.id,this.products).then(function(data){
                
                this.$router.push('/list')
            })
        }
    }
}
</script>