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
    <title>View Exam</title>
</head>

<body>
    <?php
    include("../connection.php");
    $check_exam = "SELECT *FROM exam";
    $result_exam = mysqli_query($connection, $check_exam);
    if (mysqli_num_rows($result_exam) == 0) {
        echo ("<h2 class='text-danger'>***No Exam Created***</h2>");
    } else {
        //------Query for Admin---------------//
        $sql = "SELECT * FROM exam;";
        $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
    ?>
        <div class="fixed-top row border shadow-sm p-1 mb-1 bg-body rounded" id="container">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand">Exam Details</a>
                <form class="form-inline" action="#" method="post">
                    <input class="form-control mr-sm-2" type="search" name="search_date" placeholder="Exam Date : YYYY-MM-DD" aria-label="Search">
                    <button class="btn btn-outline-info my-2 my-sm-0" name="search" type="submit">Search</button>
                </form>
            </nav>
            <table class="table table-bordered" id="table">
                <thead>
                    <tr class="shadow p-3 mb-5 bg-info rounded">
                        <th scope="col">S.N.</th>
                        <th scope="col">Exam Name</th>
                        <th scope="col">Exam Type</th>
                        <th scope="col">Exam Date</th>
                        <th scope="col">Exam Time</th>
                        <th scope="col">Description</th>
                        <!-- <th scope="col">Update</th> -->
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $flag = false;
                        if (isset($_POST["search"])) {
                            $flag = true;
                            $search_date = $_POST["search_date"];
                            $sql_search = "SELECT * FROM exam WHERE exam_date LIKE '%" . $search_date . "%';";
                            $search_result = mysqli_query($connection, $sql_search) or die("Querry Failed! " . mysqli_error($connection));
                            // echo($search_student);

                            if ($flag) {
                                $count = 0;
                                if (mysqli_num_rows($search_result) > 0) {
                                    while ($row = mysqli_fetch_assoc($search_result)) {
                                        $row['exam_id'];
                                        echo ("<th>" . ++$count . "</th>");
                                        echo "<td>" . $row['exam_name'] . "</td>";
                                        echo "<td>" . $row['exam_type'] . "</td>";
                                        echo "<td>" . $row['exam_date'] . "</td>";
                                        echo "<td>" . $row['exam_time'] . "</td>";
                                        echo "<td>" . $row['exam_description'] . "</td>";
                        ?>
                                        <!-- <th id="update"><a href="../update/update_exam.php?exam_id= <?php $row["exam_id"] ?>&
                            exam_date=<?php $row["exam_date"] ?>&
                            exam_time=<?php $row["exam_time"] ?>&
                            exam_description=<?php $row["exam_description"] ?> " class="fa fa-pencil-square-o" aria-hidden="true">Update</a></th> -->
                                        <th id="delete"><a href='../delete/delete_exam.php? exam_id="<?php echo ($row["exam_id"]) ?>"' class="fa fa-trash" aria-hidden="true" onclick='return check_delete()'>Delete</a></th>
                                <?php echo ("</tr>");
                                    }
                                } else {
                                    echo ("<th colspan='8'><h2 class='text-danger'>***No Exam***</h2></th>");
                                }
                            }
                        } else {
                            $count = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                // echo "<th>" . $row['exam_id'] . "</th>";
                                echo ("<th>" . ++$count . "</th>");
                                echo "<td>" . $row['exam_name'] . "</td>";
                                echo "<td>" . $row['exam_type'] . "</td>";
                                echo "<td>" . $row['exam_date'] . "</td>";
                                echo "<td>" . $row['exam_time'] . "</td>";
                                echo "<td>" . $row['exam_description'] . "</td>";
                                ?>
                                <!-- <th id="update"><a href="../update/update_exam.php?exam_id= <?php $row["exam_id"] ?>&
                            exam_date=<?php $row["exam_date"] ?>&
                            exam_time=<?php $row["exam_time"] ?>&
                            exam_description=<?php $row["exam_description"] ?> " class="fa fa-pencil-square-o" aria-hidden="true">Update</a></th> -->
                                <th id="delete"><a href='../delete/delete_exam.php? exam_id="<?php echo ($row["exam_id"]) ?>"' class="fa fa-trash" aria-hidden="true" onclick='return check_delete()'>Delete</a></th>
                        <?php echo ("</tr>");
                            }
                        }
                        ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
    <!-- confirm delete -->
    <script>
        function check_delete() {
            return confirm("Confirm Delete?");
        }
    </script>
</body>

</html>