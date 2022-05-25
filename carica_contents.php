<?php
  session_start();
  if(isset($_SESSION['username'])) {

    $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_error($conn));

    $query = "SELECT * FROM contents";
    $res = mysqli_query($conn, $query);

    $array = array();
    while($risultato = mysqli_fetch_assoc($res)) {
      array_push($array, $risultato);
    }
    echo json_encode($array);
  }
?>