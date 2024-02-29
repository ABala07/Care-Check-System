<?php 
require_once 'php/connection.php';
require_once 'php/function.php';

if($login != 1){
	header("Location:index.php");
	exit();
} else{
	if($a_admin != 1){
		header("Location:index.php");
		exit();
	} 
}

if(isset($_GET['page'])){
	$page = $_GET['page'];
} else {
	$page = 0;
}

if(isset($_GET['client_id'])){
	$client_id = $_GET['client_id'];
} else {
	$client_id = NULL;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="./assets2/img/apple-icon.png">
	<link rel="icon" type="image/png" href="./assets2/img/favicon.png">
	<title>
		Ellecom Admin Panel
	</title>
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
	<!-- Nucleo Icons -->
	<link href="./assets2/css/nucleo-icons.css" rel="stylesheet" />
	<link href="./assets2/css/nucleo-svg.css" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	<!-- CSS Files -->
	<link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body class="g-sidenav-show  bg-gray-200">
	<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
		<div class="sidenav-header">
			<i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
			<a class="navbar-brand m-0" href="admin.php">
				<span class="ms-1 font-weight-bold text-white">Ellecom Admin</span>
			</a>
		</div>
		<hr class="horizontal light mt-0 mb-2">
		<div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link text-white active bg-gradient-primary" href="/admin.php">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">dashboard</i>
						</div>
						<span class="nav-link-text ms-1">Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="#">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">table_view</i>
						</div>
						<span class="nav-link-text ms-1">User List</span>
					</a>
				</li>
					<li class="nav-item">
					<a class="nav-link text-white " href="#">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">table_view</i>
						</div>
						<span class="nav-link-text ms-1">Settings</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white " href="/logout.php">
						<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
							<i class="material-icons opacity-10">table_view</i>
						</div>
						<span class="nav-link-text ms-1">Log Out</span>
					</a>
				</li>
			</ul>
		</div>
	</aside>
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg mt-5">
		
		<?php
		?>
		<div class="container-fluid py-4">
			<?php 
			if($page == "" OR $page == 0){ //sayfalama sistemi
				require_once 'php/admin/default.php';
			} elseif($page == 1){
				require_once 'php/admin/page1.php';
			} elseif($page == 2){
				require_once 'php/admin/page2.php';
			}

			?>
		
			<br>
			<br>
			areldi bala
			<br>
			<br>
			<div class="container d-flex justify-content-center">                       
			 <h2 class="mt-2">Meet Our Team</h2>
			 </div>
			<div class="container d-flex justify-content-center">
    <div class="row"> <div class="col-md-4">
            <div class="card p-3 py-4 mt-5">
                <div class="text-center"> <img src="image/yal.png" width="100" class="rounded-circle">
                    <h3 class="mt-1">Dr.Yalçın Albayrak</h3> <span class="mt-1 clearfix">Supervisor</span> <small class="mt-4"></small>
                    <div class="social-buttons mt-5"> <button class="neo-button"><i class="fa fa-facebook fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-linkedin fa-1x"></i></button> <button class="neo-button"><i class="fa fa-google fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-youtube fa-1x"></i> </button> </div>
                </div>
            </div>	
        </div>
        <div class="col-md-4">
            <div class="card p-3 py-4 mt-5 mb-5">
                <div class="text-center"> <img src="image/Areldi.jpg" width="100" class="rounded-circle">
                    <h3 class="mt-2">Areldi Bala</h3> <span class="mt-1 clearfix">Web Developer</span> <small class="mt-4"></small>
                    <div class="social-buttons mt-5"> <button class="neo-button"><i class="fa fa-facebook fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-linkedin fa-1x"></i></button> <button class="neo-button"><i class="fa fa-google fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-youtube fa-1x"></i> </button> </div>
                </div>
            </div>
        </div>
                <div class="col-md-4">
            <div class="card p-3 py-4 mt-5 mb-5">
                <div class="text-center"> <img src="image/Areldi.jpg" width="100" class="rounded-circle">
                    <h3 class="mt-2">Bala Areldi</h3> <span class="mt-1 clearfix">Software Eng</span> <small class="mt-4"></small>
                    <div class="social-buttons mt-5"> <button class="neo-button"><i class="fa fa-facebook fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-linkedin fa-1x"></i></button> <button class="neo-button"><i class="fa fa-google fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-youtube fa-1x"></i> </button> </div>
                </div>
            </div>
        </div>

 

     

      
    </div>
</div>

		</div>
		<footer class="footer py-4  ">
			<div class="container-fluid">
				<div class="row align-items-center justify-content-lg-between">
					<div class="col-lg-6 mb-lg-0 mb-4">
						<div class="copyright text-center text-sm text-muted text-lg-start">
							© <script>
								document.write(new Date().getFullYear())
							</script>,
							made  by
							<a href="https://www.ellecom.ch" class="font-weight-bold" target="_blank">Areldi Bala</a>
							
						</div>
					</div>
					<div class="col-lg-6">
						<ul class="nav nav-footer justify-content-center justify-content-lg-end">
							<li class="nav-item">
								<a href="https://www.ellecom.de" class="nav-link text-muted" target="_blank">Ellecom GmbH</a>
							</li>
							<li class="nav-item">
								<a href="https://www.ellecom.de/en/the-company/" class="nav-link text-muted" target="_blank">About Us</a>
							</li>
							<li class="nav-item">
								<a href="https://www.ellecom.de/en/blog/" class="nav-link text-muted" target="_blank">Blog</a>
							</li>
							<li class="nav-item">
								<a href="https://www.ellecom.de/imprint/" class="nav-link pe-0 text-muted" target="_blank">License</a>
							</li>
						</ul>
					</div>

				</div>
			</div>
		</footer>
	</div>
</main>

<script src="./assets/js/core/popper.min.js"></script>
<script src="./assets/js/core/bootstrap.min.js"></script>
<script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="./assets/js/plugins/chartjs.min.js"></script>
<script>
	<?php if(isset($value)){
		if($value == 1){ ?>
			var ctx2 = document.getElementById("chart-line").getContext("2d");

			new Chart(ctx2, {
				type: "line",
				data: {
					labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24"],
					datasets: [{
						label: "Hourly Average",
						tension: 0,
						borderWidth: 0,
						pointRadius: 5,
						pointBackgroundColor: "rgba(255, 255, 255, .8)",
						pointBorderColor: "transparent",
						borderColor: "rgba(255, 255, 255, .8)",
						borderColor: "rgba(255, 255, 255, .8)",
						borderWidth: 4,
						backgroundColor: "transparent",
						fill: true,
						data: [<?=$avag['0'];?>, <?=$avag['1'];?>, <?=$avag['2'];?>, <?=$avag['3'];?>, <?=$avag['4'];?>, <?=$avag['5'];?>, <?=$avag['6'];?>, <?=$avag['7'];?>, <?=$avag['8'];?>, <?=$avag['9'];?>, <?=$avag['10'];?>, <?=$avag['11'];?>, <?=$avag['12'];?>, <?=$avag['13'];?>, <?=$avag['14'];?>, <?=$avag['15'];?>, <?=$avag['16'];?>, <?=$avag['17'];?>, <?=$avag['18'];?>, <?=$avag['19'];?>, <?=$avag['20'];?>, <?=$avag['21'];?>, <?=$avag['22'];?>, <?=$avag['23'];?>],
						maxBarThickness: 8

					}],
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					plugins: {
						legend: {
							display: false,
						}
					},
					interaction: {
						intersect: false,
						mode: 'index',
					},
					scales: {
						y: {
							grid: {
								drawBorder: false,
								display: true,
								drawOnChartArea: true,
								drawTicks: false,
								borderDash: [5, 5],
								color: 'rgba(255, 255, 255, .2)'
							},
							ticks: {
								display: true,
								color: '#f8f9fa',
								padding: 10,
								font: {
									size: 14,
									weight: 300,
									family: "Roboto",
									style: 'normal',
									lineHeight: 2
								},
							}
						},
						x: {
							grid: {
								drawBorder: false,
								display: false,
								drawOnChartArea: false,
								drawTicks: false,
								borderDash: [5, 5]
							},
							ticks: {
								display: true,
								color: '#f8f9fa',
								padding: 10,
								font: {
									size: 14,
									weight: 300,
									family: "Roboto",
									style: 'normal',
									lineHeight: 2
								},
							}
						},
					},
				},
			});
			<?php
		}
	} else{ ?>
		var ctx2 = document.getElementById("chart-line").getContext("2d");

		new Chart(ctx2, {
			type: "line",
			data: {
				labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24"],
				datasets: [{
					label: "Hourly Average",
					tension: 0,
					borderWidth: 0,
					pointRadius: 5,
					pointBackgroundColor: "rgba(255, 255, 255, .8)",
					pointBorderColor: "transparent",
					borderColor: "rgba(255, 255, 255, .8)",
					borderColor: "rgba(255, 255, 255, .8)",
					borderWidth: 4,
					backgroundColor: "transparent",
					fill: true,
					data: [<?=$avag['0'];?>, <?=$avag['1'];?>, <?=$avag['2'];?>, <?=$avag['3'];?>, <?=$avag['4'];?>, <?=$avag['5'];?>, <?=$avag['6'];?>, <?=$avag['7'];?>, <?=$avag['8'];?>, <?=$avag['9'];?>, <?=$avag['10'];?>, <?=$avag['11'];?>, <?=$avag['12'];?>, <?=$avag['13'];?>, <?=$avag['14'];?>, <?=$avag['15'];?>, <?=$avag['16'];?>, <?=$avag['17'];?>, <?=$avag['18'];?>, <?=$avag['19'];?>, <?=$avag['20'];?>, <?=$avag['21'];?>, <?=$avag['22'];?>, <?=$avag['23'];?>],
					maxBarThickness: 8

				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						display: false,
					}
				},
				interaction: {
					intersect: false,
					mode: 'index',
				},
				scales: {
					y: {
						grid: {
							drawBorder: false,
							display: true,
							drawOnChartArea: true,
							drawTicks: false,
							borderDash: [5, 5],
							color: 'rgba(255, 255, 255, .2)'
						},
						ticks: {
							display: true,
							color: '#f8f9fa',
							padding: 10,
							font: {
								size: 14,
								weight: 300,
								family: "Roboto",
								style: 'normal',
								lineHeight: 2
							},
						}
					},
					x: {
						grid: {
							drawBorder: false,
							display: false,
							drawOnChartArea: false,
							drawTicks: false,
							borderDash: [5, 5]
						},
						ticks: {
							display: true,
							color: '#f8f9fa',
							padding: 10,
							font: {
								size: 14,
								weight: 300,
								family: "Roboto",
								style: 'normal',
								lineHeight: 2
							},
						}
					},
				},
			},
		});
	<?php } ?>

	var ctx = document.getElementById("chart-bars").getContext("2d");

	new Chart(ctx, {
		type: "bar",
		data: {
			labels: ["Sleep", "Awake", "In Bed"],
			datasets: [{
				label: "Minutes", 
				tension: 0.4,
				borderWidth: 0,
				borderRadius: 4,
				borderSkipped: false,
				backgroundColor: "rgba(255, 255, 255, .8)",
				data: [<?=$sleepsum_minutesasleep;?>, <?=$sleepsum_minutesawake;?>, <?=$sleepsum_timeinbed;?>],
				maxBarThickness: 200
			}, ],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			plugins: {
				legend: {
					display: false,
				}
			},
			interaction: {
				intersect: false,
				mode: 'index',
			},
			scales: {
				y: {
					grid: {
						drawBorder: false,
						display: true,
						drawOnChartArea: true,
						drawTicks: false,
						borderDash: [5, 5],
						color: 'rgba(255, 255, 255, .2)'
					},
					ticks: {
						suggestedMin: 0,
						suggestedMax: 500,
						beginAtZero: true,
						padding: 10,
						font: {
							size: 14,
							weight: 300,
							family: "Roboto",
							style: 'normal',
							lineHeight: 2
						},
						color: "#fff"
					},
				},
				x: {
					grid: {
						drawBorder: false,
						display: true,
						drawOnChartArea: true,
						drawTicks: false,
						borderDash: [5, 5],
						color: 'rgba(255, 255, 255, .2)'
					},
					ticks: {
						display: true,
						color: '#f8f9fa',
						padding: 10,
						font: {
							size: 14,
							weight: 300,
							family: "Roboto",
							style: 'normal',
							lineHeight: 2
						},
					}
				},
			},
		},
	});


	var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

	new Chart(ctx3, {
		type: "line",
		data: {
			labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
				label: "Mobile apps",
				tension: 0,
				borderWidth: 0,
				pointRadius: 5,
				pointBackgroundColor: "rgba(255, 255, 255, .8)",
				pointBorderColor: "transparent",
				borderColor: "rgba(255, 255, 255, .8)",
				borderWidth: 4,
				backgroundColor: "transparent",
				fill: true,
				data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
				maxBarThickness: 6

			}],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			plugins: {
				legend: {
					display: false,
				}
			},
			interaction: {
				intersect: false,
				mode: 'index',
			},
			scales: {
				y: {
					grid: {
						drawBorder: false,
						display: true,
						drawOnChartArea: true,
						drawTicks: false,
						borderDash: [5, 5],
						color: 'rgba(255, 255, 255, .2)'
					},
					ticks: {
						display: true,
						padding: 10,
						color: '#f8f9fa',
						font: {
							size: 14,
							weight: 300,
							family: "Roboto",
							style: 'normal',
							lineHeight: 2
						},
					}
				},
				x: {
					grid: {
						drawBorder: false,
						display: false,
						drawOnChartArea: false,
						drawTicks: false,
						borderDash: [5, 5]
					},
					ticks: {
						display: true,
						color: '#f8f9fa',
						padding: 10,
						font: {
							size: 14,
							weight: 300,
							family: "Roboto",
							style: 'normal',
							lineHeight: 2
						},
					}
				},
			},
		},
	});
</script>
<script>
	var win = navigator.platform.indexOf('Win') > -1;
	if (win && document.querySelector('#sidenav-scrollbar')) {
		var options = {
			damping: '0.5'
		}
		Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
	}
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>
</html>