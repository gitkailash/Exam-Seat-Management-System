<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/view.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Nav Exam</title>
    <style>
        .outer-container {
            top: 10%;
            /* margin-left: 18%; */
            /* border: 2px solid black; */
            width: 85%;
            height: 50%;
            position: fixed;
            align-content: center;
            justify-content: center;
        }

        #alignrow {
            /* align-items: center; */
            width: 100%;
            margin: 3px;
            font-size: large;
        }

        #print_div {
            margin-left: 75%;
            justify-content: center;
            width: 15%;
        }
    </style>
</head>

<body>
    <?php include("./connection.php");
    $seat_flag = true;
    $sql_seat = "SELECT *FROM seat_plan";
    $seat_result = mysqli_query($connection, $sql_seat);
    if (mysqli_num_rows($seat_result) > 0) {
        $seat_flag = false;
    }

    ?>
    <div class="fixed-top outer-container p-2">
        <div class="inner-container">
            <h3>Exam Seat Plan <span class="badge badge-pill badge-info">HDC</span></h3>
            <?php

            $flag = false;
            //delete exam
            $sql_delete_seat_plan = "DELETE FROM seat_plan;";
            if (mysqli_query($connection, $sql_delete_seat_plan)) {
                $flag = true;
            } else {
                die(mysqli_error($connection));
            }

            if ($flag) {
                $sql_exam = "SELECT *FROM exam ORDER BY exam_id DESC LIMIT 1;";
                $result_exam = mysqli_query($connection, $sql_exam) or die(mysqli_error($connection));
                while ($row_exam = mysqli_fetch_assoc($result_exam)) {
                    $exam_id = $row_exam['exam_id']; ?>
                    <h3><small><span class="badge badge-pill badge-info"><?php echo ($row_exam["exam_type"]); ?>*-----*<span class="ml-2">Date:</span><?php echo ($row_exam["exam_date"]); ?>*-----*<span class="ml-2">Time:</span><?php echo ($row_exam["exam_time"]); ?></span></small></h3>
                <?php break;
                } ?>

                <?php
                $sql = "SELECT COUNT(*) AS total FROM student WHERE exam_status=1";
                $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
                $data = mysqli_fetch_assoc($result);
                $scount = $data['total'];
                //echo $scount;

                // query for room
                $sql_room = "SELECT * FROM room;";
                $result_room = mysqli_query($connection, $sql_room) or die("Querry Failed! " . mysqli_error($connection));
                $total_room = mysqli_num_rows($result_room);
                // echo($total_room);

                $sql_invigilator = "SELECT * FROM invigilator WHERE status=1 ORDER BY RAND()";
                $result_invigilator = mysqli_query($connection, $sql_invigilator) or die("Querry Failed! " . mysqli_error($connection));

                $count = 0;
                $c = 0;
                $a = 0;

                while ($row = mysqli_fetch_assoc($result_room)) {
                    //  echo $scount;
                    $faculty = null;
                    $semester = null;
                    $fmissed = null;
                    $smissed = null;
                    $rmissed = null;
                    $missed = null;
                    $i = 0;
                    $j = 0;
                    $k = 0;
                    $c = $row['room_capacity'];
                    $room_id = $row['room_id'];

                    $sql = "SELECT * FROM student WHERE exam_status=1 ORDER BY RAND() LIMIT " . $a . "," . $c . ";";
                    $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
                    $row_student = mysqli_fetch_all($result);

                    //insert in seat_plan sql


                ?>
                    <div class="row border shadow-sm p-1 mb-1 bg-body rounded" id="alignrow">
                        <!-- <div class="col"><i class="font-weight-bold fa fa-arrow-right p-1" aria-hidden="true">Row</i></div> -->
                        <div class="col font-weight-bold"><i class="fa fa-building p-1" aria-hidden="true"></i><?php echo ($row["block"]) ?></div>
                        <div class="col font-weight-bold"><i class="fa fa-stack-overflow p-1" aria-hidden="true"></i>Floor:<?php echo ($row["floor"]) ?></div>
                        <div class="col font-weight-bold"><i class="fa fa-home p-1" aria-hidden="true"></i>Room No:<?php echo ($row["room_no"]) ?></div>
                        <div class="col font-weight-bold"><i class="fa fa-users p-1" aria-hidden="true"></i>Total Student:<?php echo ($row["room_capacity"]) ?></div>
                        <div class="col-3 font-weight-bold"><i class="fa fa-users p-1" aria-hidden="true"></i>Invigilator:<?php while ($row_i = mysqli_fetch_assoc($result_invigilator)) {
                                                                                                                                $inv = $row_i["invigilator_id"];
                                                                                                                                $inv_name = ($row_i['first_name'] . " " . $row_i['first_name']);
                                                                                                                                echo (ucwords($inv_name));
                                                                                                                                break;
                                                                                                                            } ?>
                        </div>

                    </div>
                    <div class="float-start row border shadow-sm p-3 mb-5" id="alignrow">
                        <?php
                        foreach ($row_student as $row_std) {
                            if ($row_std[7] != $faculty && $row_std[8] != $semester) {
                                if ($scount > 0) {
                                    echo '<div class="col-3 float-start"><i class="float-start fa fa-user p-1" aria-hidden="true">' . $row_std[7] . '/' . $row_std[0] . '/' . $row_std[8] . '</i> </div>';
                                    $scount = $scount - 1;
                                    $faculty = $row_std[7];
                                    $semester = $row_std[8];

                                    //student id insertion
                                    {
                                        $sql_insert_seat = "INSERT INTO seat_plan(roll_no,room_id, invigilator_id, exam_id) VALUES($row_std[0], $room_id, $inv,$exam_id);";
                                        mysqli_query($connection, $sql_insert_seat) or die(mysqli_error($connection));
                                    }
                                }
                            } else {

                                if ($missed != null) {
                                    foreach ($missed as $f) {
                                        if ($f == $row_std) {
                                            break;
                                        }
                                        $missed = $row_std;
                                    }
                                }
                            }
                        }

                        if ($missed != null) {
                            // print_r(shuffle($missed));
                            shuffle($missed);
                        }
                        $i = 0;
                        $j = 0;


                        if ($missed != null) {
                            foreach ($missed as $f) {

                                if ($scount > 0) { //here check adjacent student
                                    echo '<div class="col-3 mx-0"><i class="float-start fa fa-user p-1" aria-hidden="true">' . $f[7] . '/' . $f[0] . '/' . $f[8] . '</i></div>';
                                    $scount = $scount - 1; {
                                        $sql_insert_seat = "INSERT INTO seat_plan(roll_no,room_id, invigilator_id, exam_id) VALUES($f[0],$room_id, $inv, $exam_id);";
                                        mysqli_query($connection, $sql_insert_seat) or die(mysqli_error($connection));
                                    }
                                }
                            }
                        }
                        $fmissed = null;
                        $smissed = null;
                        $rmissed = null;
                        $count = 0;
                        ?>
                    </div></br>
            <?php
                    $a = $c + 1;
                }
            }
            ?>
        </div>
        <div id="print_div" class="form-group row">
            <div class="col-sm-10">
                <input type="button" name="btn" onclick="return print()" id="print" class="btn btn-info btn-lg btn-block mx-1" style="background-color: #1782b8; color:white;" value="Print">
            </div>
        </div>
    </div>
    </div>
    <?php if ($seat_flag) {
        echo ("<h1 class='text-danger'>***There Is No Exam***</h1>");
    } ?>
    </div>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#print').click(function() {
                let printButton = document.getElementById("print");
                printButton.style.visibility = "hidden";
                window.print();
                printButton.style.visibility = "visible";
                return false;
            });
        });
    </script>
</body>

</html>