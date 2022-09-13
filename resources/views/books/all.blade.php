@extends('layouts')
@section('title')
    show books
@endsection
@section('con')
    <h1>all books </h1>
    <ul>
        @if (session()->has('success'))
            <div class="alert alert-danger my-5">{{  session()->get('success'); }}</div>
        @endif
        @foreach ($books as $book)
            <a class="btn btn-outline-danger" href="{{url("/books/show/$book->id")}}">{{$book->name}} </a><br>

        @endforeach
        {{$books->links()}}
    </ul>

@endsection
