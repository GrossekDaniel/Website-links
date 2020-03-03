<?php



// Create connection
$con=mysqli_init(); 
mysqli_real_connect($con, "database4website.mysql.database.azure.com", "grossman@database4website", "zaq1@WSX", "crud", 3306);

	$id = 0;
	$link = "";

	if (isset($_POST['save'])) {
		$link = $_POST['link'];

		mysqli_query($con, "INSERT INTO info (link) VALUES ('$link')"); 
		$_SESSION['message'] = "Saved";
		header('location: index.php');
	}

	if (isset($_GET['del'])) {
        $id = $_GET['del'];
        
		mysqli_query($con, "DELETE FROM info WHERE id=$id");
		$_SESSION['message'] = "Deleted!"; 
		header('location: index.php');
    }
    
    $results = mysqli_query($db, "SELECT * FROM info"); 
?>
