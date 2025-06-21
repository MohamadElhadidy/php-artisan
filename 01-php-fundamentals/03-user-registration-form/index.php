<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/1077/1077063.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (isset($_SESSION['errors'])):
        $errors = $_SESSION['errors'];
        foreach ($errors as $error):
            ?>
            <p><?= $error ?></p>
            <?php
        endforeach;
        unset($_SESSION['errors']);
    endif;
    ?>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <label for="image">Image</label>
        <input type="file" name="image" id="image">

        <label for="name">Name</label>
        <input type="text" name="name" id="name">

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password">


        <input type="submit" value="Register">
    </form>

    <?php
    if (isset($_SESSION['success'])): ?>
        <p><?= $_SESSION['success'] ?></p>
        
    <?php unset($_SESSION['success']); endif; ?>

</body>

</html>