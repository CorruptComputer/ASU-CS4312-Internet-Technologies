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
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 16</h1>";
    ?>

    <hr />
    <p>
      This form allows a user to enter a month, day, and year.  The
      associated PHP application determines the day number of the given
      date.
    </p>
    
    <form action="lab16.php" method="post">
      <p>Select the month</p>
      <table>
        <?php
          $monthNames = array("January", "February", "March", "April", "May",
                              "June", "July", "August", "September",
                              "October", "November", "December");
        
          foreach ($monthNames as $i => $month){
            if ($i % 4 == 0) {
              echo "<tr>\n";
            }
        
            echo "<td><input type=\"radio\" name=\"month\" value=\"", $i + 1, "\"";

            if ($i == 0) {
              echo " checked=\"checked\"";
            }
              
            echo " />$month</td>\n";

            if (($i + 1) % 4 == 0) {
              echo"</tr>\n";
            }
          }
        ?>
      </table>

      <hr />
      
      <p>
      Select the day of the month
      <select size="1" name="day">
      <?php
        for ($i = 1; $i<=31; ++$i)
        {
          echo "<option";
          if ($i == 1)
            echo " selected=\"selected\"";
          echo ">$i</option>\n";
        }
      ?>
      </select>
      </p>
      
      <hr />
      
      <p>
      Enter the year
      <input type="text" name="year" size="4" maxlength="4" /><br /><br />
      <input type="reset"  value="Clear This Form" />&nbsp;&nbsp;
      <input type="submit" name="Submit" value="Submit This Form" />
      </p>
    </form>
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
