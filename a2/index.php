<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 2</title>
    
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="main-style.css?t=<?= filemtime("main-style.css"); ?>">
    <script src='../wireframe.js'></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Cormorant+Garamond&family=Permanent+Marker&display=swap" rel="stylesheet">
  </head>

  <body>

    <header id='home'>
        <div class ='header-content-wrapper'>
            <h1>Lunardo</h1>
            <!-- Sourced from https://vector.me/browse/690940/camera_icon -->
            <img src='../../media/camera_icon.svg' class='logo'>
        </div>  
    </header>

    <nav class='nav-bar'>
      <ul class='nav-list'>
        <li class='nav-item'><a href="#home">Home</a></li>
        <li class='nav-item'><a href="#about-us">About Us</a></li>
        <li class='nav-item'><a href="#seats-prices">Seats/Prices</a></li>
        <li class='nav-item'><a href="#now-showing">Now Showing</a></li>
      </ul>
    </nav>

    <main>
    
      <section id='home-content'>
        <div id='filter'>
            <div class='content'>
      <!--
        <img src='../../media/splash.jpg' class=''>
       -->
        
                <h1 class='splash-header'>Lunardo Cinema</h1>
                <p>
                Welcome to our new Website!
                </p>
             </div>
        </div>
      </section>
     
    
      <section id='about-us'>
        <h1>About Us</h1>
      </section>
      <section id='seats-prices'>
        <h1>Seats and Prices</h1>
      </section>
      <section id='now-showing'>
        <h1>Now Showing</h1>
      </section>
    </main>

    <footer>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Put your name(s), student number(s) and group name here. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

  </body>
</html>
