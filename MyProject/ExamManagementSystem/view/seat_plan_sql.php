    <?php
    include("../connection.php");

    //------Query for Admin---------------//
    $sql = "SELECT * FROM student;";
    $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
    ?>