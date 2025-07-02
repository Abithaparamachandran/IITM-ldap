<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css"> <!-- Include your custom styles here -->
</head>
<body>

<div class="container">
  <div class="page-header text-center">
    <img src="newlogo.png" class="img-fluid" alt="index" id="img">
  </div>

  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="admin.php" method="POST" id="form" class="mt-4">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title text-center">Admin Login</h2>

            <div class="mb-3">
              <label for="uname" class="form-label"><b>Username</b></label>
              <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter username">
            </div>

            <div class="mb-3">
              <label for="password" class="form-label"><b>Password</b></label>
              <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter password">
            </div>

            <div class="text-center">
              <button type="submit" name="submit" class="btn btn-primary"><b>Login</b></button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="footer mt-4">
    <p class="text-center">E-services Team, Computer Center</p>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
</body>
</html>

<?php
if(isset($_POST["submit"])) {
	  $uname = $_POST["uname"];
	    $pass = $_POST["pass"];
	    if($uname == "***" && $pass == "***") {
		        header('location: ldapusers.php');
			  } elseif($uname == "***" && $pass == "***") {
				      header('location: ldapusers.php');
				        } else {
						    echo '<script>alert("Invalid username/password")</script>';
						      }
}
?>

