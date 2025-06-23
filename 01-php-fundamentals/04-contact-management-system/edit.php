<?php
session_start();
require_once('db.php');

require_once "functions.php";
$id = (int) $_GET['id'];
$contact = get_contact($id);
$errors = [];

$old_first_name = $contact["first_name"];
$old_last_name = $contact["last_name"];
$old_email = $contact["email"];
$old_phone = $contact["phone"];
$old_address = $contact["address"];


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $first_name = htmlspecialchars(trim($_POST["first_name"]));
    $last_name = htmlspecialchars(trim($_POST["last_name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $address = htmlspecialchars(trim($_POST["address"]));

    //validate
    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($address)) {
        $errors[] = "All fields are required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid Email.";
    }

    if (!ctype_digit($phone) || strlen($phone) != 11) {
        $errors[] = "Invalid Phone Number.";
    }

    if (empty($errors)) {
        //check if email or number exists 
        $check = "SELECT * FROM contacts where (email = ? OR phone = ?) AND  id != ?";
        $check_stmt = $conn->prepare($check);
        $check_stmt->bind_param('sss', $email, $phone, $id);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            $errors[] = "Contact exists";
        } else {
            //insert data and redirect to index.php 
            $update = "UPDATE contacts SET first_name = ?, last_name = ? , email = ? , phone = ?, address = ? Where id = ?";
            $stmt = $conn->prepare($update);
            $stmt->bind_param('ssssss', $first_name, $last_name, $email, $phone, $address, $id);
            $stmt->execute();

            $_SESSION['success'] = 'Contact Updated successfuly ✅';

            header('Location: index.php');
            exit();
        }
    }
}



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
    <a href="index.php">Contacts</a>
    <?php foreach ($errors as $error): ?>
        <p><?= $error ?></p>
    <?php endforeach; ?>
    <form action="edit.php?id=<?= $id?>" method="post">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name"
            value="<?= htmlspecialchars($first_name ?? $old_first_name) ?>">

        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="<?= htmlspecialchars($last_name ?? $old_last_name) ?>">


        <label for="email">Email address</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($email ?? $old_email) ?>">

        <label for="phone">Phone number</label>
        <input type="text" name="phone" id="phone" pattern="\d{11}" maxlength="11"
            value="<?= htmlspecialchars($phone ?? $old_phone) ?>">


        <label for="address">Physical address</label>
        <textarea name="address" id="address"><?= htmlspecialchars($address ?? $old_address) ?></textarea>


        <input type="submit" value="Update Contact">

    </form>
</body>

</html>