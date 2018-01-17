<?php
require("config/config.php");
require("lib/db.php");
$conn=db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
$result=mysqli_query($conn,'SELECT*FROM topic');
?>

﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="/style.css">
<link href="/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">

</head>
<body id="target">
<div class="container">
<header class='jumbotron text-center'>
	<img class="img-circle" id="logo" src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" alt="생활코딩" title="승현이 대문입니다!" />
	<h1><a href="/index.php">JavaScript</a></h1>
</header>

<div class="row">

<nav class="col-md-3">
	<ol class="nav nav-pills nav-stacked">
<?php
while ($row=mysqli_fetch_assoc($result))
{echo '<li><a href="/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</li></a>'."\n";
echo "<br />";
}
?>
	</ol>
</nav>

<div class="col-md-9">


<article class="">
<?php
if (empty($_GET['id'])===false) {
$sql='SELECT*FROM topic where id='.$_GET['id'];
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
echo strip_tags($row['description'],'<a><h1><h2><h3><ul><ol><li>');
	# code...
}
 ?>
</article>
<hr>
<div id="ctrl">
	<div class="btn-group" role="group" aria-label='...'>
	<input type="button" value="white" onclick="document.getElementById('target').className='white'" class='btn btn-default btn-lg'/>
	<input type="button" value="black" onclick="document.getElementById('target').className='black'" class='btn btn-default btn-lg'/>
	</div>
	<a href="/write.php"class='btn btn-success btn-lg'>쓰기<a/>
</div>
</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</div>
</body>
</html>