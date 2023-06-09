<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/navtest.css">
    <title>Nav Test</title>
</head>

<body>

    <?php
    // echo "update";
    include("../connection.php");
    $teacher_id = $_REQUEST['teacher_id'];
    // echo $teacher_id;
    $sql = "SELECT *FROM teacher WHERE teacher_id = $teacher_id;";
    $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
    $row = mysqli_fetch_array($result);
    // echo $row[2];
    ?>
    <div class="outer-container">
        <div class="shadow p-3 mb-5 bg-body rounded" id="item-container" style="margin-top: 3%;">
            <form name="myForm" action="#" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-3 col-form-label" id="add">Update Teacher</label>
                </div>
                <div class="form-group row">
                    <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" name="firstName" value="<?php echo ($row[1]) ?>" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" name="lastName" value="<?php echo ($row[2]) ?>" required />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputMobile" class="col-sm-2 col-form-label">Mobile</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="inputMobile" placeholder="Mobile" name="mobile" value="<?php echo ($row[3]) ?>" required />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="<?php echo ($row[4]) ?>" required />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-6">
                        <select class="custom-select" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <label for="floatingTextarea2"></label>
                            <textarea class="form-control" placeholder="Student's Address..." id="floatingTextarea2" style="height: 100px" name="address" required><?php echo ($row[7]) ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-info btn-lg btn-block mx-1" style="background-color: #1782b8; color:white" name="update">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            let first_name = document.forms["myForm"]["firstName"].value;
            let last_name = document.forms["myForm"]["lastName"].value;
            let mobile = document.forms["myForm"]["mobile"].value;
            let address = document.forms["myForm"]["address"].value;

            let pattern = /^[a-zA-Z]+$/;
            if (!first_name.match(pattern)) {
                alert("Invalid First Name");
                document.myForm.firstName.focus();
                return false;
            } else if (!last_name.match(pattern)) {
                alert("Invalid Last Name");
                document.myForm.lastName.focus();
                return false;
            } else if (mobile.toString().length < 0 || mobile.toString().length != 10 || mobile <= 0) {
                alert("Enter Valid Number");
                document.myForm.mobile.focus();
                return false;
            } else if (address.trim() == "") {
                alert("Invalid Address");
                document.myForm.address.focus();
                return false;
            }
        }
    </script>
    <?php
    if (isset($_POST["update"])) {
        //collecting form data
        $invalid = false;
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];

        //number validation
        if (!is_numeric($mobile)) {
            $invalid = true;
            echo "<script>
                alert(\"Please Enter Only Number\")
            // window.location=\"../nav/nav_update_teacher.php\";
            </script>";
        }
        //length validation
        if (strlen($mobile) != 10) {
            $invalid = true;
            echo "<script>
            alert(\"Enter 10 Digits Number \");
            // window.location=\"../nav/nav_update_teacher.php\";
            </script>";
        }
        //for negative number
        if ($mobile < 0) {
            $invalid = true;
            echo "<script>
        alert(\"Enter Valid Number \");
        // window.location=\"../nav/nav_update_teacher.php\";
        </script>";
        }
        //inserting into table
        if (!$invalid) {
            $sql_update_data = "UPDATE teacher SET
                            first_name='$first_name', last_name='$last_name', email='$email',
                            mobile=$mobile, gender='$gender', address='$address'
                            WHERE teacher_id=$teacher_id";
            //checking data insertion
            if (mysqli_query($connection, $sql_update_data)) {
                echo "<script>
                        alert(\"Update Successful\");
                        window.location =\"../nav/nav_teacher.php\";
                </script>";
            }
        } else {
            die("Update failed! </br>" . mysqli_error($connection));
            echo "</br>";
        }
        mysqli_close($connection);
    }
    ?>
</body>

</html>