<?php
include 'empcon.php';
if(isset($_POST['Employee_No'])){
    $employee = mysqli_real_escape_string($con,$_POST['Employee_No']);
    $query = "select count(*) as cntUser from ldap where Employee_No='".$employee."'";
    $result = mysqli_query($con,$query);
    $response = "<span style='color: green;'></span>";
    if(mysqli_num_rows($result)){
        $row = mysqli_fetch_array($result);
        $count = $row['cntUser'];
    if($count > 0){
        $response = "<span style='color: red;'>This employee no already exists.</span>";
        }
      }
    echo $response;
    die;
}
?>

<?php
include 'empcon.php';
if(isset($_POST['Mobile_No'])){
    $mobileno = mysqli_real_escape_string($con,$_POST['Mobile_No']);
    $query = "select count(*) as cntUser from ldap where Mobile_No='".$mobileno."'";
    $result = mysqli_query($con,$query);
    $response = "<span style='color: green;'></span>";
    if(mysqli_num_rows($result)){
        $row = mysqli_fetch_array($result);
        $count = $row['cntUser'];
    if($count > 0){
        $response = "<span style='color: red;'>This mobile no already exists.</span>";
        }
      }
    echo $response;
    die;
}
?>
<?php
include 'empcon.php';
if(isset($_POST['Email_id'])){
    $email = mysqli_real_escape_string($con,$_POST['Email_id']);
    $query = "select count(*) as cntUser from ldap where Email_id='".$email."'";
    $result = mysqli_query($con,$query);
    $response = "<span style='color: green;'></span>";
    if(mysqli_num_rows($result)){
        $row = mysqli_fetch_array($result);
        $count = $row['cntUser'];
	if($count > 0){
		//$response=<font color="#000000" size="-4" style="font-weight:bold">(For summer internship,enter your college rollno)</font>;
       $response = "<span style='color: red;' >This email id already exists.</span>";
        }
      }
    echo $response;
    die;
}
?>

