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
   if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];


    $store = $_POST['store'];
    if($store==1){
        setcookie('uname', $username, time()+60*60*24*10, '/');
    }

    $sql = "SELECT username, password FROM Users WHERE username='$username'";

    $result = $dbh->query($sql);

    if ($result->num_rows ==  1) {
        while($row = $result->fetch_assoc()) {
            if(password_verify($password, $row["password"])){
                session_start();
                $_SESSION['user']= $username;
                header("Location: homepage.php");
            }
        }
    }
    else{
        echo 'Error! Please enter a correct username or password';
    }
    $dbh->close();
  }
?> 


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
</head>
<body>
    <div>
            
        <h3>Hello and welcome! </h3>
        <h4 >Sign in to continue.</h4>
        <form method="post" name="login" action="">
        <div class="form-group">
            <input type="text" name="username" id="username" placeholder="Username"
            value="<?php if(isset($_COOKIE["uname"])) echo $_COOKIE["uname"];?>">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" placeholder="Password"
            value="<?php if(isset($_COOKIE["pword"])) echo $_COOKIE["pword"];?>">
        </div>
        <br/>
        <div >
            <input type="submit" name ="login" value="Sign In" />
        </div>
        <div>
            <div class="form-check">
            <label >
                <input type="checkbox" name="store" value="1">
                Keep me signed in
            </label>
            </div>
        </div>
        <div >
            Don't have an account? <a href="register.php" >Create</a>
        </div>
        </form>
  </div>

</body>
</html>
