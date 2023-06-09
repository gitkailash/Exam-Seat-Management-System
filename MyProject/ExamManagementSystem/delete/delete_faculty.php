<?php
    // echo "delete";
    include("../connection.php");
    $faculty_id = $_REQUEST['faculty_id'];
    // echo $user_id;
    $sql_delete = "DELETE FROM faculty
                    WHERE faculty_id = $faculty_id;";
    if(mysqli_query($connection, $sql_delete)){
        header('location:../nav/nav_faculty.php');
    }
    else
        die(mysqli_error($connection));
      mysqli_close($connection);
?>