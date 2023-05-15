<?php include("partials/menu.php");?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

<?php
    if(isset($_SESSION["add"])) {
        echo $_SESSION["add"];
        unset($_SESSION["add"]);
    }
?>

        <br><br>
<form action="" method="POST" enctype="multipart/form-data">

<table class="tbl-30"></table>

<tr>
    <td> Title:<br></td>
    <td> <input type="text" name="title" placeholder="Title"></td>
</tr>
<br><br>
<tr>
    <td>
        Select Image:
        <input type="file" name="image" id="">
    </td>
</tr>

<br><br>
<tr>
    <td> Featured:<br></td><br>
    <td> <input type="radio" name="featured" value="Yes" placeholder="Title">Yes

    <input type="radio" name="featured" value="No" placeholder="Title">No
</td>
</tr>
<br><br>
<tr>
    <td> Active:<br></td><br>
    <td> <input type="radio" name="active" value="Yes" placeholder="Title">Yes

    <input type="radio" name="active" value="No" placeholder="Title">No
</td>
</tr>
<br>
<br>
<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
    </td>
</tr>


</form>
    <!-- Add Category Form -->

<?php

if(isset($_POST['submit'])) {

// 1. Set variable values

$title = $_POST['title'];

// Check if radiobuttons are clicked at all

if(isset($_POST["featured"])) {
    $featured = $_POST['featured'];
} else {
    $featured = "No";
}

if(isset($_POST["active"])) {
    $featured = $_POST['active'];
} else {
    $active = "No";
}

// Check whether image is selected or not and set value for image name accordingly

print_r($_FILES['image']);

die(); // Break Code Here

// 2. Add data to database

$sql = "INSERT INTO tbl_category SET title='$title', active='$active', featured='$featured'";

// 3. Execture Query 
$res = mysqli_query($conn, $sql);


if($res == TRUE) {
    $_SESSION['add'] = "Category added successfully";
    header('location:'.SITEURL.'admin/manage-category.php');
}else {
    $_SESSION['add'] = "Failed to add Category";
    header('location:'.SITEURL.'admin/add-category.php');
}


}


?>


    </div>
</div>



<?php include("partials/footer.php");?>