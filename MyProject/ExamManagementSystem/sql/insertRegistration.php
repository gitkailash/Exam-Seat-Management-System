<?php
if (isset($_POST['userForm'])) {

    //connecting database
    include('../connection.php');
    echo "</br>";

    //collecting form data
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $username = $_POST['userName'];
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirmPassword']);

    $flag = true;


    // if (!preg_match("/(^[a-zA-Z][a-zA-Z\s]{0,20}[a-zA-Z]$)/i", $first_name)) {
    //     $flag = false;
    //     echo "<script>
    //     alert('Invalid First Name');
    //     window.location=\"../registration.php\";
    //    </script>";
    // }
    //number validation
    if (!is_numeric($mobile)) {
        $flag = false;
        echo "<script>
                alert(\"Please Enter Only Number\")
            window.location=\"../registration.php\";
            </script>";
    }

    //for negative number
    elseif ($mobile < 0) {
        $flag = false;
        echo "<script>
            alert(\"Enter Valid Number \");
            window.location=\"../registration.php\";
            </script>";
    }
    //length validation
    elseif (strlen($mobile) != 10) {
        $flag = false;
        echo "<script>
            alert(\"Enter 10 Digits Number \");
            window.location=\"../registration.php\";
            </script>";
    }

    //check admin exist of not
    elseif ($role == 1) {
        $sql = "SELECT *FROM USER WHERE role=1";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            $flag = false;
            echo "<script>
        alert(\"Admin Already Exist\");
        window.location=\"../registration.php\";
        </script>";
        }
    }

    //inserting into table
    elseif ($flag) {
        if ($password === $confirm_password) {
            $sql_insert_data = "INSERT INTO user
            (first_name, last_name, email, mobile, username, password, role, gender)
            VALUES('$first_name', '$last_name','$email', $mobile, '$username', '$password', $role, '$gender')";
            //checking data insertion
            if (mysqli_query($connection, $sql_insert_data)) {
                echo "<script>
                        alert(\"User Creation Successful\");
                        window.location =\"../index.php\";
                </script>";
            } else {
                die("data insertion failed! </br>" . mysqli_error($connection));
                echo "</br>";
            }
        } else {
            echo "<script>
            alert(\"Password Not Match!\");
            window.location=\"../registration.php\";
            </script>";
        }
    }
    mysqli_close($connection);
}
