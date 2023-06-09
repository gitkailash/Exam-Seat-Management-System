<?php
if (isset($_POST['login'])) {
    //connecting database
    include('connection.php');

    //accessing username and password form login page
    $username = mysqli_escape_string($connection, $_POST['username']);
    $password = md5($_POST['password']);
    $user_role = $_POST['role'];


    //retriving username and password from database
    $sql = "SELECT user_id, username, status, first_name, last_name, mobile, role FROM user
                WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION["user_id"] = $row['user_id'];
            $_SESSION["status"] = $row['status'];
            $_SESSION["username"] = $row['username']; 
            $_SESSION["role"] = $row['role'];
            $_SESSION["first_name"] = $row['first_name'];
            // echo($_SESSION["status"]);
            // echo($_SESSION["first_name"]);
            // echo($_SESSION["username"]);

            // ---------Checking admin status-----------------
            if ($user_role != $_SESSION["role"]) {
                echo "<script>
                        alert(\"Please! Select Valid User Type.\");
                        window.location=\"./index.php\";
                    </script>";
            } else if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2) {
                if ($_SESSION["status"] == 1) {
                    header("location:dashboard.php");
                } else {
                    echo "<script>
                        alert(\"Sorry! You Are Not Active User.\");
                        window.location=\"./index.php\";
                    </script>";
                }
            }
        }
    } else {
        echo "<script>
            alert(\"Username And Password not match!\");
            window.location=\"./index.php\";s
        </script>";
    }
}