<?php
    // echo "delete";
    include("../connection.php");
    $room_id = $_REQUEST['room_id'];
    // echo $user_id;
    $sql_delete = "DELETE FROM room
                    WHERE room_id = $room_id;";
    if(mysqli_query($connection, $sql_delete)){
        header('location:../nav/nav_room.php');
    }
    else
        die(mysqli_error($connection));
      mysqli_close($connection);
?>