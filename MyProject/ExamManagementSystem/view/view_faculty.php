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
    <title>View Faculty</title>
</head>

<body>
    <?php
    include("../connection.php");

    //------Query for Admin---------------//
    $sql = "SELECT * FROM faculty;";
    $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
    ?>
    <div class="fixed-top row border shadow-sm p-1 mb-1 bg-body rounded" id="container">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Faculty Details</a>
            <form name="myForm" action="" class="form-inline" onsubmit="return validation()" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Faculty Name" aria-label="Search" name="faculty_name" />
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="search">Search</button>
            </form>
        </nav>
        <table class="table table-bordered" id="table">
            <thead>
                <tr class="shadow p-3 mb-5 bg-info rounded">
                    <th scope="col">S.N.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
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
                        $search_faculty = $_POST["faculty_name"];
                        $sql_search = "SELECT * FROM faculty WHERE course_name LIKE '%" . $search_faculty . "%';";
                        $search_result = mysqli_query($connection, $sql_search) or die("Querry Failed! " . mysqli_error($connection));
                        // echo($search_student);

                        if ($flag = true) {
                            $count = 0;
                            if (mysqli_num_rows($search_result) > 0) {
                                while ($row = mysqli_fetch_assoc($search_result)) {
                                    // echo "<th>" . $row['faculty_id'] . "</th>";
                                    echo ("<th>" . ++$count . "</th>");
                                    echo "<td>" . $row['course_name'] . "</td>";
                                    echo "<td>" . $row['course_type'] . "</td>";
                    ?>
                                    <!-- <th id="update"><a href="../update/update_faculty.php" class="fa fa-pencil-square-o" aria-hidden="true">Update</a></th> -->
                                    <th id="delete"><a href='../delete/delete_faculty.php? faculty_id="<?php echo ($row["faculty_id"]) ?>"' class="fa fa-trash" aria-hidden="true" onclick='return check_delete()'>Delete</a></th>
                            <?php echo ("</tr>");
                                }
                            } else {
                                echo ("<th colspan='4'><h2 class='text-danger'>***No Faculty***</h2></th>");
                            }
                        }
                    } else {
                        $count = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            // echo "<th>" . $row['faculty_id'] . "</th>";
                            echo ("<th>" . ++$count . "</th>");
                            echo "<td>" . $row['course_name'] . "</td>";
                            echo "<td>" . $row['course_type'] . "</td>";
                            ?>
                            <!-- <th id="update"><a href="../update/update_faculty.php" class="fa fa-pencil-square-o" aria-hidden="true">Update</a></th> -->
                            <th id="delete"><a href='../delete/delete_faculty.php? faculty_id="<?php echo ($row["faculty_id"]) ?>"' class="fa fa-trash" aria-hidden="true" onclick='return check_delete()'>Delete</a></th>
                    <?php echo ("</tr>");
                        }
                    } ?>
            </tbody>
        </table>
    </div>

    <!-- confirm delete -->
    <script>
        function validation() {
            let search = document.forms["myForm"]["faculty_name"].value;
            let pattern = /^[a-zA-Z]+$/;

            if (!search.match(pattern)) {
                alert("Invalid Faculty Name");
                document.myForm.faculty_name.focus();
                return false;
            }
        }

        function check_delete() {
            return confirm("Confirm Delete?");
        }
    </script>
</body>

</html>