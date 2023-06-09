<?php
require("../connection.php");
if (isset($_POST["changePassword"])) {
    session_start();
    $username = $_SESSION['username'];
    // $username = $_POST["username"];
    $oldPassword = md5($_POST["oldPassword"]);
    $newPassword = md5($_POST["newPassword"]);
    $confirmPassword = md5($_POST["confirmPassword"]);

    // echo($username.'<br/>'.$oldPassword.'<br/>'.$newPassword.'<br/>'.$confirmPassword);

    $sql_user = "SELECT password FROM user WHERE username='$username';";
    $check_user = mysqli_query($connection, $sql_user) or die("Querry Failed! " . mysqli_error($connection));
    $row = mysqli_fetch_assoc($check_user);
    // echo ($row['password']);
    if (mysqli_num_rows($check_user) != 0) {
        if ($newPassword == $confirmPassword) {
            if ($oldPassword == $row['password']) {
                $change_password = "UPDATE user SET password='$newPassword' WHERE username='$username';";
                if (mysqli_query($connection, $change_password)) {
                    echo "<script>
                            alert(\"Change Successful\");
                            window.location=\"../logout.php\";
                        </script>";
                    echo "</br>";
                }
            }
        } else {
            echo "<script>
                    alert(\"Password Not Match\");
                    window.location=\"../nav/nav_change_password.php\";
                </script>";
            echo "</br>";
        }
    } else {
        echo "<script>
                    alert(\"Invalid password\");
                    window.location=\"../nav/nav_change_password.php\";
                </script>";
        echo "</br>";
    }
}
