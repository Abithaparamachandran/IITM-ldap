<?php
//$_GET['dept_1']="Hospital";
if($_GET['dept_1']!="select" && $_GET['dept_1']!="select")
{
     $name = $_GET['dept_1'];
//echo $name;
//$name = "Hospital";

  $servername = "localhost";
  $username = "root";
  $password = "Password1";
  $databasename = "llddaapp";

  // CREATE CONNECTION
  $conn = new mysqli($servername,
    $username, $password, $databasename);

  // GET CONNECTION ERRORS
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
 // echo "before dept loop";

//mysql_connect('127.0.0.1', 'root', '123456') or die(mysql_error());
//mysql_select_db('ldaponline') or die(mysql_error());
if($name=="Aerospace Engineering" || $name=="Applied Mechanics" || $name=="Bio-Technology" || $name=="Civil Engineering" || $name=="Chemical Engineering" || $name=="Computer Science and Engg." || $name == "Chemistry" || $name=="Engineering Design" || $name=="Electrical Engineering" || $name=="Humanities and Social Sciences" || $name == "Mathematics" || $name == "Mechanical Engineering" || $name=="Metallurgical and Materials Engineering" || $name=="Management Studies" || $name=="Ocean Engineering" || $name == "Physics" )
{
	//echo "inside dept";
/*
                $list = mysql_query("SELECT departmentcode FROM dept where departmentname='$name'");
        while ($row = mysql_fetch_assoc($list)) {
                $code = $row['departmentcode'];}*/

    $queryy = "SELECT departmentcode FROM dept_1 where departmentname='$name'";

$result1 = $conn->query($queryy);
    While ($row1 = mysqli_fetch_assoc($result1)){
      $code = $row1['departmentcode'];}

// config
// $ldapserver='eservices1.iitm.ac.in';
   // $ldapuser="cn=Admin,dc=ldap,dc=iitm,dc=ac,dc=in";
    //$ldappass="00o00opio0+$0";

$ldapserver = '10.24.1.50';
$ldapuser   = 'cn=oaabind,ou=bind,dc=ldap,dc=iitm,dc=ac,dc=in';
$ldappass   = 'D#4k%e5M*';
//$ldapuser   = 'cn=oaabind,ou=bind,dc=ldap,dc=iitm,dc=ac,dc=in';
//$ldappass   = 'D#4k%e5M*';
$ldaptree   = "DC=ldap,DC=iitm,DC=ac,DC=in";
$ldapuname="ccprj05";
$ldappwd="abi27%tha";
// connect
$ldapconn = ldap_connect($ldapserver) or die("Could not connect to LDAP server.");
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

if($ldapconn) {
    // binding to ldap server
    //$ldapbind = ldap_bind($ldapconn, $ldapuser, $ldappass) or die ("Error trying to bind: ".ldap_error($ldapconn));

        $ldapbind = ldap_bind($ldapconn, $ldapuser , $ldappass) or die ("Error trying to bind: ".ldap_error($ldapconn));


    // verify binding
    if ($ldapbind) {
       echo "LDAP bind successful...".PHP_EOL;


$dn = "ou=$code,ou=faculty,ou=employee,dc=ldap,dc=iitm,dc=ac,dc=in";

//$justthese = array("ou","dn","mail");
$filter="(objectClass=organizationalunit)";
$sr = ldap_search($ldapconn, $dn, "ou=*");


$info = ldap_get_entries($ldapconn, $sr);

// List OUs
for ($i=0; $i < $info["count"]; $i++) {
	//echo $info[$i]["mail"][0] ."<br>";
$dnn=$info[$i]["dn"];
//echo $dnn."<br>";
//$filterr = "cn=*"; 




$filterr="cn=*";
//$justhesee = array("dn");
$srr = ldap_search($ldapconn, $dn, $filterr);
$infoo = ldap_get_entries($ldapconn, $srr);

for ($i=0; $i < $infoo["count"]; $i++) {
//	print_r($infoo);
	//@$uname[] = $infoo[$i]["$cn"][0];
	//echo $infoo[$i]["dn"];
	@$man[]=$infoo[$i]["givenname"][0];
	//echo $infoo;
@$emp[]=$infoo[$i]["mail"][0];	

   // echo $infoo[$i]["mail"][0]."<br>";
    
   // echo $infoo[$i]["mail"][0] ."<br>";
$name = array_combine($emp,$man);

                                          }
                $user=array_unique($name);
//                $user=array($name);

//echo $user;
                        ?>
<?php
                        foreach($user as $k => $user)
                        {
                        $user="$user"." "."[$k]";
                        ?>
                        <!--value="'.$row["public_desc"].'"-->
                        <?php echo '<option value="'.$user.'">'.$user.'</option>'; ?>
                        <?php
                        }
                        }

    }

}}
// SHOW ALL DATA
   /**     echo '<h1>Dump all data</h1><pre>';
        print_r($infoo);
echo '</pre>';**/
//break;
        else {

//echo "else loop";		
    $queryy2 = "SELECT Head FROM depthead where Dept='$name'";
        $result2 = $conn->query($queryy2);
while($row2 = mysqli_fetch_assoc($result2)){
 $user = $row2['Head'];}
//foreach($user as $user)
{
?>
<?php echo '<option value="'.$user.'">'.$user.'</option>'; ?>


<?php }}




}


                        ?>

