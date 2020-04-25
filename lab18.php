<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 18 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 18</title>
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
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 18</h1>";
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

      function isLeapYear($year) {
        return ($year % 400 == 0 || ($year % 4 == 0 && $year % 100 != 0));
      }

      $year = parseFormElements("year");
      if (!preg_match("/^[0-9]{1,4}$/", $year)) {
        errorMsg("the value entered for the year, namely, $year is invalid");
      } elseif ($year <= 1582) {
        errorMsg("the value entered for the year, namely, $year is not in the Gregorian calendar. Use a year later than 1582");
      }
      $year += 0;

      $leapYear = isLeapYear($year)?1:2;

      $dayNumber = parseFormElements("dayNumber");
      if (!preg_match("/^[0-9]{1,3}$/", $dayNumber)) {
        errorMsg("the value entered for the dayNumber, namely, $dayNumber is invalid");
      } elseif ($dayNumber < 1) {
        errorMsg("the value entered for the dayNumber, namely, $dayNumber is not in the Gregorian calendar. The dayNumber must start at 1");
      } elseif ($leapYear == 1 && $dayNumber > 366) {
        errorMsg("the value entered for the dayNumber, namely, $dayNumber is not in the Gregorian calendar. The dayNumber for this year ends on day 366");
      } elseif ($leapYear == 2 && $dayNumber > 365) {
        errorMsg("the value entered for the dayNumber, namely, $dayNumber is not in the Gregorian calendar. The dayNumber for this year ends on day 365");
      } elseif ($year == 1752 && $dayNumber > 355) {
        errorMsg("the value entered for the dayNumber, namely, $dayNumber is not in the Gregorian calendar. The dayNumber for this year ends on day 355");
      }
      $dayNumber += 0;

      if ($year == 1752 && $dayNumber > 246) {
        $dayNumber += 11;
      }

      $month = ($dayNumber < 32)? 1 : floor(((9*($dayNumber + $leapYear))/275)+0.98);

      $day = $dayNumber - floor((275*$month) / 9) + $leapYear * floor(($month + 9) / 12) + 30;

      $months = array (
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December");

      echo "The date corresponding to a day number of $dayNumber in the year $year was " . $months[$month-1] . " $day.";
      
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
