<html>
	<head>
		<title>DOCTOR POST</title>
	</head>
	
	<style>
 			body {
              			  background-image: url(doctor.jpg);            
               			  background-size: 160%;
              			  background-origin: content;
             			}
	</style>
 
	<body>
		<h1>Doctor Information</h1>
		<?php
  			$Doc_ID=$_POST['Doc_ID'];
			$fname=$_POST['fname'];
			//$Gender = $_POST['Male'];
			//$birthday=$_POST['birthday'];
			$address=$_POST['address'];
			$mobile=$_POST['mobile'];
			$home=$_POST['home'];
			//$personal_doc = $_POST['personal_doc'];
			//$Disease = $_POST['comments'];
			
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
		
			
			$sql = "INSERT INTO DOCTOR
			(DOC_ID, DOC_Name, Address, Contact_No_Mobile, Contact_No_Home)
			VALUES
			($Doc_ID, '$fname', '$address', '$mobile', '$home')";
			

			echo "<p>Thank you, $fname for registering in our Hospital System</p>";
			echo "<p>Doctor's ID is : $Doc_ID</p>";
			//echo"<p>Patient is a $Gender & date of birth is $birthday</p>";
			echo "<p>Address of the doctor is $address</p>";

			
			/*
				if(!empty($_POST['extra'])){
				// Loop to store and display values of individual checked check box.
					foreach($_POST['extra'] as $selected){
					echo "*$selected"."</br>";
					}
				}
				
			*/	
			echo "<p>Contact No</p>";
			echo "Home   : $home"."</br>";
			echo "Mobile : $mobile"."</br>";
			/*
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