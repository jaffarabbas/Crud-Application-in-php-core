<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Title</title>
</head>

<body>
    <section class="container">


        <section>
            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Edit</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                        </div>
                        <div class="modal-body">

                            <h1 class="text-center">Edit Crud</h1>
                            <?php if (isset($_GET['error'])) { ?>
                            <p class="error">
                                <?php echo $_GET['error']; ?>
                            </p>
                            <?php } ?>
                            <form method="POST" action="crud.php">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" id="f1" placeholder="Name" name="nameEdit">
                                </div>
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select class="form-control" id="f2" name="genderEdit">
      <option>Male</option>
      <option>Female</option>
      <option>Not spesifide</option>
    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Salary</label>
                                    <input type="number" class="form-control" id="f3" placeholder="Salary" name="salaryEdit">
                                </div>
                                <div class="form-group">
                                    <label for="">Department</label>
                                    <input type="text" class="form-control" id="f4" placeholder="Department" name="departmentEdit">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div>
            <h1 class="text-center m-5 p-5">View Table</div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <div class="form-group">
                        <input type="text" name="serch" value="" placeholder="Serch here" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="seer2" class="btn btn-primary" value="Search">
                    </div>
                </tr>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Despartment</th>
                </tr>
            </thead>
            <tbody>
                <?php   
    //$show2 = $_POST['Answer2'];
    $sql = "SELECT * FROM `crudapp` WHERE 1";
    $result = mysqli_query($conn,$sql) ;
    $id = 0;
    while($row = mysqli_fetch_assoc($result)){
        $id = $id +1;
        echo "<tr>
        <th scope='row'>".$id."</th>
        <td>".$row['name']."</td>
        <td>".$row['gender']."</td>
        <td>".$row['salary']."</td>
        <td>".$row['department']."</td>
        <td><button name='edit' id='Edit' type='button' class='edit btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Edit</button>
        <button class='btn btn-primary'>Delete</button></td>
      </tr>";
    }  ?>
            </tbody>
        </table>

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        edits = document.getElementById('Edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("Edit ", );
                tr = e.target.parentNode.parentNode;
                name = ts.getElementByTagName("td")[0].innerText;


            })
        });

        // edit = document.getElementsByClassName("edit");
        // Array.from(edit).forEach((element) =>{

        // });
    </script>

</body>

</html>