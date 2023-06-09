<?php
if (isset($_POST['faculty'])) {

    //connecting database
    include('../connection.php');
    echo "</br>";
    //collecting form data
    $course_name = $_POST['facultyName'];
    $course_type = $_POST['facultyType'];


    //check faculty exist or not
    $check_faculty = "SELECT  *FROM faculty WHERE course_name LIKE '$course_name'";
    $check_result = mysqli_query($connection, $check_faculty);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>
       alert(\"Faculty Already Exist\");
       window.location=\"../nav/nav_faculty.php\";
       </script>";
        exit();
    }
    //inserting into table
    $sql_insert_data = "INSERT INTO faculty(course_name, course_type)
                        VALUES('$course_name', '$course_type')";
    //checking data insertion
    if (mysqli_query($connection, $sql_insert_data)) {
        echo "<script>
                    alert(\"Insertion successful\");
                    window.location=\"../nav/nav_faculty.php\";
                </script>";
        echo "</br>";
    } else {
        die("Insertion failed! </br>" . mysqli_error($connection));
        echo "</br>";
    }
    mysqli_close($connection);
}
