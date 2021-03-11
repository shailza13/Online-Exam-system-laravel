@extends('layouts.student')
@section('title','Exams')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exams</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Exams</li>
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
                <table class="table table-striped table-bordered table-hover dataTable">
                  <thead>                   
                    <tr>
                    <th>#</th>
                    <th>Exam Title</th>
                    <th>Exam Date</th>
                    <th>Status</th>
                    <th>Result</th>
                    <th>Action</th>
                </tr>
             
                  </thead>
                  <tbody>
                   
                    <tr>
                      <td>1</td>
                      <td>{{ $student_info->title }}</td>
                      <td>{{ $student_info->exam_date }}</td>
                      <td><?php
                      if($student_info->exam_date<date('Y-m-d'))
                      {
                        echo "completed"; 
                      } 
                      else if($student_info->exam_date == date('Y-m-d'))
                       {
                          echo "running";
                        }
                        else
                        {
                          echo "Pending";
                        }
                          ?></td>
                          <td><?php
                            if($exam_join)
                            {
                              echo $exam_join->yes_ans.'/'.($exam_join->yes_ans+$exam_join->no_ans);
                            }
                          ?></td>
                        <td>
                          <?php
                            if($student_info->exam_date == date('Y-m-d'))
                            {    
                              if(!$exam_join)
                              {
                          ?><a href="{{url('student/join_exam/'.$student_info->exam)}}" class="btn btn-info">Join Exam</a></td>
                          <?php } 
                        }?>
                    </tr>
                  </tbody>
                  <tfoot>
                  <th>#</th>
                   <th>Exam Title</th>
                    <th>Exam Date</th>
                    <th>Status</th>
                     <th>Result</th>
                    <th>Action</th>
                  </tfoot>
                </table>
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