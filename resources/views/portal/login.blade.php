<!DOCTYPE html>
<html>
<head>
	<title>Portal -Signup</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style type="text/css">
  	.signup_container
{
	width: 60%;
	height: 440px;
	border: 10px solid;
	border-radius: 35px;
	padding: 20px;
	margin-left: 20%;
	margin-top: 80px;
}
  </style>
</head>
<body>
<div class="container">
	<div class="signup_container">
		<div class="signup_title">
			<h3 class="text-center">Portal Login</h3><hr/>
		</div>
		<form action="{{ url('portal/login_sub') }}" class="database-operation">
		<div class="signup_form">
			<div class="row">
					<div class="col-sm-12"> 
					<div class="form-group">
						<label>Enter Email</label>
						{{ csrf_field() }}
						<input type="email" name="email" placeholder="Enter email" class="form-control">
					</div>
				</div>
				<div class="col-sm-12"> 
					<div class="form-group">
						<label>Enter Password</label>
						<input type="password" name="password" placeholder="Enter password" class="form-control">
					</div>
				</div>
				<div class="col-sm-12"> 
					<div class="form-group">
						<button class="btn btn-info btn btn-block">Login</button>
					</div>
				</div>
					<div class="col-sm-12"> 
					<div class="form-group text-center">
						OR
					</div>
				</div>
				<div class="col-sm-12"> 
					<div class="form-group">
						<h5 class="text-right "><a href="{{url('portal/signup')}}" class="btn btn-primary btn-block">Sign Up</a></h5>
					</div>
				</div>
			</div>
		</div>
	</form>
	</div>
</div>
</body>
<script type="text/javascript">
	$(document).on('submit','.database-operation',function(){
	var url=$(this).attr('action');
	var data=$(this).serialize();
	$.post(url,data,function(fb){
	var resp=$.parseJSON(fb);
	if(resp.status=='true')
	{
		alert(resp.message);
		setTimeout(function(){
			window.location.href=resp.reload;
		},1000);
	}
	else
	{
		alert(resp.message);
	}
})
	return false;
});
</script>
</html>