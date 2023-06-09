<?php
if (isset($_POST['teacher'])) {
    session_start();
    //connecting database
    include('../connection.php');
    echo "</br>";

    //collecting form data
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $user_id = $_SESSION['user_id'];

    //number validation
    if (!is_numeric($mobile)) {
        echo "<script>
                alert(\"Please Enter Only Number\")
            window.location=\"../nav/nav_teacher.php\";
            </script>";
    }
    //length validation
    if (strlen($mobile) != 10) {
        echo "<script>
            alert(\"Enter 10 Digits Number \");
            window.location=\"../nav/nav_teacher.php\";
            </script>";
    }
    //for negative number
    if ($mobile < 0) {
        echo "<script>
        alert(\"Enter Valid Number \");
        window.location=\"../nav/nav_user_status.php\";
        </script>";
    }
    //inserting into table
    $sql_insert_data = "INSERT INTO teacher(first_name, last_name, email, password, mobile, gender, address, user_id)
            VALUES('$first_name', '$last_name','$email', '$password', $mobile, '$gender', '$address', $user_id)";
    //checking data insertion
    if (mysqli_query($connection, $sql_insert_data)) {
        echo "<script>
                        alert(\"Insertion Successful\");
                        window.location =\"../nav/nav_teacher.php\";
                </script>";
    } else {
        die("data insertion failed! </br>" . mysqli_error($connection));
        echo "</br>";
    }
    mysqli_close($connection);
}
