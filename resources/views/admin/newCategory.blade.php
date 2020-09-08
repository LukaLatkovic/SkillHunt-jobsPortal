@extends('admin.adminlayout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Category</h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <span class="float-right">
                <a href="{{ route('addCategory') }}"><button class="btn btn-primary">Add new category</button></a>
              </span>
          </div> --}}
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 my-5">            
                @include('includes.alert')
                <div class="card card-default">  
                    <div class="card-header"><h3 class="h3 text-center ">Create a new Category</h3></div>
                    <div class="card-body">
                      <form method="POST" action="/adminpanel/categorieslist/add">
                          {{ csrf_field() }}
                           <div class="form-group">
                            <input type="text" class="form-control" id="newCategory" name="newCategory" placeholder="Example: Marketing, SEO, etc...">
                          </div>
                    </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection