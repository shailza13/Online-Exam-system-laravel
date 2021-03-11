@extends('layouts.portal')
@section('title','Exam Form')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Exam Form</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Exams </li>
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
                <form action="{{url('portal/student_exam_info') }}">
                <div class="row">
                 
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Enter Mobile No</label>
                      <input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile No" required="">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Select DOB</label>
                      <input type="date" name="dob" class="form-control" required="">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                     <select class="form-control" name="exam" required="">
                      <option value="">Select</option>
                       @foreach($exams as $ex)
                     <option value="{{ $ex['id'] }}">{{ $ex['title'] }}</option>
                      @endforeach
                    </select>
                    </div>
                  </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                     <button class="btn btn-info">Search</button>
                    </div>
                  </div>
                </div>
                
                </div>
              </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>

 @endsection