@extends('layouts')
@section('title')
    updat cat
@endsection
@section('con')

    <div class="row">
        <div class="contenar">
            <form action="{{url("cat/update/$cat->id")}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">cat name</label>
                    <input type="text" name="name" class="form-control" value="{{$cat->name}}" placeholder="name@example.com">
                    @error('name')
                        <div class="alert alert-danger my-5">{{  $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">cat description</label>
                    <textarea class="form-control" name="description" rows="3" {{$cat->description}}></textarea>
                    @error('description')
                    <div class="alert alert-danger my-5">{{  $message }}</div>
                @enderror
                  </div>
                  <button type="submit" class="btn btn-outline-info">send</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
@endsection

