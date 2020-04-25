<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 06 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 06</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 06</h1>";
    ?>

    <hr />
    <p>
      <?php
        function dayOfWeek($month, $day, $year) {
          $a = $month - 2;

          if ($a <= 0) {
            $a += 12;
            $year -= 1;
          }

          $b = $day;
          $c = $year % 100;
          $d = floor($year / 100);

          $w = floor(((13 * $a) - 1) / 5);
          $x = floor($c / 4);
          $y = floor($d / 4);
          $z = $w + $x + $y + $b + $c - (2 * $d);

          #echo "$a, $b, $c, $d, $w, $x, $y, $z<br />";

          return $z % 7;
        }

        function printDayOfWeek($r) {
          switch($r) {
            case 0:
              return "Sunday";
            case 1:
            case -6:
              return "Monday";
            case 2:
            case -5:
              return "Tuesday";
            case 3:
            case -4:
              return "Wednesday";
            case 4:
            case -3:
              return "Thursday";
            case 5:
            case -2:
              return "Friday";
            case 6:
            case -1:
              return "Saturday";  
          } 
        }
      
        // Obtain the data following the ? in the URL via which the page was
        // accessed.
        $argv = $_SERVER['QUERY_STRING'];
      
        // Replace all occurrences of %20 with a space character. If URLs
        // contain spaces when sent to a server, they are transformed into
        // %20. The two characters following % are considered hexadecimal
        // values and represent the character's ASCII code. 20 hex is equal to
        // 32 decimal, the ASCII representation for a space character.
        $argv = str_replace("%20"," ",$argv);
      
        // Use the builtin function trim to remove leading and trailing
        // whitespace characters.
        $argv = trim($argv);
      
        // Use the builtin function preg_split to tokenize the string $argv,
        // using the space character as a delimiter.  The delimiter can consist
        // of a single space or multiple spaces.  This function returns an
        // array of the split string $argv.
        $myArgvArray = preg_split("/ +/", $argv);
      
        if (count($myArgvArray) != 3) {
          echo "This script expects three arguments separated by spaces.<br />\n";
        } elseif (!is_numeric($myArgvArray[0])) {
          echo "This script expects the Month to be numeric.<br />\n";
        } elseif (!is_numeric($myArgvArray[1])) {
          echo "This script expects the Day to be numeric.<br />\n";
        } elseif (!is_numeric($myArgvArray[2])) {
          echo "This script expects the Year side to be numeric.<br />\n";
        } else {
          $month = $myArgvArray[0] + 0;
          $day = $myArgvArray[1] + 0;
          $year = $myArgvArray[2] + 0;
        
          echo printDayOfWeek(dayOfWeek($month, $day, $year)) . ", " . $month . "/" . $day . "/" . $year . "<br />";
        }

      ?>
    </p>
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
