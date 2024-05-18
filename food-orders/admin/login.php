<?php include('partials/login-check.php'); ?>

<?php
if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}

if (isset($_SESSION['no-login-message'])) {
    echo $_SESSION['no-login-message'];
    unset($_SESSION['no-login-message']);
}
?>
<br><br>
<!-- Login Form Starts Here -->
<form action="" method="POST" class="text-center">
    Username: <br>
    <input type="text" name="username" placeholder="Enter Username"><br><br>
    Password: <br>
    <input type="password" name="password" placeholder="Enter Password"><br><br>
    <input type="submit" name="submit" value="Login" class="btn-primary"><br><br>
</form>
<!-- Login Form Ends Here -->
<p class="text-center">Created by <a href="http://www.vijaythana.com">Vijay Thana</a></p>
