<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Final Project</title>
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
<body id="home" >
  <!-- Navbar -->
  <div class="navbar-fixed">
    <nav class="colorPurpleNav">
      <div class="container">
        <div class="nav-wrapper">
          <a href="index.html" class="brand-logo">UltiBlog</a>
          <a href="#" data-target="mobile-nav" class="sidenav-trigger">
            <i class="fas fa-bars fa-2x"></i>
          </a>
          <ul class="right hide-on-med-and-down">
            <li>
              <a href="#home">Home</a>
            </li>
            <li>
              <a href="createblog.php">Create Blog</a>
            </li>
            <li>
              <a href="usersignup.php">Sign In</a>
            </li>
             <li>
              <a href="logout.php">Log Out</a>
            </li>
            <li>
              <a href="#footer">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <ul class="sidenav" id="mobile-nav">
            <li>
              <a href="#home">Home</a>
            </li>
            <li>
              <a href="createblog.php">Create Blog</a>
            </li>
            <li>
              <a href="usersignup.php">Sign In</a>
            </li>
             <li>
              <a href="logout.php">Log Out</a>
            </li>
            <li>
              <a href="#footer">Contact</a>
            </li>
  </ul>

<div name="maincontent" id="maincontent">
<table>
<tr>
	<div name="Blog" id="Blog">
<div class="header">
  <h2>Tanaja Lloyd, William Orgertrice's Blog</h2>
<?php
if($_SESSION['loggedIn'] == "admin")
        echo "<h6>Welcome " .$_SESSION['cmtloggedIn']. ", admin!</h6>";
        else if($_SESSION['loggedIn'] == "reguser")
        echo "<h6>Welcome " .$_SESSION['cmtloggedIn']. ", registered user!</h6>";
?>
</div>
<div ng-app="">
  <p>Make a live comment: <input type="text" ng-model="name"></p>
  <p ng-bind="name"></p>
</div>

<div class="row">
    <div class="leftcolumn">
<?php
    $mysqli = new mysqli("localhost", "root", "Over7070", "finalproject");

    if(mysqli_connect_error()){
      die('error');
    }

    
    $query = "select * from post order by postid DESC";
 
    $result = $mysqli->query($query)
        or die("Failed");
    
	while($row = mysqli_fetch_array($result)){
            echo "<div> <h2>" .$row['title']. "</h2>
            <h5> By: " .$row['userid']. " on " .$row['date']. "</h5>
            <div class=\"card\" id=\"Tayo_Reed1\">
            <p>" .$row['content']. "</p></div></div>
	    <div>
	    <a href=\"comment.php?postid=" .$row['postid']. "\" style=\"color: #dadee5;\">Comment</a></div>";
	
	$postid =  $row['postid'];
//	echo $postid;
	$cmtquery = "select * from comment where postid= '$postid' order by postid DESC";
	$cmtresult = $mysqli->query($cmtquery)
        	or die("Failed");
	
		while($row2 = mysqli_fetch_array($cmtresult)){
	    		echo "<div style=\"border: white 1px solid; padding-left: 10px; margin-left: 10px;\"><h5>" .$row2['title']. 
			"<br/>&nbsp&nbsp&nbsp&nbsp-" .$row2['userid']. "</h5>
			<div class=\"card\">
			<p style=\"font-size: 10px;\">" .$row2['content']. "</p></div></div>";
		}
 	    
	}
	//mysqli_close(mysqli);
?>
<div>
      <h2>Tanaja, William</h2>
      <h5>From our developers</h5>
      <div class="card" >
      <p>First Blog!</p>
	<p>Hello and welcome to our blog!</p>
    </div>
    </div>
  </div>

   <div class="rightcolumn">
         <div>
      <h2>The Refreshing taste of coffee</h2>
      <h5>Yumm!</h5>
      <div class="card" ><a href="https://en.wikipedia.org/wiki/Coffee"><img src="images/coffee.jpg" alt="coffee" id="coffee" class="smallImage"></a>
      <p>Why Do We Drink it?</p>
      <p>ras in sagittis tortor, vitae congue diam. Donec ac velit finibus, blandit mauris nec, tincidunt magna. Praesent suscipit orci lobortis, faucibus turpis eget, molestie orci. Suspendisse interdum viverra libero quis laoreet. Vestibulum fermentum orci id convallis varius. Cras rhoncus rhoncus semper. Fusce sit amet augue non mauris faucibus bibendum id vel ex.

Nam a venenatis lectus. Nulla blandit feugiat erat eget porttitor. Sed urna justo, sollicitudin sit amet orci a, vulputate interdum eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed ut ante in sem euismod venenatis. Donec lobortis purus ut augue hendrerit lacinia. Donec ut feugiat metus. Curabitur quis vulputate mauris. Vestibulum varius ullamcorper dignissim. Integer ultrices ante sed molestie ultrices. Sed iaculis ligula urna. Nulla facilisi. Suspendisse et bibendum lectus. Quisque sodales feugiat lacus, eget scelerisque felis tristique ac. Nullam tristique velit neque, eu tincidunt turpis congue vel. Nullam rhoncus dui sit amet nulla faucibus, eget gravida dolor faucibus.</p>
    </div>
    </div>
          <div>
      <h2>The Refreshing taste of coffee</h2>
      <h5>Yumm!</h5>
      <div class="card" ><a href="https://en.wikipedia.org/wiki/Coffee"><img src="images/coffee.jpg" alt="coffee" id="coffee" class="smallImage"></a>
      <p>Why Do We Drink it?</p>
      <p>ras in sagittis tortor, vitae congue diam. Donec ac velit finibus, blandit mauris nec, tincidunt magna. Praesent suscipit orci lobortis, faucibus turpis eget, molestie orci. Suspendisse interdum viverra libero quis laoreet. Vestibulum fermentum orci id convallis varius. Cras rhoncus rhoncus semper. Fusce sit amet augue non mauris faucibus bibendum id vel ex.

Nam a venenatis lectus. Nulla blandit feugiat erat eget porttitor. Sed urna justo, sollicitudin sit amet orci a, vulputate interdum eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed ut ante in sem euismod venenatis. Donec lobortis purus ut augue hendrerit lacinia. Donec ut feugiat metus. Curabitur quis vulputate mauris. Vestibulum varius ullamcorper dignissim. Integer ultrices ante sed molestie ultrices. Sed iaculis ligula urna. Nulla facilisi. Suspendisse et bibendum lectus. Quisque sodales feugiat lacus, eget scelerisque felis tristique ac. Nullam tristique velit neque, eu tincidunt turpis congue vel. Nullam rhoncus dui sit amet nulla faucibus, eget gravida dolor faucibus.</p>
    </div>
    </div>
</div>
</tr>
	</table>
</div>
   <!-- Beginning of footer -->
        <div class="footer" id="footer">
          <h2>
            Contact Us at These Links
          </h2>
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
                </ul><br>
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
          <a href="https://github.com/Williamovero/finalWebProgrammingProject/tree/master/FinalProject" class="white-text">
            <i class="fab fa-github fa-4x"></i>
          </a>
    </ul>
        <!-- End of footer -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script type="text/javascript" src="scripts/finalProject.js"></script>
</body>
</html>

