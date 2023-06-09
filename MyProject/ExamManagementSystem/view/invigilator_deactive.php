<?php
    include("../connection.php");
    $invigilator_id = $_REQUEST['invigilator_id'];
    // echo $invigilator_id;
    $sql_active = "UPDATE invigilator
                   SET status=1
                   WHERE invigilator_id = $invigilator_id";
     if(mysqli_query($connection, $sql_active)){
      header('location:../nav/nav_invigilator.php');
    }
    else{
         die("Active failed! </br>".mysqli_error($connection));
         echo"</br>";
        }
      mysqli_close($connection);
?>