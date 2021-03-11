@extends('layouts.student')
@section('title','Result')
@section('content')
<style type="text/css">
  .question_option
  {
    list-style: none;
    height: 100px;
    line-height: 30px;
  }
</style>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Result</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Result</li>
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
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-sm-8">
                <div class="card mt-4">
       
              <div class="card-body">
                  <h2>Basic Information</h2>
                  <table class="table">
                      <tr>
                        <td>Name</td>
                        <td>{{ $student_info->name }}</td>
                      </tr>
                       <tr>
                        <td>E-Mail</td>
                        <td>{{ $student_info->email }}</td>
                      </tr>
                       <tr>
                        <td>Dob</td>
                        <td>{{ $student_info->dob }}</td>
                      </tr>
                      <tr>
                        <td>Exam Name</td>
                        <td>{{ $student_info->title }}</td>
                      </tr>
                      <tr>
                        <td>Exam Date</td>
                        <td>{{ $student_info->exam_date }}</td>
                      </tr>
                  </table>
                   <h2>Result Information</h2>
                  <table class="table">
                    @foreach ($result_info as $res_info)
                      <tr>
                        <td>Pass Marks</td>
                        <td>{{ $res_info['yes_ans'] }}</td>
                      </tr>
                       <tr>
                        <td>Fail Marks</td>
                        <td>{{ $res_info['no_ans'] }}</td>
                      </tr>
                       <tr>
                        <td>Total</td>
                        <td>{{ $res_info['yes_ans']+$res_info['no_ans'] }}</td>
                      </tr>
                      @endforeach
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