<html>
    <head>
        <title>User sign up</title>
        <meta charset="UTF-8">

        <!-- Responsive Layout -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="images/initialUtilblog.png">
       
            <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/finalProject.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

               <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>

            <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    </head>
    <body class="SignUpPage">
<div class="SignUp">
        
        <h4 align="center" style="color: #FE6250;"><strong>Register</strong></h4>

        <form action="" method="post" id="register">
                    <input type="given-name" name="firstname" placeholder="firstname" required autocomplete="off" /><br>
                    <input type="family-name" name="lastname" placeholder="lastname" required autocomplete="off" /><br>
                    <input type="name" name="email" placeholder="email" required autocomplete="off" /><br>
                    <input type="name" name="username" placeholder="username" required autocomplete="off" /><br>
                    <input type="name" name="password" placeholder="password" required autocomplete="off" /><br>

                    <label>
                    <input class="with-gap" name="radio1" type="radio" value = "admin" id="accesstype1" checked />
                    <span>Admin</span>
                    </label>
                    
                    <label>
                    <input class="with-gap" name="radio1" type="radio" value = "reguser" id="accesstype2" />
                    <span>User</span>
                    </label>
                    <br>

                    <input type="submit" value="Submit" class="btn waves-effect indigo darken-3 waves-light"> <br/>
                    <a href="userlogin.php">Already have an account? Click here</a>
        </form>
        <?php
        // Create connection
            $link = new mysqli("localhost", "root", "Over7070", "finalproject");
                                                 
    if(mysqli_connect_error()){
      die('error');
    }

if (isset($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
}

if (isset($_POST['lastname'])) {
    $lastname = $_POST['lastname'];
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['username'])) {
    $userid = $_POST['username'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
if (isset($_POST['radio1'])) {
    $accesstype = $_POST['radio1'];
}

            
        if(!empty($firstname)){
            $query = "INSERT INTO user_info (firstname, lastname, email, password, userid, accesstype)
                        VALUES('$firstname', '$lastname', '$email', '$password', '$userid', '$accesstype')";
            $ret = $mysqli->query($query)
        or die("Failed");
            if($ret==0){
                echo "Username or email already exists";
                echo '<a href= "userlogin.php"> Log in</a>';
            }
	    else header('Location: userlogin.php ');

        }
        $link->close();

    ?>
</div>
</body>
</html>