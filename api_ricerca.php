<?php
  session_start();
  
  header('Content-Type: application/json');
  
  ricerca_brano();
  
  function ricerca_brano() {
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
    curl_close($c);

    echo $result;
  }
?>