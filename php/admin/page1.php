<?php

if($client_id == "" OR $client_id == NULL){ //kullanıcı seçilmediyse arama yap
	if(isset($_GET['searchvalue'])){
		$searchvalue = $_GET['searchvalue'];
	} else {
		$searchvalue = NULL;
	}
	?>


	<div class="row mt-4">
		<div style="border-radius: 10px;" class="col-12 mt-4 bg-gradient-dark p-4">
			<form method="GET" action="admin.php">
				<div class="row">
					<div class="col-10">
						<input type="text" value="1" name="page" hidden>
						<label><b>Search Email</b></label>
						<input type="text" value="<?php if(isset($searchvalue)){echo $searchvalue;} ?>" class="form-control bg-gradient-info text-white p-2" name="searchvalue">
					</div>
					<div class="col-2">
						<label class="text-dark">.</label>
						<button type="submit" style="width: 100%;" class="btn bg-gradient-info"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</form>

			<?php if(isset($searchvalue)){
				$search_sql = mysql_query("SELECT * FROM users WHERE email like '%$searchvalue%'");
				while($search = mysql_fetch_array($search_sql)){
					echo '<div class="mt-4 mb-4"><font class="text-white">'.$search['email'].' <a class="btn-sm btn-success" href="admin.php?page=1&client_id='.$search['client_id'].'"><i class="fa fa-search"></i></a></font></div>';
				}
			} ?>
		</div>
	</div>
</div>

<?php

}else{ //kullanıcı seçildiyse

	$user_info_sql = mysql_query("SELECT * FROM users WHERE client_id='$client_id'");
	while($user_info = mysql_fetch_array($user_info_sql)){ //seçilen kullanıcıların bilgileri
		$user_name = $user_info['name'];
		$user_surname = $user_info['surname'];
		$user_username = $user_info['username'];
		$user_email = $user_info['email'];
		$user_admin = $user_info['admin'];
	}

	$query = mysql_query("SELECT * FROM sleepsumdb WHERE client_id='$client_id' ORDER BY id DESC LIMIT 0,1");
	while($row = mysql_fetch_array($query)){ //son gelen sleepsum verileri
		$sleepsum_date = $row['Date'];
		$sleepsum_efficiency = $row['Efficiency'];
		$sleepsum_minutesasleep = $row['MinutesAsleep'];
		$sleepsum_minutesawake = $row['MinutesAwake'];
		$sleepsum_timeinbed = $row['TimeinBed'];
	}


	$query = mysql_query("SELECT DISTINCT Date FROM heartratedb WHERE client_id='$client_id' ORDER BY Date DESC LIMIT 0,1");
	while($row = mysql_fetch_array($query)){ //son gelen kalp ritmi verilerinin tarihi
		$heartdate = $row['Date'];
	}
	?>
	<div class="row mt-4">
		<div class="col-12">
			<a href="admin.php?page=1" class="btn btn-dark"><i class="fa fa-arrow-left"></i></a>
		</div>
		<div class="col-lg-4 col-md-12 mb-4 mt-4">
			<div class="card z-index-2 ">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
					<div class="bg-gradient-dark text-white shadow-dark border-radius-lg py-3 pe-1">
						<p class="p-4">
							<b>Name Surname:</b> <?=$user_name;?> <?=$user_surname;?><br>
							<b>Email:</b> <?=$user_email;?><br>
							<b>Username:</b> <?=$user_username;?><br>
							<b>Client ID: </b> <?=$a_cliend_id;?><br>
							<b>User Type:</b> <?php if($user_admin == 1){echo'Admin';}else{echo'Normal User';} ?>
						</p>
					</div>
				</div>
				<div class="card-body">
					<h6 class="mb-0 ">User Information</h6>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-12 mt-4 mb-4">
			<div class="card z-index-2 ">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
					<div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
						<div class="chart">
							<canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
						</div>
					</div>
				</div>
				<div class="card-body">
					<h6 class="mb-0 ">Last Sleep Analysis</h6>
					<p class="text-sm ">Sleep effiency <b><?=$sleepsum_efficiency;?>%</b></p>
					<hr class="dark horizontal">
					<div class="d-flex ">
						<i class="material-icons text-sm my-auto me-1">schedule</i>
						<p class="mb-0 text-sm">The data was sent on <?=$sleepsum_date;?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-2 col-12 mt-4 mb-4">
			<div style="border-radius: 10px;" class="text-center card-body bg-gradient-dark text-white">
				<p>Select specific date</p>
				<a style="width: 90%;" href="?page=2&client_id=<?=$client_id;?>&value=1" class="btn bg-white">Heart Rate Analysis</a>
				<a style="width: 90%;" href="?page=2&client_id=<?=$client_id;?>&value=2" class="btn bg-white">Sleep Analysis</a>
			</div>
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-lg-10 col-md-12 mt-4 mb-4">
			<div class="card z-index-2  ">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
					<div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
						<div class="chart">
							<canvas id="chart-line" class="chart-canvas" height="170"></canvas>
						</div>
					</div>
				</div>
				<div class="card-body">
					<h6 class="mb-0"> Daily Heart Rate Analysis </h6>
					<p class="text-sm ">When the watch is not worn, the last data entered is accepted.</p>
					<hr class="dark horizontal">
					<div class="d-flex ">
						<i class="material-icons text-sm my-auto me-1">schedule</i>
						<p class="mb-0 text-sm"> The data was sent on <?=$heartdate;?> </p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-2 col-md-6">
			<div class="card h-100">
				<div class="card-header pb-0">
					<h6>Heart Rate Analysis</h6>
					<p class="text-sm">
						Data for the date <span class="font-weight-bold"><?=$heartdate;?></span>
					</p>
				</div>
				<div class="card-body p-3">
					<div class="timeline timeline-one-side">
						<?php 
						$heart_query = mysql_query("SELECT * FROM heartratedb WHERE Date='$heartdate' AND HeartRate>=80 AND client_id='$client_id' ORDER BY HeartRate DESC LIMIT 0,4");
						while($heart = mysql_fetch_array($heart_query)){
							?>
							<div class="timeline-block mb-3">
								<span class="timeline-step">
									<?php if($heart['HeartRate']>= 90){ echo '<i class="material-icons text-danger text-gradient">favorite</i>';} else{ echo '<i class="material-icons text-dark text-gradient">favorite_border</i>'; } ?>
								</span>
								<div class="timeline-content">
									<h6 class="text-dark text-sm font-weight-bold mb-0">Heart Rate: <?=$heart['HeartRate'];?></h6>
									<p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?=$heart['Time'];?></p>
								</div>
							</div>
							<?php 
						}
						?>

					</div>
					<a class="btn btn-sm btn-outline-dark" href="/admin.php?page=2&client_id=<?=$client_id;?>&value=1&getdate=<?=$heartdate;?>">See All</a>
				</div>
			</div>
		</div>


		<?php 
		for ($time_calculate = 0; $time_calculate <= 23; $time_calculate++) { //24 saat kalp ritmi verilerinin yüzdesel çıktısı

			if($time_calculate <=9){
				$time_calculate = '0'.$time_calculate;
			}

			$heart_rate_query = mysql_query("SELECT * FROM heartratedb WHERE Date='$heartdate' AND Time LIKE '$time_calculate:%' AND client_id='$client_id' ORDER BY Time DESC");

			$total = mysql_num_rows($heart_rate_query);

			while($heart_rate = mysql_fetch_array($heart_rate_query)){

				$tumveriler_dizi[] = $heart_rate['HeartRate'];

			}

			$numberOfElements = count($tumveriler_dizi); 
			$sum = 0; 

			for($i = 0; $i < $numberOfElements; $i++) {
				$sum = $sum + $tumveriler_dizi[$i];
			}

			$average = $sum / $numberOfElements;
			$avag[] = round($average); 

		}
	}
	?>
