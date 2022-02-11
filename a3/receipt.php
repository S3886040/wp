<?php
  include_once('tools.php');
  include_once('html-modules.php');
  include_once('calculation.php');

  if(empty( $_SESSION['cart'])){
    header('Location: index.php');
  }

  $now = date('d/m h:i');
  $totals = calculatePrices($_SESSION['cart']['seats'], $_SESSION['cart']['day'], $_SESSION['cart']['time']);
  $cells = array_merge(
    [ $now ],
    $_SESSION['cart']['user'],
    [ $_SESSION['cart']['movie'] ],
    [ $_SESSION['cart']['day'] ],
    [ $_SESSION['cart']['time'] ],
    $totals
  );

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
