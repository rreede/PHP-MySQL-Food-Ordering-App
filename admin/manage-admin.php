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
    <tr>
        <td>1. </td>
        <td>Rene Doe</td>
        <td>ReneDoe</td>
        <td>

        <a href="#" class="btn-secondary">Update Admin</a>
        <a href="#" class="btn-danger">Delete Admin</a>
            
        </td>
    </tr>

    <tr>
        <td>1. </td>
        <td>Rene Doe</td>
        <td>ReneDoe</td>
        <td>

        <a href="#" class="btn-secondary">Update Admin</a>
        <a href="#" class="btn-danger">Delete Admin</a>
        </td>
    </tr>

    <tr>
        <td>1. </td>
        <td>Rene Doe</td>
        <td>ReneDoe</td>
        <td>

        <a href="#" class="btn-secondary">Update Admin</a>
        <a href="#" class="btn-danger">Delete Admin</a>
        </td>
    </tr>

    
</table>

</div>
</div>

<?php include("partials/footer.php") ?>