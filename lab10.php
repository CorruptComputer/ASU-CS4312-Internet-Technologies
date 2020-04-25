<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 10 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 10</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 10</h1>";
    ?>

    <hr />
    <?php
      // only takes up to 3 digit numbers
      function pretty_print_number($number) {
        $output = "";
        switch (count(str_split($number))) {
          case 3:
            switch (str_split($number)[0]) {
              case '0':
                break;  
              case '1':
                $output .= "one ";
                break; 
              case '2':
                $output .= "two ";
                break; 
              case '3':
                $output .= "three ";
                break; 
              case '4':
                $output .= "four ";
                break; 
              case '5':
                $output .= "five ";
                break; 
              case '6':
                $output .= "six ";
                break; 
              case '7':
                $output .= "seven ";
                break; 
              case '8':
                $output .= "eight ";
                break; 
              case '9':
                $output .= "nine ";
                break; 
            }
            $output .= "hundred ";
            switch (str_split($number)[1]) {
              case '0':
                break;  
              case '1':
                $output .= "teen ";
                break;
              case '2':
                $output .= "twenty ";
                break; 
              case '3':
                $output .= "thirty ";
                break; 
              case '4':
                $output .= "fourty ";
                break; 
              case '5':
                $output .= "fifty ";
                break; 
              case '6':
                $output .= "sixty ";
                break; 
              case '7':
                $output .= "seventy ";
                break; 
              case '8':
                $output .= "eightty ";
                break; 
              case '9':
                $output .= "ninety ";
                break; 
            }
            switch (str_split($number)[2]) {
              case '0':
                break;  
              case '1':
                $output .= "one ";
                break; 
              case '2':
                $output .= "two ";
                break; 
              case '3':
                $output .= "three ";
                break; 
              case '4':
                $output .= "four ";
                break; 
              case '5':
                $output .= "five ";
                break; 
              case '6':
                $output .= "six ";
                break; 
              case '7':
                $output .= "seven ";
                break; 
              case '8':
                $output .= "eight ";
                break; 
              case '9':
                $output .= "nine ";
                break; 
            }

            break;
          case 2:
            switch (str_split($number)[0]) {
              case '0':
                break;  
              case '1':
                $output .= "teen ";
                break;
              case '2':
                $output .= "twenty ";
                break; 
              case '3':
                $output .= "thirty ";
                break; 
              case '4':
                $output .= "fourty ";
                break; 
              case '5':
                $output .= "fifty ";
                break; 
              case '6':
                $output .= "sixty ";
                break; 
              case '7':
                $output .= "seventy ";
                break; 
              case '8':
                $output .= "eightty ";
                break; 
              case '9':
                $output .= "ninety ";
                break; 
            }
            switch (str_split($number)[1]) {
              case '0':
                break;  
              case '1':
                $output .= "one ";
                break; 
              case '2':
                $output .= "two ";
                break; 
              case '3':
                $output .= "three ";
                break; 
              case '4':
                $output .= "four ";
                break; 
              case '5':
                $output .= "five ";
                break; 
              case '6':
                $output .= "six ";
                break; 
              case '7':
                $output .= "seven ";
                break; 
              case '8':
                $output .= "eight ";
                break; 
              case '9':
                $output .= "nine ";
                break; 
            }
            break;
          // in case of only 1 digit
          case 1:
            switch (str_split($number)[0]) {
              case '0':
                break;  
              case '1':
                $output .= "one ";
                break; 
              case '2':
                $output .= "two ";
                break; 
              case '3':
                $output .= "three ";
                break; 
              case '4':
                $output .= "four ";
                break; 
              case '5':
                $output .= "five ";
                break; 
              case '6':
                $output .= "six ";
                break; 
              case '7':
                $output .= "seven ";
                break; 
              case '8':
                $output .= "eight ";
                break; 
              case '9':
                $output .= "nine ";
                break; 
          }
            break;
        }

        return $output;
      }
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
      } elseif (count($myArgvArray[0]) > 12) {
        echo "This script expects an account number with 12 or fewer digits.<br />\n";
      } else {
        echo "<p>\n";
        $number = $myArgvArray[0];
        $num_array = str_split($number);
        $num_text = "";

        for ($i = 1, $count = count($num_array), $next_nums = ""; $i <= $count; $i++) {
          if ($i % 3 != 0) {
            $next_nums = $num_array[$count - $i] . $next_nums;
          } else {
            $next_nums = $num_array[$count - $i] . $next_nums;
            $num_text = pretty_print_number($next_nums) . $num_text;
            $next_nums = "";
          }
        }

        echo "$number = $num_text";

        echo "</p>";
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
