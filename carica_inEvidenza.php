<?php
  session_start();
  if(isset($_SESSION['username'])) {

    $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_error($conn));
    $userid = $_SESSION['user_id'];

    $query = "SELECT * FROM inEvidenza";
    $res = mysqli_query($conn, $query);

    $array = array();
    while($risultato = mysqli_fetch_assoc($res)) {
      array_push($array, $risultato);
    }

    for($i=0;$i < count($array);$i++) {
      $id = $array[$i]['musicid'];
  
      $query2 = "SELECT * FROM preferiti WHERE userid = $userid AND musicid = '$id'";
      $res2 = mysqli_query($conn, $query2);

      if(mysqli_num_rows($res2) > 0) {
        $p = true;
      } else {
        $p = false;
      }
  
      $titolo = $array[$i]['titolo'];
      $artista = $array[$i]['artista'];
      $img = $array[$i]['img'];
      
      $array2[] = array("titolo" => $titolo, "artista" => $artista, "img" => $img, "musicid" => $id, "preferito" => $p);
    }
    echo json_encode($array2);
  }
?>