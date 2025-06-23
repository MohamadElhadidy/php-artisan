<?php
session_start();
require_once('db.php');

require_once "functions.php";
$id = (int) $_GET['id'];
$contact = get_contact($id);

if (!$contact) {
    $_SESSION['success'] = 'Contact Don\'t exist';

    header('Location: index.php');
    exit();
} else {



    //check if email or number exists 
    $stmt = $conn->prepare("DELETE  FROM contacts where  id = ?");
    $stmt->bind_param('s', $id);
    if ($stmt->execute()) {
        $_SESSION['success'] = 'Contact Deleted successfuly ✅';

        header('Location: index.php');
        exit();
    }





}

