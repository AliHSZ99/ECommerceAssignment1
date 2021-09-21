<html>
    <head>
        <title>Details</title>
    </head>
    <body>
        <?php

                print_r($data);
        ?>
        <h1>Personal Information</h1>
        First Name: <input disabled type="text" name="firstName" value='<?php echo $data->first_name ?>'>
        Last Name: <input disabled type="text" name="lastName" value='<?php echo $data->last_name ?>'>
        Note: <input disabled type="text" name="note" value='<?php echo $data->notes ?>'>
        <a href="/PersonController/index">Return to the list</a>
    </body>
</html>