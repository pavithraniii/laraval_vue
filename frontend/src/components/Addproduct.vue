<template>

<div class="container">
 <h1>Add product</h1>
 <form >
  <div class="form-group">
    <label for="name1">Product Name</label>
    <input type="text" class="form-control" id="name1" placeholder="Enter product name" v-validate="'required'" name="name"
    v-model="item.name"
    >
  
  </div>
  <div class="form-group">
    <label for="quantity1">Quantity</label>
    <input type="number" class="form-control" id="quantity1" placeholder="Enter quantity"
     v-model="item.quantity"
    >
  </div>
  <div class="form-group">
    <label for="price1">Price $</label>
    <input type="number" class="form-control" id="price1" placeholder="Enter price"
     v-model="item.price"
    >
  </div>
  <!-- <div class="form-group">
    <label for="picture1">picture</label>
    <input type="file" class="form-control" id="picture1" 
    @change="getImage($event)"
    >
  </div> -->
  
  <button @click.prevent="submitform" type="submit" class="btn btn-primary">Add to the list</button>
</form>
</div>
</template>

<script>

export default{
  data(){
    return{
     item:{
       name:'beats',
       quantity:0,
       price:0,
       //image:''
     }

    }

  },
methods:{

submitform(){
 // console.log("form submitted")

  this.$http.post("http://localhost:8000/api/addItem",this.item)
  .then(function(response){
     //console.log(response)
     this.$router.push('/list')

  });
},
// getImage:function(e){
//   var filereader=new FileReader;
//   filereader.readAsDataURL(e.target.files[0]);
//   filereader.onload = (e)=>{
//     this.item.image=e.target.result;
   
//   }
//    console.log(this.item)
// }

}

}
</script>