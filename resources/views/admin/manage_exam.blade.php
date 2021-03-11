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
          <div class="col-sm-12 ">
            <!-- Default box -->
            <div class="card ">
              <div class="card-header">
                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add New</a>
                </div>
              </div>
              <div class="card-body  table-responsive">
                <table class="table table-striped table-bordered table-hover dataTable">
                  <thead>                  	
                  	<tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Exam Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
             
                  </thead>
                  <tbody>
                      @foreach($exam as $key => $ex)
               
                <tr>
                	<td>{{ $key +1 }}</td>
                	<td>{{ $ex['title'] }}</td>
                	<td>{{ $ex['cat_name'] }}</td>
                	<td>{{ $ex['exam_date'] }}</td>
                	 <td><input type="checkbox" <?php if($ex['status'] == 1) { echo "checked"; }?> name="status" class="exam_status" data-id="<?php echo $ex['id']; ?>"></td>
                	<td>
                		<a href="{{ url('admin/edit_exam/'.$ex['id'])}}" class="btn btn-info">Edit</a>
                        <a href="{{ url('admin/delete_exam/'.$ex['id'])}}" class="btn btn-danger">Delete</a>
                        <a href="{{ url('admin/add_question/'.$ex['id'])}}" class="btn btn-primary">Add Question</a>
                	</td>
                </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                   <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Exam Date</th>
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
      <form action="{{ url('admin/add_new_exam') }}" class="database-operation" method="post">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Title</label>
            {{ csrf_field() }}
            <input type="text" name="title" placeholder="Enter Title" class="form-control">
          </div>
        </div>
          <div class="col-sm-12">
          <div class="form-group">
            <label>Select Exam Date</label>
            <input type="date" name="exam_date" class="form-control">
          </div>
        </div> 
           <div class="col-sm-12">
          <div class="form-group">
          	<label>Select Category</label>
            <select class="form-control" name="exam_category">
            	<option value="">Select Category</option>            	
            	@foreach($category as $cat)
            	<option value="{{ $cat->id }}">{{ $cat->name }}</option>
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