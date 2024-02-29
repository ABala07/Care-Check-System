<?php 

//TOTAL USER

$total_user_sql = mysql_query("SELECT * FROM users");

$total_user = mysql_num_rows($total_user_sql);

//TOTAL DATA

$total_data_sql1 = mysql_query("SELECT * FROM sleepsumdb");
$total_data_sql2 = mysql_query("SELECT * FROM sleepdb");
$total_data_sql3 = mysql_query("SELECT * FROM heartratedb");

$total_data1 = mysql_num_rows($total_data_sql1);
$total_data2 = mysql_num_rows($total_data_sql2);
$total_data3 = mysql_num_rows($total_data_sql3);

$total_data = $total_data1 + $total_data2 + $total_data3;

//TOTAL CRITIC HEART RHYTHM

$total_critic_sql = mysql_query("SELECT * FROM heartratedb WHERE HeartRate>=120 OR HeartRate<=45");

if(!empty($total_critic_sql)){
	$total_critic = mysql_num_rows($total_critic_sql);
} else{
	$total_critic = '0';
}

//TOTAL BAD SLEEP

$total_badsleep_sql = mysql_query("SELECT * FROM sleepsumdb WHERE Efficiency<=60");

if(!empty($total_badsleep_sql)){
	$total_badsleep = mysql_num_rows($total_badsleep_sql);
} else{
	$total_badsleep = '0';
}
?>
<div class="row">
	<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
		<div class="card">
			<div class="card-header p-3 pb-0 pt-2">
				<div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
					<i class="material-icons opacity-10">save</i>
				</div>
				<div class="text-end pt-1">
					<p class="text-sm mb-0 text-capitalize">Total Data</p>
					<h4 class="mb-0"><?=$total_data;?></h4>
				</div>
			</div>
			<hr>
			<div style="padding:0px;" class="card-footer text-center">
				<a href="admin.php?page=1" style="width: 90%;" class="btn bg-gradient-dark">Select User</a>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
		<div class="card">
			<div class="card-header p-3 pb-0 pt-2">
				<div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
					<i class="material-icons opacity-10">person</i>
				</div>
				<div class="text-end pt-1">
					<p class="text-sm mb-0 text-capitalize">Total Users</p>
					<h4 class="mb-0"><?=$total_user;?></h4>
				</div>
			</div>
			<hr>
			<div style="padding:0px;" class="card-footer text-center">
				<a href="admin.php?page=1" style="width: 90%;" class="btn bg-gradient-primary">See All User</a>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
		<div class="card">
			<div class="card-header p-3 pb-0 pt-2">
				<div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
					<i class="material-icons opacity-10">ssid_chart</i>
				</div>
				<div class="text-end pt-1">
					<p class="text-sm mb-0 text-capitalize">Total Critical Heart Rhythm</p>
					<h4 class="mb-0"><?=$total_critic;?></h4>
				</div>
			</div>
			<hr>
			<div style="padding:0px;" class="card-footer text-center">
				<a href="admin.php?page=1" style="width: 90%;" class="btn bg-gradient-success">See All Critical Heart Rhythm</a>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6">
		<div class="card">
			<div class="card-header p-3 pb-0 pt-2">
				<div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
					<i class="material-icons opacity-10">weekend</i>
				</div>
				<div class="text-end pt-1">
					<p class="text-sm mb-0 text-capitalize">Total Bad Sleep Effiency</p>
					<h4 class="mb-0"><?=$total_badsleep;?></h4>
				</div>
			</div>
			<hr>
			<div style="padding:0px;" class="card-footer text-center">
				<a href="admin.php?page=1" style="width: 90%;" class="btn bg-gradient-info">See All Bad Sleep Effiency</a>
			</div>
		</div>
	</div>
</div>