<?php include("../config/constants.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="login">
    <h1>Login</h1><br><br>
    
<?php
   if(isset($_SESSION["login"])){
    echo $_SESSION["login"];
    unset($_SESSION["login"]);
   }

   if(isset($_SESSION['no-login-message'])){
    echo $_SESSION['no-login-message'];
    unset($_SESSION['no-login-message']);
   }
?>

    <!-- Login Form Start -->
    <form action="" method="POST">
        Username:<br><br>
        <input type="text" name="username" id="" placeholder="Enter username"><br><br>
        Password:<br><br>
        <input type="password" name="password" id="" placeholder="Enter password"><br>
        <br><br>
        <input type="submit" value="Login" placeholder="" name="submit" class="btn-primary">
    </form>
<!-- Login Form End -->
</div>



</body>
</html>

<?php
// Check if submit button is clicked
if(isset($_POST["submit"])) {

    // Process for login


    //1. Get data from login form

 echo $username= $_POST["username"];
 echo $password= md5($_POST["password"]);

    //2. SQL to check whether the username and password eists or not

    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    // 3. Execute query

    $res = mysqli_query($conn, $sql);

    // 4. Count rows whether the user exists or not

    $count = mysqli_num_rows($res);

    if($count==1) {
        // User available
        $_SESSION['login'] = "Login Successful";
        $_SESSION['user'] = $username; // Check whether user is logged in or not and logout will unset it

        // Redirect to homepage/Dashboard

        header('location:'.SITEURL.'admin/manage-admin.php');
        
    } else {
        //  User not available
        $_SESSION['login'] = "Username and Password did not match";

        // Redirect to homepage/Dashboard

        header('location:'.SITEURL.'admin/login.php');
    }





}


?>