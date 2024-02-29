<?php 

if($getdate == "" OR $getdate == NULL){ //eğer tarih seçili değil ise
	?>
	<div class="row">
		<div class="col-12">
			<a href="admin.php?page=1&client_id=<?=$client_id;?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i></a>
		</div>
		<div class="col-12 bg-gradient-dark p-4" style="border-radius: 10px;">
			<p class="text-white"><b>Select Date</b></p>
			<?php 

			$sleepsum_sql = mysql_query("SELECT DISTINCT Date FROM sleepsumdb ORDER BY id DESC");

			while($sleepsum = mysql_fetch_array($sleepsum_sql)){ //search sonuçları
				if($sleepsum['Date'] != "Date"){ ?>
					<div class="mt-4 mb-4 text-white">
						<?=$sleepsum['Date'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn-sm btn-success" href="/admin.php?page=2&client_id=<?=$client_id;?>&value=<?=$value;?>&getdate=<?=$sleepsum['Date'];?>"><i class="fa fa-search"></i></a>
					</div>
					<?php
				} 
			}

			?>
		</div>
	</div>
	<?php
} else{ //tarih seçiliyse

	$query = mysql_query("SELECT * FROM sleepsumdb WHERE Date='$getdate' AND client_id='$client_id'");
	while($row = mysql_fetch_array($query)){
		$sleepsum_date = $row['Date'];
		$sleepsum_efficiency = $row['Efficiency'];
		$sleepsum_minutesasleep = $row['MinutesAsleep'];
		$sleepsum_minutesawake = $row['MinutesAwake'];
		$sleepsum_timeinbed = $row['TimeinBed'];
	}


	?>

	<div class="row">
		<div class="col-12">
			<a href="/admin.php?page=2&client_id=<?=$client_id;?>&value=<?=$value;?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i></a>
		</div>
		<div class="col-lg-12 col-md-12 mt-4 mb-4">
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
		<div class="col-12 card p-4" style="border-radius:10px;">
			<div class="row text-dark" style="font-size: 17px;">
				<?php

				function sleepicon($sleep){ //ikon seçme fonksiyonu
					if($sleep == "Asleep"){
						return 'class="text-success fa-solid fa-bed-pulse"></i>';
					} elseif($sleep =="Awake"){
						return 'class="text-warning fa-solid fa-bed"></i>';
					} elseif($sleep == "Very Awake"){
						return 'class="text-danger material-icons">accessibility_new</i>';
					}
				}

				$query = mysql_query("SELECT * FROM sleepdb WHERE Date='$getdate' AND client_id='$client_id'");
				while($row = mysql_fetch_array($query)){ //Uyanık mı değil mi sorgusu
					if(!isset($sleep)){
						$sleep = $row['Interpreted'];
						echo '<div class="col-1 mt-2 mb-2">
						<i data-bs-toggle="tooltip" data-bs-placement="top" title="'.$sleep.'" '.sleepicon($sleep).' '.$row['Time'].'
						</div>';
					}
					if($sleep == $row['Interpreted']){ //eğer hala veri değişmediyse boş

					}else{ //Veri değiştiği için uyku durumu değişti
						echo '<div class="col-1 mt-2 mb-2">
						<i data-bs-toggle="tooltip" data-bs-placement="top" title="'.$sleep.'" '.sleepicon($sleep).' '.$row['Time'].'
						</div>';
						$sleep = $row['Interpreted'];
						echo '<div class="col-1 mt-2 mb-2">
						<i data-bs-toggle="tooltip" data-bs-placement="top" title="'.$sleep.'" '.sleepicon($sleep).' '.$row['Time'].'
						</div>';
					}
				} ?>
			</div>
		</div>
	</div>
	<?php
}
?>