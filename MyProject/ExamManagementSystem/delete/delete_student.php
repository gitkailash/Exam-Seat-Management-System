<?php
    // echo "delete";
    include("../connection.php");
    $roll_no = $_REQUEST['roll_no'];
    // echo $user_id;
    $sql_delete = "DELETE FROM student
                    WHERE roll_no = $roll_no;";
    if(mysqli_query($connection, $sql_delete)){
        header('location:../nav/nav_student.php');
    }
    else
        die(mysqli_error($connection));
      mysqli_close($connection);
?>