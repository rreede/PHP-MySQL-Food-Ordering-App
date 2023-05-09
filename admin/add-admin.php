<?php include("partials/menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <?php
        
    if(isset($_SESSION['add'])) { // Checking whetever session is set
        echo $_SESSION['add'];// Display session message if set
        unset($_SESSION['add']); // remove session message
    }
    

?>

    <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
            </tr>

            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" placeholder="Enter Your Username"></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="password" name="password" placeholder="Enter Your Username"></td>
            </tr>

            <tr>
                <td colspan="2">
      <input type="submit"  name="submit" value="Add Admin" class="btn-secondary">

                </td>
              
            </tr>

        </table>


    </form>

    </div>
</div>


<?php include("partials/footer.php"); ?>


<?php

    // Process the value from form and save it in database
    // Check whether the submit button is clicked

    if(isset($_POST["submit"])) {

// Button Clicked


//1. Get data from form

        $full_name = $_POST["full_name"];
        $username = $_POST["username"];
        $password = md5($_POST["password"]); // password encryption

  

    //2. SQL query to save data into database

    $sql = "INSERT INTO tbl_admin SET full_name='$full_name', username='$username', password='$password'";

    // 3. Executing Query and saving data into database

   $res = mysqli_query($conn, $sql) or die(mysqli_error());

   // 4. Check wheever data is inserted or not

   if($res==TRUE) {
    //echo "Data inserted";
    // Create a session variable to display message
    $_SESSION['add'] = "Admin added Succesfully";

    header("Location:".SITEURL.'admin/manage-admin.php');
   } else {
    //echo "Data inserted";
    // Create a session variable to display message
    $_SESSION['add'] = "Admin failed to add";
    header("Location:".SITEURL.'admin/add-admin.php');
   }

}
?>