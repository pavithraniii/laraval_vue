<?php

namespace App\Http\Controllers;
use App\Models\Items;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function postItem(Request $request){

        $item=new Items();
         $expl=explode(',',$request->image);
         $decode=base64_decode( $expl[1]);
         if(str_contains($expl[0],'png')){
             $exte='png';
         }
         else{
             $exte='jpg';
         }
         $currenttime=Carbon::now()->timestamp;
         $filename= $currenttime.'.'.$exte;
         $filepath=public_path().'/'. $filename;
         file_put_contents( $filepath,$decode);
        

        $item->name=$request->input('name');
        $item->quantity=$request->input('quantity');
        $item->image=  $filename;
        $item->price=$request->input('price');
        $item->save();

        return response()->json(['message'=>$item],201);
       

    }

    public function getItem(){
         $items=Items::all();
         return response()->json(['allitems'=>$items],200);
    }
    
    public function getItems($id){
        $items=Items::find($id);
        return response()->json(['items'=>$items],200);
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
