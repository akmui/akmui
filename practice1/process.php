<?php
//데이터 베이스 접속
require_once('conn.php');

//저자가 User 테이블에 존재하는지 여부를 체크 , NULL ["num_rows"]=> int(0) 이라면
//해당하는 하는 사람이 User 테이블에 존재하지 않는다는 것이다.
$author = mysqli_real_escape_string($conn, $_POST['author']);
$sql="SELECT * FROM `user` WHERE `name` = '{$author}'";
$result = mysqli_query($conn,$sql);

if($result->num_rows>0) {
  $row = mysqli_fetch_assoc($result);
  $user_id = $row['id'];
//존재한다면 User의 ID 값을 알아낸다.
}
else {
$sql = "INSERT INTO `user`
       (`id`, `name`)
       VALUES (NULL, '{$author}');";
$result = mysqli_query($conn, $sql);
$user_id = mysqli_insert_id($conn);
//존재하지 않는다면 저자를 User 테이블에 추가후 ID 값를 알아낸다.
};
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$sql = "INSERT INTO `topic`
       (`id`, `title`, `description`, `author`, `created`)
       VALUES (NULL, '{$title}', '{$description}', '{$user_id}', now());";

mysqli_query($conn, $sql);
//제목, 저자(User ID 값), 본문등을 topic 테이블에 추가
header('Location: index.php');
 ?>
