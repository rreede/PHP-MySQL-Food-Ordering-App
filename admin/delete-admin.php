<?php include("../config/constants.php"); ?>

<?php


if(isset($_SESSION['user'])) { // Check whether user session is set before deleteing users



// 1. Get the id of admin to delete

$id = $_GET['id'];



//2. qreate sql query to delete admin

$sql = "DELETE FROM tbl_admin WHERE id=$id";

// Execute query

$res = mysqli_query($conn, $sql);

if($res==TRUE) {

    // Query successful and admin deleted
    echo "Success";

// Create session variable to display message

$_SESSION["delete"] = "Admin was deleted";

header("location:".SITEURL.'admin/manage-admin.php');

} else {
     $_SESSION["delete"]="Failed to Delete Admin. Try Again Later.";
}


}

// 3. Redirect to manage admin page with message (success/error)
/*

*/
?>