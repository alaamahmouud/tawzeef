@extends('admin.layouts.main')
@section('content')



<body>
  <!-- Main content -->
  
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <br>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Adding </h3>
                </div>
                <!-- <div class="box-footer">
                <button type="submit" class="btn btn-primary">save</button>
                </div> -->
              </div>
    </div>

    <div class="card-body">
        
           @if ($errors->any())
          <div class="alert alert-danger">
           <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
           </ul>
          </div>
           @endif

              <form action ="{{route('levels.store')}}" method ="post">
                
              @csrf

                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" >name</label>
                        <input name ="name" type="text"  class="form-control" placeholder="name">
                      </div>
                    </div>
                    <!-- <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" >parent id</label>
                        <input name ="parent_id" type="text"  class="form-control" placeholder="parentid">
                      </div>
                    </div> -->
                  </div>
                 
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">save</button>
                </div>
              </form>
            </div>
            </div>
        </div>
    </div>


@endsection
