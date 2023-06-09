<?php
include("../connection.php");
session_start();
$invigilator_id = $_REQUEST['invigilator_id'];
$sql_deactive = "UPDATE invigilator
                     SET status = 0
                     WHERE invigilator_id = $invigilator_id";
if (mysqli_query($connection, $sql_deactive)) {
  unset($_SESSION['invigilator_id']);
  header('location:../nav/nav_invigilator.php');
} else {
  die("Deactive failed! </br>" . mysqli_error($connection));
  echo "</br>";
}
mysqli_close($connection);
