<html>
	<head>
		<title>Main Page</title>
	</head>
	<body>
	<a href="/PersonController/insertPersonController">Add a new person</a>
		<table>
			<tr>
				<th>Person ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Actions</th>
			</tr>

			<?php
				foreach($data as $person) {
					print_r($person);
					// SUPER DUPER IMPORTANT, THE DATA WE ARE ACCESSING IS NOT FROM THE CLASS, BUT FROM THE DATABASE. 
					echo $person->first_name;
					echo "
						<tr>
							<td>$person->person_id</td>
							<td>$person->first_name</td>
							<td>$person->last_name</td>
							<td>$person->notes</td>

							<a href='/PersonController/detailsPersonController/$person->person_id'>Details</a>
							<a href='/PersonController/editPersonController/$person->personId'>Edit</a>
							<a href='/PersonController/deletePersonController/$person->personId'>Delete</a>
						</tr>";

						

						
				}
			?>

		</table>


	</body>
</html>