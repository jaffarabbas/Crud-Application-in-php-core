<?php 

include "db_conn.php"; 



// if(isset($_GET['delete'])){
//     $id = $_GET['delete'];
//     $delete = true;
//     $sql = "DELETE FROM `crudapp ` WHERE `id` = $id";
//     $result = mysqli_query($conn, $sql);
//   }



function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }


    if (isset( $_POST['idEdit'])){
      // Update the record
         $id = $_POST["idEdit"];
         $name = $_POST['nameEdit'];
         $gender = $_POST['genderEdit'];
         $salary = $_POST['salaryEdit'];
         $department = $_POST['departmentEdit'];
    
      // Sql query to be executed
      $sql = "UPDATE `crudapp` SET `name` = '$name' , `gender` = '$gender' , `salary` = '$salary' , `department` = '$department' WHERE `crudapp`.`id` = $id";
      $result = mysqli_query($conn, $sql);
      if($result){
        $update = true;
      }
    }
    else{
        echo "We could not update the record successfully";
    }


?>