<?php

$q = $_POST["q"];
$value = "";
$sql = "";
$email = $_POST["email"];

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "dailyvote");

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($q == "tester") {
	$value = $_POST["tester"];
	$sql = "UPDATE registration SET q_tester = '".$value."' WHERE email = '".$email."'";
} elseif ($q == "frequency") {
	$value = $_POST["frequency"];
	$sql = "UPDATE registration SET q_frequency = '".$value."' WHERE email = '".$email."'";
} elseif ($q == "share") {
	$value = $_POST["share"];
	$sql = "UPDATE registration SET q_share = '".$value."' WHERE email = '".$email."'";
} elseif ($q == "knowledge") {
	$value = $_POST["knowledge"];
	$sql = "UPDATE registration SET q_knowledge = '".$value."' WHERE email = '".$email."'";
} elseif ($q == "effort") {
	$value = $_POST["effort"];
	$sql = "UPDATE registration SET q_effort = '".$value."' WHERE email = '".$email."'";
} elseif ($q == "affiliation") {
	$value = $_POST["affiliation"];
	if ($_POST["affiliation-other"]) {
		$value = $value." - ".$_POST["affiliation-other"];
	};
	$sql = "UPDATE registration SET q_affiliation = '".$value."' WHERE email = '".$email."'";
} elseif ($q == "gender") {
	$value = $_POST["gender"];
	$sql = "UPDATE registration SET q_gender = '".$value."' WHERE email = '".$email."'";
}

if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
};

mysqli_close($con);

?>