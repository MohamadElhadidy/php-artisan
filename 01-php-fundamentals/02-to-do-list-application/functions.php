<?php 


$message = '';
function addTask(string $task)    {

    $_SESSION['tasks'][] = [
        'task' => $task,
        'status' => 'pending'
    ];
    return "Task '$task' added successfully.";
}

function completeTask(int $taskId) : string {
    if (isset($_SESSION['tasks'][$taskId])) {
        $_SESSION['tasks'][$taskId]['status'] = 'completed';
        return "Task with ID $taskId marked as complete.";
    }
    return "Task with ID $taskId not found.";
}


function removeTask(int $taskId) : string {
    if (isset($_SESSION['tasks'][$taskId])) {
        unset($_SESSION['tasks'][$taskId]);
        return "Task with ID $taskId removed successfully.";
    }
    return "Task with ID $taskId not found.";
}



if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && (isset($_POST['task']) || isset($_POST['task_id']))) {
    $action = $_POST['action'];
    $task = trim($_POST['task']) ?? null;
    $taskId = $_POST['task_id'] ?? null;

    switch ($action) {
        case 'add_task':
            $message = addTask($task);
            break;
        case 'complete_task':
            $message = completeTask($taskId);
            break;
        case 'remove_task':
           $message = removeTask($taskId);
            break;
        default:
            $message = "Invalid action.";
    }

    header("Location: index.php?message=" . urlencode($message));
    exit();

}else{
    $message = "No action performed.";
    header("Location: index.php?message=" . urlencode($message));
    exit();
}

