<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 14 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 14</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 14</h1>";
    ?>

    <hr />
      <?php
        $argv = $_SERVER['QUERY_STRING'];
        $argv = str_replace("%20"," ",$argv);
        $argv = trim($argv);

        $myArgvArray = preg_split("/ +/", $argv);
 
        if (count($myArgvArray) != 1 || (count($myArgvArray) == 1 && strlen($myArgvArray[0]) == 0)) {
          echo "This script expects one argument.<br />\n";
        } else {
          $num = $myArgvArray[0];
          echo "$num is ";
          if (preg_match("/^[+-]?((0[Xx][0-9A-Fa-f]+)|([0-9]+))[UuLl]?$/", $num) == 1) {
            echo "a valid integer literal.";
          } else {
            echo "a not valid integer literal.<br />\n";
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
