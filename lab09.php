<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 09 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 09</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 09</h1>";
    ?>

    <hr />
    <?php
      // Obtain the data following the ? in the URL via which the page was
      // accessed.
      $argv = $_SERVER['QUERY_STRING'];
      $argv = str_replace("%20"," ",$argv);
      $argv = trim($argv);
      $myArgvArray = preg_split("/ +/", $argv);

      if (count($myArgvArray) != 1) {
        echo "This script expects one argument.<br />\n";
      } elseif (!is_numeric($myArgvArray[0]) || !is_int($myArgvArray[0] + 0)) {
        echo "This script expects a numeric argument.<br />\n";
      } elseif (count($myArgvArray[0]) > 16) {
        echo "This script expects an account number with 16 or fewer digits.<br />\n";
      } else {
        echo "<pre>";
        $acctNum = $myArgvArray[0];
        $sum = 0;

        echo "--------------------------------------\n" .
              " Account Number    Luhn Sum   Validity\n" .
              "--------------------------------------\n";

        for ($i = 1, $count = count(str_split($acctNum)); $i <= $count; $i++) {
          if ($i % 2 != 0) {
            $sum += $acctNum[$count - $i];
          } else {
            $digits = str_split(2 * $acctNum[$count - $i]);
            if (count($digits) > 1) {
              $sum += ($digits[0] + 0) + ($digits[1] + 0);
            } else {
              $sum += $digits[0];
            }
          }
        }

        $isValid = "Invalid";
        if ($sum % 10 == 0) {
          $isValid = "Valid";
        }

        printf("%16s%11s%11s\n", $acctNum, $sum, $isValid);
        echo "--------------------------------------\n";
        echo "</pre>";
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
