<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 03 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 03</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 03</h1>";
    ?>

    <hr />

    <?php
      // Obtain the QUERY_STRING, if any, via which the page was accessed.
      // It will be the information after the ? in the URL
      $input = $_SERVER['QUERY_STRING'];

      // False for some reason?
      // var_dump(is_float($input));
      // Now its true?
      // var_dump(is_float($input + 0));
    
      echo "<p>$input " . 
        (is_numeric($input) ? 
          (is_float($input + 0) ?
            (round($input) % 2 == 0 ? 
            "is even after being rounded" : "is not even after being rounded") 
          : ($input % 2 == 0 ? "is even" : "is not even")) 
        : "is not numeric") . "</p>";
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
