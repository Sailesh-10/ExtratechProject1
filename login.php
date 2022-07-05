<?php
require_once 'header.php';
?>

<?php
require_once 'footer.php';
?>

<!DOCTYPE html>
<html>
<title>Login</title>

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
        $query    = " SELECT * FROM `Users` WHERE user_email = '$email'
                     AND user_password = '$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_email'] === $email && $row['user_password'] == $password) {
                $_SESSION['email'] = $email;
                $_SESSION['User'] = $row['user_fname'];
                header("Location: dashboard_user.php");
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
                    <h2>Login</h2>
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

                        <p class="link">New User? <a href="registration.php">Register here</a></p>
                </div>
            </div>
        </div>
        <?php
    }
        ?>
</body>

</html>