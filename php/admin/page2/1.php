<?php 

if($getdate == "" OR $getdate == NULL){ //tarih seçmediyse
	?>
	<div class="row">
		<div class="col-12">
			<a href="admin.php?page=1&client_id=<?=$client_id;?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i></a>
		</div>
		<div class="col-12 bg-gradient-dark p-4" style="border-radius: 10px;">
			<p class="text-white"><b>Select Date</b></p>
			<?php 

			$heart_sql = mysql_query("SELECT DISTINCT Date FROM heartratedb ORDER BY id DESC");

			while($heart = mysql_fetch_array($heart_sql)){
				if($heart['Date'] != "Date"){ ?>
					<div class="mt-4 mb-4 text-white">
						<?=$heart['Date'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn-sm btn-success" href="/admin.php?page=2&client_id=<?=$client_id;?>&value=<?=$value;?>&getdate=<?=$heart['Date'];?>"><i class="fa fa-search"></i></a>
					</div>
					<?php
				} 
			}

			?>
		</div>
	</div>
	<?php
} else{ //tarih seçtiyse 
	?> 

	<div class="row justify-content-center">
		<div class="col-12">
			<a href="/admin.php?page=2&client_id=<?=$client_id;?>&value=<?=$value;?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i></a>
		</div>
		<div class="col-lg-12 col-md-12 mt-4 mb-4">
			<div class="card z-index-2  ">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
					<div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
						<div class="chart">
							<canvas id="chart-line" class="chart-canvas" height="170"></canvas>
						</div>
					</div>
				</div>
				<div class="card-body">
					<h6 class="mb-0">Heart Rate Analysis </h6>
					<p class="text-sm ">When the watch is not worn, the last data entered is accepted.</p>
					<hr class="dark horizontal">
					<div class="d-flex ">
						<i class="material-icons text-sm my-auto me-1">schedule</i>
						<p class="mb-0 text-sm"> The data was sent on <?=$getdate;?> </p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-6">
			<div class="card h-100">
				<div class="card-header pb-0">
					<h6>Morning Heart Rate Analysis</h6>
					<p class="text-sm">
						Data for the date <span class="font-weight-bold"><?=$getdate;?></span>
					</p>
				</div>
				<div class="card-body p-3">
					<div class="timeline timeline-one-side">
						<?php 
						for ($time_heart = 0; $time_heart <= 11; $time_heart++) { //saat 12 ye kadarki veriler
							if($time_heart <=9){
								$time_heart = '0'.$time_heart;
							}
							$heart_query = mysql_query("SELECT * FROM heartratedb WHERE Date='$getdate' AND Time LIKE '$time_heart:%' AND client_id='$client_id' ORDER BY Time ASC");
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
						}
						?>

					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-6">
			<div class="card h-100">
				<div class="card-header pb-0">
					<h6>During The Day Heart Rate Analysis</h6>
					<p class="text-sm">
						Data for the date <span class="font-weight-bold"><?=$getdate;?></span>
					</p>
				</div>
				<div class="card-body p-3">
					<div class="timeline timeline-one-side">
						<?php 
						for ($time_heart = 12; $time_heart <= 16; $time_heart++) { //öğleden sonra
							$heart_query = mysql_query("SELECT * FROM heartratedb WHERE Date='$getdate' AND Time LIKE '$time_heart:%' AND client_id='$client_id' ORDER BY Time ASC");
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
						}
						?>

					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-6">
			<div class="card h-100">
				<div class="card-header pb-0">
					<h6>Evening Heart Rate Analysis</h6>
					<p class="text-sm">
						Data for the date <span class="font-weight-bold"><?=$getdate;?></span>
					</p>
				</div>
				<div class="card-body p-3">
					<div class="timeline timeline-one-side">
						<?php 
						for ($time_heart = 17; $time_heart <= 24; $time_heart++) { //akşam
							$heart_query = mysql_query("SELECT * FROM heartratedb WHERE Date='$getdate' AND Time LIKE '$time_heart:%' AND client_id='$client_id' ORDER BY Time ASC");
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
						}
						?>

					</div>
				</div>
			</div>
		</div>
	</div>





	<?php

	$sleepsum_minutesasleep = 0;
	$sleepsum_minutesawake = 0;
	$sleepsum_timeinbed = 0;

	for ($time_calculate = 0; $time_calculate <= 23; $time_calculate++) {

		if($time_calculate <=9){
			$time_calculate = '0'.$time_calculate;
		}

		$heart_rate_query = mysql_query("SELECT * FROM heartratedb WHERE Date='$getdate' AND Time LIKE '$time_calculate:%' AND client_id='$client_id' ORDER BY Time DESC");

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

	for ($time_calculate = 0; $time_calculate <= 23; $time_calculate++) {

		if($time_calculate <=9){
			$time_calculate = '0'.$time_calculate;
		}

		$heart_rate_query = mysql_query("SELECT * FROM heartratedb WHERE Date='$getdate' AND Time LIKE '$time_calculate:%' AND client_id='$client_id' ORDER BY Time ASC");

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