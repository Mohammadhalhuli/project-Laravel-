@extends('layouts')
@section('title')
    show cat
@endsection
@section('con')
    <h1>cat details</h1>
        <p>id:{{$cat->id}}</p>
        <p>Name:{{$cat->name}}</p>

        <p>description:{{$cat->description}}</p>

        <p>books:</p>
        @foreach ($cat->books as $book)
          <h2>  {{$book->name}}</h2>
        @endforeach
        <form method="POST" action="{{url("cats/delete/$cat->id")}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger">delete</button>
        </form>
        <a class="btn btn-outline-info" href="{{url("cats/edit/$cat->id")}}">Edit</a>
@endsection
