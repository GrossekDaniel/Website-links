<?php

$host = "database4website.mysql.database.azure.com";
$db_user = "grossman@database4website";
$db_password = "zaq1@WSX";
$db_name = "crud";

$conn = mysqli_init();
mysqli_real_connect($conn, $host, $db_user, $db_password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}
	$id = 0;
	$link = "";

	if (isset($_POST['save'])) {
		$link = $_POST['link'];
		mysqli_query($conn, "INSERT INTO info (link) VALUES ('$link')"); 
		$_SESSION['message'] = "Saved";
		header('location: index.php');
	}

	if (isset($_GET['del'])) {
        $id = $_GET['del'];
        
		mysqli_query($conn, "DELETE FROM info WHERE id=$id");
		$_SESSION['message'] = "Deleted!"; 
		header('location: index.php');
    }
    
    $results = mysqli_query($db, "SELECT * FROM info"); 
?>
