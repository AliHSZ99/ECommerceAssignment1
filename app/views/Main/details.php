<html>
    <head>
        <title>Details</title>
    </head>
    <body>
        <h1>Personal Information</h1>

        First Name: <input type="text" name="firstName" value='<?php echo $data->firstName?>'>
        Last Name: <input type="text" name="lastName" value='<?php echo $data->lastName?>'>
        Note: <input type="text" name="note" value='<?php echo $data->note?>'>

        <a href="/Main/index">Return to the list</a>
    </body>
</html>