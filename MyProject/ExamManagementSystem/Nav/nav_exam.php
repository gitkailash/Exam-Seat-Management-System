<?php
session_start();
if (!$_SESSION["username"]) {
   header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Exam</title>
   <link rel="stylesheet" href="../CSS/navbar.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../CSS/navtest.css">
</head>

<body>
   <div class="headers"><?php include("../header.php") ?></div>
   <div class="wrapper">
      <input type="checkbox" id="btn" hidden>
      <label for="btn" class="menu-btn">
         <i class="fas fa-bars"></i>
         <i class="fas fa-times"></i>
      </label>
      <nav id="sidebar">
         <div class="title">
            <img src="../hdc-logo.png" alt="hdc-logo">
         </div>
         <ul class="list-items style" style="padding-left: 0px">
            <li><a href="../dashboard.php"><i class="fa fa-tachometer"></i>Dashboard</a></li>
            <li><a href="#" id="add_exam"><i class="fa fa-plus-square" aria-hidden="true"></i>Add Exam</a></li>
            <li><a href="#" id="view_exam"><i class="fa fa-eye" aria-hidden="true"></i>View Exam</a></li>
            <!-- <li><a href="#" id="exam_status"><i class="fa fa-eye" aria-hidden="true"></i>Exam Status</a></li> -->
            <li><a href="#" id="view_seat"><i class="fa fa-table" aria-hidden="true"></i>Seat Plan</a></li>
            <li><a href="#" id="master_seat"><i class="fa fa-table" aria-hidden="true"></i>Master Seat</a></li>
            <div class="icons">
               <a href="../logout.php" id="logout">Logout<i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </div>
         </ul>
      </nav>
   </div>
   <div class="content">

      <!-- <div class="view"><?php //include("../view/view_semester_status.php") 
                              ?></div> -->
      <div class="view"><?php include("../view/view_exam.php") ?></div>
      <div class="result">
         <!-- resutl will be shown after jquery triggered -->
      </div>
      <div class="seat">
         <!-- resutl will be shown after jquery triggered -->
      </div>

      <div class="view_master_seat">
         <!-- resutl will be shown after jquery triggered -->
      </div>

      <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
      <script>
         $(document).ready(function() {
            $("#add_exam").on("click", function() {
               $(".result").load("../add/add_exam.php");
               $(".result").show();
               $(".view").hide();
               $(".seat").hide();
               $(".view_master_seat").hide();
               $(".headers").show();
            });

            $("#view_exam").on("click", function() {
               $(".view").show();
               $(".result").hide();
               $(".seat").hide();
               $(".view_master_seat").hide();
               $(".headers").show();
            });

            $("#view_seat").on("click", function() {
               $(".seat").load("../seat_table1.php");
               // $(".seat").load("../seat_table.php");
               // $(".seat").load("../table_last_backup.php");
               $(".seat").show();
               $(".view").hide();
               $(".result").hide();
               $(".view_master_seat").hide();
               // $(".headers").show();
            });

            $("#master_seat").on("click", function() {
               $(".view_master_seat").load("../master_seat1.php");
               // $(".view_master_seat").load("../master_seat.php");
               $(".view_master_seat").show();
               $(".view").hide();
               $(".result").hide();
               $(".seat").hide();
               $(".headers").hide();

            });
         });
      </script>
      <!-- end of jquery -->
   </div>
</body>

</html>