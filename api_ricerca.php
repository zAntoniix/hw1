<?php
  session_start();
  
  header('Content-Type: application/json');

  $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_error($conn));
  $userid = $_SESSION['user_id'];

  $client_id = 'a53c88699ed24faab0e2f9672049328e';
  $client_secret = 'deaf479cdeda4f32a3e276317c1aa4e7';
  $c = curl_init();
  curl_setopt($c, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
  curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($c, CURLOPT_POST, 1);
  curl_setopt($c, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
  curl_setopt($c, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret)));
  $res = curl_exec($c);
  $tokenSpotify = json_decode($res, true);
  curl_close($c);

  //Ricerca brano
  $song = urlencode($_GET["q"]);
  $endpoint = 'https://api.spotify.com/v1/search?type=track&q='.$song;
  $c = curl_init();
  curl_setopt($c, CURLOPT_URL, $endpoint);
  curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($c, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$tokenSpotify['access_token']));
  $result = curl_exec($c);
  $json1 = json_decode($result, true);
  curl_close($c);

  for($i=0;$i < count($json1['tracks']['items']);$i++) {
    $id = $json1['tracks']['items'][$i]['id'];

    $query = "SELECT * FROM preferiti where userid = $userid AND musicid = '$id'";
    $res2 = mysqli_query($conn, $query);

    if(mysqli_num_rows($res2) > 0) {
      $p = true;
    } else {
      $p = false;
    }

    $nome = $json1['tracks']['items'][$i]['name'];
    $artista = $json1['tracks']['items'][$i]['artists']['0']['name'];
    $album_img = $json1['tracks']['items'][$i]['album']['images']['1'];
    
    $tracce[] = array("titolo" => $nome, "artista" => $artista, "img" => $album_img, "id" => $id, "preferito" => $p);
  }

  $jsonfinale = array("tracks" => $tracce, "next" => $json1['tracks']['next'], "previous" => $json1['tracks']['previous']);
  echo json_encode($jsonfinale);
?>