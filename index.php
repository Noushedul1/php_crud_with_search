<?php
require "./database.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ajax crud project 2</title>
  </head>
  <body>
      <!-- start for data show and insert  -->
     <div class="container my-3">
         <!-- start for search  -->
         <div class="serach_box mb-2">
             <input type="text" class="form-control" id="search" placeholder="Enter Search" autocomplete="off">
         </div>
         <!-- end for search  -->
         <div class="insert_show">
             <div class="row">
                 <div class="col-md-6">
                    <div class="form_data_insert" id="form_value">
            <!-- start Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Insert Data
                    </button>
            <!-- end Button trigger modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Sname :</label>
                                <input type="text" class="form-control" name="sname" id="sname">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Age :</label>
                                <input type="text" class="form-control" name="age" id="age">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">City :</label>
                                <input type="text" class="form-control" name="city" id="city">
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" name="submit" id="save">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
                        <!-- *** -->
                    </div>
                 </div>
                 <div class="col-md-8 offset-2">
                     <table class="table table-bordered text-center">
                         <thead>
                             <tr>
                                 <th>No: </th>
                                 <th>Sname: </th>
                                 <th>Age: </th>
                                 <th>City: </th>
                                 <th>Action: </th>
                             </tr>
                         </thead>
                         <tbody id="data_show">
                             
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
      <!-- end for data show and insert  -->
    

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

    <!-- start for ajax crud project  -->
    <script>
        $(document).ready(function(){
            
            // start for insert value
            $("#save").click(function(){
                var sname = $("#sname").val();
                var age = $("#age").val();
                var city = $("#city").val();
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: {
                        sname: sname,
                        age: age,
                        city: city
                    },
                    success: function(data) {
                        read();
                    }
                });
            });
            // end for insert value 
            
            
        }); //main

        // start for delete 
        // start for data read 
        function read() {
            $.ajax({
                url: "read.php",
                method: "GET",
                success: function(data){
                    $("#data_show").html(data);
                }
            });
        }
        read();
        // end for data read 
        function DELETE(userId) {
            $con = confirm("Are you sure?");
            if($con == true) {
                $.ajax({
                    url: "delete.php",
                    method: "POST",
                data: {
                    userId: userId
                },
                success: function(data) {
                    read();
                }
                });
            }
        }
    // end for delete 

    // start for edit
    function EDIT(userId) {
        $.ajax({
            url: "edit.php",
            method: "GET",
            data: {
                userId: userId
            },
            success: function(data) {
                $("body").html(data);
            }
        });
    }
    // end for edit 

    // start for update
    function Updata_data(userId) {
        var sname = $("#sname").val();
        var age = $("#age").val();
        var city = $("#city").val();

        $.ajax({
            url: "update.php",
            method: "POST",
            data: {
                sname: sname,
                age: age,
                city: city,
                userId: userId
            },
            success: function(data) {
               window.location.replace("./index.php");
            }
        });
    }
    // end for update 

    // start for serach 
    $("#search").keyup(function(){
        var search_value = $(this).val();
        $.ajax({
            url: "live_search.php",
            method: "POST",
            data: {search_value: search_value},
            success: function(data) {
                $("#data_show").html(data);
            }
        });
    });
    // end for serach 

    </script>
    <!-- end for ajax crud project  -->
  </body>
</html>
