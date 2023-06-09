<?php
    // echo "delete";
    include("../connection.php");
    $invigilator_id = $_REQUEST['invigilator_id'];
    // echo $user_id;
    $sql_delete = "DELETE FROM invigilator
                    WHERE invigilator_id = $invigilator_id;";
    if(mysqli_query($connection, $sql_delete)){
        header('location:../nav/nav_invigilator.php');
    }
    else
        die(mysqli_error($connection));
      mysqli_close($connection);
?>