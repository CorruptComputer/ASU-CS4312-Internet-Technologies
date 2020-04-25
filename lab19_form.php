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
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 19</h1>";
    ?>

    <hr />
    <p>
      This form allows a user to enter a Jumble word.  Words must be at least four
      and at most seven letters long. The associated PHP application prints
      possible solutions.
    </p>
    
    <form action="lab19.php" method="post">
      <p>Jumble Word: <input type="text" name="word" /><br /></p>
      <p><input type="reset" value="Clear Form" />&nbsp;
      &nbsp;<input type="submit" name="Submit" value="Solve It" /></p>
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
