<?php

session_start(); 
include "db_conn.php";


if(isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['salary']) && isset($_POST['department'])){
     function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = validate($_POST['name']);
    $gender = validate($_POST['gender']);
    $salary = validate($_POST['salary']);
    $department = validate($_POST['department']);

    if (empty($name)) {
        header("Location: index.php?error=Name is required");
        exit();
    }else if(empty($gender)){
        header("Location: index.php?error=Gender is required");
        exit();
    }else if(empty($salary)){
        header("Location: index.php?error=Salary is required");
        exit();
    }else if(empty($department)){
        header("Location: index.php?error=Department is required");
        exit();
    }else{
        $sql = "INSERT INTO  `crudapp` (`Id`, `name`, `gender`, `salary`, `department`) VALUES (NULL, '$name', '$gender', '$salary', '$department');";
      
        $result = mysqli_query($conn,$sql); 
    //mail sender in php
   
    header("Location: index.php");
    exit();
    }
}
}
else{
	header("Location: index.php");
	exit();
}


?>