<!-- This is an HTML comment at the beginning of the file identifying the owner.
     Nickolas Gupton 
     CS 4312
     Lab 11 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nickolas Gupton - Lab 11</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <?php
      echo "<h1>Nickolas Gupton - CS 4312 - Lab 11</h1>";
    ?>

    <hr />
    <?php
      $emails = array(
        "jsmith123@example.org",
        "john.smith.mail@example.org",
        "john.smith@example.org",
        "john.smith@example",
        "jsmith123@mail.example.org"
      );

      foreach ($emails as $email) {
        echo "The email address \"$email\" is ";

        if (preg_match("/^(([A-Za-z]+\d+)|([A-Za-z]+\.[A-Za-z]+))@((mail\.)?)example\.org$/i", $email) != 1) {
          echo "not ";
        }

        echo "a valid e-mail address.<br />\n";
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
