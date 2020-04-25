<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 05 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 05</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 05</h1>";
    ?>

    <hr />
    <p>
      <?php
        // Function isTriangle takes three arguments, each representing the
        // length of a side of a triangle.  The function returns true if the
        // arguments represent the lengths of the sides of a triangle and false
        // otherwise.
        function isTriangle($side1, $side2, $side3)
        {
          if ($side1 + $side2 <= $side3) return false;
          if ($side1 + $side3 <= $side2) return false;
          if ($side2 + $side3 <= $side1) return false;

          return true;
        }
      
        // Function isEquilateral takes three arguments, each representing the
        // length of a side of a triangle.  The function returns true if the
        // three sides represent a triangle and are equal and false otherwise.
        function isEquilateral($side1, $side2, $side3)
        {
          if (isTriangle($side1, $side2, $side3)) {
            if ($side1 != $side2) return false;
            if ($side2 != $side3) return false;

            return true;
          }
      
          return false;
        }
      
        // Function isIsosceles takes three arguments, each representing the
        // length of a side of a triangle.  The function returns true if the
        // three sides represent a triangle and at least two are equal and
        // false otherwise. 
        function isIsosceles($side1, $side2, $side3)
        {
          if (isTriangle($side1, $side2, $side3)) {
            if ($side1 == $side2) return true;
            if ($side2 == $side3) return true;
            if ($side1 == $side3) return true;

            return false;
          }
      
          return false;
        }
      
        // Function isScalene takes three arguments, each representing the
        // length of a side of a triangle.  The function returns true if the
        // three sides represent a triangle and no two are equal and
        // false otherwise. 
        function isScalene($side1, $side2, $side3)
        {
          if (isTriangle($side1, $side2, $side3)) {
            if ($side1 == $side2) return false;
            if ($side2 == $side3) return false;
            if ($side1 == $side3) return false;

            return true;
          }
      
          return false;
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
          echo "This script expects the first side to be numeric.<br />\n";
        } elseif (!is_numeric($myArgvArray[1])) {
          echo "This script expects the second side to be numeric.<br />\n";
        } elseif (!is_numeric($myArgvArray[2])) {
          echo "This script expects the third side to be numeric.<br />\n";
        } else {
          $side1 = $myArgvArray[0] + 0;
          $side2 = $myArgvArray[1] + 0;
          $side3 = $myArgvArray[2] + 0;
        
          echo "Lengths: " . $side1 . ", " . $side2 . ", " . $side3 . "<br />";

          $triangle = isTriangle($side1, $side2, $side3);
          echo "Triangle: " . ($triangle ? "YES" : "NO") . "<br />";

          if ($triangle) {
            echo "Equilateral: " . (isEquilateral($side1, $side2, $side3) ? "YES" : "NO") . "<br />";
            echo "Isosceles: " . (isIsosceles($side1, $side2, $side3) ? "YES" : "NO") . "<br />";
            echo "Scalene: " . (isScalene($side1, $side2, $side3) ? "YES" : "NO") . "<br />";
          }
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
