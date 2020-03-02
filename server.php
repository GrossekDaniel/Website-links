<?php
$servername = 'database4website.mysql.database.azure.com';
$username = 'grossman@database4website';
$password = 'zaq1@WSX';
$db_name = 'crud';

// Create connection
$conn = mysqli_init();
mysqli_real_connect($conn, $servername, $username, $password, $db_name, 3306);

	$db = mysqli_connect($servername, $username, $password, $db_name);
	$id = 0;
	$link = "";

	if (isset($_POST['save'])) {
		$link = $_POST['link'];

		mysqli_query($db, "INSERT INTO info (link) VALUES ('$link')"); 
		$_SESSION['message'] = "Saved";
		header('location: index.php');
	}

	if (isset($_GET['del'])) {
        $id = $_GET['del'];
        
		mysqli_query($db, "DELETE FROM info WHERE id=$id");
		$_SESSION['message'] = "Deleted!"; 
		header('location: index.php');
    }
    
    $results = mysqli_query($db, "SELECT * FROM info"); 
?>
