<html>
	<head>
		<title>room assigning</title>
	</head>
	
	<style>
 			body {
              			  background-image: url(room.jpg);            
               			  background-size: 100%;
              			  background-origin: content;
             			}
	</style>
	
	<body>
		<h1>ROOM ASSIGNING DATA</h1>
		<?php
			$room_number=$_POST['Room_No'];
			$type_of_room=$_POST['Type'];
			$ward_number=$_POST['ward'];
			$patient_id=$_POST['patient'];
			
			echo "<p>room number :  $room_number</p>";
			echo "<p>type of the room :  $type_of_room</p>";
			echo "<p>ward number :  $ward_number</p>";
			echo "<p>patient id number :  $patient_id</p>";
		?>
	</body>
</html>