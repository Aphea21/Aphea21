<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
    <h1>Change Password</h1>
    <br><br>

    <form action="" method="POST">
<table class="tbl-30">
    <tr>
        <td>Current Password:</td>
    <td>
        <input type="password" name="current_password" placeholder="Current Password">
    </td>
    </tr>
    <tr>
        <td>New Password:</td>
        <td>
        <input type="password" name="new_password" placeholder="New Password">
</td>
    </tr>
    <tr>
    <tr>
        
    <tr>
    <td>Confirm Password:</td>
   <td> 
    <input type="password" name="confirm_password" placeholder="Confirm Password"></td>
    </td>
    </tr>
    <tr>
        <td colspan="2">
        <input type="hidden" name="id" value="<?php echo $id;?>">

        <input type="submit" name="submit" placeholder="Change Password" class="btn-secondary">
    </td>
    </tr>
</table>
    </form>
    </div>
</div>
<?php
if(isset($_POST['submit']))

{
    // echo "clicked";
    // 1. get the data from form
$id=$_POST['id'];
$current_password =md5($_POST['current_password']);
$new_password =md5($_POST['new_password']);
$confirm_password =md5($_POST['confirm_password']);

    // 2.check whether the user with current id and current password exist or not
$sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

    // 3. check whether the new password and confirm password match or not
$res = mysqli_query($conn, $sql);

if($res ==true)
{
    $count=mysqli_num_rows($res);

    if($count==1)
    {
        
            if($new_password=$confirm_password)
            {
                // echo "Password Match";
                $sql2 ="UPDATE tbl_admin SET
                password='$new_password'
                WHERE id=$id
                ";
                $res2 = mysqli_query($conn,$sql2);

                if($res2==true)
                {
                    $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully. </div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
                else
                {
                    $_SESSION['change-pwd'] = "<div class='error'>Failed Changed Password. </div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            }
            else
            {
                $_SESSION['pwd-not-match'] = "<div class='error'>Password did not patch. </div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        //user exist and password can be changed

        // echo "User Found";

    
    else
    {
        //user does not  set message and redirect
        $_SESSION['user-not-found'] = "<div class='error'>User Not Found. </div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
}
    // 4.change the password if all above is true

?>
    <!-- // Check whether the user exists or not
    if ($count == 1) {
        // User Exists and Password can be changed
        // echo "User Found";
        
        // Check whether the new password and confirm password match or not
        if ($new_password == $confirm_password) {
            // Update the Password
        } else {
            // Redirect to Manage Admin Page with Error Message
            $_SESSION['pwd-not-match'] = "<div class='error'>Password Did not Match.</div>";
            // Redirect the User
            header("location:".SITEURL."admin/manage-admin.php");
        }
    } else {
        // User Does not Exist, Set Message and Redirect
        $_SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
        // Redirect the User
        header("location:".SITEURL."admin/manage-admin.php");
    } -->

   <?php include('partials/footer.php');
?>
