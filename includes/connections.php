<?php		
			// Establishing Connection with Server by passing inputs as a parameter
	$serverName = "localhost";
	$dbUsername = "root";
	$dBPassword = "";
	$dBName =  "dbmswd";


	$con = mysqli_connect($serverName,$dbUsername,$dBPassword,$dBName);

if (!$con){
	?>
	<div class="alert alert-danger" role="alert">
		<?php die("Connection failed!: " .mysqli_connect_error());?>
	</div>
<?php
	
}
			date_default_timezone_set("Asia/Manila");
?>