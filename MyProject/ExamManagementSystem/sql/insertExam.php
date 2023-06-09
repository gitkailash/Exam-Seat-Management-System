<?php
if (isset($_POST['exam'])) {

   //connecting database
   include('../connection.php');
   echo "</br>";
   //collecting form data
   $exam_name = $_POST['examName'];
   $exam_type = $_POST['examType'];
   $examdate = $_POST['examDate'];
   $examtime = $_POST['examTime'];
   $exam_desc = $_POST['examDesc'];
   $post_date = date('Y-m-d');

   $status = true;
   $exam_semester_status = array();
   $count = 0;
   foreach ($_POST['faculty'] as $faculty_sem) {
      $exam_semester_status[$count++] = $faculty_sem;
   }
   // for($i=0; $i<sizeof($exam_semester_status);$i++){
   //    echo($exam_semester_status[$i]."<br/>");
   // }

   //date validation-----------------
   if ($examdate < $post_date) {
      $status = false;
      echo "<script>
      alert(\"Past Exam Date Not Allowed\");
      window.location=\"../nav/nav_Exam.php\";
      </script>";
   }
   //inserting into table
   $sql_insert_data = "INSERT INTO exam
            (exam_name, exam_type, exam_date, exam_time, exam_description, post_date) 
            VALUES('$exam_name', '$exam_type', '$examdate', '$examtime', '$exam_desc', '$post_date')";
   //checking data insertion
   if ($status) {
      //updating into table
      foreach ($exam_semester_status as $exam_status_data) {
         // echo($exam_status_data);
         $sql_update_data = "UPDATE student SET
            exam_status=1 WHERE CONCAT(faculty,' ',semester) LIKE '%" . $exam_status_data . "%';";
         mysqli_query($connection, $sql_update_data) or die(mysqli_error($connection));
      }

      //checking data insertion
      if ($status) {
         if (mysqli_query($connection, $sql_insert_data)) {
            echo "<script>
               alert(\"Exam Created!\");
               window.location=\"../nav/nav_exam.php\";
               </script>";
            echo "</br>";
         } else {
            die("Insertion failed! </br>" . mysqli_error($connection));
            echo "</br>";
         }
      }
   }
   mysqli_close($connection);
}
