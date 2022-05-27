<?php
  session_start();

  $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_error($conn));

  $userid = mysqli_real_escape_string($conn, $_SESSION['user_id']);
  $id = mysqli_real_escape_string($conn, $_POST['id']);

  $query = "DELETE FROM preferiti WHERE userid = $userid AND musicid = '$id'";
  $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

  if($res) {
    $response = array('esito' => true);
  } else {
    $response = array('esito' => false);
  }

  echo json_encode($response);
  mysqli_close($conn);
?>