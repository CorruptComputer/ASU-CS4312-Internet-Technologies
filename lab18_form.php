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
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 187</h1>";
    ?>

    <hr />
    <p>
      This form allows a user to enter the day number and year of a date.  The
      associated PHP application determines the month and day of the date.
    </p>
    
    <form action="lab18.php" method="post">
      <p>
        Enter the day number
        <input type="text" name="dayNumber" size="3" maxlength="3" /><br /><br />
      </p>
      
      <p>
        Enter the year
        <input type="text" name="year" size="4" maxlength="4" /><br /><br />
      </p>
      
      <p>
        <input type="reset"  value="Clear Form" />
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
