@extends('admin.adminlayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List of Users - Menagment</h1>
          </div><!-- /.col -->
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
        <div class="row justify-content-center table-responsive">
          <table class="table col-md-12 " id="usertable">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($userlist as $user)
              <tr>
              <th scope="row">{{$user->id}}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->created_at->format('d M Y - H:i:s') }}</td>
              <td>
                {{-- <form method="get" action="{{ route('deleteJob', ['id'=>$job->id] ) }}">
                  <button type="submit" class="btn btn-light" style="background-color: #f4f6f9">
                      <i class="fas fa-edit" data-id="{{$job->id}}"></i>
                  </button>
                </form> --}}
                <form method="get" action="{{ route('deleteUser', ['id'=>$user->id] ) }}">
                  <button type="submit" class="btn btn-light" style="background-color: #f4f6f9">
                      <i class="fas fa-trash text-danger" data-id="{{$user->id}}"></i>
                  </button>
                </form>
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/af-2.3.3/b-1.5.6/rg-1.1.0/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
          <script>$(document).ready(function () {

            var table = $('#usertable').DataTable();
        });</script> --}}
          
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
    $('#example1').DataTable();
    } );
  </script>
 @endsection
