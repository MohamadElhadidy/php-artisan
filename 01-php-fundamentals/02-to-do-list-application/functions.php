<?php

function addTask($task)
{
    $_SESSION["tasks"][] = [
        "title" => $task,
        "status" => "pending"
    ];

    return 'Task added successfully';
}

function completeTask($taskId)
{
    $_SESSION["tasks"][$taskId]["status"] = "done";

    return 'Task completed successfully';
}

function uncompleteTask($taskId)
{
    $_SESSION["tasks"][$taskId]["status"] = "pending";

    return 'Task uncompleted successfully';
}

function deleteTask($taskId)
{
    unset($_SESSION["tasks"][$taskId]);
    $_SESSION["tasks"] = array_values($_SESSION["tasks"]); // Reindex
    return 'Task deleted successfully';
}


function getTasks(): array
{
    return $_SESSION["tasks"] ?? [];
}
