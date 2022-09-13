<?php

namespace App\Http\Controllers;


use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatController extends Controller{
    public function all(){
       // $cats=cat::all();
       $cats=cat::paginate(2);
        return view('cats.all',compact('cats'));
    }
    public function show($id){
        $cat=Cat::findorFail($id);
        return  view('cats.show',compact('cat'));
    }
    public function create(){
        return view('cats.creat');
    }
    public function store(Request $req){
        $req->validate([
            'name'=>'required|min:2|max:20',
            'description'=>'required|min:5|max:100',
            'image'=>'required|mimes:png,jpg,jpge,gif'
        ]);
        $filename=Storage::putFile("cats",$req->image);
        $req->image=$filename;
        Cat::create([
            'name'=>$req->name,
            'description'=>$req->description,
            'image'=>$req->image
        ]);
        //echo $req->name;
        //echo $req->input('description');
                        //name ////maseege
        session()->flash('success','cat inserted succesfully');
        return redirect(url('cat'));
    }
    public function edit($id){
        $cat=Cat::findOrFail($id);
        return view('cats.edit',compact('cat'));
    }
    public function update(Request $req, $id){
        $req->validate([
            'name'=>'required|min:2|max:20',
            'description'=>'required|min:5|max:100',
            'image'=>'image|mimes:png,jpg,jpge,gif'
        ]);
        $cat=Cat::findOrFail($id);
        if($req->has('image')){
            Storage::delete($cat->image);
        }
        $filename=Storage::putFile("cats",$req->image);
        $req->image=$filename;
        $cat->update([
            'name'=>$req->name,
            'description'=>$req->description,
            'image'=>$req->image
        ]);
        session()->flash('success','cat updated succesfully');
        return redirect(url('cat'));
    }
    public function delete($id){
        $cat=Cat::findOrFail($id);
        $cat->delete();
        Storage::delete($cat->image);
        session()->flash('success','cat delete succesfully');
        return redirect(url('cat'));
    }
}
