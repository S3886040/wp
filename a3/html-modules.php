<?php
  function headRender($title) {
    echo "
        <head>
          <meta charset='utf-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1'>
          <title>$title</title>

          <!-- Keep wireframe.css for debugging, add your css to style.css -->
          <link id='wireframecss' type='text/css' rel='stylesheet' href='../wireframe.css' disabled>
          <link rel='icon' href='../../media/camera_icon.svg' type='image/x-icon' />
          <link id='stylecss' type='text/css' rel='stylesheet' href='style.css?t=" . filemtime('style.css') . "'>
          <script src='../wireframe.js'></script>
          <link rel='preconnect' href='https://fonts.googleapis.com'>
          <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
          <link href='https://fonts.googleapis.com/css2?family=Amatic+SC&family=Montserrat&display=swap' rel='stylesheet'>
        </head>";
  }

  function headerRender() {
    echo "<header id='home'>
            <div class='header-content-wrapper'>
              <h1>Lunardo</h1>
              <!-- Sourced from https://vector.me/browse/690940/camera_icon -->
              <img src='../../media/camera_icon.svg' class='logo' alt='Lunardo Icon'>
            </div>
          </header>";
  }

  function navRender() {
    echo "<nav class='nav-bar'>
      <ul class='nav-list'>
        <li class='nav-item'><a href='index.php#home'>Home</a></li>
        <li class='nav-item'><a href='index.php#about-us'>About Us</a></li>
        <li class='nav-item'><a href='index.php#seats-prices'>Seats/Prices</a></li>
        <li class='nav-item'><a href='index.php#now-showing'>Now Showing</a></li>
      </ul>
    </nav>";
  }

  function movieRender($currentMovie) {
    global $movieObject;
    echo "<div class='movie-details-content'>
              <div class='movie-details-header'>
                <h1>{$movieObject[$currentMovie]['title']}</h1>
                <h3>Rating: {$movieObject[$currentMovie]['rating']}</h3>
                <div class='underline'></div>
              </div>
              <div class='flex-details'>
                <div class='img-left'>
                  <img src='../../media/{$movieObject[$currentMovie]['poster']}' alt='{$movieObject[$currentMovie]['title']} Movie Poster' style='width:300px;height:300px;'>
                </div>
                <div class='content-right'>
                  <h3>Session Times:</h3>
                  <div class='underline'></div>
                  <h3>Mon-Tues</h3>
                  <p>{$movieObject[$currentMovie]['sessionTimes']['MON-TUES']}
                  </p>
                  <h3>Wed-Fri</h3>
                  <p>{$movieObject[$currentMovie]['sessionTimes']['WED-FRI']}
                  </p>
                  <h3>Sat-Sun</h3>
                  <p>{$movieObject[$currentMovie]['sessionTimes']['SAT-SUN']}
                  </p>
                </div>
              </div>
              <h2>Synopsis</h2>
              <p>
                {$movieObject[$currentMovie]['synopsis']}
              </p>
              <!-- iframe video source form Youtube {$movieObject[$currentMovie]['trailer']}-->
              <iframe width='420' height='315' src='{$movieObject[$currentMovie]['trailer']}'>
              </iframe>
          </div>";

  }

  function footerRender() {
  echo
    "<footer>
      <div>
        Contact Info-<br>
        Email: contact@lunardo-cinema.com.au<br>
        Phone: (03) 9788 7883<br>
        Address: 34 cresent st Mt Martha, 3467
      </div>
      <div>&copy;<script>
          document.write(new Date().getFullYear());
        </script> Justin Healy, s3886040.<a href='https://github.com/S3886040/wp/tree/main/a2'>GitHub</a>. Last modified " . date('Y F d  H:i', filemtime($_SERVER['SCRIPT_FILENAME'])) . ".</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>";
  }

  $ticketObject = [
    'STA' => 'Standard Seating Adult',
    'STP' => 'Standard Seating Concession',
    'STC' => 'Standard Seating Child',
    'FCA' => 'First Class Seating Adult',
    'FCP' => 'First Class Seating Concession',
    'FCC' => 'First Class Seating Child',
  ];

  function printTicketDetails($tickets) {
    global $ticketObject;
    foreach ($tickets as $seat => $amount) {
      if($amount > 0) {
        echo "<p>{$ticketObject[$seat]} x {$amount}</p>";
      }
    }
  }

  function printEmptyLines($lineAmount) {
    for ($i=0; $i < $lineAmount; $i++) {
      echo "<p><br></p>";
    }
  }

  function tickets($details) {
    global $ticketObject;
    global $movieObject;
    foreach ($details['seats'] as $seat => $amount) {
      if($amount) {
        for ($i=0; $i < $amount; $i++) {
          echo "<div class='ticket'>
                  <img src='../../media/camera_icon.svg' alt='camera icon' class='ticket-icon'>
                    <h2>Lunardo Cinema</h2>
                    <h3>{$movieObject[$details['movie']]['title']} {$movieObject[$details['movie']]['rating']}</h3>
                    <p>{$details['day']} {$details['time']} </p>
                    <p>Purchased: {$details['bookingTime']}</p>
                    <p>{$ticketObject[$seat]}</p>
                  <div class='ticket-edge'>
                    <h2>Lunardo Cinema</h2>
                    <h3>{$movieObject[$details['movie']]['title']} {$movieObject[$details['movie']]['rating']}</h3>
                    <p>{$details['day']} {$details['time']}</p>
                    <p>Purchased: {$details['bookingTime']}</p>
                    <p>{$ticketObject[$seat]}</p>
                  </div>
                </div>";
        }

      }
    }
  }

  function debugModule() {
   echo "<aside id='debug'>
     <hr>
     <h3>Debug Area</h3>
     <pre>
     GET Contains:";
     print_r($_GET);
     echo "POST Contains:";
     print_r($_POST);
     echo "SESSION Contains:";
     print_r($_SESSION);
     echo "</pre>
     </aside>";
  }

  function printMyCode() {
  $allLinesOfCode = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre id='myCode'><ol>";
  foreach($allLinesOfCode as $oneLineOfCode) {
    echo "<li>" .rtrim(htmlentities($oneLineOfCode)) . "</li>";
  }
  echo "</ol></pre>";
  }

?>
