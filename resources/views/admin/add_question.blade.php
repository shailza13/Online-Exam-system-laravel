@extends('layouts.app')
@section('title','Exam Question')
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
              <li class="breadcrumb-item active">Exams Question</li>
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
                <table class="table table-striped table-bordered table-hover dataTable">
                  <thead>                  	
                  	<tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Ans</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
             
                  </thead>
                  <tbody>
                    @foreach($questions as $key => $ques)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $ques['question'] }}</td>
                      <td>{{ $ques['ans'] }}</td>
                      <td><input type="checkbox" name="status" <?php if($ques['status']==1) { echo "checked"; }?> class="question_status" data-id="<?php echo $ques['id']; ?>"></td>
                      <td>
                        <a href="{{url('admin/update_question/'.$ques['id'])}}" class="btn btn-info btn-sm">Update</a>
                        <a href="{{url('admin/delete_question/'.$ques['id'])}}" class="btn btn-danger btn-sm" >Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <th>#</th>
                    <th>Question</th>
                    <th>Ans</th>
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
<div class="modal-dialog model-lg">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Add New Question</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <form action="{{ url('admin/add_new_question') }}" class="database-operation" method="post">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Question</label>
            {{ csrf_field() }}
            <input type="text" name="question" placeholder="Enter Question" class="form-control">
            <input type="hidden" name="exam_id" value="{{ Request::segment(3)}}">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Enter Option 1</label>
            {{ csrf_field() }}
            <input type="text" name="option1" placeholder="option1" class="form-control">
          </div>
        </div>
          <div class="col-sm-6">
          <div class="form-group">
            <label>Enter Option 2</label>
            {{ csrf_field() }}
            <input type="text" name="option2" placeholder="option2" class="form-control">
          </div>
        </div>
          <div class="col-sm-6">
          <div class="form-group">
            <label>Enter Option 3</label>
            {{ csrf_field() }}
            <input type="text" name="option3" placeholder="option3" class="form-control">
          </div>
        </div>
          <div class="col-sm-6">
          <div class="form-group">
            <label>Enter Option 4</label>
            {{ csrf_field() }}
            <input type="text" name="option4" placeholder="option4" class="form-control">
          </div>
        </div>
          <div class="col-sm-12">
          <div class="form-group">
            <label>Enter Right Ans</label>
            {{ csrf_field() }}
            <input type="text" name="ans" placeholder="Enter Right Ans" class="form-control">
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