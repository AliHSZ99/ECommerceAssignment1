<html>
    <head>
        <title>Editing Person Info</title>
    </head>

    <body>
        <form action="" method="post">
            New First Name: <input type="text" name="newFirstName" value='<?php echo $data->firstName ?>'>
            New Last Name: <input type="text" name="newLastName" value='<?php echo $data->lastName?>'>
            New Note: <input type="text" name="newNote" value='<?php echo $data->note ?>'>
            <input type="submit" name="save" value="Save Changes">
        </form>
    </body>

</html>