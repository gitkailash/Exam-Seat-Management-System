<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/navtest.css">
    <link rel="stylesheet" href="../CSS/view.css">
    <title>User Status</title>
</head>

<body>
    <?php
    include("../connection.php");

    //------Query for Admin---------------//
    $sql = "SELECT * FROM user;";
    $result = mysqli_query($connection, $sql) or die("Querry Failed! " . mysqli_error($connection));
    ?>
    <div class="fixed-top row border shadow-sm p-1 mb-1 bg-body rounded" id="container">
        <table class="table table-bordered" id="table">
            <thead>
                <tr class="shadow p-3 mb-5 bg-info rounded">
                    <th scope="col">S.N.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo "<th>" . $row['user_id'] . "</th>";
                        $_SESSION['status']=$row['status'];
                        $_SESSION['user_id']=$row['user_id'];
                        echo("<th>".++$count."</th>");
                        echo "<td>" . $row['first_name'] . "  " .  $row['last_name'] . "</td>";
                        echo "<td>" . $row['gender']. "</td>";
                        echo "<td>" . $row['mobile']. "</td>";
                        echo "<td>" . $row['email']. "</td>";
                        if($_SESSION['status']==1){
                        ?>
                        <th id="delete" class="bg-success"><a href='../view/user_active.php? user_id="<?php echo($row["user_id"])?>"' class="fa fa-user-circle-o text-white" aria-hidden="true">Active</a></th>
                        <?php } else{?>
                        <th id="delete" class="bg-danger"><a href='../view/user_deactive.php? user_id="<?php echo($row["user_id"])?>"' class="fa fa-user-times text-white" aria-hidden="true">Deactive</a></th>
                            <?php } ?>
                       <?php echo ("</tr>");
                    } ?>
            </tbody>
        </table>
    </div>

    <!-- confirm delete -->
    <script>
    function check_delete(){
        return confirm("Confirm Delete?");
    }
    </script>
</body>

</html>