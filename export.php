<?php
      //export.php  
 if(isset($_POST["export"]))
 {
      $connect = mysqli_connect("localhost", "root", "Password1", "llddaapp");
      header('Content-Type: text/csv; charset=utf-8');
      // header('Content-Disposition: attachment');
      header("Content-Disposition: attachment; filename=my_csv_filename.csv");
      $output = fopen("php://output", "w");
      fputcsv($output, array('id','Name', 'Employee_No', 'Department','Faculty','Designation', 'facultymail', 'Validity_Date','Phone_no','Mobile_No','Email_id','uid','registration_date','activation','Filename'));
      $query = "SELECT * from ldap ORDER BY id ASC";
      $result = mysqli_query($connect, $query);
      while($row = mysqli_fetch_assoc($result))
      {
           fputcsv($output, $row);
      }
      fclose($output);
 }
 ?>
