<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function all(){
        // $books=Book::all();
        $books=Book::paginate(2);
         return view('books.all',compact('books'));
     }
     public function show($id){
         $book=Book::findorFail($id);
         return  view('books.show',compact('book'));
     }
     public function create(){
        $cats=Cat::select('id','name')->get();
        $users=User::select('id','name')->get();
         return view('books.creat',compact('cats','users'));
     }
     public function store(Request $req){
        $data = $req->validate([
             'name'=>'required|min:2|max:20',
             'description'=>'required|min:5|max:100',
             'image'=>'required|mimes:png,jpg,jpge,gif',
             'price'=>'required|numeric',
             'cat_id'=>'required|exists:cats,id',//عشان ما يقدر يضيف اشي خارج من الداتا الي في التابل
             'user_id'=>'required|exists:users,id',
         ]);
         $filename=Storage::putFile("books",$data['image']);
         $data['image'];
         Book::create($data);
         session()->flash('success','book inserted succesfully');
         return redirect(url('books'));
     }
     public function edit($id){
         $book=Book::findOrFail($id);
         return view('books.edit',compact('book'));
     }
     public function update(Request $req, $id){
         $req->validate([
             'name'=>'required|min:2|max:20',
             'description'=>'required|min:5|max:100',
             'image'=>'image|mimes:png,jpg,jpge,gif'
         ]);
         $book=Book::findOrFail($id);
         if($req->has('image')){
             Storage::delete($book->image);
         }
         $filename=Storage::putFile("books",$req->image);
         $req->image=$filename;
         $book->update([
             'name'=>$req->name,
             'description'=>$req->description,
             'image'=>$req->image
         ]);
         session()->flash('success','book updated succesfully');
         return redirect(url('book'));
     }
     public function delete($id){
         $book=Book::findOrFail($id);
         $book->delete();
         Storage::delete($book->image);
         session()->flash('success','book delete succesfully');
         return redirect(url('book'));
     }
 }
