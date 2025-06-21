<?php
session_start();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $file = $_FILES['image'];
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $uploadDir = "uploads/";


    // Validate form inputs
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $errors[] = "All fields are required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is invalid";
    }
    if ($password != $confirm_password) {
        $errors[] = "Passwords don't match";
    }

    //validate file
    if ($file["error"] === UPLOAD_ERR_NO_FILE) {
        $errors[] = "Please upload a file.";
    } elseif ($file["error"] !== 0) {
        $errors[] = "Upload failed (Error code: {$file["error"]}).";
    } elseif ($file['size'] > 1 * 1024 * 1024) {
        $errors[] = "File too large.";
    } else {
        $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        $mime = mime_content_type($file['tmp_name']);

        $allowedExt = ['jpg', 'png', 'gif', 'pdf'];
        $allowedMime = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];

        if (!in_array($ext, $allowedExt) || !in_array($mime, $allowedMime)) {
            $errors[] = "Invalid file type.";
        }
    }

    if (empty($errors)) {
        $newfile = uniqid() . '.' . $ext;
        $target = $uploadDir . $newfile;

        if (!move_uploaded_file($file['tmp_name'], $target)) {
            $errors[] = "Failed to upload file.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $_SESSION['success'] = "The form is valid and file uploaded successfully.";
        }
    }

} else {
    $errors[] = $_SERVER['REQUEST_METHOD'] . "Method Not allowed";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
}


header("Location: index.php");
exit;

