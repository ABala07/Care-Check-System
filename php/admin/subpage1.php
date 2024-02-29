<?php 
if($a_admin != 1){
	header("Location:index.php");
	exit();
}
?>
<h5 class="text-center mt-5">Kalp Atışı Veri Listesi</h5>
<p class="text-center mt-3 mb-2">100 üzeri olan kalp atışları <b>kalın yazı</b> ile belirtilmiştir.</p>
<?php if($date == 0){ ?>
	<center>
		<?php
		$query = mysql_query("SELECT DISTINCT date FROM heart WHERE client_id='$user_client_id' ORDER BY date DESC");

		while($row = mysql_fetch_array($query)){
			echo '<a href="?page=2&id='.$id.'&subpage=1&date='.$row['date'].'" class="btn btn-dark m-2">'.$row['date'].' Tarihli Veriler</a><br>';
		}
		?>
	</center>
<?php } else { ?>
	<div class="container">
		<div class="row">
			<div class="col-3 bg-light p-5">
				<a class="btn btn-secondary mb-4" href="?page=2&id=<?=$id;?>&subpage=1">Geri Dön</a> <br>
				Kullanıcının bilgileri, <br>
				Adı: <b><?=$user_name;?></b> <br>
				Soyadı: <b><?=$user_surname;?></b>
			</div>
			<div class="col-9 p-3">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">Time</th>
							<th scope="col">Heart Rate</th>
							<th scope="col">Date</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$query = mysql_query("SELECT * FROM heart WHERE client_id='$user_client_id' AND date='$date'");
						while($row = mysql_fetch_array($query)){

						 ?>
						 <tr>
							<th scope="row"><?=$row['time'];?></th>
							<td><?php if($row['heart_rate'] >= "100"){echo '<b>'.$row['heart_rate'].'</b>';}else{echo $row['heart_rate'];} ?></td>
							<td><?=$row['date'];?></td>
						</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<?php 
	} ?>