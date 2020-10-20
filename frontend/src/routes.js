import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import Addproduct from './components/Addproduct'
import About from './components/About'
import Contact from './components/Contact'
import Home from './components/Home'
import List from './components/List'

const router= new VueRouter(
    //vuerouter kiyala object ekk hadala routes kiyala array ekaka okkom routes tika daa gattaa
    {
        mode:'history',
        routes:[
            {path:"/add",component:Addproduct},
            {path:"/about",component:About},
            {path:"",component:Home},
            {path:"/list",component:List},
            {path:"/contact",component:Contact}
        ]
    }
);

export default router
//ja file eka main ekt import karanna kalin export karanna ona