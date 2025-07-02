<?php 
include "dbconfig.php";
$sql = "SELECT * FROM ldap";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
 <title>View Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<style>
.container
{
padding-right: 2120px;
margin-top:80px;
margin-bottom:80px;
border:none!important;
box-shadow:0 9px 50px 0 rgba(0,0,0,0.6);
width:100%;
background:#ebebe0;
}
</style>
</head>
<body>
<form method="post" action="export.php" align="center">
                     <input type="submit" name="export" value="CSV Export" class="btn btn-success" />

                </form>
<div class="container">
<h2>Users</h2>
<hr>
<table class="table">
<thead>
<tr>
<th>id</th>
<th>Name</th>
<th>Employee_No</th>
<th>active_status</th>
<th>Department</th>
<th>Faculty</th>
<th>Designation</th>
<th>Validity_Date</th>
<th>Phone_No</th>
<th>Mobile_No</th>
<th>Email_id</th>
<th>Filename</th>
<!--th>Username</th>
<th>Password</th>
<th>SendMail</th>
<th>Action</th-->
</tr>
</thead>
<tbody> 

        <?php
               if ($result->num_rows > 0) {
		      while ($row = $result->fetch_assoc()) {
        ?>
<tr>
<form method="POST" action="sendmail.php">
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['Name']; ?></td>
<td><?php echo $row['Employee_No']; ?></td>
<td><?php echo $row['activation']; ?></td>
<td><?php echo $row['Department']; ?></td>
<td><?php echo $row['Faculty']; ?></td>
<td><?php echo $row['Designation']; ?></td>
<td><?php echo $row['Validity_Date']; ?></td> 
<td><?php echo $row['Phone_No']; ?></td>
<td><?php echo $row['Mobile_No']; ?></td>
<td><?php echo $row['Email_id']; ?></td>
<td><?php echo $row['Filename']; ?></td>
<!--td><?php echo '<input type="text" name="username">'?></td>
<td><?php echo '<input type="text" name="password">'?></td>
<td><?php echo '<input type="text"name="mail">'?></td>
<td>
<input type="submit" value="mail"id=<?php echo $row['id'];?> name="sendmail"/></td-->
</tr>                       
</form>
       <?php      
		      }

            }

        ?>                

</tbody>
</table>
</div> 
</body>
</html>
