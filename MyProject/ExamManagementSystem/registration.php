<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/navtest.css">
    <style>
        * {
            margin: auto;
        }

        body {
            background: url(exam.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        #sms_header {
            width: 100%;
            margin-top: -4%;
            position: fixed;
            background-color: #0073aa;
            color: #ffffff;
            text-align: center;
            height: 60px;
            font-family: serif;
            font-weight: bold;
            font-size: 50px;
            text-transform: uppercase;
            margin-bottom: 1%;
        }

        #copy_right {
            position: fixed;
            width: 100%;
            margin-right: 5px;
            margin-top: -5vh;
            background-color: #0073aa;
            height: 45px;
            text-align: center;
            padding: 0.3%;
            font-family: serif;
            font-weight: bold;
            color: #ffffff;
            font-size: 25px;
        }

        @media (min-width: 768px) and (max-width: 1024px) {
            #sms_header {
                margin: auto;
                position: relative;
                background-color: #0073aa;
                color: #ffffff;
                text-align: center;
                height: 30px;
                font-family: serif;
                font-weight: bold;
                font-size: 30px;
                text-transform: uppercase;
                margin-bottom: 1%;
            }

            body {
                background: url(exam.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }

        }

        @media (min-width: 481px) and (max-width: 767px) {

            #sms_header {
                margin: auto;
                position: relative;
                background-color: #0073aa;
                color: #ffffff;
                text-align: center;
                height: 25px;
                font-family: serif;
                font-weight: bold;
                font-size: 23px;
                text-transform: uppercase;
                margin-bottom: 1%;
            }
        }
    </style>
    <title>Register User</title>
</head>

<body>
    <h1 id="sms_header">Exam Seat Management System</h1>
    <div class="position-fixedp mb-3 outer-container">
        <div class="shadow p-3 bg-body rounded" id="item-container" style="margin-top: 4%;">
            <form name="myForm" action="./sql/insertRegistration.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputUser" class="col-sm-3 col-form-label" id="add" style="color:#0073aa;">Register User</label>
                </div>
                <div class=" form-group row">
                    <label for="inputFirstName" class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputFirstName" name="firstName" placeholder="First Name" required="required">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputLastName" class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputLastName" name="lastName" placeholder="Last Name" required="required">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputMobile" class="col-sm-3 col-form-label">Mobile</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputMobile" name="mobile" placeholder="98XXXXXXXX" required="required">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required="required">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputUsername" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputUsername" name="userName" placeholder="Username" required="required">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required="required">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPasswordConfirm" class="col-sm-3 col-form-label">Confirm Password</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="inputPasswordConfirm" name="confirmPassword" placeholder="Confirm Password" required="required">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-3 col-form-label">Select Gender</label>
                    <div class="col-sm-5">
                        <select name="gender" class="custom-select" required="required">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputRole" class="col-sm-3 col-form-label">User Role</label>
                    <div class="col-sm-5">
                        <select name="role" class="custom-select" required="required">
                            <option value="1">Admin</option>
                            <option value="2">System User</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" name="userForm" class="btn btn-info btn-lg btn-block mx-1" style="background-color: #1782b8; color:white" value="Submit">
                    </div>
                </div>
            </form>
        </div>
        <!--  -->
    </div>

    <div id="footer">
        <small id="copy_right">Copyright &copy; 2022. All rights reserved | Developed By Kailash Yadav</small>
    </div>

    <script>
        function validateForm() {
            let first_name = document.forms["myForm"]["firstName"].value;
            let last_name = document.forms["myForm"]["lastName"].value;
            let mobile = document.forms["myForm"]["mobile"].value;
            let password = document.forms["myForm"]["password"].value;
            let confirm_password = document.forms["myForm"]["confirmPassword"].value;

            let pattern = /^[a-zA-Z]+$/;
            if (!first_name.match(pattern)) {
                alert("Invalid First Name");
                document.myForm.firstName.focus();
                return false;
            } else if (!last_name.match(pattern)) {
                alert("Invalid Last Name");
                document.myForm.lastName.focus();
                return false;
            } else if (mobile.toString().length < 0 || mobile.toString().length != 10 || mobile <= 0) {
                alert("Enter Valid Number");
                document.myForm.mobile.focus();
                return false;
            } else if (password.trim() == "") {
                alert("Invalid Password");
                document.myForm.password.focus();
                return false;
            } else if (password != confirm_password) {
                alert("Password Not Match");
                document.myForm.confirmPassword.focus();
                return false;
            }
        }
    </script>
</body>

</html>