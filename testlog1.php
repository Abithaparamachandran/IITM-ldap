

<html>

<head>

<meta charset="UTF-8">

<meta charset="UTF-8">

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>



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

$ldapserver = 'eldap.iitm.ac.in';

$ldapuser   = 'cn=oaabind,ou=bind,dc=ldap,dc=iitm,dc=ac,dc=in';

$ldappass   = 'D#4k%e5M*';

$ldaptree   = "DC=ldap,DC=iitm,DC=ac,DC=in";



// connect

$ldapconn = ldap_connect($ldapserver) or die("Could not connect to LDAP server.");

ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);



if($ldapconn) {

    // binding to ldap server

    //$ldapbind = ldap_bind($ldapconn, $ldapuser, $ldappass) or die ("Error trying to bind: ".ldap_error($ldapconn));



        $ldapbind = ldap_bind($ldapconn, $ldapuser , $ldappass) or die ("Error trying to bind: ".ldap_error($ldapconn));





    // verify binding

    if ($ldapbind) {

       // echo "LDAP bind successful...<br /><br />";

      

 $search_base[]= "ou=facilities,ou=employee,dc=ldap,dc=iitm,dc=ac,dc=in";

 $search_base[] ="ou=project,ou=employee,dc=ldap,dc=iitm,dc=ac,dc=in";

// $dn[]='ou=facilities,ou=employee,dc=ldap,dc=iitm,dc=ac,dc=in';

// $dn[]='ou=projectcc,ou=employee,dc=ldap,dc=iitm,dc=ac,dc=in';



    $conn[] = $ldapconn;

    $conn[] = $ldapconn;







        $result = ldap_search($conn,$search_base, "cn=".$ldapuname) or die ("Error in search query: ".ldap_error($ldapconn));



        $search = false;



foreach ($result as $value) {

    if(ldap_count_entries($ldapconn,$value)>0){

        $search = $value;

        break;

    }

} 





if($search){

    $data = ldap_get_entries($ldapconn, $search);

    echo "info";

    for ($i=0; $i<$data["count"]; $i++)

    {

            $userdn=$data[$i]["dn"];

            echo $userdn;

    }



    if($bind=@ldap_bind($ldapconn, $userdn, $ldappwd))

    {

            $_SESSION['user'] = $ldapuname;

            echo "bind true";



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

//echo "Mail id is".$email;

//echo "select * from ldap where  email_id='$email' and activation='$key'";



// Perform query

$result = mysqli_query($con, "select * from ldap where email_id='$email' and activation='$key'");

  //echo "Returned rows are: " . mysqli_num_rows($result);

  // Free result set

  //mysqli_free_result($result);

//}





$list = mysqli_query($con,"select * from ldap where email_id='$email' and activation='$key'");

//echo $list;

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

//echo "select activation from ldap where email_id='$email'";

//$result1=mysqli_query($con,"select activation from ldap where email_id='$email'");

//echo $result1;



// Perform query

if ($result1 = mysqli_query($con, "select activation from ldap where email_id='$email'")) {

 // echo "Returned rows are: " . mysqli_num_rows($result);

  // Free result set

 // mysqli_free_result($result);

}



while ($row = mysqli_fetch_assoc($result1)) {

         $activation=$row['activation'];

}

//echo "<br>Activation is ".$activation;

if($activation!="")

{?>

<center>

<div class="container">

<form method="POST" action="activate.php" id="form1">

<div class="reg">

<p class="h2">USER INFORMATION</p>

<div class="row">

<div class="col-md-6">

<label for="name"class="form-label" >Name:</label><?php echo $name;echo "<br>";?></div><br><br></div>

<div class="row">

<div class="col-md-4">

<label for="emp"class="form-label">Employeeno:</label><?php echo $employee;echo "<br>";?></div><br><br></div>

<div class="row">

<div class="col-md-4">

<label for="dept"class="form-label">Department:</label><?php echo $department;echo "<br>";?></div><br><br></div>

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

<div class="col-md-6">

<input id="uino" name="uidno" class="required" /></div></div>

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



            echo "bind false";

     }



}



else

{

    $info = 'No results found';

} 








    }

}
?>
<div>
<?php
	//echo "am here";
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
//echo "Mail id is".$email;
//echo "select * from ldap where  email_id='$email' and activation='$key'";

// Perform query
$result = mysqli_query($con, "select * from ldap where email_id='$email' and activation='$key'");
  //echo "Returned rows are: " . mysqli_num_rows($result);
  // Free result set
  //mysqli_free_result($result);
//}


$list = mysqli_query($con,"select * from ldap where email_id='$email' and activation='$key'");
//echo $list;
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
//echo "select activation from ldap where email_id='$email'";
//$result1=mysqli_query($con,"select activation from ldap where email_id='$email'");
//echo $result1;

// Perform query
if ($result1 = mysqli_query($con, "select activation from ldap where email_id='$email'")) {
 // echo "Returned rows are: " . mysqli_num_rows($result);
  // Free result set
 // mysqli_free_result($result);
}

while ($row = mysqli_fetch_assoc($result1)) {
         $activation=$row['activation'];
}
//echo "<br>Activation is ".$activation;
if($activation!="")
{?>
<center>
<div class="container">
<form method="POST" action="activate.php" id="form1">
<div class="reg">
<p class="h2">USER INFORMATION</p>
<div class="row">
<div class="col-md-6">
<label for="name"class="form-label" >Name:</label><?php echo $name;echo "<br>";?></div><br><br></div>
<div class="row">
<div class="col-md-4">
<label for="emp"class="form-label">Employeeno:</label><?php echo $employee;echo "<br>";?></div><br><br></div>
<div class="row">
<div class="col-md-4">
<label for="dept"class="form-label">Department:</label><?php echo $department;echo "<br>";?></div><br><br></div>
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
<div class="col-md-6">
<input id="uino" name="uidno" class="required" /></div></div>
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
}else{
echo "Authentication Failed";
}
else
{
    	$msg = "Invalid email address / password";
        echo $msg;
}
//}
else{
?>
</div>
</div>
<center>
<div class="container">
<form action="<?php echo htmlspecialchars($_SERVER[‘PHP_SELF’]); ?>" method="POST" id="signup_form">
<div class="reg">
<p class="h2">Use ADS Login and ADS Password</p>
<div class="row">
<div class="col-md-4">
<label for="username"class="form-label">UserName*:</label></div>
<div class="col-md-6">
<input id="username" type="text" name="username" class="form=control"></div>
</div>
<div class="row">
<div class="col-md-4">
<label for="password"class="form-label">Password*:</label></div>
<div class="col-md-6">
<input id="password" type="password" name="password" class="form-control"></div>
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
