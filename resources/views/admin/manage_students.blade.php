@extends('layouts.app')
@section('title','Manage Students')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Students</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Students</li>
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
              <div class="card-body table-responsive">
                <table class="table table-striped table-bordered table-hover dataTable">
                  <thead>                  	
                  	<tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Exam</th>
                    <th>Exam Date</th>
                    <th>Result</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
             
                  </thead>
                  <tbody>
                    @foreach($students as $key=>$std)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $std['name'] }}</td>
                      <td>{{ $std['dob'] }}</td>
                      <td>{{ $std['exam_name'] }}</td>
                      <td>{{ $std['exam_date'] }}</td>
                      <td>N/A</td>
                      <td><input type="checkbox" name="status" <?php if($std['status'] == 1){
                        echo "checked"; } ?> class="student_status" data-id="{{ $std['id'] }}"></td>
                      <td>
                        <a href="{{ url('admin/edit_student/'.$std['id']) }}" class="btn btn-info">Edit</a>
                        <a href="{{ url('admin/delete_student/'.$std['id']) }}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                 <th>#</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Exam</th>
                    <th>Exam Date</th>
                    <th>Result</th>
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
      <h4 class="modal-title">Add New Exam</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <form action="{{ url('admin/add_new_student') }}" class="database-operation" method="post">
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
            <label>Enter Email</label>
            {{ csrf_field() }}
            <input type="email" name="email" placeholder="Enter email" class="form-control">
          </div>
        </div>
         <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Mobile No</label>
            {{ csrf_field() }}
            <input type="text" name="mobile_no" placeholder="Enter mobile No" class="form-control">
          </div>
        </div>
         <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Password</label>
            {{ csrf_field() }}
            <input type="password" name="password" placeholder="Enter password" class="form-control">
          </div>
        </div>
          <div class="col-sm-12">
          <div class="form-group">
            <label>Enter DOB</label>
            {{ csrf_field() }}
            <input type="date" name="dob" placeholder="Enter DOB" class="form-control">
          </div>
        </div>
           <div class="col-sm-12">
          <div class="form-group">
          	<label>Select Exam</label>
            <select class="form-control" name="exam">
            	<option value="">Select Category</option>            	
            @foreach($exams as $ex)
            <option value="{{ $ex['id'] }}">{{ $ex['title'] }}</option>
            @endforeach
            </select>
          </div>
        </div> 
        <div class="col-sm-12">
          <div class="form-group">
          <button type="submit" class="btn btn-primary">Add</button>
          </div>
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