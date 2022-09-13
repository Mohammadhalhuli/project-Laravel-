
  @extends('layouts')
  @section('title')
    creat book
@endsection
  @section('con')

  {{---  @if ($errors->any())
    @foreach ( $errors->all() as $err)
        <div class="alert alert-danger my-5">{{  $err }}</div>
    @endforeach
    @endif--}}
    <div class="row">
        <div class="contenar">
            <form action="{{url('book/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">book name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="name">
                    @error('name')
                        <div class="alert alert-danger my-5">{{  $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">book description</label>
                    <textarea class="form-control" name="description" rows="3" {{old('description')}}></textarea>
                    @error('description')
                    <div class="alert alert-danger my-5">{{  $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">book price</label>
                    <input type="text" name="price" class="form-control" value="{{old('price')}}" placeholder="999999.99">
                    @error('price')
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
                  <div class="mb-3">
                    <label  class="form-label">book category</label>
                        <select name="cat_id" id="" class="form-control">
                            @foreach ($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        @error('cat_id')
                        <div class="alert alert-danger my-5">{{  $message }}</div>
                        @enderror
                  </div>
                  <div class="mb-3">
                    <label  class="form-label">book Users</label>
                        <select name="user_id" id="" class="form-control">
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <div class="alert alert-danger my-5">{{  $message }}</div>
                         @enderror
                  </div>
                  <button type="submit" class="btn btn-outline-info">send</button>
            </form>
        </div>
    </div>
  @endsection
