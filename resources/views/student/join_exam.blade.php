@extends('layouts.student')
@section('title','Join Exam')
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
            <h1 class="m-0 text-dark">Join Exam</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Join Exam</li>
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
                    <div class="col-sm-4">
                      <h3>Time:1 Hr</h3>
                    </div>
                    <div class="col-sm-4">
                      <h3 class="text-center">Timer :<span class="js-timeout">59:00</span></h3>
                    </div>
                    <div class="col-sm-4">
                      <h3 class="text-right">Status:Running</h3>
                    </div>
                </div>
          
                </div>
              </div>

                <div class="card mt-4">
       
              <div class="card-body">
                <form action="{{url('student/submit_questions')}}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="exam_id" value="{{ Request::segment(3) }}">
                <div class="row">
                  @foreach($all_questions as $key => $all_ques)

                  <div class="col-sm-12 mt-4">
                      <p>{{$key+1}}. {{ $all_ques['question'] }}</p>
                      <?php $options=json_decode(json_encode(json_decode($all_ques['options'])),true); ?>
                      <input type="hidden" name="question{{ $key+1 }}" value="{{ $all_ques['id'] }}">
                      <ul class="question_option">
                        <li><input type="radio" name="ans{{$key+1}}" value="{{ $options['option1'] }}"> {{ $options['option1'] }}</li>
                        <li><input type="radio" name="ans{{$key+1}}" value="{{ $options['option2'] }}"> {{ $options['option2'] }}</li>
                        <li><input type="radio" name="ans{{$key+1}}" value="{{ $options['option3'] }}"> {{ $options['option3'] }}</li>
                        <li><input type="radio" name="ans{{$key+1}}" value="{{ $options['option4'] }}"> {{ $options['option4'] }}</li>
                        <li style="display: none"><input type="radio" value="0" checked="checked" name="ans{{$key+1}}">{{ $options['option4'] }}</li>
                      </ul>
                  </div>
                   @endforeach
                   <input type="hidden" name="index" value="<?php echo $key+1; ?>">

                   <div class="col-sm-12 mt-4">
                     <button class="btn btn-info btn-block">Submit</button>
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