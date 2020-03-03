<?php

$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';

foreach ($_SERVER as $key => $value) {
  if (strpos($key, "MYSQLCONNSTR_") !== 0) {
    continue;
  }

  $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
  $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
  $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
  $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

define('db_name', $connectstr_dbname);
define('username', $connectstr_dbusername);
define('password', $connectstr_dbpassword);
define('servername', $connectstr_dbhost);

// Create connection

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
