<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 12 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 12</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 12</h1>";
    ?>

    <hr />
      <?php
        $argv = $_SERVER['QUERY_STRING'];
        $argv = str_replace("%20"," ",$argv);
        $argv = trim($argv);

        $number = false;
        if (preg_match("/^(.*[0-9].*)$/", $argv) == 1) {
          $number = true;
        }

        $lowercase = false;
        if (preg_match("/^(.*[a-z].*)$/", $argv) == 1) {
          $lowercase = true;
        }

        $uppercase = false;
        if (preg_match("/^(.*[A-Z].*)$/", $argv) == 1) {
          $uppercase = true;
        }

        $whitespace = false;
        if (preg_match("/^(.*[\s].*)$/", $argv) == 1) {
          $whitespace = true;
        }

        $special = false;
        if (preg_match("/^(.*[^0-9A-Za-z].*)$/", $argv) == 1) {
          $special = true;
        }

        $length = false;
        if (preg_match("/^(.{8,16})$/", $argv) == 1) {
          $length = true;
        }

        $strong = ($number && $lowercase && $uppercase && $special && $length) && !$whitespace;

        echo "$argv is " . ($strong ? "" : "not") . " a strong password. <br /><br />\n";

        if (!$strong) {
          echo "<table>\n";
            echo "<tr>\n";
              echo "<th>\n";
               echo "Status\n";
              echo "</th>\n";
              echo "<th>\n";
                echo "Reason\n";
              echo "</th>\n";
            echo "</tr>\n";
            echo "<tr>\n";
              echo "<td>\n";
                echo ($number ? "Yes" : "No") . "\n";
              echo "</td>\n";
              echo "<td>\n";
                echo "Has at least one number\n";
              echo "</td>\n";
            echo "</tr>\n";
            echo "<tr>\n";
              echo "<td>\n";
                echo ($lowercase ? "Yes" : "No") . "\n";
              echo "</td>\n";
              echo "<td>\n";
                echo "Has at least one lowercase letter\n";
              echo "</td>\n";
            echo "</tr>\n";
            echo "<tr>\n";
              echo "<td>\n";
                echo ($uppercase ? "Yes" : "No") . "\n";
              echo "</td>\n";
              echo "<td>\n";
                echo "Has at least one uppercase letter\n";
              echo "</td>\n";
            echo "</tr>\n";
            echo "<tr>\n";
              echo "<td>\n";
                echo (!$whitespace ? "Yes" : "No") . "\n";
              echo "</td>\n";
              echo "<td>\n";
                echo "Has no spaces\n";
              echo "</td>\n";
            echo "</tr>\n";
            echo "<tr>\n";
              echo "<td>\n";
                echo ($special ? "Yes" : "No") . "\n";
              echo "</td>\n";
              echo "<td>\n";
                echo "Has at least one character that is not a letter or number\n";
              echo "</td>\n";
            echo "</tr>\n";
            echo "<tr>\n";
              echo "<td>\n";
                echo ($length ? "Yes" : "No") . "\n";
              echo "</td>\n";
              echo "<td>\n";
                echo "8 ≤ length ≤ 16\n";
              echo "</td>\n";
            echo "</tr>\n";
          echo "</table>\n";
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
