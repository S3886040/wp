<?php
  include_once('tools.php');
  include_once('html-modules.php');



 ?>


 <!DOCTYPE html>

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
