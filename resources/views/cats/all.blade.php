@extends('layouts')
@section('title')
    show cats
@endsection
@section('con')
    <h1>all cats </h1>
    <ul>
        @if (session()->has('success'))
            <div class="alert alert-danger my-5">{{  session()->get('success'); }}</div>
        @endif
        @foreach ($cats as $cat)
            <a class="btn btn-outline-danger" href="{{url("/cats/show/$cat->id")}}">{{$cat->name}} </a><br>

        @endforeach
        {{$cats->links()}}
    </ul>

@endsection
