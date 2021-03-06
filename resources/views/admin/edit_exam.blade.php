@extends('layouts.app')
@section('title','Dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Exam</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Exam</li>
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
                  <form action="{{ url('admin/edit_exam_sub') }}" class="database-operation" method="post">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Title</label>
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $exam->id }}">
            <input type="text" name="title" value="{{ $exam->title }}" placeholder="Enter Title" class="form-control">
         
          </div>
        </div>
          <div class="col-sm-12">
          <div class="form-group">
            <label>Select Exam Date</label>
            <input type="date" name="exam_date" value="{{ $exam->exam_date }}" class="form-control">
          </div>
        </div> 
           <div class="col-sm-12">
          <div class="form-group">
            <label>Select Category</label>
            <select class="form-control" name="exam_category">        
                @foreach($category as $cat)
                <option <?php if($exam->category==$cat->id) { echo "selected"; } ?> value="{{ $cat->id }}">{{ $cat->name}}</option>
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

 @endsectionla