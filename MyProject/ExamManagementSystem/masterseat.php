<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/navtest.css">
    <link rel="stylesheet" href="../CSS/view.css">
    <title>View Master Seat</title>

    <style>
        .container {
            width: 90%;
            position: absolute;
            margin-top: -20rem;
            margin-left: 6%;
        }

        th,
        td {
            color: black;
        }
    </style>
</head>

<body>

    <?php
    include("./connection.php");
    $check_exam = "SELECT *FROM seat_plan";
    $result_exam = mysqli_query($connection, $check_exam);
    if (mysqli_num_rows($result_exam) == 0) {
        echo ("<h2 class='text-danger'>*** There Is No Exam***</h2>");
        exit();
    } else {
    ?>
        <div class="container row border shadow-sm p-2 mb-2 bg-body rounded">
            <?php
            include("./connection.php");

            //------Query for Admin---------------//
            //     $sql = "SELECT room.room_no, room.block, room.floor, seat_plan.roll_no FROM room INNER JOIN seat_plan ON 
            // seat_plan.room_id=room.room_id GROUP BY room.room_no ORDER BY seat_plan.roll_no ASC;";

            //this is ok but all rooms are not coming
            /*SELECT MIN(s.roll_no) AS min_roll, MAX(s.roll_no) AS max_roll, s.faculty, s.semester, r.room_no, r.floor, r.block FROM student s INNER JOIN seat_plan sp ON sp.roll_no = s.roll_no INNER JOIN room r ON r.room_id = sp.room_id GROUP BY s.semester, s.faculty ORDER BY r.room_no*/

            // $sql = "SELECT DISTINCT MIN(s.roll_no) as min_roll, MAX(s.roll_no) as max_roll, s.faculty, s.semester, r.room_no, r.floor, r.block FROM student s INNER JOIN seat_plan sp ON sp.roll_no=s.roll_no INNER JOIN room r ON r.room_id=sp.room_id GROUP by s.semester, s.faculty, r.room_no ORDER BY s.faculty ASC";

            $sql = "SELECT sp.roll_no, s.faculty as faculty, s.semester as semester, r.room_no, r.floor, r.block FROM student as s INNER JOIN seat_plan as sp ON s.roll_no=sp.roll_no INNER JOIN room as r ON r.room_id=sp.room_id ORDER BY faculty, semester, s.roll_no";

            $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
            ?>
            <?php
            $count = 1;
            $faculty = '';
            $semester = '';
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <?php
                if ($faculty != $row['faculty'] || $semester != $row['semester']) {
                ?>
                    <!-- <div class="row border shadow-sm p-1 mb-0 bg-body rounded" id="sub_container"> -->
                    <table class="table table-bordered" id="table">
                        <nav class="navbar navbar-light bg-light">
                            <a class="text-center">
                                <h4 class="text-success"> HDC Master Seat Plan Of <?php echo ($row['faculty'] . ' ' . $row['semester'] . " Semseter") ?></h4>
                            </a>
                        </nav>
                        <!-- <p>Seat Plan For</p> -->
                        <thead>
                            <tr class="shadow p-3 mb-5 bg-info rounded text-dark">
                                <th scope="col">S.N.</th>
                                <th scope="col">Student CRN</th>
                                <th scope="col">Faculty</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Room</th>
                                <th scope="col">Block</th>
                                <th scope="col">Floor</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                    <?php
                    echo ('<tr class="text-dark">');
                    echo ("<th>" . $count++ . "</th>");
                    echo "<td>" . $row['roll_no'] . "</td>";
                    echo "<td>" . $row['faculty'] . "</td>";
                    echo "<td>" . $row['semester'] . "</td>";
                    echo "<td>" . $row['room_no'] . "</td>";
                    echo "<td>" . $row['block'] . "</td>";
                    echo "<td>" . $row['floor'] . "</td>";
                    $faculty = $row['faculty'];
                    $semester = $row['semester'];
                    echo ("</tr>");
                } else {
                    echo ('<tr class="text-dark">');
                    echo ("<th>" . $count++ . "</th>");
                    echo "<td>" . $row['roll_no'] . "</td>";
                    echo "<td>" . $row['faculty'] . "</td>";
                    echo "<td>" . $row['semester'] . "</td>";
                    echo "<td>" . $row['room_no'] . "</td>";
                    echo "<td>" . $row['block'] . "</td>";
                    echo "<td>" . $row['floor'] . "</td>";
                    $faculty = $row['faculty'];
                    $semester = $row['semester'];
                    echo ("</tr>");
                }
            }
                    ?>
                    </tr>
                        </tbody>
                    </table>

                    <div id="print_div" class="form-group row">
                        <div class="col-sm-10">
                            <input type="button" onclick="return print()" id="print" class="btn btn-info btn-lg btn-block mx-1" style="background-color: #1782b8; color:white;" value="Print">
                        </div>
                    </div>
        </div>
        </div>
    <?php } ?>
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