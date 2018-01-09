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
    <form class="" action="process.php" method="post">
      <P>
      <label for="title">제목:</label>
      <input id="tilte" type="text" name="title" value="">
      </P>
      <p>
      <label for="author">저자:</label>
      <input id="author" type="text" name="author" value="">
      </P>
      <label for="description">본문:</label>
      <textarea id="description" name="description" rows="8" cols="80"></textarea>
      <p>
      <input type="submit" name="" value="전송">
      </p>
    </form>
     </article>
     <input type="button" value="White" onclick="document.getElementById('body').className=''">
     <input type="button" value="Black" onclick="document.getElementById('body').className='black'">
     <a href="write.php">쓰기</a>
   </div>
</body>
</html>
