@extends('layouts')
@section('title')
    show book
@endsection
@section('con')
    <h1>book details</h1>
        <p>id:{{$book->id}}</p>
        <p>Name:{{$book->name}}</p>
        <p>cat:{{$book->cat->name}}</p>
        <p>user: {{$book->user->name}}</p>
        <img src="">
        <p>description:{{$book->description}}</p>

        <form method="POST" action="{{url("books/delete/$book->id")}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger">delete</button>
        </form>
        <a class="btn btn-outline-info" href="{{url("books/edit/$book->id")}}">Edit</a>
@endsection
