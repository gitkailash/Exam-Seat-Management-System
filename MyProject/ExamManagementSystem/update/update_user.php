<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/navtest.css">
    <style>
        * {
            margin: auto;
        }

        body {
            background-image: url("exam.jpg");
        }

        #sms_header {
            margin: auto;
            position: relative;
            background-color: #0073aa;
            color: #ffffff;
            text-align: center;
            height: 60px;
            font-family: serif;
            font-weight: bold;
            font-size: 50px;
            text-transform: uppercase;
            margin-bottom: 1%;
        }
    </style>
    <title>Update User</title>
</head>

<body>
<?php
    // echo "update";
    include("../connection.php");
    $user_id = $_REQUEST['user_id'];
    // echo $user_id;
    $sql = "SELECT *FROM user WHERE user_id = $user_id;";
    $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
    $row = mysqli_fetch_array($result);
    // echo $row[2];
    ?>
    <div class="outer-container">
        <div class="shadow p-3 mb-5 bg-body rounded" id="item-container" style="margin-top: 4%;">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputUser" class="col-sm-3 col-form-label" id="add">Update User</label>
                </div>
                <div class="form-group row">
                    <label for="inputFirstName" class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputFirstName" name="firstName" placeholder="First Name" required="required" value="<?php echo ($row[1]) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputLastName" class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputLastName" name="lastName" placeholder="Last Name" required="required" value="<?php echo ($row[2]) ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputMobile" name="mobile" placeholder="Mobile" required="required" value="<?php echo ($row[3]) ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required="required" value="<?php echo ($row[4]) ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-3 col-form-label">Select Gender</label>
                    <div class="col-sm-5">
                        <select name="gender" class="custom-select" required="required">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputRole" class="col-sm-3 col-form-label">User Role</label>
                    <div class="col-sm-5">
                        <select name="role" class="custom-select" required="required">
                            <option value="1">Admin</option>
                            <option value="2">System User</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" name="update" class="btn btn-info btn-lg btn-block mx-1" style="background-color: #1782b8; color:white" value="Update">
                    </div>
                </div>
            </form>
        </div>
        <?php
    if (isset($_POST["update"])) {
        //collecting form data
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $mobile = $_POST['mobile'];
        $role = $_POST['role'];

        //number validation
        if (!is_numeric($mobile)) {
            echo "<script>
                    alert(\"Please Enter Only Number\")
                window.location=\"../nav/nav_update_user.php\";
                </script>";
        }
        //length validation
        if (strlen($mobile) != 10) {
            echo "<script>
                alert(\"Enter 10 Digits Number \");
                window.location=\"../nav/nav_update_user.php\";
                </script>";
        }
        //for negative number
        if ($mobile < 0) {
            echo "<script>
            alert(\"Enter Valid Number \");
            window.location=\"../nav/nav_update_user.php\";
            </script>";
        }
        //inserting into table
        $sql_update_data = "UPDATE user SET
                                first_name='$first_name', last_name='$last_name', email='$email',
                                mobile=$mobile, gender='$gender', role=$role
                                WHERE user_id=$user_id";
        //checking data insertion
        if (mysqli_query($connection, $sql_update_data)) {
            echo "<script>
                            alert(\"Update Successful\");
                            window.location =\"../nav/nav_user_status.php\";
                    </script>";
        } else {
            die("Update failed! </br>" . mysqli_error($connection));
            echo "</br>";
        }
        mysqli_close($connection);
    }
    ?>
    </div>
</body>
</html>