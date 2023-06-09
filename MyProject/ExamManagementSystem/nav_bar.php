<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Dashboard</title>
      <link rel="stylesheet" href="./CSS/navbar.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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
               <li><a href="dashboard.php"><i class="fa fa-tachometer"></i>Dashboard</a></li>
               <li><a href="./add/add_teacher.php"><i class="fas fa-chalkboard-teacher"></i>Add Teacher</a></li>
               <li><a href="./add/add_student.php"><i class="fas fa-users"></i>View Teacher</a></li>
               <div class="icons">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fa fa-google"></i></a>
               </div>
            </ul>
         </nav>
      </div>
        <div class="content">
            <?php include("./add/add_exam.php") ?>
            <!-- <?php include("./add/add_invigilator.php") ?> -->
            <!-- <?php include("./add/add_teacher.php") ?> -->
            <!-- <?php include("./add/add_room.php") ?> -->
            <!-- <?php include("./add/add_student.php") ?> -->
        </div>
   </body>
</html>