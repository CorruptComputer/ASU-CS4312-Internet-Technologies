<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 13 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 13</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 13</h1>";
    ?>

    <hr />
      <?php
        $argv = $_SERVER['QUERY_STRING'];
        $argv = str_replace("%20"," ",$argv);
        $argv = trim($argv);

        $myArgvArray = preg_split("/ +/", $argv);
 
        if (count($myArgvArray) != 1 || (count($myArgvArray) == 1 && strlen($myArgvArray[0]) == 0)) {
          echo "This script expects one argument.<br />\n";
        } elseif (!is_numeric($myArgvArray[0])) {
          echo "This script expects a numeric argument.<br />\n";
        } elseif (preg_match("/^[0-9]{9}$/", $myArgvArray[0]) == 0) {
          echo "This script expects a number with 9 digits.<br />\n";
        } else {
          $ssn = $myArgvArray[0];
          echo "$ssn is ";
          if (preg_match("/^(([1-9][0-9]{2}|[0-9][1-9][0-9]|[0-9]{2}[1-9])([1-9][0-9]|[0-9][1-9])([1-9][0-9]{3}|[0-9][1-9][0-9]{2}|[0-9]{2}[1-9][0-9]|[0-9]{3}[1-9]))$/", $ssn) == 1) {
            $ssn = str_split($ssn);
            echo "valid and formatted as $ssn[0]$ssn[1]$ssn[2]-$ssn[3]$ssn[4]-$ssn[5]$ssn[6]$ssn[7]$ssn[8].";
          } else {
            echo "invalid.<br />\n";
          }
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
