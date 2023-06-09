<?php
session_start();
if (!$_SESSION["username"]) {
   header('location:./index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Dashboard</title>
   <link rel="stylesheet" href="./CSS/navbar.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="./CSS/navtest.css">
</head>

<body>
   <?php include("header.php") ?>
   <div class="wrapper">
      <input type="checkbox" id="btn" hidden>
      <label for="btn" class="menu-btn">
         <i class="fas fa-bars"></i>
         <i class="fas fa-times"></i>
      </label>
      <nav id="sidebar">
         <div class="title">
            <img src="hdc-logo.png" alt="hdc-logo">
         </div>
         <ul class="list-items style" style="padding-left: 0px">
            <li><a href="#"><i class="fa fa-tachometer"></i>Dashboard</a></li>

            <!-- condition for admin access only -->
            <?php
            if ($_SESSION["role"] == 1) { ?>
               <li><a href="./nav/nav_user_status.php"><i class="fa fa-user-secret"></i>User Status</a></li>
            <?php } ?>

            <li><a href="./nav/nav_student.php"><i class="fas fa-users"></i>Student Management</a></li>
            <li><a href="./nav/nav_teacher.php"><i class="fas fa-chalkboard-teacher"></i>Teacher Management</a></li>
            <li><a href="./nav/nav_invigilator.php"><i class="fas fa-book-open"></i>Invigilator Management</a></li>
            <li><a href="./nav/nav_room.php"><i class="fas fa-home"></i>Room Management</a></li>
            <li><a href="./nav/nav_exam.php"><i class="fas fa-table"></i>Exam Management</a></li>
            <li><a href="./nav/nav_faculty.php"><i class="fa fa-book"></i>Faculty Management</a></li>
            <li><a href="./nav/nav_semester_update.php"><i class="fa fa-arrow-up"></i>Manage Semester</a></li>
            <li><a href="./Nav/nav_change_password.php"><i class="fa fa-key"></i>Change Password</a></li>
            <li><a href="./logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
            <!-- <div class="icons">
               <a href="./logout.php" id="logout">Logout<i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </div> -->
         </ul>
      </nav>
   </div>

   <div class="content">
      <?php
      include("./connection.php");

      //checking total row form all tables
      $sql_student = "SELECT COUNT(*) AS total FROM student";
      $result_student = mysqli_query($connection, $sql_student) or die("Querry Failed! " . mysqli_error($connection));
      $student_count = mysqli_fetch_assoc($result_student);

      // echo ($data['total']);
      $sql_teacher = "SELECT COUNT(*) AS total FROM teacher";
      $result_teacher = mysqli_query($connection, $sql_teacher) or die("Querry Failed! " . mysqli_error($connection));
      $teacher_count = mysqli_fetch_assoc($result_teacher);

      $sql_invigilator = "SELECT COUNT(*) AS total FROM invigilator";
      $result_invigilator = mysqli_query($connection, $sql_invigilator) or die("Querry Failed! " . mysqli_error($connection));
      $invigilator_count = mysqli_fetch_assoc($result_invigilator);

      $sql_room = "SELECT COUNT(*) AS total FROM room";
      $result_room = mysqli_query($connection, $sql_room) or die("Querry Failed! " . mysqli_error($connection));
      $room_count = mysqli_fetch_assoc($result_room);

      $sql_exam = "SELECT COUNT(*) AS total FROM exam";
      $result_exam = mysqli_query($connection, $sql_exam) or die("Querry Failed! " . mysqli_error($connection));
      $exam_count = mysqli_fetch_assoc($result_exam);

      $sql_faculty = "SELECT COUNT(*) AS total FROM faculty";
      $result_faculty = mysqli_query($connection, $sql_faculty) or die("Querry Failed! " . mysqli_error($connection));
      $faculty_count = mysqli_fetch_assoc($result_faculty);

      ?>
      <div class="shadow-sm p-1 mb-1 bg-white rounded" id="card-item">
         <div class="row mb-3">
            <div class="col-md-4 shadow-sm p-1 mb-1 bg-white rounded">
               <div class="card-header bg-success text-white">
                  <h3 class="display-4">Student <small class="text-warning"><?php echo ($student_count['total']); ?></small></h3>
               </div>
               <div class="card-footer">
                  <h6>
                     <a href="./Nav/nav_student.php" class="text-primary">Student Details <i class="fas fa-arrow-alt-circle-right"></i></a>
                  </h6>
               </div>
            </div>

            <div class="col-md-4 shadow-sm p-1 mb-1 bg-white rounded">
               <div class="card-header bg-primary text-white">
                  <h3 class="display-4">Teacher <small class="text-warning"><?php echo ($teacher_count['total']); ?></small></h3>
               </div>
               <div class="card-footer">
                  <h6>
                     <a href="./Nav/nav_teacher.php" class="text-primary"> Teacher Details <i class="fas fa-arrow-alt-circle-right"></i></a>
                  </h6>
               </div>
            </div>

            <div class="col-md-4 shadow-sm p-1 mb-1 bg-white rounded">
               <div class="card-header bg-secondary text-white">
                  <h3 class="display-4">Invigilator <small class="text-warning"><?php echo ($invigilator_count['total']); ?></small></h3>
               </div>
               <div class="card-footer">
                  <h6>
                     <a href="./Nav/nav_invigilator.php" class="text-primary"> Invigilator Details <i class="fas fa-arrow-alt-circle-right"></i></a>
                  </h6>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-4 shadow-sm p-1 mb-1 bg-white rounded">
               <div class="card-header bg-dark text-white">
                  <h3 class="display-4">Room <small class="text-warning"><?php echo ($room_count['total']); ?></small></h3>
               </div>
               <div class="card-footer">
                  <h6>
                     <a href="./Nav/nav_room.php" class="text-primary"> Room Details <i class="fas fa-arrow-alt-circle-right"></i></a>
                  </h6>
               </div>
            </div>

            <div class="col-md-4 shadow-sm p-1 mb-1 bg-white rounded">
               <div class="card-header bg-warning text-white">
                  <h3 class="display-4">Exam <small class="text-success"><?php echo ($exam_count['total']); ?></small></h3>
               </div>
               <div class="card-footer">
                  <h6>
                     <a href="./Nav/nav_exam.php" class="text-primary"> Exam Details <i class="fas fa-arrow-alt-circle-right"></i></a>
                     </h5>
               </div>
            </div>

            <div class="col-md-4 shadow-sm p-1 mb-1 bg-white rounded">
               <div class="card-header bg-danger text-white">
                  <h3 class="display-4">Faculty <small class="text-warning"><?php echo ($faculty_count['total']); ?></small></h3>
               </div>
               <div class="card-footer">
                  <h6>
                     <a href="./Nav/nav_faculty.php" class="text-primary">Faculty Details <i class="fas fa-arrow-alt-circle-right"></i></a>
                  </h6>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>

</html>