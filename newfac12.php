
<?php
if ($_GET['dept_1'] != "select") {
    $name = $_GET['dept_1'];
    // Case 1: Data Science and Artificial Intelligence
    if ($name == "Data Science and Artificial Intelligence") {
        $dsai_faculty = [
            "arunkt@iitm.ac.in
" => "Arun K. Tangirala",
            "arunr@iitm.ac.in
" => "Arun Rajkumar",
            "sbalaji@iitm.ac.in
" => "Balaji S Srinivasan",
            "ravib@iitm.ac.in
" => "Balaraman Ravindran",
            "chandrashekar@iitm.ac.in
" => "Chandra Shekar Lakshminarayanan",
            "gankrish@iitm.ac.in
" => "Ganapathy Krishnamurthi",
            "gitakrishnan@iitm.ac.in
" => "Gitakrishnan Ramadurai",
            "hariguru@iitm.ac.in
" => "Harish Guruprasad",
            "kraman@iitm.ac.in
" => "Karthik Raman",
            "lnt@iitm.ac.in
" => "Lakshmi Narasimhan",
            "miteshk@iitm.ac.in
" => "Mitesh M. Khapra",
            "nandan@iitm.ac.in
" => "Nandan Sudarsanam",
            "niravbhatt@iitm.ac.in
" => "Nirav Bhatt",
            "raghur@iitm.ac.in
" => "Raghunathan Rengaswamy",
            "sivaambi@iitm.ac.in
" => "Sivaram Ambikasaran",
            "krishnap@iitm.ac.in
" => "Krishna Pillutla"
        ];
        foreach ($dsai_faculty as $email => $prof) {
            $label = $prof . " [$email]";
            echo "<option value=\"$label\">$label</option>";
        }
    // Case 2: Medical Sciences and Technology
    } elseif ($name == "Medical Sciences and Technology") {
        $med_faculty = [
            "boby@iitm.ac.in
" => "Boby George",
            "rkkumar@iitm.ac.in
" => "Krishnakumar R",
            "srikanth@iitm.ac.in
" => "Srikanth Vedantam",
            "schakra@iitm.ac.in
" => "Srinivasa Chakravarthy V",
            "anu@iitm.ac.in
" => "Anubama Rajan",
            "spradeeba@iitm.ac.in
" => "Pradeeba Sridar",
            "sunilboda@iitm.ac.in
" => "Sunil Kumar Boda"
        ];
        foreach ($med_faculty as $email => $prof) {
            $label = $prof . " [$email]";
            echo "<option value=\"$label\">$label</option>";
        }
    // Case 3: All other departments
    } else {
        $servername = "***";
        $username = "***";
        $password = "***";
        $databasename = "***";
        $conn = new mysqli($servername, $username, $password, $databasename);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $ldap_depts = [
            "Aerospace Engineering", "Applied Mechanics", "Bio-Technology", "Civil Engineering",
            "Chemical Engineering", "Computer Science and Engg.", "Chemistry", "Engineering Design",
            "Electrical Engineering", "Humanities and Social Sciences", "Mathematics",
            "Mechanical Engineering", "Metallurgical and Materials Engineering", "Management Studies",
            "Ocean Engineering", "Physics"
        ];
        if (in_array($name, $ldap_depts)) {
            $queryy = "SELECT departmentcode FROM *** WHERE departmentname='$name'";
            $result1 = $conn->query($queryy);
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $code = $row1['departmentcode'];
            }
            $ldapserver = '***';
            $ldapuser   = '***';
            $ldappass   = '***';
            $ldapconn = ldap_connect($ldapserver) or die("Could not connect to LDAP server.");
            ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
            if ($ldapconn) {
                $ldapbind = ldap_bind($ldapconn, $ldapuser, $ldappass) or die("Error trying to bind: " . ldap_error($ldapconn));
                if ($ldapbind) {
                    $dn = "ou=$code,ou=faculty,ou=People,dc=ldap,dc=iitm,dc=ac,dc=in";
                    $filterr = "cn=*";
                    $srr = ldap_search($ldapconn, $dn, $filterr);
                    $infoo = ldap_get_entries($ldapconn, $srr);
                    for ($i = 0; $i < $infoo["count"]; $i++) {
                        @$man[] = $infoo[$i]["givenname"][0];
                        @$emp[] = $infoo[$i]["mail"][0];
                    }
                    if (!empty($emp) && !empty($man)) {
                        $name_map = array_combine($emp, $man);
                        $unique_users = array_unique($name_map);
                        foreach ($unique_users as $email => $prof) {
                            $label = $prof . " [$email]";
                            echo "<option value=\"$label\">$label</option>";
                        }
                    }
                }
            }
        } else {
            // Fallback to dept head from ** table
            $queryy2 = "SELECT Head FROM *** WHERE Dept='$name'";
            $result2 = $conn->query($queryy2);
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $user = $row2['Head'];
                echo "<option value=\"$user\">$user</option>";
            }
        }
    }
}
?>
