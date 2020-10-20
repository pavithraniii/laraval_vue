<template>

<div class="container">
 <h1>Add product</h1>
 <form>
  <div class="form-group">
    <label for="name1">Product Name</label>
    <input type="text" class="form-control" id="name1" placeholder="Enter product name" v-validate="'required'" name="name">
  
  </div>
  <div class="form-group">
    <label for="quantity1">Quantity</label>
    <input type="number" class="form-control" id="quantity1" placeholder="Enter quantity">
  </div>
  <div class="form-group">
    <label for="price1">Price $</label>
    <input type="number" class="form-control" id="price1" placeholder="Enter price">
  </div>
  
  <button type="submit" class="btn btn-primary">Add to the list</button>
</form>
</div>
</template>