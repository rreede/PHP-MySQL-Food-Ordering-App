<?php include("partials/menu.php"); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

<?php

// 1. Get the ID of selected Admin

$id=$_GET["id"];

// 2. Create SQL Query to get the Details

$sql="SELECT * FROM tbl_admin WHERE id=$id";

// Execute the Query

$res=mysqli_query($conn,$sql);

if($res==TRUE) {
// Check wheter data is available or not
$count = mysqli_num_rows($res);

// Check whether we have admin data or not

if($count==1) {
// Get the details

//echo "Admin Available";

$row=mysqli_fetch_assoc($res);

$full_name = $row['full_name'];
$username = $row['username'];

} else {

    // Redirect to Manage Admin page
header('location:'.SITEURL.'admin/manage-admin.php');

}

/*
$_SESSION["update"] = "Updated successfully";

} else {
    $_SESSION["update"] = "Update Failed";
*/
}


?>


    <form action="" method="POST">
    <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" 
                value="<?php echo $full_name; ?>"
                placeholder="Enter Your Name"></td>
            </tr>

            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" 

                value="<?php echo $username; ?>"

                placeholder="Enter Your Username"></td>
            </tr>


            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="submit"  name="submit" value="Update Admin" class="btn-secondary">

                </td>
              
            </tr>

        </table>

    </form>

    </div>
</div>


<?php

if(isset($_POST["submit"])) {

    //echo "Button Clicked";

    // Get values from form
     $id = $_POST['id'];
     $full_name = $_POST['full_name'];
     $username = $_POST['username'];
//  SQL Query
    $sql = "UPDATE tbl_admin SET full_name = '$full_name', username= '$username' WHERE id='$id' ";

    $res = mysqli_query($conn,$sql);

// check Whether query executed successfully or not

if ($res==TRUE) {
    // Query Executed and Admin Updated
    $_SESSION['update'] = "Successfuly updated Admin";

    header("location:".SITEURL.'admin/manage-admin.php');
} else {
    // Query not Executed and Admin  not Updated
    $_SESSION['update'] = "Did not Successfuly update Admin";
    header("location:".SITEURL.'admin/manage-admin.php');
}


}


?>

<?php include("partials/footer.php"); ?>