<html>
	<head>
		<title>PATIENT POST</title>
	</head>
 
	<style>
 			body {
              			  background-image: url(lab.jpg);            
               			  background-size: 100%;
             			}
	</style>
 
	<body>
		<h1>Patient Information</h1>
		<?php
  			$lab_no=$_POST['lab_no'];
			$lname=$_POST['lab_name'];
			$Doc_ID = $_POST['Doc_ID'];
		/*	$birthday=$_POST['birthday'];
			$address=$_POST['address'];
			$mobile=$_POST['mobile'];
			$home=$_POST['home'];
			$personal_doc = $_POST['personal_doc'];
			$Disease = $_POST['comments'];
			*/
			
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
		
			
			$sql = "INSERT INTO LAB
			(Lab_No,Lab_Name,Head_Doc_ID)
			VALUES
			($lab_no,'$lname',$Doc_ID)";

			echo "<p>Lab is successfully registered in the system</p>";
			echo "<p>Lab No is : $lab_no</p>";
			echo"<p>Name of the lab is a $lname</p>";
			echo "<p>The ID of the Head Doctor is $Doc_ID</p>";

			
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
			
			if(!empty($Disease)){
				echo "<p>The description about the patient's illnesses:</p>";
				echo "<p>$Disease</p>";
			}
			*/
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
		?>
	</body>
</html>