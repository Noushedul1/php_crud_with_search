<?php
require "./database.php";
require "./function.php";
$userId = mysqli_prep($_GET['userId']);
$edit_sql = "SELECT * from studentdetails WHERE id = $userId";
$result = mysqli_query($connection,$edit_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <?php while($row = mysqli_fetch_array($result)): ?>
                <div class="mb-3">
                    <label for="" class="form-label">Sname :</label>
                    <input type="text" class="form-control" name="sname" id="sname" value="<?php echo mysqli_prep($row['sname']); ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Age :</label>
                    <input type="text" class="form-control" name="age" id="age" value="<?php echo mysqli_prep($row['age']); ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">City :</label>
                    <input type="text" class="form-control" name="city" id="city" value="<?php echo mysqli_prep($row['city']); ?>">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="update" value="Update" id="update" onclick="Updata_data(<?php echo mysqli_prep($row['id']); ?>)">
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <!-- start for ajax and jquery  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-compat/3.0.0-alpha1/jquery.min.js" integrity="sha512-4GsgvzFFry8SXj8c/VcCjjEZ+du9RZp/627AEQRVLatx6d60AUnUYXg0lGn538p44cgRs5E2GXq+8IOetJ+6ow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- end for ajax and jquery  -->
</body>
</html>