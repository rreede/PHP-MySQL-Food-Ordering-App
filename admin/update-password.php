<?php include("partials/menu.php") ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>
<?php
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
    }

?>
        <form action="" method="POST">

            <table class="tbl-30">
            <tr>
                <td>Current Password
                <input type="text" name="current_password" placeholder="current_password">
                </td>
            </tr>

            <tr>
                <td>New Password<br> 
                <input type="text" name="new_password" placeholder="New Password">
                </td>
            </tr>

            <tr>
                <td>Confirm Password
                <input type="text" name="confirm_password" placeholder="Confirm Password">
                </td>
            </tr>

            <tr colspan="2">


                <td>
                <input type="hidden" name="id" value="<?php echo $id; ?>">    
                <input type="submit" value="Change Password" name="submit"></td>
            </tr>
            

            </table>


        </form>
    </div>
</div>


<?php

// Check whether the Submit button is clicked

if(isset($_POST["submit"])){
    echo "Klicked";

// 1. Get data from form

$id = $_POST["id"];
$current_password=md5($_POST["current_password"]);
$new_password = md5($_POST["new_password"]);
$confirm_password = md5($_POST["confirm_password"]);


// 2. Check whether the user with ID and password Exists or not

$sql = "SELECT * FROM tbl_admin WHERE id=$id and password ='$current_password'";

// Execute the query

$res = mysqli_query($conn,$sql);

if($res==true) {
    // Check whether data is available or not

    $count = mysqli_num_rows($res);

    if($count==1) {

        // User Exists and Password can be changed
        // Check whether the new password and confirm password match or not

if($new_password==$confirm_password) {
    // Update the password

    echo "Password Match";

    $sql2 = "UPDATE tbl_admin SET password='$new_password' WHERE id=$id";

    // Execute query

    $res2 = mysqli_query($conn, $sql2);

    if($res2 == TRUE) {
        // Display Success Message

        $_SESSION["change-pwd"] = "Password Changed Successfully";
        // Redirect the user

        header('location:'.SITEURL.'admin/manage-admin.php');
} else {
    $_SESSION["change-pwd"] = "Password Did not change successfully";
    // Redirect the user

    header('location:'.SITEURL.'admin/manage-admin.php');
}

    }

} else {
    $_SESSION["pwd-not-match"] = "Password did not match";
        // Redirect the user

        header('location:'.SITEURL.'admin/manage-admin.php');
}

    } else {
        // User does not exist set message and redirect
        $_SESSION["user-not-found"] = "User Not Found";
        // Redirect the user

        header('location:'.SITEURL.'admin/manage-admin.php');

    }
}


// 3. Check Whether the new Password and Confirm password match or not

// 4. Change Password if all above is true







?>

<?php include("partials/footer.php") ?>