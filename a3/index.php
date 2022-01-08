<!DOCTYPE html>
<html lang='en'>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 2</title>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>
    <script src='script.js'></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Cormorant+Garamond&family=Permanent+Marker&display=swap" rel="stylesheet">
  </head>

  <body>

    <header id='home'>
      <div class='header-content-wrapper'>
        <h1>Lunardo</h1>
        <!-- Sourced from https://vector.me/browse/690940/camera_icon -->
        <img src='../../media/camera_icon.svg' class='logo' alt='Lunardo Icon'>
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
            <h1>Lunardo Cinema</h1>
            <div class='underline'></div>
            <p>
              Feel free to check out whats on in Now Showing Section.
            </p>
            <a class='button' href='#now-showing'>Now Showing</a>
          </div>
        </div>
      </section>


      <section id='about-us'>
        <div id='about-us-filter'>
          <div class="about-us-content">
            <h1>About Us</h1>
            <div class='underline'></div>
            <p>
              A little about us. We are now re-opening after extensive renovations and improvements to enhance the moving going experience for all our valued customers.
              We have redesigned our seating arrangements to include first class reclinable seating for those seeking a more luxurious moving going experience. As well
              as upgraded our visual and sound systems with 3D Dolby Vision projection and Dolby Atmos sound. Here at Lunardo we strive to create the best moving viewing
              experience possible for our clientele. We take pride in our cinema, and we hope you will enjoy your visit with us.
            </p>
          </div>
        </div>
      </section>
      <section id='seats-prices'>
        <div class="seats-prices-content">
          <h1>Seats and Prices</h1>
          <div class='underline'></div>
          <table>
            <tr>
              <th>Standard Seating</th>
              <th>General Admission</th>
              <th>Discounted Prices</th>
            </tr>
            <tr>
              <td>Adult</td>
              <td>20.50</td>
              <td>15</td>
            </tr>
            <tr>
              <td>Concession</td>
              <td>18</td>
              <td>13.50</td>
            </tr>
            <tr>
              <td>Child</td>
              <td>16.50</td>
              <td>12</td>
            </tr>
          </table>
          <img src='../../media/Profern-Standard-Twin.png' class='seat-img' alt='Standard Seating Image'>
          <table>
            <tr>
              <th>First Class Seating</th>
              <th>General Admission</th>
              <th>Discounted Prices</th>
            </tr>
            <tr>
              <td>Adult</td>
              <td>30</td>
              <td>24</td>
            </tr>
            <tr>
              <td>Concession</td>
              <td>27</td>
              <td>22.50</td>
            </tr>
            <tr>
              <td>Child</td>
              <td>24</td>
              <td>21</td>
            </tr>
          </table>
          <img src='../../media/Profern-Verona-Twin.png' class='seat-img' alt='First-Class Seating Image'>
        </div>
      </section>
      <section id='now-showing'>
        <div class='now-showing-content'>
          <h1>Now Showing</h1>
          <div class='underline'></div>
          <div class='card-layout'>
            <!-- Flip card example sourced from https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_flip_card sourced-25/12/2021 -->
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <div class='img-left'>
                    <img src="../../media/Dune.jpg" alt="Dune Movie Poster" style="width:300px;height:300px;">
                  </div>
                  <div class='content-right'>
                    <h2>Dune(2021)</h2>
                    <h3>M</h3>
                    <h3>Session Times:</h3>
                    <div class='underline'></div>
                    <h3>Mon-Tues</h3>
                    <p>9pm
                    <p>
                    <h3>Wed-Fri</h3>
                    <p>9pm
                    <p>
                    <h3>Sat-Sun</h3>
                    <p>6pm
                    <p>

                  </div>

                </div>
                <div class="flip-card-back">
                  <h2>Synopsis</h2>
                  <div class='underline'></div>
                  <p>
                    A mythic and emotionally charged hero's journey, "Dune" tells the story of Paul Atreides, a brilliant and gifted young man
                    born into a great destiny beyond his understanding, who must travel to the most dangerous planet in the universe to ensure the
                    future of his family and his people. As malevolent forces explode into conflict over the planet's exclusive supply of the most
                    precious resource in existence-a commodity capable of unlocking humanity's greatest potential-only those who can conquer their
                    fear will survive.
                  </p>
                  <a class='button' href='booking.php?movie=ACT'>Book Now</a>
                </div>
              </div>
            </div>

            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <div class='img-left'>
                    <img src="../../media/Cyrano.jpg" alt="Cyrano Movie Poster" style="width:300px;height:300px;">
                  </div>
                  <div class='content-right'>
                    <h2>Cyrano</h2>
                    <h3>M</h3>
                    <h3>Session Times:</h3>
                    <div class='underline'></div>
                    <h3>Mon-Tues</h3>
                    <p>6pm
                    <p>
                    <h3>Wed-Fri</h3>
                    <p>-
                    <p>
                    <h3>Sat-Sun</h3>
                    <p>3pm
                    <p>
                  </div>

                </div>
                <div class="flip-card-back">
                  <h2>Synopsis</h2>
                  <div class='underline'></div>
                  <p>
                    A man ahead of his time, Cyrano de Bergerac dazzles whether with ferocious wordplay at a verbal joust or with brilliant swordplay in a
                    duel. But, convinced that his appearance renders him unworthy of the love of a devoted friend, the luminous Roxanne, Cyrano has yet to
                    declare his feelings for her and Roxanne has fallen in love, at first sight, with Christian.
                  </p>
                  <a class='button' href='booking.php?movie=RMC'>Book Now</a>
                </div>
              </div>
            </div>

            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <div class='img-left'>
                    <img src="../../media/spiderman-nowayhome.jpg" alt="Spider-Man no way home Movie Poster" style="width:300px;height:300px;">
                  </div>
                  <div class='content-right'>
                    <h2>Spider Man - No way Home</h2>
                    <h3>M</h3>
                    <h3>Session Times:</h3>
                    <div class='underline'></div>
                    <h3>Mon-Tues</h3>
                    <p>12pm
                    <p>
                    <h3>Wed-Fri</h3>
                    <p>6pm
                    <p>
                    <h3>Sat-Sun</h3>
                    <p>3pm
                    <p>
                  </div>

                </div>
                <div class="flip-card-back">
                  <h2>Synopsis</h2>
                  <div class='underline'></div>
                  <p>
                    Peter Parker's secret identity is revealed to the entire world. Desperate for help, Peter turns to Doctor Strange to make the world forget that
                    he is Spider-Man. The spell goes horribly wrong and shatters the multiverse, bringing in monstrous villains that could destroy the world.
                  </p>
                  <a class='button' href='booking.php?movie=FAM'>Book Now</a>
                </div>
              </div>
            </div>

            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <div class='img-left'>
                    <img src="../../media/silent-night.jpg" alt="Silent Night Movie Poster" style="width:300px;height:300px;">
                  </div>
                  <div class='content-right'>
                    <h2>Silent Night</h2>
                    <h3>MA</h3>
                    <h3>Session Times:</h3>
                    <div class='underline'></div>
                    <h3>Mon-Tues</h3>
                    <p>-
                    <p>
                    <h3>Wed-Fri</h3>
                    <p>12pm
                    <p>
                    <h3>Sat-Sun</h3>
                    <p>9pm
                    <p>
                  </div>

                </div>
                <div class="flip-card-back">
                  <h2>Synopsis</h2>
                  <div class='underline'></div>
                  <p>
                    Nell, Simon and their son Art host a yearly Christmas dinner at their country estate for their former school friends and their spouses.
                    It is gradually revealed that there is an imminent environmental catastrophe and that this dinner will be their last night alive.
                  </p>
                  <a class='button' href='booking.php?movie=AHF'>Book Now</a>
                </div>
              </div>
            </div>

          </div>

        </div>
      </section>
    </main>

    <footer>
      <div>
        Contact Info-<br>
        Email: contact@lunardo-cinema.com.au<br>
        Phone: (03) 9788 7883<br>
        Address: 34 cresent st Mt Martha, 3467
      </div>
      <div>&copy;<script>
          document.write(new Date().getFullYear());
        </script> Justin Healy, s3886040.<a href='https://github.com/S3886040/wp/tree/main/a2'>GitHub</a>. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

  </body>

</html>
