@extends('admin.adminlayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Job list - Menagment</h1>
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
                <table class="table col-md-12">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Client</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                        <tr>
                            <th scope="row">{{$job->id}}</th>
                            <td>{{$job->title}}</td>
                            <td>{{$job->category->category_name}}</td>
                            <td>{{ $job->user->name}}</td>
                            <td>
                                <form method="get" action="{{ route('deleteJob', ['id'=>$job->id] ) }}">
                                    <button type="submit" class="btn btn-light" style="background-color: #f4f6f9">
                                        <i class="fas fa-trash text-danger" data-id="{{$job->id}}"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="ml-3"> {{$jobs->links()}}</div>
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