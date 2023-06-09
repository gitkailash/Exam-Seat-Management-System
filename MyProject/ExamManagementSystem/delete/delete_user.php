<?php
    // echo "delete";
    include("../connection.php");
    $user_id = $_REQUEST['user_id'];
    // echo $user_id;
    $sql_delete = "DELETE FROM user
                    WHERE user_id = $user_id AND mobile!=9816385093;";
    if(mysqli_query($connection, $sql_delete)){
        header('location:../Nav/Nav_user_status.php');
    }
    else
        die(mysqli_error($connection));
      mysqli_close($connection);
?>