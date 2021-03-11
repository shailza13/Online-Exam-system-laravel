<!DOCTYPE html>
<html>
<head>
	<title>Print</title>
	<style type="text/css">
		.print_container {
    width: 60%;
    margin: auto;
}
		.exam_title {
    text-align: center;
}
.user_info_block {
	margin-top: 74px;
	}
.info_block {
	width: 50%;
    float: left;
    height: 50px;
    line-height: 50px;
    text-align: center;
}
.print_button
{
	text-align: center;
	padding-top: 99px;
}
	</style>
</head>
<body>
	<div class="print_container">
		<div class="exam_title">
			<h3>{{ $exam_info['title'] }}</h3>
			<p>{{ date('d m,Y',strtotime($exam_info['exam_date'])) }}</p>
		</div>
		<div class="user_info_block">
			<div class="info_block">
				<label>Name: </label>
			</div>
			<div class="info_block">
				<label>Email: {{ $std_info['email']}}</label>
			</div>
			<div class="info_block">
				<label>Mobile: {{ $std_info['mobile_no']}}</label>
			</div>
			<div class="info_block">
				<label>DOB: {{ date('d-M,Y',strtotime($std_info['dob']))}}</label>
			</div>
		</div>
		<div class="print_button">
			<button  onclick="window.print()">Print</button>
		</div>
	</div>
</body>
</html>