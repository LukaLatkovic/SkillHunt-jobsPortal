@extends('admin.adminlayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List of Clients - Menagment</h1>
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
          <table class="table col-md-12" id="example">
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
              @foreach($clientlist as $client)
              <tr>
              <th scope="row">{{$client->id}}</th>
              <td>{{$client->name}}</td>
              <td>{{$client->email}}</td>
              <td>{{ $client->created_at->format('d M Y - H:i:s') }}</td>
              <td></td>
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