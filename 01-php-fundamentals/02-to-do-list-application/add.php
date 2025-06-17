<?php
require_once 'init.php';
require_once 'functions.php';

if (isset($_POST['task']) && !empty(trim($_POST['task']))) {

    $message = addTask($_POST['task']);

    header("location: /?message=". urlencode($message));
    exit();
}

header("location: /?message=". urlencode("Task can't be empty"));
exit();