<?php

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "dailyvote");

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "INSERT INTO registration (email, name, state) VALUES ('$_POST[email]','$_POST[name]','$_POST[state]')";

if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
};

mysqli_close($con);

?>