<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<?php
require_once 'admin_header1.php';
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
    <title>Admin Dashboard</title>
</head>

<body>
    <table class="table mt-2">
        <thead class="text-white" style="background-color:#000;">
            <tr>
                <th>User Image</th>
                <th>User Email</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $query = " SELECT * FROM `Users` ";

            $result = mysqli_query($con, $query) or die(mysql_error());
            while ($row = mysqli_fetch_assoc($result)) {


                $email = $row['user_email'];
                $firstname = $row['user_fname'];
                $lastname = $row['user_lname'];
                $address = $row['user_address'];
                $mobile = $row['mobile'];
                $gender = $row['user_gender'];
                $image = $row['user_image'];

            ?>


            <tr>
                <td>
                    <div class="col-4">
                        <div class="card-body text-center">
                            <img src="pictures/<?php echo $image ?>" alt="avatar" class="rounded-circle img-fluid"
                                style="width: 150px;">

                        </div>
                    </div>
                    </div>
                    </div>
                </td>
                <td><?php echo $email ?></td>
                <td><?php echo $firstname ?></td>
                <td><?php echo $lastname ?></td>
                <td><?php echo $gender ?></td>
                <td><?php echo $address ?></td>
                <td><button type="button" class="btn btn-primary"><a class="text-white"
                            href="user_update.php?id=<?php echo $row['user_id']; ?>">Update
                            User</a></button></td>
                <td><button type=" button" class="btn btn-danger"><a class="text-white"
                            href="user_delete.php?id=<?php echo $row['user_id']; ?>">Delete
                            User</a></button></td>

            </tr>


            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>