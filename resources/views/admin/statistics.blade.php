@extends('admin.adminlayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Statistics</h1>
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
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box" style="background-color: #00c0ef">
                        <div class="inner">
                        <h3>{{$users}}</h3>

                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="/adminpanel/userlist" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box" style="background-color: #f39c12">
                        <div class="inner">
                        <h3>{{$clients}}</h3>

                            <p>Clients</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <a href="/adminpanel/clientlist" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box" style="background-color: #00a65a">
                      <div class="inner">
                      <h3>{{$jobs}}</h3>
          
                        <p>Jobs</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-suitcase"></i>
                      </div>
                      <a href="/adminpanel/jobslist" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box" style="background-color: yellow">
                      <div class="inner">
                        <h3>{{$categories}}</h3>
          
                        <p>Categories</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-list"></i>
                      </div>
                      <a href="/adminpanel/categorieslist" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box" style="background-color: #00cc99">
                      <div class="inner">
                        <h3>{{$hired}}</h3>
          
                        <p>Hired users</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-pen"></i>
                      </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box" style="background-color: #990000">
                      <div class="inner">
                        <h3 style="color: white">{{$messages}}</h3>
          
                        <p style="color: white">Total messages sent</p>
                      </div>
                      <div class="icon">
                        <i class="far fa-envelope" style="color: white; opacity: 40%;"></i>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>


@endsection