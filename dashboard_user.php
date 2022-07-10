<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<?php
require_once 'header1.php';
?>


<?php
require_once 'footer.php';
?>
<?php
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>

<body>

    <?php
    $email = $_SESSION['email'];
    $query = " SELECT * FROM `Users` WHERE user_email = '$email'";

    $result = mysqli_query($con, $query) or die(mysql_error());
    $row = mysqli_fetch_assoc($result);


    $firstname = $row['user_fname'];
    $lastname = $row['user_lname'];
    $address = $row['user_address'];
    $mobile = $row['mobile'];
    $gender = $row['user_gender'];
    $image = $row['user_image'];


    ?>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="pictures/<?php echo $image ?>" alt="avatar" class="rounded-circle img-fluid"
                        style="width: 150px;">
                    <h5 class="my-3"><?php echo $firstname ?></h5>
                    <p class="text-muted mb-1"><?php echo $lastname ?></p>
                    <p class="text-muted mb-4"><?php echo $address ?></p>
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btn btn-primary"><a class="text-white" href="update.php">Update
                                Details</a></button>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">First Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $firstname ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Lastname</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $lastname ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $email ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Gender</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $gender ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Mobile</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $mobile ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?php echo $address ?></p>
                        </div>
                    </div>
                </div>
            </div>




            <?php

            ?>


            </table>

        </div>

    </div>


</body>

</html>