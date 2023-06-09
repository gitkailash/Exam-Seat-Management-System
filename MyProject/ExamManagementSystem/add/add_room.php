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
            <form name="myForm" action="../sql/insertRoom.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label" id="add">Add Room</label>
                </div>
                <div class="form-group row">
                    <label for="inputFirstName" class="col-sm-2 col-form-label">Room No</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="inputFirstName" placeholder="Enter Room No" name="roomNo" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-6">
                        <select class="custom-select" name="roomType">
                            <option value="small">Small</option>
                            <option value="Normal">Normal</option>
                            <option value="Hall">Hall</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-2 col-form-label">Block</label>
                    <div class="col-sm-6">
                        <select class="custom-select" name="block">
                            <option value="Block-A">Block-A</option>
                            <option value="Block-B">Block-B</option>
                            <option value="Block-C">Block-C</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-2 col-form-label">Floor</label>
                    <div class="col-sm-6">
                        <select class="custom-select" name="floor">
                            <option value="1">Ground Floor</option>
                            <option value="2">First Floor</option>
                            <option value="2">Second Floor</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Room Capacity</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="inputEmail" placeholder="Room Capacity" name="roomCapacity">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-info btn-lg btn-block mx-1" style="background-color: #1782b8; color:white" name="room">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            let roomNo = document.forms["myForm"]["roomNo"].value;
            let roomCapacity = document.forms["myForm"]["roomCapacity"].value;
            if (roomNo <= 0) {
                alert("Enter Valid Room No");
                document.myForm.roomNo.focus();
                return false;
            } else if (roomCapacity <= 0) {
                alert("Invalid Room Capacity");
                document.myForm.roomCapacity.focus();
                return false;
            }
        }
    </script>
</body>

</html>