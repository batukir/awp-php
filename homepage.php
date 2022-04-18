<?php
include_once("session.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>
</head>
<body>
    <div>
        Homepage
    </div>

    <div>
    <button>
      <a href='logout.php'>Logout</a>
    </button>
    <br/>
    <?php
      echo 'Welcome' . ' ' .  $_SESSION['user']
    ?>
    </div>
</body>
</html>