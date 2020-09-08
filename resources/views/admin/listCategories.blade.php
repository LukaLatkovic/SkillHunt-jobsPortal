@extends('admin.adminlayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List of Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <span class="float-right">
                <a href="{{ route('addCategory') }}"><button class="btn btn-primary">Add new category</button></a>
              </span>
          </div>
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

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <table class="table" id="example">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
              <tr>
              <th scope="row">{{$category->id}}</th>
              <td>{{$category->category_name}}</td>
              <td>{{$category->created_at->format('d M Y - H:i:s') }}</td>
              <td>
                <form method="get" action="{{ route('deleteCategory', ['id'=>$category->id] ) }}">
                    <button type="submit" class="btn btn-light" style="background-color: #f4f6f9">
                        <i class="fas fa-trash text-danger" data-id="{{$category->id}}"></i>
                    </button>
                </form>
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
        </div>
        <!-- /.row --> 
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  @section('jsplugins')
  <script>
    $(document).ready( function () {
    $('#example').DataTable();
    } );
  </script>
 @endsection