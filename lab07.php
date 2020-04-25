<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 07 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 07</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 07</h1>";
    ?>

    <hr />
    <p>
      <?php
        function prime_factorization($num) {
          $primes = array();

          while ($num > 1) {
            for ($i = 2; $i <= $num; $i++) {
              if ($num % $i == 0) {
                $primes[] = $i;
                $num /= $i;
                break;
              }
            }
          }
          
          $primes_str = "";
          $current_prime = 0;
          $current_prime_c = 1;
          for ($i = 0; $i < count($primes); $i++) {
            if ($primes[$i] != $current_prime) {
              if ($i != 0) {
                $primes_str = $primes_str . $current_prime . "<sup>$current_prime_c</sup> * ";
              }

              $current_prime = $primes[$i];
              $current_prime_c = 1;
            } else {
              $current_prime_c += 1;
            }
          }

          $primes_str = $primes_str . $current_prime . "<sup>$current_prime_c</sup>";

          return $primes_str;
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
      
        if (count($myArgvArray) != 1) {
          echo "This script expects one arguments<br />\n";
        } elseif (!is_numeric($myArgvArray[0])) {
          echo "This script expects a numeric argument.<br />\n";
        } elseif ($myArgvArray[0] <= 1) {
          echo "This script expects a numeric argument greater than 1.<br />\n";
        } else {
          $num = $myArgvArray[0] + 0;
        
          echo $num . " = " . prime_factorization($num) . "<br />";
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
