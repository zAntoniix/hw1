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
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/home.css" />
    <script src="./js/home.js" defer="true"></script>
    <meta data="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <nav>
      <div id="nome">Recording Studio</div>
      <ul id="links">
        <li><a><?php echo 'Benvenuto, '.$_SESSION['username'].''; ?></a></li>
        <li><a href ="ricerca.php">Ricerca</a></li>
        <li><a href ="preferiti.php">Preferiti</a></li>
        <li><a href ="logout.php">Logout</a></li>
      </ul>
      <div id="menu" onclick="mobileMenu(this)">
        <div></div>
        <div></div>
        <div></div>
        <ul class="links_mobile">
          <li><a><?php echo 'Benvenuto, '.$_SESSION['username'].''; ?></a></li>
          <li><a href ="ricerca.php">Ricerca</a></li>
          <li><a href ="preferiti.php">Preferiti</a></li>
          <li><a href ="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
    <header>
      <div id="overlay"></div>
      <h1>
        <strong>Registra la tua musica</strong></br>
      </h1>
    </header>
      
    <section>
      <div id="intro">
        <h1>Lo Studio</h1>
        <p>Il nostro studio dispone di tutti gli strumenti all'avanguardia per offrire un servizio di altissima qualità</p>
      </div>

      <div id="dettagli">
        <!-- <div>
          <img src="images/strumenti.png" />
          <h1>Strumenti</h1>
          <p>Disponiamo di tutti gli strumenti musicali per ogni tipo di necessità e richiesta</p>
        </div>

       <div>
         <img src="images/registrazione.jpg" />
          <h1>Registrazione</h1>
         <p>Usiamo la tecnologia più avanzata per registrare in modo cristallino la vostra musica</p>
        </div>

        <div>
          <img src="images/consulenza.jpg" />
           <h1>Consulenza</h1>
          <p>Ti aiuteremo nella scelta delle opzioni milgiori per valorizzare e migliorare il tuo prodotto</p>
         </div> -->
      </div>

      <div id=inEvidenza>
        <h1>Brani in evidenza questo mese</h1>
        <div id="inEvidenza-view"></div>
      </div>
    </section>

    <footer>
      <p>Antonio Zarbo O46002167</p>
    </footer>
  </body>
</html>