<?php include "table_backend.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Title</title>
</head>

<body>


    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="editModalLabel">Edit this Note</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
           </button>
                </div>
                <form action="table.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="idEdit" id="idEdit">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="nameEdit" placeholder="Name" name="nameEdit" />
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select class="form-control" id="genderEdit" name="genderEdit">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Not spesifide</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Salary</label>
                            <input type="number" step="0.0001" class="form-control" id="salaryEdit" placeholder="Salary" name="salaryEdit">
                        </div>
                        <div class="form-group">
                            <label for="">Department</label>
                            <input type="text" class="form-control" id="departmentEdit" placeholder="Department" name="departmentEdit">
                        </div>

                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="container">


        <div>
            <h1 class="text-center m-5 p-5">View Table</div>
            <div class="form-group">
                        <input type="submit" name="seer2" class="btn btn-primary" value="Search">
                        <a href="crud.php" class="btn btn-primary" style="float: right;">Back</a>
            </div>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Despartment</th>
                    <th scope="col">Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php   
    //$show2 = $_POST['Answer2'];
    $sql = "SELECT * FROM `crudapp`";
    $result = mysqli_query($conn,$sql) ;
    $id = 0;
    while($row = mysqli_fetch_assoc($result)){
        $id = $id + 1;
        echo "<tr>
        <th scope='row'>".$id."</th>
        <td>".$row['name']."</td>
        <td>".$row['gender']."</td>
        <td>".$row['salary']."</td>
        <td>".$row['department']."</td>
        <td> <button class='edit btn btn-sm btn-primary' id=".$row['id'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['id'].">Delete</button>  </td>
      </tr>";
    }  ?>
            </tbody>
        </table>

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

  <script>
        $(document).ready(function () {
      $('#myTable').DataTable();
      });
  </script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                name = tr.getElementsByTagName("td")[0].innerText;
                gender = tr.getElementsByTagName("td")[1].innerText;
                salary = tr.getElementsByTagName("td")[2].innerText;
                department = tr.getElementsByTagName("td")[3].innerText;
                console.log(name, gender, salary, department);
                nameEdit.value = name;
                genderEdit.value = gender;
                salaryEdit.value = salary;
                departmentEdit.value = department;
                idEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        });

        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                id = e.target.id.substr(1);

                if (confirm("Are you sure you want to delete this note!")) {
                    console.log("yes");
                    window.location = `/CRUD-APPLICATION-IN-PHP-CORE/table.php?delete=${id}`;
                    // TODO: Create a form and use post request to submit a form
                } else {
                    console.log("no");
                }
            })
        });
    </script>

</body>

</html>