<?php

namespace App\Http\Controllers;
use App\Models\Items;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function postItem(Request $request){

        $item=new Items();
        $item->name=$request->input('name');
        $item->quantity=$request->input('quantity');
        $item->price=$request->input('price');
        $item->save();

        return response()->json(['message'=>$item],201);
       

    }

    public function getItem(){
         $items=Items::all();
         return response()->json(['allitems'=>$items],301);
    }

    public function deleteItem($id){
        
        $item=Items::find($id);
        if(!$item){
            return response()->json(['message'=>"item is not found"],404);
        }

        $item->delete();
        return response()->json(['message'=>"item is deleted"],201);

    }

    public function editItem(Request $request,$id){
        $item=Items::find($id);
     if(!$item){
        return response()->json(['message'=>"item is not found"],404);
    }

       $item->name=$request->input('name');
        $item->quantity=$request->input('quantity');
        $item->price=$request->input('price');
        $item->save();
        return response()->json(['message'=> $item],200);



    }
}
