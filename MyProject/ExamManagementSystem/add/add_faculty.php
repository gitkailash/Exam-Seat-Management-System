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
            <form action="../sql/insertFaculty.php" method="post">
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-3 col-form-label" id="add">Add Course</label>
                </div>

                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-3 col-form-label text-right">Name</label>
                    <div class="col-sm-5">
                        <select class="custom-select" name="facultyName">
                        <option value="Bsc.CSIT">Bsc.CSIT</option>
                            <option value="BIM">BIM</option>
                            <option value="BCA">BCA</option>
                            <option value="BHM">BHM</option>
                            <option value="BBS">BBS</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputFaculty" class="col-sm-3 col-form-label text-right">Type</label>
                    <div class="col-sm-5">
                        <select class="custom-select" name="facultyType">
                            <option value="Information Technology">Information Technology</option>
                            <option value="Management">Management</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-info btn-lg btn-block mx-1 " style="background-color: #1782b8; color:white" name="faculty">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
