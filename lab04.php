<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 04 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 04</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 04</h1>";
    ?>

    <hr />

    <?php
      $input = $_SERVER['QUERY_STRING'];

      if (is_numeric($input) && is_int($input + 0)) {
        $year = $input + 0;
        $a = $year % 19;
        $b = floor($year / 100);
        $c = $year % 100;
        $d = floor($b / 4);
        $e = $b % 4;
        $f = floor(($b + 8) / 25);
        $g = floor(($b - $f + 1) / 3);
        $h = ((19 * $a) + $b - $d - $g + 15) % 30;
        $i = floor($c / 4);
        $k = $c % 4;
        $l = (32 + (2 * $e) + (2 * $i) - $h - $k) % 7;
        $m = floor(($a + (11 * $h) + (22 * $l)) / 451);
        $n = floor(($h + $l - (7 * $m) + 114) / 31);
        $p = ($h + $l - (7 * $m) + 114) % 31;

        $months = array (
          "January",
          "Feburary",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December");

          echo "<p>Easter Sunday: " . $months[$n - 1] . " " . ($p + 1) . ", $year</p>";
      } else {
        echo "<p>$input is not numeric </p>";
      }
    ?>

    <hr />
    <footer>
      Built with HTML5 and PHP. Page can be validated here:

      <br />

      <a href="http://validator.w3.org/check?uri=referer" target="_blank">
        <img src="https://www.w3.org/html/logo/downloads/HTML5_Logo.svg" height="64" alt="HTML5" title="HTML5" />
      </a>
    </footer>
  </body>
</html>
