<?php
if (isset($_POST['invigilator'])) {
    session_start();
    //connecting database
    include('../connection.php');
    echo "</br>";

    //collecting form data
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $user_id = $_SESSION['user_id'];

    $flag = true;

    //number validation
    if (!is_numeric($mobile)) {
        $flag = false;
        echo "<script>
                alert(\"Please Enter Only Number\")
            window.location=\"../nav/nav_invigilator.php\";
            </script>";
    }elseif ($mobile < 0) {
        $flag = false;
        echo "<script>
            alert(\"Enter Valid Number \");
            window.location=\"../nav/nav_invigilator.php\";
            </script>";
    }
    //length validation
    elseif (strlen($mobile) != 10) {
        $flag = false;
        echo "<script>
            alert(\"Enter 10 Digits Number \");
            window.location=\"../nav/nav_invigilator.php\";
            </script>";
    }
    //for negative number
    elseif ($flag) {
        //inserting into table
        $sql_insert_data = "INSERT INTO invigilator(first_name, last_name, email, mobile, gender, address,user_id)
            VALUES('$first_name', '$last_name','$email', $mobile, '$gender', '$address', $user_id)";
        //checking data insertion
        if (mysqli_query($connection, $sql_insert_data)) {
            echo "<script>
                        alert(\"Invigilator Added Successful\");
                        window.location =\"../nav/nav_invigilator.php\";
                </script>";
        } else {
            die("data insertion failed! </br>" . mysqli_error($connection));
            echo "</br>";
        }
    }
    mysqli_close($connection);
}
