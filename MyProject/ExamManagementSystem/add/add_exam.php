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
    <div class="outer-container" style="position: relative; margin-top: 10%;">
        <div class="shadow p-3 mb-5 bg-body rounded" id="item-container">
            <form name="myForm" action="../sql/insertExam.php" onsubmit="return validateForm()" method="post" name="exam_form" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label" id="add">Add Exam</label>
                </div>

                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-2 col-form-label">Exam Name</label>
                    <div class="col-sm-6">
                        <select class="custom-select" name="examName">
                            <option value="Regular">Regular</option>
                            <option value="Re-Exam">Re-Exam</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-2 col-form-label">Exam Type</label>
                    <div class="col-sm-6">
                        <select class="custom-select" name="examType">
                            <option value="First Terminal">First Terminal</option>
                            <option value="Second Terminal">Second Terminal</option>
                            <option value="Pre-Board">Pre-Board</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Exam Date</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="inputDate" name="examDate" required />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Exam Time</label>
                    <div class="col-sm-6">
                        <input type="time" class="form-control" id="inputTime" name="examTime" required />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputAddress" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <label for="floatingTextarea2"></label>
                            <textarea class="form-control" placeholder="Enter About Exam..." id="floatingTextarea2" style="height: 100px" name="examDesc" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-2 col-form-label">Exam Status</label>
                    <div class="col-sm-6">
                        <select class="custom-select" name="faculty[]" multiple="multiple" required>

                            <?php
                            // extract faculty
                            include("../connection.php");
                            $sql = "SELECT DISTINCT faculty, semester FROM student;";
                            $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option name="<?php $row['faculty_id'] ?>"><?php echo $row['faculty'] . " " . $row['semester']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-info btn-lg btn-block mx-1 " style="background-color: #1782b8; color:white" name="exam">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            var date = new Date();
            var current_date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
            let exam_desc = document.forms["myForm"]["examDesc"].value;
            let exam_date = document.forms["myForm"]["examDate"].value;

            if (exam_desc.trim() == "") {
                alert("Invalid Description");
                document.myForm.examDesc.focus();
                return false;
            }
        }
    </script>

</body>

</html>