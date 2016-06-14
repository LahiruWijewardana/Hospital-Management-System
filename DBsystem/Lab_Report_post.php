<html>
	<head>
		<title>LAB REPORT POST</title>
	</head>
	
	<style>
 			body {
              			  background-image: url(labreport.jpg);            
               			  background-size: 42.5%;
              			  background-origin: content;
             			}
	</style>
 
	<body>
		<h1>Lab Report Information</h1>
		<?php
  			$report_no=$_POST['Report_No'];
			$category=$_POST['category'];
			$date = $_POST['date'];
			$patient=$_POST['patient'];
			$doc=$_POST['doc'];
			//$mobile=$_POST['mobile'];
			//$home=$_POST['home'];
			//$personal_doc = $_POST['personal_doc'];
			$Description = $_POST['comments'];
			
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
		
			
			$sql = "INSERT INTO LAB_REPORT
			(Report_No,Category,Date,Patient_ID,Doc_ID,Description)
			VALUES
			($report_no,'$category',$date,$patient,$doc,'$Description')";

			

			echo "<p>Successfully submitted the lab report</p>";
			echo "<p>Report No is : $report_no</p>";
			echo"<p>category is a $category & date is $date</p>";
			echo "<p>Authorized Doctor of this report is $doc</p>";

			
			/*
				if(!empty($_POST['extra'])){
				// Loop to store and display values of individual checked check box.
					foreach($_POST['extra'] as $selected){
					echo "*$selected"."</br>";
					}
				}
				
			
			echo "<p>Contact No</p>";
			echo "Home   : $home"."</br>";
			echo "Mobile : $mobile"."</br>";
			
			echo "<p>Patient's Personal Doctor's ID is $personal_doc</p>";
			*/
			if(!empty($Description)){
				echo "<p>The description about the lab results:</p>";
				echo "<p>$Description</p>";
			}
			
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();

		?>
	</body>
</html>