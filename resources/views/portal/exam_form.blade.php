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
            <h1 class="m-0 text-dark">Manage Exams</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Exams</li>
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
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ $exam_info['title'] }}</h3>
                    </div>
                    <div class="col-sm-6">
                        <h3><span class="float-right">{{ date('d M,Y',strtotime($exam_info['exam_date'] )) }}</span></h3>
                    </div>
                </div>
                  <form action="{{url('portal/exam_form_submit')}}" class="database-operation">
                <div class="row">                 
                    <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter Name</label>
                          {{ csrf_field() }}
                          <input type="hidden" name="id" value="{{ $exam_info['id'] }}">
                          <input type="text" name="name" placeholder="name" class="form-control" required="">
                      </div>
                    </div>
                   
                     <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter Email</label>
                          <input type="email" name="email" placeholder="Enter Email" class="form-control" required>
                      </div>
                    </div>
                     <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter Mobile No</label>
                          <input type="mobile_no" name="mobile_no" placeholder="Enter mobile_no" class="form-control" required>
                      </div>
                    </div>
                      <div class="col-sm-12">
                      <div class="form-group">
                          <label>Select DOB</label>
                          <input type="date" name="dob" class="form-control" required>
                      </div>
                    </div>
                     <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter Password</label>
                          <input type="password" name="password" placeholder="Enter password" class="form-control" required>
                      </div>
                    </div>
                     <div class="col-sm-12">
                        <div class="form-group">
                          <label>Select Exam</label>
                            <select class="form-control" name="exam">
                             <option value="">Select Category</option>             
                              @foreach($exam as $ex)
                                <option value="{{ $ex['id'] }}">{{ $ex['title'] }}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                      <div class="col-sm-12">
                      <div class="form-group">
                          <button class="btn btn-info">Save</button>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
        
            </div>
            <!-- /.card -->
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>

 @endsection