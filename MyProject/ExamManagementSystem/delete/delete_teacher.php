<?php
    // echo "delete";
    include("../connection.php");
    $teacher_id = $_REQUEST['teacher_id'];
    // echo $user_id;
    $sql_delete = "DELETE FROM teacher
                    WHERE teacher_id = $teacher_id;";
    if(mysqli_query($connection, $sql_delete)){
        header('location:../nav/nav_teacher.php');
    }
    else
        die(mysqli_error($connection));
      mysqli_close($connection);
?>