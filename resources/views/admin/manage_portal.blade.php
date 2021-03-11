@extends('layouts.app')
@section('title','Portal')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Portal</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Portal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add New</a>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-hover dataTable">
                  <thead>                  	
                  	<tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
             
                  </thead>
                  <tbody>
                      @foreach($portal as $key=>$p)
                      <tr>
                        <td>{{ $key ++ }}</td>
                        <td>{{ $p['name'] }}</td>
                         <td>{{ $p['email'] }}</td>
                          <td>{{ $p['mobile_no'] }}</td>
                          <td><input data-id="{{ $p['id'] }}" class="portal_status" type="checkbox" name="status" <?php if($p['status']==1) { echo "checked"; }?>><input type="hidden" name="id" value="{{ $p['id'] }}"></td>
                          <td>
                            <a href="{{url('admin/edit_portal/'.$p['id']) }}" class="btn btn-info">Edit</a>
                            <a href="{{url('admin/delete_portal/'.$p['id']) }}" class="btn btn-danger">Delete</a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                  <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tfoot>
                </table>
              </div>
        
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
   </section>
    <!-- /.content -->
    <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Add New Portal</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <form action="{{ url('admin/add_new_portal') }}" class="database-operation" method="post">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Title</label>
            {{ csrf_field() }}
            <input type="text" name="name" placeholder="Enter name" class="form-control">
          </div>
        </div>
          <div class="col-sm-12">
          <div class="form-group">
            <label>Select Email</label>
            <input type="text" name="email"placeholder="Enter Email"  class="form-control">
          </div>
        </div> 
         <div class="col-sm-12">
          <div class="form-group">
            <label>Select Mobile No</label>
            <input type="text" name="mobile_no" placeholder="Enter Mobile No" class="form-control">
          </div>
        </div> 
         <div class="col-sm-12">
          <div class="form-group">
            <label>Select Password</label>
            <input type="password" name="password" class="form-control">
          </div>
        </div>  
        <div class="col-sm-12">
          <div class="form-group">
          <button type="submit" class="btn btn-primary">Add</button>
          </div>
      </div>
        </div>
    </form>
    </div>
  </div>
  
</div>
</div>
  </div>

 @endsection