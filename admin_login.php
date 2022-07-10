<?php
require_once 'admin_header.php';
?>

<?php
require_once 'footer.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
</head>

<body>
    <?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['email'])) {
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = " SELECT * FROM `Admin` WHERE admin_email = '$email'
                     AND admin_password = '$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['admin_email'] === $email && $row['admin_password'] == $password) {
                $_SESSION['email'] = $email;
                $_SESSION['Admin'] = $row['admin_fname'];
                header("Location: admin_dashboard.php");
                // Redirect to user dashboard page
            }
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
    ?>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-3">
                    <h2>Admin Login</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class=" form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-success btn-lg">Login</button>
                </div>
            </div>
        </div>
        <?php
    }
        ?>
</body>

</html>