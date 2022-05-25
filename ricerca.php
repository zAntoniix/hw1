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
    <title>Ricerca brani</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/ricerca.css" />
    <script src="./js/ricerca.js" defer="true"></script>
    <meta data="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <nav>
      <div id="nome">Recording Studio</div>
      <ul id="links">
        <li><a><?php echo $_SESSION['username']; ?></a></li>
        <li><a href ="home.php">Home</a></li>
        <li><a href ="preferiti.php">Preferiti</a></li>
        <li><a href ="logout.php">Logout</a></li>
      </ul>
      <div id="menu" onclick="mobileMenu(this)">
        <div></div>
        <div></div>
        <div></div>
        <ul class="links_mobile">
          <li><a><?php echo $_SESSION['username']; ?></a></li>
          <li><a href ="home.php">Home</a></li>
          <li><a href ="preferiti.php">Preferiti</a></li>
          <li><a href ="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>

    <header>
      <div id="overlay"></div>
      <h1>
        <strong>Ricerca brani e testi</strong></br>
      </h1>
    </header>
      
    <section>
      <div id="searchbox">
        <form id="spotify">
          Inserisci il titolo della canzone che vuoi cercare
          <input type="text" id="song">
          <input type="submit" id="submit" value="Cerca">
        </form>

        <div id="result-view">
        </div>
      </div>
    </section>

    <footer>
      <p>Antonio Zarbo O46002167</p>
    </footer>
  </body>
</html>