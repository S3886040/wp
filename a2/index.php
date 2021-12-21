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
  </head>

  <body>

    <header class='header'>
        <div class ='header-content-wrapper'>
            <h1>Lunardo</h1>
            <div>place holder for logo here</div>
        </div>  
    </header>

    <nav class='nav-bar'>
      <ul class='nav-list'>
        <li class='nav-item'><a href="/">Home</a></li>
        <li class='nav-item'><a href="/">About Us</a></li>
        <li class='nav-item'><a href="/">Seats/Prices</a></li>
        <li class='nav-item'><a href="/">Now Showing</a></li>
      </ul>
    </nav>

    <main>
      <section class='home-content'>
      </section>
      <section class='about-us-section'>
        <h1>About Us</h1>
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
