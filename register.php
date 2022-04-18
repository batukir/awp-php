<?php 

     // Connect to the database

    if (!include('connect.php')) {
    die('error finding connect file');
    }

    $dbh = ConnectDB();
    // Check connection
    if ($dbh->connect_error) {
      die("Connection failed: " . $dbh->connect_error);
    }


   if(isset($_POST['register'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

 

    if($username != '' && $password != '' && $email != ''){

      $sql = "INSERT INTO Users(username, password, email) VALUES('$username', '$password', '$email')";
      

      if ($dbh->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: Something went wrong, user not registered";
      }
      
      $dbh->close();
    }
    else {
      echo "Please fill all fields";
    }
  }
?>
<html>

<head>
   <link href='http://fonts.googleapis.com/css?family=Cuprum'
rel='stylesheet' type='text/css'>
   <link href="https://fonts.googleapis.com/css?family=Amaranth"
rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto+Mono"
rel="stylesheet">
   <title>Table Results</title>
</head>

<body>
  <div>
        <h3>New here?</h3>
        <h4 >Sign up here</h4>
        <form method="POST" name="register" action="">
          <div class="form-group">
            <input type="text" name="username" id="username" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="email" name="email" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="password" name="password" id="password" placeholder="Password">
          </div>
          <br/>
          <div class="mt-3">
            <input type="submit" name="register" value="Sign Up"/>
          </div>
          <div >
            Already have an account? <a href="login.php" class="text-primary">Login</a>
          </div>
        </form>
  </div>

</body>
</html>