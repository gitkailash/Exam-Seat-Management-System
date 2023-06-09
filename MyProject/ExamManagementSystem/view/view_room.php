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
    <title>View Room</title>
</head>

<body>
    <?php
    include("../connection.php");

    //------Query for Admin---------------//
    $sql = "SELECT * FROM room;";
    $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
    ?>
    <div class="fixed-top row border shadow-sm p-1 mb-1 bg-body rounded" id="container">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Room Details</a>
            <form name="myForm" class="form-inline" accept="" onsubmit="return validation()" method="post">
                <input class="form-control mr-sm-2" type="search" name="search_room" placeholder="Room No" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" name="search" type="submit">Search</button>
            </form>
        </nav>
        <table class="table table-bordered" id="table">
            <thead>
                <tr class="shadow p-3 mb-5 bg-info rounded">
                    <th scope="col">S.N.</th>
                    <th scope="col">Room No</th>
                    <th scope="col">Type</th>
                    <th scope="col">Block</th>
                    <th scope="col">Floor</th>
                    <th scope="col">Room Capacity</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $flag = false;
                    if (isset($_POST["search"])) {
                        $flag = true;
                        $search_room = $_POST["search_room"];

                        if (!is_numeric($search_room)) {
                            echo "<script>
                            alert(\"Invalid Room\");
                            window.location =\"../nav/nav_room.php\";
                            </script>";
                        } else {

                            $sql_search = "SELECT * FROM room WHERE room_no=" . $search_room . ";";
                            $search_result = mysqli_query($connection, $sql_search) or die("Querry Failed! " . mysqli_error($connection));

                            if ($flag) {
                                $count = 0;
                                if (mysqli_num_rows($search_result) > 0) {
                                    while ($row = mysqli_fetch_assoc($search_result)) {
                                        echo ("<th>" . ++$count . "</th>");
                                        echo "<td>" . $row['room_no'] . "</td>";
                                        echo "<td>" . $row['room_type'] . "</td>";
                                        echo "<td>" . $row['block'] . "</td>";
                                        echo "<td>" . $row['floor'] . "</td>";
                                        echo "<td>" . $row['room_capacity'] . "</td>";
                    ?>
                                        <th id="update"><a href='../nav/nav_update_room.php? room_id="<?php echo ($row["room_id"]) ?>"' class="fa fa-pencil-square-o" aria-hidden="true">Update</a></th>
                                        <th id="delete"><a href='../delete/delete_room.php? room_id="<?php echo ($row["room_id"]) ?>"' class="fa fa-trash" aria-hidden="true" onclick='return check_delete()'>Delete</a></th>
                            <?php echo ("</tr>");
                                    }
                                } else {
                                    echo ("<th colspan='8'><h2 class='text-danger'>***No Room***</h2></th>");
                                }
                            }
                        }
                    } else {
                        $count = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            // echo "<th>" . $row['user_id'] . "</th>";
                            echo ("<th>" . ++$count . "</th>");
                            echo "<td>" . $row['room_no'] . "</td>";
                            echo "<td>" . $row['room_type'] . "</td>";
                            echo "<td>" . $row['block'] . "</td>";
                            echo "<td>" . $row['floor'] . "</td>";
                            echo "<td>" . $row['room_capacity'] . "</td>";
                            ?>
                            <th id="update"><a href='../nav/nav_update_room.php? room_id="<?php echo ($row["room_id"]) ?>"' class="fa fa-pencil-square-o" aria-hidden="true">Update</a></th>
                            <th id="delete"><a href='../delete/delete_room.php? room_id="<?php echo ($row["room_id"]) ?>"' class="fa fa-trash" aria-hidden="true" onclick='return check_delete()'>Delete</a></th>
                    <?php echo ("</tr>");
                        }
                    } ?>
            </tbody>
        </table>
    </div>

    <!-- confirm delete -->
    <script>
        function validation() {
            let search = document.forms["myForm"]["search_room"].value;
            let pattern = /^[0-9]+$/;

            if (!search.match(pattern)) {
                alert("Invalid Room");
                document.myForm.search_room.focus();
                return false;
            }
        }

        function check_delete() {
            return confirm("Confirm Delete?");
        }
    </script>
</body>

</html>