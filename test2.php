<?php
ob_start();
?>
<html>
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
  <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"-->
<script src="bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.validate.min.js"></script>
<link rel="stylesheet" href="style.css">
<script>
$(document).ready(function(){
$("#signup_form").validate();
$("#form1").validate();
});
</script>
<style>
div{
margin-right:2px;
margin-bottom:2px;
}
</style>
<?php
if(isset($_POST['username']) && isset($_POST['password']))
{
    $ldapuname = $_POST['username'];
    $ldappwd = $_POST['password'];	
if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/',
    $_GET['email']))
    {
      $email = $_GET['email'];
    }
if (isset($_GET['key']) && (strlen($_GET['key']) == 32))
//The Activation key will always be 32 since it is MD5 Hash
{
 $key = $_GET['key'];
}
// config
 $ldapserver = '10.24.0.127';
 $ldapuser   = 'cn=Admin,dc=ldap,dc=iitm,dc=ac,dc=in';
 $ldappass   = '00o00opio0+$0';
//$ldapserver = 'eldap.iitm.ac.in';
//$ldapuser   = 'cn=oaabind,ou=bind,dc=ldap,dc=iitm,dc=ac,dc=in';
//$ldappass   = 'D#4k%e5M*';
$ldaptree   = "DC=ldap,DC=iitm,DC=ac,DC=in";
// connect
$ldapconn = ldap_connect($ldapserver) or die("Could not connect to LDAP server.");
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
if($ldapconn) {
   // binding to ldap server
        $ldapbind = ldap_bind($ldapconn, $ldapuser , $ldappass) or die ("Error trying to bind: ".ldap_error($ldapconn));
// verify binding
if ($ldapbind) {
 // echo "LDAP bind successful...<br /><br />";
 $search_base[]= "ou=facilities,ou=employee,dc=ldap,dc=iitm,dc=ac,dc=in";
 $search_base[] ="ou=official1,ou=employee,dc=ldap,dc=iitm,dc=ac,dc=in";
 $search_base[] ="ou=browse,dc=ldap,dc=iitm,dc=ac,dc=in";
 $search_base[]="ou=faculty,ou=employee,dc=ldap,dc=iitm,dc=ac,dc=in";
 $search_base[]="ou=staff,ou=employee,dc=ldap,dc=iitm,dc=ac,dc=in";

 $conn[] = $ldapconn;
 $conn[] = $ldapconn;
 $conn[] = $ldapconn;
 $conn[] = $ldapconn;
 $conn[] = $ldapconn;


 $result = ldap_search($conn,$search_base, "cn=".$ldapuname) or die ("Error in search query: ".ldap_error($ldapconn));
          $search = false;
          foreach ($result as $value) {
          if(ldap_count_entries($ldapconn,$value)>0){
          $search = $value;
        // echo $search;
         break;
}
} 
if($search){
	$data = ldap_get_entries($ldapconn, $search);
       // echo "info";
        for ($i=0; $i<$data["count"]; $i++)
        {
          $userdn=$data[$i]["dn"];
         // echo $userdn;
	}
if($bind=@ldap_bind($ldapconn, $userdn, $ldappwd))
{
  $_SESSION['user'] = $ldapuname;
 // echo "bind true";
$servername = "localhost";
$username = "root";
$password = "Password1";
$dbname = "llddaapp";
$con = mysqli_connect($servername,$username,$password,$dbname);
if($con){
 // echo "connected";
}else{
 // echo "not connect";
}
// Perform query
$result = mysqli_query($con, "select * from ldap where email_id='$email' and activation='$key'");
$list = mysqli_query($con,"select * from ldap where email_id='$email' and activation='$key'");
while ($row = mysqli_fetch_assoc($result)) {
 //print_r($row);
    $name=$row['Name'];
    $employee=$row['Employee_No'];
    $department=$row['Department'];
    $facul=$row['Faculty'];
    $designation=$row['Designation'];
    $valid=$row['Validity_Date'];
    $phoneno=$row['Phone_No'];
    $mobileno=$row['Mobile_No'];
}
// Perform query

if ($result1 = mysqli_query($con, "select activation from ldap where email_id='$email'")) {
 // mysqli_free_result($result);

}
while ($row = mysqli_fetch_assoc($result1)) {
    $activation=$row['activation'];
}
if($activation!="")
{?>
<center>
<div class="container">
<form method="POST" action="activate.php" id="form1">
<div class="reg">
<p class="h2">USER INFORMATION</p>
<div class="row">
<div class="col-md-4">
<label for="name"class="form-label" >Name:</label>
<?php echo $name;echo "<br>";?></div><br><br></div>

<div class="row">
<div class="col-md-4">
<label for="emp"class="form-label">Employeeno:</label>
<?php echo $employee;echo "<br>";?></div><br><br></div>

<div class="row">
<div class="col-md-4">
<label for="dept"class="form-label">Department:</label><?php echo $department;echo"<br>";?></div><br><br></div>
<div class="row">
<div class="col-md-4">
<label for="validity"class="form-label">Validity Date:</label><?php echo $valid;echo "<br>";?></div><br><br></div>
<div class="row">
<div class="col-md-4">
<label for="phone"class="form-label"> Phone:</label><?php echo $phoneno;echo "<br>";?></div><br><br></div>
<div class="row">
<div class="col-md-4">
<label for="mobile"class="form-label">Mobile:</label><?php echo $mobileno;echo "<br>";?></div></div><br>
<?php if($designation=="Project Engineer" || $designation == "Project Assistant" || $designation == "Senior Project Assistant" || $designation == "Project Associate" || $designation == "Project Technician" || $designation == "Project Officer" || $designation == "Senior Project Officer" || $designation == "Project Manager" || $designation == "Program Manager" || $designation == "Advisor" || $designation == "Junior Executive" || $designation == "Senior Executive" || $designation == "Post Doctoral Fellow" || $designation == "Research Associate" || $designation == "Young Scientist" || $designation == "Senior Scientist" || $designation == "Women Scientist" || $designation == "Senior Research Fellow" || $designation == "Junior Research Fellow"
)
{
?>
<br>
<div class="row">
<div class="col-md-4">
<label for="uid"class="form-label">Enter uid number:</label></div>
<div class="col-md-4">
<input id="uino" name="uidno" class="form-control"required /></div></div><br>
<?php }
?>
<?php echo '<input id="email" type="hidden" name="email" value="'.$email.'" />'."&nbsp;&nbsp;&nbsp;&nbsp;";
       echo '<input id="key" type="hidden" name="key" value="'.$key.'" />'."&nbsp;&nbsp;&nbsp;&nbsp;";?>
<?php echo '&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" id= "submit" value="Approve" />';
?></div></div>
</form>
</center><?php

        }?>
<?php
    @ldap_close($ldapconn);
}
else
{
  echo "failed to login";
}
}
else
{
	$info = 'Invalid Username/Password';
	echo"$info";
} 
}
ldap_close($ldapconn);
}
}
else{
?>
</div>
</div>
<center>
<div class="container">
<form action="<?php echo htmlspecialchars($_SERVER[‘PHP_SELF’]); ?>" method="POST" id="signup_form">
<div class="reg">
<p class="h2">Use LDAP Login and LDAP Password</p>
<br>
<div class="row">
<div class="col-md-4">
<label for="username"class="form-label"><b>Username:</b></label></div>
<div class="col-md-6">
<input type="text" id="username" name="username" class="form-control"></div>
</div><br>
<div class="row">
<div class="col-md-4">
<label for="password"class="form-label"><b>Password:</b></label></div>
<div class="col-md-6">
<input type="password" id="password" name="password" class="form-control"></div>
</div>
<br>
<button type="submit" name="submit" value="Submit" />SUBMIT</button>
<hr>
<div class="note">
<p id="blink">NOTE</p>
</div>
<div="para">
<ul><li>If mailid is <font color="blue"><b>sanand@iitm.ac.in </b></font>username is <font color="blue"><b>sanand</b></font></li></ul></div>
</div>
</div>
</div>
</form> 
</center>
<?php } ?>
</body>
</html>
