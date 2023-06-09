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
    <title>View Exam Seat</title>
</head>

<body>
    <div class="fixed-top headers"><?php include("header.php") ?></div>

    <?php
    include("connection.php");
    //------Query for Admin---------------//
    $sql = "SELECT * FROM student;";
    $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
    ?>
    <div class="row border shadow-sm p-3 mt-5 bg-body rounded" id="container">
        <nav class="navbar navbar-light bg-light">
            <a class="text-info navbar-brand">Search Your Exam Seat</a>
            <form name="myForm" class="form-inline" action="#" onsubmit="return validation()" method="post">
                <input class="form-control mr-sm-2" type="search" name="search_student" placeholder="Enter Your CRN" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="search">Search</button>
            </form>
        </nav>

        <?php
        if (isset($_POST["search"])) {
            $search_student = $_POST["search_student"];
            $count = 0;
            $sql = "SELECT DISTINCT sp.roll_no,s.first_name, s.last_name, s.faculty, s.semester, r.room_no, r.floor, r.block FROM student s INNER JOIN seat_plan sp ON sp.roll_no=s.roll_no INNER JOIN room r ON r.room_id=sp.room_id WHERE sp.roll_no = $search_student";
            $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));

            $check_exam = "SELECT *FROM exam";
            $result_exam = mysqli_query($connection, $check_exam);

            if (mysqli_num_rows($result) > 0) { ?>
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr class="shadow p-3 mb-5 bg-info rounded text-dark">
                            <th scope="col">S.N.</th>
                            <th scope="col">Student CRN</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Faculty</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Room</th>
                            <th scope="col">Block</th>
                            <th scope="col">Floor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) {
                        // echo "<th>" . $row['rool_no'] . "</th>";
                        echo ('<tr class="text-dark">');
                        echo ("<th>" . ++$count . "</th>");
                        echo "<td>" . $row['roll_no'] . "</td>";
                        echo "<td>" . ucwords($row['first_name']) . " " . ucwords($row['last_name']) . "</td>";
                        echo "<td>" . $row['faculty'] . "</td>";
                        echo "<td>" . $row['semester'] . "</td>";
                        echo "<td>" . $row['room_no'] . "</td>";
                        echo "<td>" . $row['block'] . "</td>";
                        echo "<td>" . $row['floor'] . "</td>";
                        echo ("</tr>");
                    }
                } else if (mysqli_num_rows($result_exam) == 0) {
                    echo ("<h2 class='text-danger'>***Exam Not Created***</h2>");
                } else {
                    echo ("<h2 class='text-danger'>***CRN Not Found For Exam***</h2>");
                }
            }

                    ?>
                    </tbody>
                </table>
    </div>
    <!-- confirm delete -->
    <script>
        function validation() {
            let search = document.forms["myForm"]["search_student"].value;
            let pattern = /^[0-9]+$/;

            if (search == 0) {
                alert("Invalid CRN");
                document.myForm.search_student.focus();
                return false;
            } else if (!search.match(pattern)) {
                alert("Invalid CRN");
                document.myForm.search_student.focus();
                return false;
            }
        }
    </script>
</body>

</html>