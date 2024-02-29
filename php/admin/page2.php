<?php 
if($client_id=="" OR $client_id == NULL){
	header("Location:admin.php");
	exit();
}

if(isset($_GET['value'])){
	$value = $_GET['value'];
} else {
	$value = 1;
}

if(isset($_GET['getdate'])){
	$getdate = $_GET['getdate'];
} else {
	$getdate = NULL;
}


if($value == 1){ //sayfalama sistemi
	require_once 'php/admin/page2/1.php';
}elseif($value == 2){
	require_once 'php/admin/page2/2.php';
}
else{
	header("Location:admin.php");
	exit();
}
?>
