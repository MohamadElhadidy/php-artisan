<?php
require_once 'init.php';
require_once 'functions.php';


if (isset($_POST['taskId']) && is_numeric($_POST['taskId'])) {

    $message = completeTask(intval($_POST['taskId']));

    header("location: /?message=" . urlencode($message));
    exit();
}

header("location: /?message=" . urlencode("Task can't be empty"));
exit();