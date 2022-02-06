<?php
  session_start();
  $movieObject = [
    'ACT' => [
      'title' => 'Dune(2021)',
      'rating' => 'MA',
      'poster' => 'Dune.jpg',
      'sessionTimes' => [
        'MON-TUES' => '9pm',
        'WED-FRI' => '9pm',
        'SAT-SUN' => '9pm'
      ],
      'synopsis' => "A mythic and emotionally charged hero's journey, 'Dune' tells the story of Paul Atreides, a brilliant and gifted young man
      born into a great destiny beyond his understanding, who must travel to the most dangerous planet in the universe to ensure the
      future of his family and his people. As malevolent forces explode into conflict over the planet's exclusive supply of the most
      precious resource in existence-a commodity capable of unlocking humanity's greatest potential-only those who can conquer their
      fear will survive.",
      'trailer' => 'https://www.youtube.com/embed/8g18jFHCLXk'
    ],
    'RMC' => [
      'title' => 'Cyrano',
      'rating' => 'M',
      'poster' => 'Cyrano.jpg',
      'sessionTimes' => [
        'MON-TUES' => '6pm',
        'WED-FRI' => '-',
        'SAT-SUN' => '3pm'
      ],
      'synopsis' => "A man ahead of his time, Cyrano de Bergerac dazzles whether with ferocious wordplay at a verbal joust or with brilliant swordplay
      in a duel. But, convinced that his appearance renders him unworthy of the love of a devoted friend, the luminous Roxanne, Cyrano has yet to declare
      his feelings for her and Roxanne has fallen in love, at first sight, with Christian.",
      'trailer' => 'https://www.youtube.com/embed/5e8apSFDXsQ'
    ],
    'FAM' => [
      'title' => 'Spider Man - No Way Home',
      'rating' => 'M',
      'poster' => 'spiderman-nowayhome.jpg',
      'sessionTimes' => [
        'MON-TUES' => '12pm',
        'WED-FRI' => '6pm',
        'SAT-SUN' => '3pm'
      ],
      'synopsis' => "Peter Parker's secret identity is revealed to the entire world. Desperate for help, Peter turns to Doctor Strange to make the world
      forget that he is Spider-Man. The spell goes horribly wrong and shatters the multiverse, bringing in monstrous villains that could destroy the world.",
      'trailer' => 'https://www.youtube.com/embed/JfVOs4VSpmA'
    ],
    'AHF' => [
      'title' => 'Silent Night',
      'rating' => 'MA',
      'poster' => 'silent-night.jpg',
      'sessionTimes' => [
        'MON-TUES' => '-',
        'WED-FRI' => '12pm',
        'SAT-SUN' => '9pm'
      ],
      'synopsis' => "Nell, Simon and their son Art host a yearly Christmas dinner at their country estate for their former school friends and their spouses.
      It is gradually revealed that there is an imminent environmental catastrophe and that this dinner will be their last night alive.",
      'trailer' => 'https://www.youtube.com/embed/u1dOECVgqIQ'
    ],
  ];

  function setChecked(&$str, $val) {
  return ( isset($str) && $str == $val ? 'checked' : '' );
  }

  function unsetFB(&$str, $fallback = '') {
  return ( isset($str) ? $str : $fallback );
  }

  function php2js( $arr, $arrName ) {
  $arrJSON = json_encode($arr, JSON_PRETTY_PRINT);
  echo <<<"CDATA"
  <script>
    /* Variable generated with Trev's handy php2js() function */
    var $arrName = $arrJSON;
  </script>
  CDATA;
  }

  function debugModule() {
   echo "<pre id='debug'>";
   print_r($_POST);
   echo "</pre>";
  }

  function printMyCode() {
  $allLinesOfCode = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre id='myCode'><ol>";
  foreach($allLinesOfCode as $oneLineOfCode) {
    echo "<li>" .rtrim(htmlentities($oneLineOfCode)) . "</li>";
  }
  echo "</ol></pre>";
  }

  error_reporting( E_ERROR | E_WARNING | E_PARSE );
?>
