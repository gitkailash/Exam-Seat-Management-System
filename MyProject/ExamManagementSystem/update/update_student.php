<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/navtest.css">
    <title>Update Student</title>
</head>

<body>
    <?php
    // echo "update";
    include("../connection.php");
    $roll_no = $_REQUEST['roll_no'];
    // echo $roll_no;
    $sql = "SELECT *FROM student WHERE roll_no = $roll_no;";
    $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
    $row = mysqli_fetch_array($result);
    // echo $row[2];
    ?>
    <div class="outer-container" style="position: relative; margin-top: 6%;">
        <div class="shadow p-3 mb-5 bg-body rounded" id="item-container">
            <form name="myForm" action="#" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-3 col-form-label" id="add">Update Student</label>
                </div>
                <div class="form-group row">
                    <label for="inputExamRollNo" class="col-sm-3 col-form-label">Exam Roll No</label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" id="inputExamRollNo" placeholder="Student's Exam Roll No" name="rollNo" value="<?php echo ($row[0]) ?>" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputFirstName" class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" name="firstName" value="<?php echo ($row[1]) ?>" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputLastName" class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" name="lastName" value="<?php echo ($row[2]) ?>" required />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputMobile" placeholder="Mobile" name="mobile" value="<?php echo ($row[3]) ?>" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="<?php echo ($row[4]) ?>" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputGender" class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-5">
                        <select class="custom-select" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-3 col-form-label">Faculty</label>
                    <div class="col-sm-5">
                        <select class="custom-select" name="faculty">
                            <?php
                            // extract faculty
                            include("../connection.php");
                            $sql = "SELECT * FROM faculty;";
                            $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option name="<?php $row['faculty_id'] ?>"><?php echo $row['course_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputSemester" class="col-sm-3 col-form-label">Semester</label>
                    <div class="col-sm-5">
                        <select class="custom-select" name="semester">
                            <option value="1">First</option>
                            <option value="2">Second</option>
                            <option value="3">Third</option>
                            <option value="4">Fourth</option>
                            <option value="5">Fifth</option>
                            <option value="6">Sixth</option>
                            <option value="7">Seventh</option>
                            <option value="8">Eighth</option>
                        </select>
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
            let roll_no = document.forms["myForm"]["rollNo"].value;
            let first_name = document.forms["myForm"]["firstName"].value;
            let last_name = document.forms["myForm"]["lastName"].value;
            let mobile = document.forms["myForm"]["mobile"].value;
            let pattern = /^[a-zA-Z]+$/;
            if (roll_no <= 0) {
                alert("Invalid Roll Number");
                document.myForm.rollNo.focus();
                return false;
            } else if (!first_name.match(pattern)) {
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
            }
        }
    </script>

    <?php
    if (isset($_POST['update'])) {

        //connecting database
        include('../connection.php');
        echo "</br>";

        //collecting form data
        $invalid = false;
        $rollNo = $_POST['rollNo'];
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $faculty = $_POST['faculty'];
        $semester = $_POST['semester'];

        //number validation
        if (!is_numeric($mobile)) {
            $invalid = true;
            echo "<script>
                alert(\"Please Enter Only Number\")
            </script>";
        }
        //length validation
        if (strlen($mobile) != 10) {
            $invalid = true;
            echo "<script>
            alert(\"Enter 10 Digits Number \");
            </script>";
        }
        //for negative number
        if ($mobile < 0) {
            $invalid = true;
            echo "<script>
        alert(\"Enter Valid Number \");
        </script>";
        }
        //inserting into table
        if (!$invalid) {
            $sql_update_data = "UPDATE student SET 
                roll_no='$rollNo', first_name='$first_name', last_name='$last_name', mobile=$mobile,
                email='$email', gender='$gender', faculty='$faculty', semester='$semester'
                WHERE roll_no = $roll_no";
            //checking data insertion
            if (mysqli_query($connection, $sql_update_data)) {
                echo "<script>
                        alert(\"Update Successful\");
                        window.location =\"../nav/nav_student.php\";
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