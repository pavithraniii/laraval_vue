<?php

namespace App\Http\Controllers;
use App\Models\Items;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function postItem(Request $request){

        $item=new Items();
        //  $expl=explode(',',$request->image);
        //  $decode=base64_decode( $expl[1]);
        //  if(str_contains($expl[0],'png')){
        //      $exte='png';
        //  }
        //  else{
        //      $exte='jpg';
        //  }
        //  $currenttime=Carbon::now()->timestamp;
        //  $filename= $currenttime.'.'.$exte;
        //  $filepath=public_path().'/'. $filename;
        //  file_put_contents( $filepath,$decode);
        // if($request->hasFile('image')){
        //     //get filename with extension
        //      $fileNamewithExt=$request->file('image')->getClientOriginalName();
        //     //get just filename
        //      $fileName= pathinfo( $fileNamewithExt, PATHINFO_FILENAME);
        //     //get just ext
        //      $extension=$request->file('image')->getClientOriginalExtension();
        //     //filename to store
        //     $fileNametostore=$fileName.'_'.time().'.'. $extension;
        //     //upload image
        //     $path=$request->file('image')->storeAs('public/images', $fileNametostore);
   
        //      }


        $item->name=$request->input('name');
        $item->quantity=$request->input('quantity');
        //$item->image=$fileNametostore;
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
