<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/navtest.css">
    <title>Nav Test</title>
</head>

<body>
    <div class="outer-container">
        <div class="shadow p-3 mb-5 bg-body rounded" id="item-container">
            <form action="#" method="post" name="update_semester" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label" id="add">Manage Semester</label>
                </div>
                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-2 col-form-label">Faculty</label>
                    <div class="col-sm-6">
                        <select class="custom-select" name="faculty">
                            <option value="Bsc.CSIT">Bsc.CSIT</option>
                            <option value="BIM">BIM</option>
                            <option value="BCA">BCA</option>
                            <option value="BHM">BHM</option>
                            <option value="BBS">BBS</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-2 col-form-label">From</label>
                    <div class="col-sm-6">
                        <select class="custom-select" name="semester_from">
                            <option value="1">First</option>
                            <option value="2">Second</option>
                            <option value="3">Third</option>
                            <option value="4">Fourth</option>
                            <option value="5">Fifth</option>
                            <option value="6">Sixth</option>
                            <option value="7">Seventh</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-2 col-form-label">To</label>
                    <div class="col-sm-6">
                        <select class="custom-select" name="semester_to">
                            <option value="1">First</option>
                            <option value="2">Second</option>
                            <option value="3">Third</option>
                            <option value="4">Fourth</option>
                            <option value="5">Fifth</option>
                            <option value="6">Sixth</option>
                            <option value="7">Seventh</option>
                            <option value="8">Eight</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-info btn-lg btn-block mx-1" style="background-color: #1782b8; color:white" name="upgrade">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    include("../connection.php");
    if (isset($_POST["upgrade"])) {
        $faculty = $_POST["faculty"];
        $semester_from = $_POST["semester_from"];
        $semester_to = $_POST["semester_to"];

        //update semester
        $sql_update = "UPDATE student
        SET semester = $semester_to
        WHERE faculty LIKE '$faculty' and semester = $semester_from;";
        // checking data insertion
        if (mysqli_query($connection, $sql_update)) {
            echo "<script>
            alert(\"Update Successful.\");
            window.location=\"../Nav/nav_semester_update.php\";
            </script>";
        } else {
            die("Update Fail" . mysqli_error($connection));
        }
        mysqli_close($connection);
    }
    ?>
</body>

</html>