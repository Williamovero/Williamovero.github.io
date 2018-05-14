<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
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
<body class="LoginPage">

	<?php	
if (isset($_SESSION['loggedIn'])) {
        echo "<br/>You are already logged in<br/>
                <a href=\"logout.php\"> Log out</a><br/>
                <a href=\"javascript:history.go(-1)\">Go back</a>";
        die;
}
	?>
        <h4 align="center" style="color: #FE6250;"><strong>Sign In</strong></h4>
        <form action="" method="post" class="SignUp">

                        <input type="name" name="username" placeholder="username" required autocomplete="off" /><br>

                        <td align="center"><input type="name" name="password" placeholder="password" required autocomplete="off" /><br>
              
                    	<td align="center"><input type="submit" value="Submit" class="btn waves-effect indigo darken-3 waves-light"> <br>                 
                		<a href="usersignup.php">Click here to register</a>
        </form>
	<?php
	// Create connection
       $link = new mysqli("localhost", "root", "Over7070", "finalproject");

    if(mysqli_connect_error()){
      die('error');
    }
if (isset($_POST['username'])) {
    $userid = $_POST['username'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
	$sql = "SELECT accesstype FROM user_info WHERE userid = '$userid' and password = '$password'";
	$ret = $link->query($sql)
        or die("Failed");

	$row = mysqli_fetch_array($ret);
 if(!empty($userid)){
	if ($row["accesstype"] == "admin"){ 
		$_SESSION['adminloggedIn'] = $userid;
		$_SESSION['loggedIn'] = $row["accesstype"];
		$_SESSION['cmtloggedIn'] = $userid; 
		header('Location: finalproject_1.php');
	}
 	else if($row["accesstype"] == "reguser"){
		 $_SESSION['regloggedIn'] = $userid;
		 $_SESSION['loggedIn'] =	$row["accesstype"];
		 $_SESSION['cmtloggedIn'] = $userid;
		 header('Location: finalproject_1.php');	
	}
	else echo "Username or password don't exist";
	}
	$link->close();
	
	?>
</body>
</html>
