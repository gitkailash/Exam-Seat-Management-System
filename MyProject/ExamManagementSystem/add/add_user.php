<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/navtest.css">
    <title>Add User</title>
</head>

<body>
    <div class="outer-container" style="position: relative; margin-top: 10%;">
        <div class="shadow p-3 mb-5 bg-body rounded" id="item-container" style="margin-top: 4%;">
            <form name="myForm" action="../sql/insertUser.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputUser" class="col-sm-4 col-form-label" id="add">Add User</label>
                </div>
                <div class="form-group row">
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
                        <input type="text" class="form-control" id="inputMobile" name="mobile" placeholder="Mobile" required="required">
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