<?php
require_once('tcpdf/tcpdf.php'); 

if(isset($_POST["export"])) {
	    $connect = mysqli_connect("localhost", "root", "Password1", "llddaapp");
	        
	       
	        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	        $pdf->SetCreator(PDF_CREATOR);
		    $pdf->SetAuthor('Your Name');
		    $pdf->SetTitle('LDAP Data Export');
		        $pdf->SetHeaderData('', 0, 'LDAP Data Export', '');

		        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

			    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
				    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

				    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

				        $pdf->SetFont('helvetica', '', 11);

				        $pdf->AddPage();

					   
					    $pdf->Ln();
					    $header = array('id', 'Name', 'Employee_No', 'Department', 'Faculty', 'Designation', 'Validity_Date', 'Phone_No', 'Mobile_No', 'Email_id', 'Filename');
					        $pdf->MultiCell(0, 10, 'LDAP Data Export', 0, 'C');
					        $pdf->Ln();
						    $pdf->SetFont('helvetica', 'B', 10);
						    foreach ($header as $col) {
							            $pdf->Cell(30, 10, $col, 1, 0, 'C');
								        }
						        $pdf->Ln();

						        
						        $query = "SELECT * FROM ldap ORDER BY id ASC";
							    $result = mysqli_query($connect, $query);

							  
							    while($row = mysqli_fetch_assoc($result)) {
								            foreach ($row as $column) {
										                $pdf->Cell(30, 10, $column, 1, 0, 'C');
												        }
									            $pdf->Ln();
									        }

							       
							        $pdf->Output('ldap_data_export.pdf', 'D');
							        exit;
}
?>
