<html>
	<head>
		<title>Main Page</title>
	</head>
	<body>
	<a href="/Main/addPerson">Add a new person</a>
		<table>
			<tr>
				<th>Person ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Actions</th>
			</tr>

			<?php
				foreach($data as $person) {
					echo "
						<tr>
							<td>$person->personId</td>
							<td>$person->firstName</td>
							<td>$person->lastName</td>
							<td>$person->note</td>

							<a href='/Main/details/$person->personId'>Details</a>
							<a href='/Main/edit/$person->personId'>Edit</a>
							<a href='/Main/delete/$person->personId'>Delete</a>
						</tr>";
				}
			?>

		</table>


	</body>
</html>