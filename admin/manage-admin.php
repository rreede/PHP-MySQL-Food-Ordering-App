<?php include("partials/menu.php") ?>
<!-- Main Content Section -->

      <div class="main-content">

      <div class="wrapper">
<h1>Manage Admin</h1>
<br/>
<br/>
<?php

if(isset($_SESSION["add"])) {
    echo $_SESSION["add"];// Displaying Session
    unset($_SESSION["add"]); // Removing session
}
?>
<!-- Button to add admin -->
<a href="add-admin.php" class="btn-primary">Add Admin</a>

<br/>
<br/>

<table class="tbl-full">
    <tr>
        <th>S.N.</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Actions</th>
    </tr>

    <?php

// DISPLAY DATA

    // Query to get all admins

    $sql = "SELECT * FROM tbl_admin";
// Execute query
$res = mysqli_query($conn, $sql);

// Check is query is executed

if($res==TRUE) {
    
    // Count rows to check whetever we have data in database or not
    $count = mysqli_num_rows($res); // function to get all rows in database

    $sn = 1;

    //check the num of rows
if($count>0) {
    // We have data in database
    while($rows=mysqli_fetch_assoc($res)) {
        // Using while loop to get data from database
        // While loop will run as lon as there is data in database

        // Get individual data

        $id=$rows["id"];
        $full_name=$rows["full_name"];
        $username=$rows["username"];

        // Display the values in our table
        	?>

<tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $full_name; ?></td>
        <td><?php echo $username; ?></td>
        <td>

        <a href="#" class="btn-secondary">Update Admin</a>
        <a href="#" class="btn-danger">Delete Admin</a>
            
        </td>
    </tr>

            <?php


    }


} else {
    // We do not have data in database


}


} else {
    echo "Select not executed";
}



?>


    
</table>

</div>
</div>

<?php include("partials/footer.php") ?>