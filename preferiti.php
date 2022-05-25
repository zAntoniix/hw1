<?php
  session_start();
  
  if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
  }
?>

<html>
  <?php
    $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_error($conn));
  ?>
  <head>
    <meta charset="utf-8">
    <title>Preferiti</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/preferiti.css" />
    <script src="./js/preferiti.js" defer="true"></script>
    <meta data="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <nav>
      <div id="nome">Recording Studio</div>
      <ul id="links">
        <li><a><?php echo $_SESSION['username']; ?></a></li>
        <li><a href ="home.php">Home</a></li>
        <li><a href ="ricerca.php">Ricerca</a></li>
        <li><a href ="logout.php">Logout</a></li>
      </ul>
      <div id="menu" onclick="mobileMenu(this)">
        <div></div>
        <div></div>
        <div></div>
        <ul class="links_mobile">
          <li><a><?php echo $_SESSION['username']; ?></a></li>
          <li><a href ="home.php">home</a></li>
          <li><a href ="ricerca.php">Ricerca</a></li>
          <li><a href ="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>

    <header>
      <div id="overlay"></div>
      <h1>
        <strong>Brani preferiti</strong></br>
      </h1>
    </header>
      
    <section>
      <div id="preferiti">
        <h1>Ecco i tuoi brani preferiti</h1>
        <div id="preferiti-view"></div>
      </div>
    </section>

    <footer>
      <p>Antonio Zarbo O46002167</p>
    </footer>
  </body>
</html>