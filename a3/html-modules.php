<?php
  function headRender($title) {
    $html = <<<"OUTPUT"
      <html lang='en'>
        <head>
          <meta charset='utf-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1'>
          <title>$title</title>

          <!-- Keep wireframe.css for debugging, add your css to style.css -->
          <link id='wireframecss' type='text/css' rel='stylesheet' href='../wireframe.css' disabled>
          <link id='stylecss' type='text/css' rel='stylesheet' href="style.css?t=<?= filemtime('style.css'); ?>">
          <script src='../wireframe.js'></script>
          <link rel='preconnect' href='https://fonts.googleapis.com'>
          <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
          <link href='https://fonts.googleapis.com/css2?family=Amatic+SC&family=Montserrat&display=swap' rel='stylesheet'>
        </head>
      OUTPUT;
      echo $html;

  }

  function headerNavRender() {
    echo "<header id='home'>
            <div class='header-content-wrapper'>
              <h1>Lunardo</h1>
              <!-- Sourced from https://vector.me/browse/690940/camera_icon -->
              <img src='../../media/camera_icon.svg' class='logo' alt='Lunardo Icon'>
            </div>
          </header>

          <nav class='nav-bar'>
            <ul class='nav-list'>
              <li class='nav-item'><a href='index.php#home'>Home</a></li>
              <li class='nav-item'><a href='index.php#about-us'>About Us</a></li>
              <li class='nav-item'><a href='index.php#seats-prices'>Seats/Prices</a></li>
              <li class='nav-item'><a href='index.php#now-showing'>Now Showing</a></li>
            </ul>
          </nav>";

  }  

?>
