<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <h1 id="sms_header" class="fixed-top">Exam Seat Management System</h1>
    <p class="h1 login_caption">Login</p>
    <div class="outer_container">
        <div class="login_form">
            <form action="login_config.php" method="post" name="login">
                <!-- <img id="login_logo" src="login.png" alt="Login Icon"> -->
                <img src="login.png" id="login_logo" class="rounded float-left" alt="Login Icon">
                <div class="col">
                    <div class="col-10">
                        <input type="text" class="form-control" placeholder="Enter Username" name="username" required="required" /><br>

                    </div>

                    <div class="col-10">
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" required="required" /><br>
                    </div>


                    <div class="col-10">
                        <select class="form-control" name="role">
                            <option value="1" selected="selected">Admin</option>
                            <option value="2">System User</option>
                        </select><br>
                    </div>

                    <div class="col-10">
                        <input type="submit" class="form-control" name="login" value="Login" /><br>
                        <a class="col-12 btn btn-light stretched-link" href="registration.php">Haven't Register? Register Here</a>
                        <a class="col-12 btn btn-secondary stretched-link" href="search_seat_plan.php">Search Student Seat Plan</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div>
        <?php include("footer.php"); ?>
    </div>
</body>

</html>