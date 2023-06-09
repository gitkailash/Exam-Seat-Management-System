<?php
    // echo "delete";
    include("../connection.php");
    $exam_id = $_REQUEST['exam_id'];
    // echo $user_id;

    //update student exam_status
    $sql_update = "UPDATE student SET exam_status=0;";
    mysqli_query($connection, $sql_update) or die(mysqli_error($connection));

    //delete exam
    $sql_delete_seat_plan ="DELETE FROM seat_plan;";
    mysqli_query($connection, $sql_delete_seat_plan) or die(mysqli_error($connection));

    //delete exam
    $sql_delete = "DELETE FROM exam
                    WHERE exam_id = $exam_id;";
    if(mysqli_query($connection, $sql_delete)){
        header('location:../nav/nav_exam.php');
    }
    else
        die(mysqli_error($connection));
      mysqli_close($connection);
?>