@extends('layouts.app')
@section('title','Update Exam Question')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exams Question</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Exams Question</li>
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
      <form action="{{ url('admin/edit_question_inner') }}" class="database-operation" method="post">
      <div class="row">
         {{ csrf_field() }}
        @foreach($question as $question)
        <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Question</label>
           
            <input type="text" name="question" placeholder="Enter Question" class="form-control" value="{{ $question['question']}}">
            <input type="hidden" name="id" value="{{ $question['id']}}">
          </div>
        </div>
        <?php
          $options=json_decode($question['options']);
        ?>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Enter Option 1</label>
            <input type="text" name="option1" placeholder="option1" class="form-control" value="{{ $options->option1 }}">
          </div>
        </div>
          <div class="col-sm-6">
          <div class="form-group">
            <label>Enter Option 2</label>
            <input type="text" name="option2" placeholder="option2" class="form-control" value="{{ $options->option2 }}">
          </div>
        </div>
          <div class="col-sm-6">
          <div class="form-group">
            <label>Enter Option 3</label>
            <input type="text" name="option3" placeholder="option3" class="form-control"value="{{ $options->option3 }}">
          </div>
        </div>
          <div class="col-sm-6">
          <div class="form-group">
            <label>Enter Option 4</label>
            <input type="text" name="option4" placeholder="option4" class="form-control" value="{{ $options->option4 }}">
          </div>
        </div>
          <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Right Ans</label>
            <input type="text" name="ans" placeholder="Enter Right Ans" class="form-control" value="{{ $question['ans']}}">
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
          <button type="submit" class="btn btn-primary">Update</button>
          </div>
      </div>
      @endforeach
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