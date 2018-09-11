<?php

//Connect to database
include('database_connection.php');

session_start();
//Retrieve last activity from database
$query = "
UPDATE login_details 
SET last_activity = now() 
WHERE login_details_id = '".$_SESSION["login_details_id"]."'
";

$statement = $connect->prepare($query);

$statement->execute();

?>