<?php
if (isset($_POST['student'])) {
    session_start();
    //connecting database
    include('../connection.php');
    echo "</br>";

    //collecting form data
    $rollNo = $_POST['rollNo'];
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $gender = $_POST['gender'];
    $faculty = $_POST['faculty'];
    $semester = $_POST['semester'];
    $user_id = $_SESSION['user_id'];

    $flag = true;
    // echo($faculty);
    // echo("<br/>");
    // echo($email);
    // echo("<br/>");
    // echo($user_name);

    //number validation
    if (!is_numeric($mobile)) {
        $flag = false;
        echo "<script>
                alert(\"Please Enter Only Number\")
            window.location=\"../nav/nav_student.php\";
            </script>";
    }
    //length validation
    if (strlen($mobile) != 10) {
        $flag = false;
        echo "<script>
            alert(\"Enter 10 Digits Number \");
            window.location=\"../nav/nav_student.php\";
            </script>";
    }
    //for negative number
    if ($mobile < 0) {
        $flag = false;
        echo "<script>
        alert(\"Enter Valid Number \");
        window.location=\"../nav/nav_student.php\";
        </script>";
    }

    if ($flag) {
        //inserting into table
        $sql_insert_data = "INSERT INTO student(roll_no, first_name, last_name, mobile, email, password, gender, faculty, semester, user_id)
            VALUES('$rollNo', '$first_name', '$last_name', $mobile,'$email', '$password', '$gender', '$faculty', '$semester', $user_id)";
        //checking data insertion
        if (mysqli_query($connection, $sql_insert_data)) {
            echo "<script>
                        alert(\"Added Successful\");
                        window.location =\"../nav/nav_student.php\";
                </script>";
        } else {
            $error = mysqli_error($connection);
            if ($error) {
                echo "<script>
                        alert(\"Dublicate CRN\");
                        window.location =\"../nav/nav_student.php\";
                </script>";
            }
        }
    }
    mysqli_close($connection);
}
