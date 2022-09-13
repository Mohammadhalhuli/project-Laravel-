
  @extends('layouts')
  @section('title')
    registar
@endsection
  @section('con')
    <div class="row">
        <div class="contenar w-50 m-auto">
            <form action="{{url('register')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">name</label>
                    <input type="text" class="form-control" name="name" >
                    @error('name')
                    <div class="alert alert-danger my-5">{{  $message }}</div>
                    @enderror
                  </div>

                    <div class="mb-3">
                      <label  class="form-label">Email address</label>
                      <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                      @error('email')
                      <div class="alert alert-danger my-5">{{  $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                      <label  class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" >
                      @error('password')
                      <div class="alert alert-danger my-5">{{  $message }}</div>
                       @enderror
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">confirmation Password</label>
                        <input type="password" name="password_confirmation" class="form-control" >
                        @error('password_confirmation')
                        <div class="alert alert-danger my-5">{{  $message }}</div>
                      @enderror
                      </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
  @endsection
