<html>
	<head>
		<title>PATIENT POST</title>
	</head>
	
	<style>
 			body {
              			  background-image: url(patient3.jpg);            
               			  background-size: 110%;
              			  background-origin: content;
             			}
	</style>
 
	<body>
		<h1>Patient Information</h1>
		<?php
  			$P_ID=$_POST['Patient_ID'];
			$fname=$_POST['fname'];
			$Gender = $_POST['Male'];
			$birthday=$_POST['birthday'];
			$address=$_POST['address'];
			$mobile=$_POST['mobile'];
			$home=$_POST['home'];
			$personal_doc = $_POST['personal_doc'];
			$Disease = $_POST['comments'];
			
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
		
			
			$sql = "INSERT INTO PATIENT
			(Patient_ID, Patient_Name, Gender, Birthday, Address, Contact_No_Home, Contact_No_Mobile, Doc_ID, Disease)
			VALUES
			($P_ID, '$fname', '$Gender', $birthday, '$address', '$home', '$mobile', $personal_doc, '$Disease')";
			

			echo "<p>Thank you, $fname for registering in our Hospital System</p>";
			echo "<p>Patient ID is : $P_ID</p>";
			echo"<p>Patient is a $Gender & date of birth is $birthday</p>";
			echo "<p>Address of the person is $address</p>";

			
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
			
			echo "<p>Patient's Personal Doctor's ID is $personal_doc</p>";
			
			if(!empty($Disease)){
				echo "<p>The description about the patient's illnesses:</p>";
				echo "<p>$Disease</p>";
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