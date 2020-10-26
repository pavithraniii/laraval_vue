<template>

<div class="container">
    <div class="well well-sm">
       <h1>product list</h1>
    </div>
    <div id="products" class="row list-group">

        <div class="item  col-xs-4 col-lg-4" v-for="y in list"  v-bind:key="y">
            <div class="thumbnail">
                <img class="group list-group-image" v-bind:src="'http://localhost:8000/'+y.image" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                      {{y.name}}</h4>
                    <p class="group inner list-group-item-text">
                        Rs:{{y.price}}
                        </p>
                         <p class="group inner list-group-item-text">
                        Quantity:{{y.quantity}}
                        </p>
                    <div class="row">
                       
                        <div class="col-xs-12 col-md-6">
                            <router-link class="btn btn-success" :to="'/edit/'+y.id">Edit</router-link>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" @click="deleteitem($event)" v-bind:id="y.id" >Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
       
      
       
    </div>
</div>

</template>

<script>
export default {
    data:function(){
        return{
        list:[]
        }
    },
    methods:{
     deleteitem:function(event){
        // console.log(event.target.id)
        this.$http.delete("http://localhost:8000/api/deleteItem/"+event.target.id).then(function(data){
            //console.log(data)
            var position=this.list.findIndex(function(element)
            {
                return element.id=event.target.id;
            }
            );
            this.list.splice(position,1)
        })

     }

    },

    created(){
        this.$http.get("http://localhost:8000/api/getItem").then(function(data){
            console.log(data)
            this.list=data.body.allitems
        });
    }
}
</script>