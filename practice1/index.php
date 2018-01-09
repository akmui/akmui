<?php
require_once('conn.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css"
    media="screen" title="no title" charset="utf-8">
</head>
<body id="body">
 <header>
   <h1><a href="index.php">승현코딩 javascript</a></h1>
 </header>

 <nav>
  <ol>
    <?php
    $sql = "SELECT*FROM `topic`";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
    };
    ?>
 </ol>
 </nav>
 <div id="content">
   <article class="">
     <?php
     if(empty($_GET['id']))
     {echo "Welcome to my page!" ;}
       else {$id = mysqli_real_escape_string($conn, $_GET['id']);
       $sql = "SELECT `topic`.`id`,`topic`.`title`,`topic`.`description`,`user`.`name`,`topic`.`created`
       FROM `topic` LEFT JOIN `user`ON `topic`.`author` = `user`.`id` WHERE `topic`.`id`=".$id;
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);?>
       <h2>          <?php echo htmlspecialchars($row['title']);?></h2>
       <div class=""><?php echo htmlspecialchars($row['title']);?></div>
       <div class=""><?php echo htmlspecialchars($row['created']);?>|<?php echo htmlspecialchars($row['name']);?></div>
       <div class=""><?php echo htmlspecialchars($row['description']) ?></div>
       <?php } ?>
     </article>
     <input type="button" value="White" onclick="document.getElementById('body').className=''">
     <input type="button" value="Black" onclick="document.getElementById('body').className='black'">
     <a href="write.php">쓰기</a>
   </div>
</body>
</html>
