<?php session_start(); ?>
<?php
require_once "get.php";
$contacts = get_contacts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management System</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/1077/1077063.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    if (isset($_SESSION['success'])): ?>
        <p><?= $_SESSION['success'] ?></p>
        <?php
        unset($_SESSION['success']);
    endif;
    ?>

    <a href="add.php">Add Contact</a>
    <?php if (!empty($contacts)): ?>
        <table>
            <thead>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Adress</th>
                <th></th>
            </thead>

            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?= $contact['first_name'] .' '. $contact['last_name']?></td>
                        <td><?= $contact['email']?></td>
                        <td><?= $contact['phone']?></td>
                        <td><?= $contact['address']?></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    <?php endif; ?>
</body>

</html>