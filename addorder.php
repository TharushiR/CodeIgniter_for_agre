<?php
require_once 'core/init.php';

if(Session::exists('success')){
    echo Session::flash('success');
}

$user = new User();
if($user->isLoggedIn()){
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agri world</title>
    <meta name="description" content="This was generated by the Codeply editor and responsive design playground." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
  </head>
  <body >
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Agri-World</a>
        </div>
        <div class="navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">View page</a></li>
            <li><a href="profile.php?user=<?php echo escape($user->data()->username);?>">Hello! <b><?php echo escape($user->data()->username);?></b></a></li>
            <li><a href="logout.php">
              <span class="glyphicon glyphicon-log-in"></span>
              Logout
            </a></li>
          </ul>
          <form class="navbar-form navbar-left">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
</nav>
<br><br><br><br><br>


<?php

$address = $_POST["address"];
$date = $_POST["date"];
$method = $_POST["method"];
echo($method);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agri";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 



?>



<div class="footer">
  <div class="container">
            <div class="row">
                <div class="pull-right">
                    <div class="copyright">
                        <p>&copy; 2015 4it All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">Thusitha Thiyushan</a></p>
                    </div>
                </div>
            </div>
        </div>
</div>

    <!--scripts loaded here-->
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/scripts.js"></script>
  </body>
</html>
<?php
$conn->close();
}else{
  Redirect::to('404.php');
}
?>