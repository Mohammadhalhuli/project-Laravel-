<?php

namespace App\Http\Controllers\Api;

use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Resources\CatResource;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Storage;

class CatController extends Controller
{
    public function all(){
        $cat=Cat::all();
        //return response()->json(['msg'=>'success','data'=>$cats]);اذا بدي اطبع نفس الداتا بيس بدون تعديل
        return CatResource::collection($cat);
    }
    public function show($id){
       // $cat=Cat::findOrFail($id); ممنوع استخدامها في الابياي
       $cat=Cat::find($id);
       if($cat==null){
        return response()->json(['msg'=>'not found']);
       }
        return new CatResource($cat);
    }
    public function store(Request $req){
       $validator=Validator::make($req->all(),[
            'name'=>'required|min:2|max:20',
            'description'=>'required|min:5|max:100',
            'image'=>'required|mimes:png,jpg,jpge,gif'
        ]);
        if($validator->fails()){
            return response()->json([
                'msg'=>$validator->errors(),
            ]);
        }
        $filename=Storage::putFile("cats",$req->image);
        $req->image=$filename;
        $cat=Cat::create([
            'name'=>$req->name,
            'description'=>$req->description,
            'image'=>$filename
        ]);
        return response()->json([
            'msg'=>'insert',
            'cat'=>new CatResource($cat),
        ]);
    }
    public function update(Request $req, $id){
        $validator=Validator::make($req->all(),[
            'name'=>'required|min:2|max:20',
            'description'=>'required|min:5|max:100',
            'image'=>'required|mimes:png,jpg,jpge,gif'
        ]);
        if($validator->fails()){
            return response()->json([
                'msg'=>$validator->errors(),
            ]);
        }
        $cat=Cat::find($id);
        if($cat==null){
            return response()->json(['msg'=>'not found']);
           }
        if($req->has('image')){
            Storage::delete($cat->image);
        }
        $filename=Storage::putFile("cats",$req->image);
        $req->image=$filename;
        $cat->update([
            'name'=>$req->name,
            'description'=>$req->description,
            'image'=>$filename
        ]);
        return response()->json([
            'msg'=>'insert',
            'cat'=>new CatResource($cat),
        ]);
    }
    public function delete($id){
        $cat=Cat::find($id);
        if($cat==null){
            return response()->json(['msg'=>'not found']);
           }
        $cat->delete();
        Storage::delete($cat->image);
        return response()->json([
            'msg'=>'insert',
            'cat'=>new CatResource($cat),
        ]); 
    }
}
