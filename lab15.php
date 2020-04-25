<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 15 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 15</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 15</h1>";
    ?>

    <hr />
      <?php
        function displayError($fieldName, $errorMsg) {
          global $errorCount;
          echo "Error for \"$fieldName\": $errorMsg<br />\n";
          $errorCount++;
        }

        function validateWord($data, $fieldName) {
          global $errorCount;
          if (empty($data)) {
            displayError($fieldName, "This field is required");
            $returnVal = "";
          } else {
            $returnVal = stripslashes(trim($data));
            
            if (strlen($returnVal) < 4 || strlen($returnVal) > 7) {
              displayError($fieldName, "Words must be at least four and at most seven letters long");
            }

            if (preg_match("/^[a-z]+$/i", $returnVal) == 0) {
              displayError($fieldName, "Words can only contain letters");
            }
          }

          return str_shuffle(strtoupper($returnVal));
        }

        $errorCount = 0;
        $words = array();

        $words[] = validateWord($_POST["Word1"], "Word 1");
        $words[] = validateWord($_POST["Word2"], "Word 2");
        $words[] = validateWord($_POST["Word3"], "Word 3");
        $words[] = validateWord($_POST["Word4"], "Word 4");

        if ($errorCount != 0) {
          echo "Please use the \"Back\" button to re-enter the data.<br />\n";
        } else {
          $wordNum = 1;
          foreach ($words as $word) {
            echo "Word " . $wordNum++ . ": $word<br />\n";
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
