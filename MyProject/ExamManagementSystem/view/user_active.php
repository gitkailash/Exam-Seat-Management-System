<?php
    include("../connection.php");
    session_start();
    $user_id = $_REQUEST['user_id'];
    $sql_deactive = "UPDATE user
                     SET status = 0
                     WHERE user_id = $user_id AND role!=1";
     if(mysqli_query($connection, $sql_deactive)){
         unset($_SESSION['user_id']);
         if(!isset($_SESSION['user_id'])){
            echo "<script>
            alert(\"You Must Login!\");
            window.location=\"../../index.html\";
        </script>";
        }
    }
    else{
         die("Deactive failed! </br>".mysqli_error($connection));
         echo"</br>";
        }
        header('location:../nav/nav_user_status.php');
      mysqli_close($connection);
?>