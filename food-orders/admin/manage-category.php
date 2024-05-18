<?php include('partials/menu.php'); ?>

<div class= "main-content">
    <div class="wrapper">
   
        <h1>Manage category</h1>
        <br><br>

        <?php
 if (isset($_SESSION['add'])) {
    echo $_SESSION['add']; // Displaying Session Message
    unset($_SESSION['add']); // Removing Session Message
}
      ?>
      <br><br>
<a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
<br/><br/>   <br/>


<table class="tbl-full">
 <tr>
     <th>S</th>
     <th>Full Name</th>
     <th>UIsername</th>
     <th>Actions</th>
 </tr>
 <tr>
     <td>1.</td>
     <td></td>
     <td></td>
     <td>
<a href="#" class="btn-secondary">Update Admin</a>
<a href="#" class="btn-danger"> Delete Admin</a>

     </td>

     <tr>
     <td>2.</td>
     <td></td>
     <td></td>
     <td>
<a href="#" class="btn-secondary">Update Admin</a>
<a href="#" class="btn-danger"> Delete Admin</a>
     </td>

     <tr>
     <td>3.</td>
     <td></td>
     <td></td>
     <td>
<a href="#" class="btn-secondary">Update Admin</a>
<a href="#" class="btn-danger"> Delete Admin</a>
     </td>


 </tr>
</table>

</div>
<?php include('partials/footer.php');?>



<?php
// Check whether image name is available or not
if ($image_name == "") {
    // Display the message
    echo "<div class='error'>Image not Added.</div>";
} else {
    // Display the Image
    ?>
    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Category Image">
    <?php
}
?>
</td>
<td><?php echo $featured; ?></td>
<td><?php echo $active; ?></td>
<td>
    <a href="#" class="btn-secondary">Update Category</a>
    <a href="#" class="btn-danger">Delete Category</a>
</td>
