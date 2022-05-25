<?php
  session_start();
  if(isset($_SESSION['username'])) {

    $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_error($conn));

    $userid = mysqli_real_escape_string($conn, $_SESSION['user_id']);
    $query = "SELECT * FROM preferiti WHERE userid = $userid";
    $res = mysqli_query($conn, $query);

    $array = array();
    while($risultato = mysqli_fetch_assoc($res)) {
      array_push($array, $risultato);
    }
    echo json_encode($array);
}
?>