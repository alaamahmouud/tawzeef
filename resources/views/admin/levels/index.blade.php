@extends('admin.layouts.main')
@section('content')

<body>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Levels</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{url('levels')}}">Levels</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Levels</li>
                </ol>
              </nav>
            </div>
            <!-- <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->

        
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->

            </div>
            <div class="card-header border-0">
              <h3 class="mb-0">Levels</h3>
            </div>

        <div class="ibox-title">
            <div class="pull-right">
                <a href="{{url('levels/create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Adding
                </a>
            </div>
        </div><br>

        <form action="{{ route('subjects.store') }}" method="POST">
          @csrf
          <div class="navbar-search navbar-search-light form-inline mr-sm-3">
                    <label for="" >&nbsp;</label>
                    <input type="text" class="form-control"> 
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    <button class="btn btn-primary btn-block" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th scope="col" class="sort" data-sort="name">name</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">delate</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($records as $record)
                            <tr id="removable{{$record->id}}">
                                <td>{{($records->perPage() * ($records->currentPage() - 1)) + $loop->iteration}}</td>
                                <td>{{$record->name}}</td>

                                <!-- <td>{{$record->parent_id}}</td> -->
                                <td class="text-center"><a href="{{url('levels/' . $record->id .'/edit')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a></td>
                                <td class="text-center">
                                <form method="post" action="{{route('levels.destroy' , ['level'=>$record->id])}}">
                                 @csrf
                                 @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-1">Delete</button>
                                 </form>
                                </td>
                            </tr>
                            </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
         
          </div>
        </div>
      </div>

@endsection
