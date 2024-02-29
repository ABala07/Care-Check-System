<?php 

session_start();
ob_start();
error_reporting(0);

$connect = mysql_connect("localhost","root","") or die ("Fail");
mysql_select_db("ellecom_care",$connect) or die ("Fail 2");
mysql_query("SET NAMES utf8");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET COLLATION_CONNECTION='utf8_general_ci'");


if(isset($_SESSION['login'])){
	if($_SESSION['login'] == 1 AND $_SESSION['username']){

		$login = 1;

		$query = mysql_query("SELECT * FROM users WHERE username='".$_SESSION['username']."'");
		while($account = mysql_fetch_array($query)){

			$a_username = $account['username'];
			$a_cliend_id = $account['client_id'];
			$a_admin = $account['admin'];
			$a_name = $account['name'];
			$a_surname = $account['surname'];
			$a_email = $account['email'];
		} 

	} else{

		$login = 0;

	}
}
else {

	$login = 0;

}
?>