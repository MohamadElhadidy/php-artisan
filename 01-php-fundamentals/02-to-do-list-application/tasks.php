<?php 
function getAllTasks() : array {
    // Code to retrieve all tasks
    return $_SESSION['tasks'] ?? [];
}
return getAllTasks();
