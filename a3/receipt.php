<?php
  include_once('tools.php');
  include_once('html-modules.php');
  include_once('calculation.php');

  if(empty( $_SESSION['cart'])){
    header('Location: index.php');
  }
  $currentMovie = $_SESSION['cart']['movie'];

  $totals = calculatePrices($_SESSION['cart']['seats'], $_SESSION['cart']['day'], $_SESSION['cart']['time']);
  $cells = array_merge(
    [ $_SESSION['cart']['bookingTime'] ],
    $_SESSION['cart']['user'],
    [ $_SESSION['cart']['movie'] ],
    [ $_SESSION['cart']['day'] ],
    [ $_SESSION['cart']['time'] ],
    $totals
  );
  $details = $_SESSION['cart'];
  function ticketTypeCount($array) {
    $ticketTypeCount = 0;
    foreach ($array as $seat => $amount) {
      if($amount) {
        $ticketTypeCount += 1;
      }
    }
    return $ticketTypeCount;
  }
  $ticketTypeCount = ticketTypeCount($_SESSION['cart']['seats']);

  // $filename = 'bookings.txt';
  // if( ($fp = fopen($filename, "a")) && flock($fp, LOCK_EX) !== false ) {;
  //   fputcsv($fp, $cells, "\t");
  //   flock($fp, LOCK_UN);
  //   fclose($fp);
  // }

 ?>


<!DOCTYPE html>
<html lang='en'>
  <?= headRender("Receipt") ?>

  <body>
    <?= headerRender() ?>
    <nav class='nav-bar'>
      <ul class='nav-list'>
        <li class='nav-item'>Your Receipt</li>
      </ul>
    </nav>
    <main>
      <section id='receipt-header'>
        <h1>Lunardo Cinema</h1>
        <div class='underline'></div>
        <p>
          34 cresent st Mt Martha, 3467<br>
          (03) 9788 7883<br>
          contact@lunardo-cinema.com.au<br>
        </p>
      </section>
      <section id='receipt'>
        <div class='receipt-movieInfo-column'>
          <img src='../../media/<?=$movieObject[$currentMovie]['poster'] ?>' alt='Dune' style='width:300px;height:300px;'>
          <h1><?= $movieObject[$currentMovie]['title'] ?></h1>
          <p><?= $details['day'] . " " . $details['time']?></p>
          <p>Lunardo Cinema Mt. Martha</p>
        </div>
        <div class='receipt-details'>
          <h1>Booking Details</h1>
          <div class='underline'></div>
          <div class='receipt-details-column'>
            <div class='invoice-details'>
              <p>Purchase Date</p>
              <p>Movie</p>
              <p>Movie Session Details</p>
              <p>Ticket Details</p>
              <?= printEmptyLines($ticketTypeCount - 1) ?>
              <p>Ticket Cost</p>
              <p>Sub Total ex. GST</p>
              <p>GST</p>
              <p>Total Cost</p>
            </div>
            <div class='invoice-values'>
              <p><?= $details['bookingTime']?></p>
              <p><?= $movieObject[$currentMovie]['title']?></p>
              <p><?= $details['day'] . " " . $details['time']?></p>
              <?= printTicketDetails($details['seats'])?>
              <p>$<?= $totals['finalTotal']?>AU</p>
              <p>$<?= number_format((int)$totals['finalTotal'] - (int)$totals['GST'], 2)?>AU</p>
              <p>$<?= $totals['GST']?>AU</p>
              <p>$<?= $totals['finalTotal']?>AU</p>
            </div>
          </div>
          <h1>Customer Details</h1>
          <div class='underline'></div>
          <div class='receipt-details-column'>
            <div class='invoice-details'>
              <p>Name</p>
              <p>Email</p>
              <p>Mobile</p>
            </div>
            <div class='invoice-values'>
              <p><?= $details['user']['name']?></p>
              <p><?= $details['user']['email']?></p>
              <p><?= $details['user']['mobile']?></p>
            </div>
          </div>
        </div>
      </section>
    </main>
    <?= footerRender() ?>
    <script src='script.js'></script>
    <aside id="debug">
      <hr>
      <h3>Debug Area</h3>
      <pre>
  GET Contains:
  <?php print_r($_GET) ?>
  POST Contains:
  <?php print_r($_POST) ?>
  SESSION Contains:
  <?php print_r($_SESSION) ?>
     </pre>
    </aside>

  </body>

</html>
