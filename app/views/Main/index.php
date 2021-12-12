<html>
	<head>
		<title>Main Page</title>
	</head>
	<body>
	<a href="/PersonController/insertPersonController">Add a new person</a>
		<table border="1">
			<tr>
				<th>Person ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Notes</th>
				<th>Actions</th>
			</tr>

			<?php
			
				$person = new \app\models\Person();
				
				foreach($data as $person) {
					// SUPER DUPER IMPORTANT, THE DATA WE ARE ACCESSING IS NOT FROM THE CLASS, BUT FROM THE DATABASE. 
					echo "
						<tr>
							<td>$person->person_id</td>
							<td>$person->first_name</td>
							<td>$person->last_name</td>
							<td>$person->notes</td>
							<td>
								<a href='/PersonController/detailsPersonController/$person->person_id'>Details</a>
								<a href='/PersonController/editPersonController/$person->person_id'>Edit</a>
								<a href='/PersonController/deletePersonController/$person->person_id'>Delete</a>
							</td>
						</tr>";
						
				}
			?>

		</table>


	</body>
</html>