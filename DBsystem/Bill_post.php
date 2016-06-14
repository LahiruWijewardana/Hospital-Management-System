<html>
	<head>
		<title>Bill Form</title>
	</head>
	
	<style>
 		       body {
              			  background-image: url(cash.jpg);            
               			  background-size: 115%;
              			  background-origin: content;
						 						
             			}
	</style>
	
	<body>
		<h1>FILLED BILL FORM</h1>
		<?php
			$bill_no=$_POST['Bill_No'];
			$patient_id=$_POST['patient'];
			$docter_id=$_POST['Doc'];
			$days_addmited=$_POST['days'];
			$lab_charges=$_POST['Lab'];
			$doc_charges=$_POST['Doc_C'];
			$nurs_charges=$_POST['Nursing'];
			$room_charges=$_POST['Room'];
			$med_charges=$_POST['Medicine'];
			$op_charges=$_POST['Operation'];
			$tot_charges=$_POST['Total'];
			$Date_Addmited=$_POST['Date'];
			$B_comments=$_POST['comments'];
			
			$servername = "localhost";
			$username = "root";
			$password = "1234";
			$dbname = "HospitalManagement";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
		
			
			$sql = "INSERT INTO BILL
			(Bill_No,Patient_ID,Doc_ID,Days,Lab_Charge,Doc_Charge,Nursing_Charge,Room_Charge,Medicine_Charge,Operation_Charge,Total_Charge,Date,Description)
			VALUES
			($bill_no,$patient_id,$docter_id,$days_addmited,$lab_charges,$doc_charges,$nurs_charges,$room_charges,$med_charges,$op_charges,$tot_charges,$Date_Addmited,'$B_comments')";
			
			
			
			echo "<p>Bill number             :              $bill_no </p>";
			echo "<p>Patient ID              :             $patient_id </p>";
			echo "<p>Doctor ID               :             $docter_id </p>";
			echo "<p>Number of days admitted :             $days_addmited </p>";
			echo "<p>Lab charges             :             $lab_charges </p>";
			echo "<p>Doctor charges          :             $doc_charges </p>";
			echo "<p>Nursing charges         :             $nurs_charges </p>";
			echo "<p>Room charges            :             $room_charges </p>";
			echo "<p>Medicine charges        :             $med_charges </p>";
			echo "<p>Operation charges       :             $op_charges </p>";
			echo "<p>Total charges           :             $tot_charges </p>";
			echo "<p>Date                    :             $Date_Addmited </p>";
			echo "<p>Comments                :             $B_comments </p>";

			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
			
		?>
	</body>
</html>