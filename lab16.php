<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 16 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 16</title>
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
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 16</h1>";
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
        }
    
        else
          errorMsg("unknown REQUEST_METHOD");
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

      $month = parseFormElements("month");
      if (!preg_match("/^[0-1]?[0-9]$/", $month)) {
        errorMsg("the value entered for the month, namely, $month is invalid");
      } elseif ($month > 12 || $month < 1) {
        errorMsg("the value entered for the month, namely, $month is not in the Gregorian calendar. The month must be between 1 and 12");
      }
      $month += 0;

      $day = parseFormElements("day");
      if (!preg_match("/^[1-3]?[0-9]$/", $day)) {
        errorMsg("the value entered for the day, namely, $day is invalid");
      } elseif ($day < 1) {
        errorMsg("the value entered for the day, namely, $day is not in the Gregorian calendar. The day must start at 1");
      } elseif (in_array($month, array(1, 3, 5, 7, 8, 10, 12)) && $day > 31) {
        errorMsg("the value entered for the day, namely, $day is not in the Gregorian calendar. The days for this month ends on day 31");
      } elseif (in_array($month, array(4, 6, 9, 11)) && $day > 30) {
        errorMsg("the value entered for the day, namely, $day is not in the Gregorian calendar. The days for this month ends on day 30");
      } elseif ($month == 2 && isLeapYear($year) && $day > 29) {
        errorMsg("the value entered for the day, namely, $day is not in the Gregorian calendar. The days for this month ends on day 29");
      } elseif ($month == 2 && !isLeapYear($year) && $day > 28) {
        errorMsg("the value entered for the day, namely, $day is not in the Gregorian calendar. The days for this month ends on day 28");
      } elseif ($year == 1752 && $month == 9 && ($day > 2 && $day < 14)) {
        errorMsg("the value entered for the day, namely, $day is not in the Gregorian calendar. The days between 2 and 14 for this month on this year don't exist");
      }
      $day += 0;
        
      echo "<p>For the date $month/$day/$year, the day number ";
    
      date_default_timezone_set('America/Chicago');
      $myTimeArray = getdate();
    
      if ($year < $myTimeArray["year"]) {
        echo "was ";
      } elseif ($year == $myTimeArray["year"]) {
        echo "is ";
      } else {
        echo "will be ";
      }

      $a = floor((275 * $month)/9);
      $b = (isLeapYear($year) ? 1 : 2);
      $c = floor(($month+9)/12);
      $d = $day - 30;
      $days = ($a - $b * $c + $d);

      // The year 1752 requires special processing. In this year, the day following Wednesday, September 2, 1752, was Thursday, September 14, 1752.
      if ($year == 1752 && ($month > 9 || ($month == 9 && $day >= 14))) {
        $days -= 11;
      }
    
      echo "$days.<br /></p>\n";
    
      writeClosing();
    ?>
    
    <?php
      /* -------------------  Function: writeClosing ---------- */
      function writeClosing()
      {
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
<?php
  }
?>
