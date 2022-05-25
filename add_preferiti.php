<?php
 session_start();

 $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_error($conn));

 $userid = mysqli_real_escape_string($conn, $_SESSION['user_id']);
 $id = mysqli_real_escape_string($conn, $_POST['id']);
 $img = mysqli_real_escape_string($conn, $_POST['img']);
 $titolo = mysqli_real_escape_string($conn, $_POST['title']);
 $artista = mysqli_real_escape_string($conn, $_POST['artist']);

 $query = "INSERT INTO preferiti VALUES($userid, '$id', '$img', '$titolo', '$artista')";
 $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

 if($res) {
   $response = array('esito' => true);
 } else {
   $response = array('esito' => false);
 }

 echo json_encode($response);
 mysqli_close($conn);
?>