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
				// echo $data[0]->firstName;
				// print_r($data);
				foreach($data as $person) {
					print_r($person);
					// SUPER DUPER IMPORTANT, THE DATA WE ARE ACCESSING IS NOT FROM THE CLASS, BUT FROM THE DATABASE. 
					echo $person->first_name;
					echo "
						<tr>
						</tr>";

						// <td>$person->personId</td>
						// <td>$person->firstName</td>
						// <td>$person->lastName</td>
						// <td>$person->note</td>

						// <a href='/Main/details/$person->personId'>Details</a>
							// <a href='/Main/edit/$person->personId'>Edit</a>
							// <a href='/Main/delete/$person->personId'>Delete</a>
				}
			?>

		</table>


	</body>
</html>