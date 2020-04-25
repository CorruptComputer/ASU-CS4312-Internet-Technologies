<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 19 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 19</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
      body {
        display: block;
        background-color: #87a1ff;
      }

      h1 {
        text-align: center;
        font-family: 'Courier New', Courier, monospace;
      }

      h2 {
        font-family: 'Courier New', Courier, monospace;
      }

      hr {
        background-color: #ffb56b;
        border: 1px solid #000;
        border-radius: 7px 7px 7px 7px;
        height: 2px;
      }

      table {
        background-color: #ffb56b;
        border: 1px solid #000;
        border-radius: 7px 7px 7px 7px;
        margin: 15px;
        padding: 3px;
      }

      tr,td,th {
        background-color: #87a1ff;
        border: 1px solid #000;
        padding: 5px;
      }

      .row {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
      }

      @media only screen and (max-width: 940px) {
        .row {
          display: flex;
          flex-direction: column;
          justify-content: flex-start;
        }
      }
    </style>
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 19</h1>";
    ?>
    <hr />

    <?php
      /* -------------------  Function: ParseFormElements ----- */
      function parseFormElements($name) {
        if (strcasecmp($_SERVER['REQUEST_METHOD'], "get") == 0) {
          if (strstr($_SERVER['QUERY_STRING'], $name) != NULL) {
            if ($_GET[$name] == NULL) {
              errorMsg("variable " . $name . " is empty");
            } else {
              return htmlspecialchars($_GET[$name]);
            }
          } else {
            errorMsg("variable " . $name . " is missing");
          }
        } elseif (strcasecmp($_SERVER['REQUEST_METHOD'], "post") == 0) {
          if ($_POST[$name] == NULL) {
            errorMsg("variable " . $name . " is empty");
          } else {
            return htmlspecialchars($_POST[$name]);
          }
        } else {
          errorMsg("unknown REQUEST_METHOD");
        }
      }
    
      /* -------------------  Function: errorMsg -------------- */
      function errorMsg($msg) {
        echo "<p>Your form results could not be processed because $msg.</p>\n";
        writeClosing();
        exit(1);
      }

      function nextPermutation() {
        global $word;
        $letters = str_split($word);

        $i = count($letters)-2;
        while ($i >=-1) {
          if ($i == -1) {
            return false;
          }

          if ($letters[$i] < $letters[$i+1]) {
            break;
          }

          $i--;
        }

        $j = count($letters)-1;
        while ($j >=0) {
          if ($letters[$i] < $letters[$j]) {
            break;
          }
          $j--;
        }

        $temp = $letters[$i];
        $letters[$i] = $letters[$j];
        $letters[$j] = $temp;

        for ($i += 1, $j = count($letters)-1; $i < $j; $j--, $i++) {
          $temp = $letters[$i];
          $letters[$i] = $letters[$j];
          $letters[$j] = $temp;
        }

        $word = "";
        foreach ($letters as $letter) {
          $word .= $letter;
        }

        return true;
      }

      $inputWord = parseFormElements("word");
      if (!preg_match("/^.{4,7}$/", $inputWord)) {
        errorMsg("words must be at least four and at most seven letters long");
      } if (!preg_match("/^[A-Za-z]+$/", $inputWord)) {
        errorMsg("words must be only letters");
      }

      $letters = str_split($inputWord);
      sort($letters);
      $word = "";
      foreach ($letters as $l) {
        $word .= $l;
      }
      
      $dictionary = file("/usr/local/4312/data/19/2of12inf.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

      $validPermutations = array();
      do {
        if (in_array($word, $dictionary)) {
          $validPermutations[] = $word;
        }
      } while (nextPermutation());

      echo "<p>For the Jumble word <strong><span style=\"font-family: 'courier-new', courier; font-size: medium\">$inputWord</span></strong>, " . count($validPermutations) . " solutions were found.</p>\n";

      if (count($validPermutations) > 0) {
        echo "<pre><strong>";

        $widthIndex = strlen(count($validPermutations));
        foreach ($validPermutations as $index => $p) {
          printf("%4s. ", $index+1);
          echo "$p\n";
        }

        echo "</strong></pre>\n";
      }
      
      writeClosing();
    ?>
    
    <?php
      /* -------------------  Function: writeClosing ---------- */
      function writeClosing()
      {
    ?>
    <hr />
    <footer>
      Built with HTML5 and PHP. Page can be validated here: <br />

      <a href="http://validator.w3.org/check?uri=referer" target="_blank">
        <img src="https://www.w3.org/html/logo/downloads/HTML5_Logo.svg" height="64" alt="HTML5" title="HTML5" />
      </a>
    </footer>
  </body>
</html>
<?php
  }
?>
