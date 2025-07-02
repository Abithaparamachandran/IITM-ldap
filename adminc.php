<html>
<head>
<title>Admin Login Page</title>
<meta charset="utf-8">
<meta name="viewport"content="width"=device-width,initial-scale=1">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid">
 
<div class="page-header">
<img src="newlogo.png"class="img"alt="index"id="img">
</div>
<center>
<div class="container">
<form action="admin.php"method="POST"id="form">
<div class="reg">
<p class="h2">Admin Login</p>
<div class="row">
<div class="col-md-4">
<label for="uname"class="form-label"><b>Username</b></label></div>
<div class="col-md-6">
<input type="text"name="uname"class="form-control"auto complete="off"placeholder="Enter username">
</div>
</div>
<div class="row">
<div class="col-md-4">
<label for="password"class="form-label"><b>Password</b></label></div>
<div class="col-md-6">
<input type="text"name="pass"class="form-control"auto complete="off"placeholder="Enter password">
</div>
</div><br>
<button type="submit"name="submit"class="btn btn-primary"><b>Login</b></button>

</div>
</form>
</div>
</center>
<div class="footer">
<p>E-services Team,Computer Center</p>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
	$uname=$_POST["uname"];
	$pass=$_POST["pass"];

	if($uname=="eservices"&& $pass=="magicalsun23"){
		header('location:grid.php');
	}
	 if($uname=="abitha"&& $pass=="abitha"){
                header('location:grid.php');
        }

	else
	{
		echo'<script>alert("Invalid username/password")</script>';
	}
}
?>




