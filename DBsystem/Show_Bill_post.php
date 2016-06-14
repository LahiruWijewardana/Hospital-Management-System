<html>
	<head>
		<title>PATIENT POST</title>
	</head>
	
	<style>
	
	body {
              			  background-image: url(cash.jpg);            
               			  background-size: 115%;
              			  background-origin: content;
						  
						  
             }
			  table{color:white;}
	
	</style>
 
	<body>
		<h1>Payments Information</h1>
		<?php
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
		
			
			$sql = "SELECT * FROM BILL";
			$result = $conn->query($sql);
			
			
			if ($result->num_rows > 0) {
				
				echo"<table>";
				echo"<tr>";
				echo"<th>Bill No</th>";
				echo"<td></td>";
				echo"<th>Patient ID</th>";
				echo"<td></td>";
				echo"<th>Doctor ID</th>";
				echo"<td></td>";
				echo"<th>Lab Charge</th>";
				echo"<td></td>";
				echo"<th>Doctor Charge</th>";
				echo"<td></td>";
				echo"<th>Nursing Charge</th>";
				echo"<td></td>";
				echo"<th>Room Charge</th>";
				echo"<td></td>";
				echo"<th>Medicine Charge</th>";
				echo"<td></td>";
				echo"<th>Operation Charge</th>";
				echo"<td></td>";
				echo"<th>Total Charge</th>";
				echo"<td></td>";
				echo"<th>Date</th>";
				echo"<td></td>";
				echo"<th>Description</th>";
				echo"</tr>";
				
				
			// output data of each row
			while($row = $result->fetch_assoc()) {
					echo"<tr>";
					echo "<td>". $row["Bill_No"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Patient_ID"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Doc_ID"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Lab_Charge"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Doc_Charge"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Nursing_Charge"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Room_Charge"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Medicine_Charge"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Operation_Charge"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Total_Charge"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Date"]."</td>";
					echo"<td></td>";
					echo "<td>". $row["Description"]."</td>";
					echo"</tr>";
			}
			echo"</table>";
			} else {
				echo "0 results";
			}

			
			$conn->close();
		?>
	</body>
</html>