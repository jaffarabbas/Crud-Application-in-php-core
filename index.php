<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="style.css">
<title>Title</title>
</head>
<body>
<section class="container">
	<h1 class="text-center">CRUD APPLICATION</h1>
  <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
  <?php } ?>
	<form method="POST" action="crud.php">
  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" id="f1" placeholder="Name" name="name">
  </div>
  <div class="form-group">
    <label for="">Gender</label>
    <select class="form-control" id="f2" name="gender">
      <option>Male</option>
      <option>Female</option>
      <option>Not spesifide</option>
    </select>
  </div>
  <div class="form-group">
    <label for="">Salary</label>
    <input type="number" class="form-control" id="f3" placeholder="Salary" name="salary">
  </div>
  <div class="form-group">
    <label for="">Department</label>
    <input type="text" class="form-control" id="f4" placeholder="Department" name="department">
  </div>
  <div class="form-group">
  	<input type="submit" class="btn btn-primary" name="submit" value="Submit">
  </div>
</form>
</section>
<div><a class="btn btn-primary" id="ancor_btn" href="check.php">View Insertion</a></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>