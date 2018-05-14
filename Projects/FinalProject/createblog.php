<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Blog</title>
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
    if (!isset($_SESSION['adminloggedIn'])) {
	echo "<br/>Must be logged in as an administrator to post <br/> 
		<a href=\"userlogin.php\"> Log in</a><br/>
		 <a href=\"javascript:history.go(-1)\">Go back</a>";	
	die;
	}

?>

<h4 align="center" style="color: red;">Create Blog Post</h4>
        <form action="" method="post">
        <table align="center">
            <tr>
                <td>Title:</td>
            </tr>
	    <tr>  
	    <td><input type="text" name="title" required /></td>
            </tr>
	    <tr>
                <td>Blog:</td>
            </tr>
            <tr>
            <td><textarea rows="50" cols="50" name="content" required ></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="submit" /></td>
            </tr>
        </table>
        <!-- End of footer -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script type="text/javascript" src="scripts/finalProject.js"></script>
	<?php
	//connect to server
             $mysqli = new mysqli("localhost", "root", "Over7070", "finalproject");

    if(mysqli_connect_error()){
      die('error');
    }


        $title = $_POST['title'];
        $content = $_POST['content'];
	$userid = $_SESSION['adminloggedIn'];	        
       	
	if(!empty($title)){
            $query = "INSERT INTO post (content, userid, title)
                        VALUES('$content', '$userid', '$title')";
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
