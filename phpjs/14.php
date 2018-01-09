<?php
$conn=mysqli_connect("localhost","root",'jah2024');
mysqli_select_db($conn,"opentutorials");
$name=mysqli_real_escape_string($conn,$_GET['name']);
$password=mysqli_real_escape_string($conn,$_GET['password']);
$sql= "SELET*FROM user WHERE name='".$name."'AND password='".$password."'";
$result=mysqli_query($conn,$sql);
var_dump($result->num_rows);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
</head>
<body>
<?php

$password=$_GET["password"];
if ($result->num_rows=="0") {echo "누구세요?";}
else {echo "주인님 환영합니다.";}
?>
</body>
</html>
