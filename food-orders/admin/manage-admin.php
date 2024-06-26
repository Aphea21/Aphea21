<?php include('partials/menu.php'); ?>

<!-- <table class="tbl-full">
   
</table>
</div>
</div> 
     -->

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; // Displaying Session Message
            unset($_SESSION['add']); // Removing Session Message
        }
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete']; 
            unset($_SESSION['delete']); 
           } 
           
           if (isset($_SESSION['update'])) {
            echo $_SESSION['update']; 
            unset($_SESSION['update']); 
           } 
           if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found']; 
            unset($_SESSION['user-not-found']); 
           } 

           if (isset($_SESSION['pwd-not-match'])) {
            echo $_SESSION['pwd-not-match']; 
            unset($_SESSION['pwd-not-match']); 
           } 
           if (isset($_SESSION['change-pwd'])) {
            echo $_SESSION['change-pwd']; 
            unset($_SESSION['change-pwd']); 
           } 
        ?>
        <br><br><br>

        <!-- Button to Add Admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>Serial No.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>


            <?php
            // Query to Get all Admin
            $sql = "SELECT * FROM tbl_admin";
            // Execute the Query
            $res = mysqli_query($conn, $sql);

            if ($res == TRUE) {
                // Count Rows to check whether we have data in the database
                $count = mysqli_num_rows($res);
                $sn = 1; // Create a Serial Number Variable and Set Default Value as 1

                // Check the number of rows
                if ($count > 0) {
                    // We have data in the database
                    while ($rows = mysqli_fetch_assoc($res)) {
                        // Using while loop to get all the data from the database
                        // And while loop will run as long as we have data in the database

                        // Get individual data
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                        // Display the values in the table
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
 <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
<a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">  Update Admin</a>
<a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">  Delete Admin</a>

                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    // We do not have data in the database
                    ?>
                    <tr>
                        <td colspan="6"><div class="error">No Admin Added.</div></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
</div>
 <!-- Main Content Section Ends  -->
 <?php include('partials/footer.php');?>
