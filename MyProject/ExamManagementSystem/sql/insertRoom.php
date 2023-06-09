<?php
if (isset($_POST['room'])) {

   //connecting database
   include('../connection.php');
   echo "</br>";

   //collecting form data
   $roomNo = $_POST['roomNo'];
   $roomType = $_POST['roomType'];
   $floor = $_POST['floor'];
   $block = $_POST['block'];
   $roomCapacity = $_POST['roomCapacity'];

   //checking room already exist or not
   $check_room = "SELECT  *FROM room WHERE room_no=$roomNo";
   $check_result = mysqli_query($connection, $check_room);

   if (mysqli_num_rows($check_result) > 0) {
      echo "<script>
      alert(\"Room No Already Exist\");
      window.location=\"../nav/nav_room.php\";
      </script>";
      exit();
   }
   //validating room number and room capacity
   if ($roomNo < 0 || $roomCapacity < 0) {
      echo "<script>
      alert(\"Invalid Room Number and Capacity\");
      window.location=\"../nav/nav_room.php\";
      </script>";
   }
   //inserting into table
   $sql_insert_data = "INSERT INTO room
            (room_no, room_type, block, floor, room_capacity) 
            VALUES('$roomNo', '$roomType', '$block', '$floor', '$roomCapacity')";
   //checking data insertion
   if (mysqli_query($connection, $sql_insert_data)) {
      echo "<script>
               alert(\"Room Creation successful\");
               window.location=\"../nav/nav_room.php\";
               </script>";
      echo "</br>";
   } else {
      die("Insertion failed! </br>" . mysqli_error($connection));
      echo "</br>";
   }
   mysqli_close($connection);
}
