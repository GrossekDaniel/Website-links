<?php
session_start();
$host = "database4website.mysql.database.azure.com";
$db_user = "grossman@database4website";
$db_password = "zaq1@WSX";
$db_name = "crud";

$conn = mysqli_init();
mysqli_real_connect($conn, $host, $db_user, $db_password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}
function sprawdzURL($input) {
	return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $input);
}
	$id = 0;
	$link = "";

	if (isset($_POST['save'])) {
		$link = $_POST['link'];
		if (sprawdzURL($link)!=true){
			$_SESSION['message'] = "This is not a website";
			header('location: index.php');
		}
		else {
			mysqli_query($conn, "INSERT INTO info (link) VALUES ('$link')"); 
			$_SESSION['message'] = "Saved";
			header('location: index.php');
		}
	}

	if (isset($_POST['send'])){
		$email = $_POST['email'];
		$url = 'https://api.sendgrid.com/';
 		$user = 'grossman';
 		$pass = 'zaq1@WSX';

 $params = array(
      'api_user' => $user,
      'api_key' => $pass,
      'to' => '$email',
      'subject' => 'testing',
      'html' => 'testing html',
      'text' => 'testing body',
      'from' => 'danielgrossek@gmail.com',
   );

 $request = $url.'api/mail.send.json';

 // Generate curl request
 $session = curl_init($request);

 // Tell curl to use HTTP POST
 curl_setopt ($session, CURLOPT_POST, true);

 // Tell curl that this is the body of the POST
 curl_setopt ($session, CURLOPT_POSTFIELDS, $params);

 // Tell curl not to return headers, but do return the response
 curl_setopt($session, CURLOPT_HEADER, false);
 curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

 // obtain response
 $response = curl_exec($session);
 curl_close($session);

 // print everything out
 print_r($response);
	}

	

	if (isset($_GET['del'])) {
        $id = $_GET['del'];
        
		mysqli_query($conn, "DELETE FROM info WHERE id=$id");
		$_SESSION['message'] = "Deleted!"; 
		header('location: index.php');
    }
    
    $results = mysqli_query($db, "SELECT * FROM info"); 
?>
