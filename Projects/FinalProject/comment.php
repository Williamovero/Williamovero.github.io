<?php
   session_start();
//	echo $_SESSION['loggedIn']; 
?>

<!DOCTYPE html>
<html>
<head>
      	<title>Comment</title>
        <meta charset="UTF-8">
                <!-- Favicon -->
        <link rel="icon" type="image/png" href="images/initialUtilblog.png">

        <!-- Responsive Layout -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
            <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/finalProject.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
       
               <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>

            <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body>
<div name="maincontent" id="maincontent">

<?php
   if (!isset($_SESSION['loggedIn'])) {
        echo "<br/>Must be logged in to comment <br/>
                <a href=\"userlogin.php\"> Log in</a><br/>
                 <a href=\"javascript:history.go(-1)\">Go back</a>";
  	die;
	}


?>

<h4 align="center" style="color: red;">Add Comment</h4>
        <form action="" method="post">
        <table align="center">
            <tr>
                <td>Title:</td>
            </tr>
            <tr>
            <td><input type="text" name="title" required /></td>
            </tr>
            <tr>
                <td>Comment:</td>
            </tr>
            <tr>
<td><textarea rows="25" cols="50" name="content" required ></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="submit" /></td>
            </tr>
        </table>
   <!-- Beginning of footer -->
        <div class="footer" id="footer">
          <h2>
            Contact Us at These Links
          </h2>
            <table>
                <tr>
                <ul style="list-style-type: none; display: inline-block;" class="leftAlign">
                  <li><a href="">About</a></li>
                  <ul>
                  <li><a href="">Contact</a></li>
                  <li><a href="">Employment</a></li>
                </ul>
                </ul>
                <ul style="list-style-type: none; display: inline-block;" class="leftAlign">
                  <li><a href="">Connections</a></li>
                  <ul>
                  <li><a href="">Magazines</a></li>
                  <li><a href="">Tickets</a></li>
                </ul>
                </ul>
            </tr>
                  <tr>
                <ul>
          <a href="#" class="white-text">
            <i class="fab fa-facebook fa-4x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-twitter fa-4x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-linkedin fa-4x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-google-plus fa-4x"></i>
          </a>
          <a href="#" class="white-text">
            <i class="fab fa-github fa-4x"></i>
          </a>
    </ul>
      	<?php
	//connect to server
            $mysqli = new mysqli("localhost", "root", "Over7070", "finalproject");

    if(mysqli_connect_error()){
      die('error');
    }


        $title = $_POST['title'];
        $content = $_POST['content'];
        $userid = $_SESSION['cmtloggedIn'];
	$postid = $_GET['postid'];
	
        if(!empty($title)){
            $query = "INSERT INTO comment (postid, userid, content, title)
                        VALUES('$postid', '$userid', '$content', '$title')";
            $ret = $mysqli->query($query);
            if($ret==0){
                echo "Error";
            }
            else header('Location: finalProject_1.php');

        }
	$link->close();
        ?>
</body>
</html>
