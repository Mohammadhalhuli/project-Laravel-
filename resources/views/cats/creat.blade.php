
  @extends('layouts')
  @section('title')
    creat cat
@endsection
  @section('con')

  {{---  @if ($errors->any())
    @foreach ( $errors->all() as $err)
        <div class="alert alert-danger my-5">{{  $err }}</div>
    @endforeach
    @endif--}}
    <div class="row">
        <div class="contenar">
            <form action="{{url('cat/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">cat name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="name@example.com">
                    @error('name')
                        <div class="alert alert-danger my-5">{{  $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">cat description</label>
                    <textarea class="form-control" name="description" rows="3" {{old('description')}}></textarea>
                    @error('description')
                    <div class="alert alert-danger my-5">{{  $message }}</div>
                @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">image</label>
                    <input type="file" name="image" class="form-control" >
                    @error('name')
                        <div class="alert alert-danger my-5">{{  $message }}</div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-outline-info">send</button>
            </form>
        </div>
    </div>
  @endsection
