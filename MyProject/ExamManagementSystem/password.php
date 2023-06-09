<!-- <?php
        session_start();
        if (!$_SESSION["username"]) {
            header('location:../index.php');
        }
        ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/navtest.css">
    <title>Change Password</title>
</head>

<body>
    <div class="outer-container">
        <div class="shadow p-3 mb-5 bg-body rounded" id="item-container">
            <form name="myForm" action="../sql/change_password.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-4 col-form-label" id="add">Change Password</label>
                </div>

                <div class="form-group row">
                    <label for="oldPassword" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="inputLastName" placeholder="Old Password" name="oldPassword" required="required">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="inputMobile" placeholder="New Password" name="newPassword" required="required">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="inputMobile" placeholder="Confirm Password" name="confirmPassword" required="required">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-info btn-lg btn-block mx-1" style="background-color: #1782b8; color:white" name="changePassword">Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            let oldPassword = document.forms["myForm"]["oldPassword"].value;
            let newPassword = document.forms["myForm"]["newPassword"].value;
            let confirmPassword = document.forms["myForm"]["confirmPassword"].value;

            if (oldPassword.trim(oldPassword) == "") {
                alert("Invalid Password");
                document.myForm.oldPassword.focus();
                return false;
            } else if (newPassword.trim(newPassword) == "") {
                alert("Invalid Password");
                document.myForm.newPassword.focus();
                return false;
            } else if (newPassword !== confirmPassword) {
                alert("Password Not Match");
                document.myForm.confirmPassword.focus();
                return false;
            } else {
                <?php
                require("connection.php");
                session_start();
                $username = $_SESSION['username'];
                $sql_user = "SELECT passwor FROM user WHERE username='$username';";
                $check_user = mysqli_query($connection, $sql_user);
                if (mysqli_num_rows($check_user) == 0) {
                ?>
                    alert("Invalid password");
                    document.myForm.oldPassword.focus();
                    return false;
                <?php
                } ?>
            }
        }
    </script>
</body>

</html>