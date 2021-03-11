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
              <li class="breadcrumb-item active">Edit Students</li>
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
              <div class="card-body">
              <form action="{{ url('admin/edit_student_final') }}" class="database-operation" method="post">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Name</label>
            {{ csrf_field() }}
            <input type="text" name="name" value="{{ $students['name'] }}" placeholder="Enter name" class="form-control">
            <input type="hidden" name="id" value="{{ $students['id'] }}">
          </div>
        </div>
         <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Email</label>
            {{ csrf_field() }}
            <input type="email" name="email" value="{{ $students['email'] }}"placeholder="Enter email" class="form-control">
          </div>
        </div>
         <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Mobile No</label>
            {{ csrf_field() }}
            <input type="text" name="mobile_no" value="{{ $students['mobile_no'] }}"placeholder="Enter mobile No" class="form-control">
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
            <input type="text" name="dob" placeholder="Enter DOB" value="{{ $students['dob'] }}"class="form-control">
          </div>
        </div>
           <div class="col-sm-12">
          <div class="form-group">
            <label>Select Exam</label>
            <select class="form-control" name="exam">
              <option value="">Select Category</option>             
            @foreach($exams as $ex)
            <option <?php if($students->exam==$ex['id']){ echo "selected"; } ?> value="{{ $ex['id'] }}">{{ $ex['title'] }}</option>
            @endforeach
            </select>
          </div>
        </div> 
        <div class="col-sm-12">
          <div class="form-group">
          <button type="submit" class="btn btn-primary">Update</button>
          </div>
      </div>
        </div>
    </form>
              </div>
        
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

  </div>

 @endsection