<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once 'header.php';
?>

<?php
require_once 'footer.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration</title>

</head>

<body>

    <?php
    require('db.php');


    // When form submitted, insert values into the database.
    if (isset($_REQUEST['email'])) {
        // removes backslashes
        $file = $_FILES['image']['tmp_name'];
        $imgName = ($_FILES['image']['name']);
        $des = "pictures/";
        move_uploaded_file($file, $des . $imgName);

        $email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string

        $email    = mysqli_real_escape_string($con, $email);
        $firstname = stripslashes($_REQUEST['firstname']);
        $firstname = mysqli_real_escape_string($con, $firstname);
        $lastname = stripslashes($_REQUEST['lastname']);
        $lastname = mysqli_real_escape_string($con, $lastname);
        $gender = stripslashes($_REQUEST['gender']);
        $gender = mysqli_real_escape_string($con, $gender);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $address = stripslashes($_REQUEST['address']);
        $address = mysqli_real_escape_string($con, $address);
        $mobile = stripslashes($_REQUEST['mobile']);
        $mobile = mysqli_real_escape_string($con, $mobile);
        $image = $_FILES['image']['name'];
        $query    = "INSERT into `Users` (user_email, user_fname, user_lname, user_password, user_gender, user_address, mobile, user_image)
                     VALUES ('$email', '$firstname', '$lastname', '$password', '$gender', '$address', '$mobile', '$image')";
        $result   = mysqli_query($con, $query);
        if ($result) {

            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Missing Fields.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
    ?>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-3">
                    <h2>Registration Form</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class=" form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" class="form-control" id="firstname" name="firstname">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Address:</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>

                        <div class="form-group">
                            <label for="lastname">Mobile:</label>
                            <input type="tel" class="form-control" id="mobile" name="mobile">
                        </div>
                        <div>
                            <p class="text-dark"> Choose Your Gender</p>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" name="gender" id="male">
                            <label class="custom-control-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" name="gender" id="female">
                            <label class="custom-control-label" for="female">
                                Female
                            </label>
                        </div>
                        <div class="form-group mt-5">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-success btn-lg">Submit</button>

                        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
                </div>
            </div>
        </div>
        <?php
    }
        ?>


</body>

</html>