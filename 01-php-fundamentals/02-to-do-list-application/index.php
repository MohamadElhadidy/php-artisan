<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List Application</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/190/190411.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Irish+Grover&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <h1>To-Do List Application</h1>
        <div class="todo-list">
            <div class="add-task-form">
                <form action="functions.php" method="POST">
                    <input type="hidden" name="action" value="add_task">
                    <input class="task-input" type="text" name="task" placeholder="Add a new task..." required>
                    <button type="submit" class="add-task">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0 7.5H7.5V0H16.5V7.5H24V16.5H16.5V24H7.5V16.5H0V7.5ZM10.5 13.5V21H13.5V13.5H21V10.5H13.5V3H10.5V10.5H3V13.5H10.5Z"
                                fill="black" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="todo-header">
                <svg width="24" height="24" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.99927 14.5C5.2826 14.5 5.52027 14.404 5.71227 14.212C5.90427 14.02 5.99993 13.7827 5.99927 13.5C5.9986 13.2173 5.9026 12.98 5.71127 12.788C5.51993 12.596 5.2826 12.5 4.99927 12.5C4.71593 12.5 4.4786 12.596 4.28727 12.788C4.09593 12.98 3.99993 13.2173 3.99927 13.5C3.9986 13.7827 4.0946 14.0203 4.28727 14.213C4.47993 14.4057 4.71727 14.5013 4.99927 14.5ZM4.99927 10.5C5.2826 10.5 5.52027 10.404 5.71227 10.212C5.90427 10.02 5.99993 9.78267 5.99927 9.5C5.9986 9.21733 5.9026 8.98 5.71127 8.788C5.51993 8.596 5.2826 8.5 4.99927 8.5C4.71593 8.5 4.4786 8.596 4.28727 8.788C4.09593 8.98 3.99993 9.21733 3.99927 9.5C3.9986 9.78267 4.0946 10.0203 4.28727 10.213C4.47993 10.4057 4.71727 10.5013 4.99927 10.5ZM4.99927 6.5C5.2826 6.5 5.52027 6.404 5.71227 6.212C5.90427 6.02 5.99993 5.78267 5.99927 5.5C5.9986 5.21733 5.9026 4.98 5.71127 4.788C5.51993 4.596 5.2826 4.5 4.99927 4.5C4.71593 4.5 4.4786 4.596 4.28727 4.788C4.09593 4.98 3.99993 5.21733 3.99927 5.5C3.9986 5.78267 4.0946 6.02033 4.28727 6.213C4.47993 6.40567 4.71727 6.50133 4.99927 6.5ZM7.99927 14.5H13.9993V12.5H7.99927V14.5ZM7.99927 10.5H13.9993V8.5H7.99927V10.5ZM7.99927 6.5H13.9993V4.5H7.99927V6.5ZM1.99927 18.5C1.44927 18.5 0.978601 18.3043 0.587268 17.913C0.195934 17.5217 -6.57552e-05 17.0507 -0.000732422 16.5V2.5C-0.000732422 1.95 0.195268 1.47933 0.587268 1.088C0.979268 0.696667 1.44993 0.500667 1.99927 0.5H15.9993C16.5493 0.5 17.0203 0.696 17.4123 1.088C17.8043 1.48 17.9999 1.95067 17.9993 2.5V16.5C17.9993 17.05 17.8036 17.521 17.4123 17.913C17.0209 18.305 16.5499 18.5007 15.9993 18.5H1.99927Z"
                        fill="black" />
                </svg>
                <h2>To-Do</h2>
            </div>
            <span class="message">
                <?php
                if (isset($_GET['message'])) {
                    echo htmlspecialchars($_GET['message']);
                }
                ?>
            </span>

            <ul class="task-list">
                <?php
                $tasks = include "tasks.php"; // Assuming tasks.php returns an array of tasks
                // Sample tasks for demonstration
                foreach ($tasks as $task):
                    ?>
                <div class="line"></div>
                <li>
                    <form action="functions.php" method="POST">
                        <input type="hidden" name="action" value="complete_task">
                        <button type="submit" class="add-task"></button>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.9993 21.6C9.45319 21.6 7.01139 20.5886 5.21104 18.7882C3.41069 16.9879 2.39927 14.5461 2.39927 12C2.39927 9.45392 3.41069 7.01212 5.21104 5.21178C7.01139 3.41143 9.45319 2.4 11.9993 2.4C14.5453 2.4 16.9871 3.41143 18.7875 5.21178C20.5878 7.01212 21.5993 9.45392 21.5993 12C21.5993 14.5461 20.5878 16.9879 18.7875 18.7882C16.9871 20.5886 14.5453 21.6 11.9993 21.6ZM11.9993 0C10.4234 0 8.86297 0.310389 7.40707 0.913446C5.95116 1.5165 4.62829 2.40042 3.51399 3.51472C1.26355 5.76516 -0.000732422 8.8174 -0.000732422 12C-0.000732422 15.1826 1.26355 18.2348 3.51399 20.4853C4.62829 21.5996 5.95116 22.4835 7.40707 23.0866C8.86297 23.6896 10.4234 24 11.9993 24C15.1819 24 18.2341 22.7357 20.4846 20.4853C22.735 18.2348 23.9993 15.1826 23.9993 12C23.9993 10.4241 23.6889 8.86371 23.0858 7.4078C22.4828 5.95189 21.5989 4.62902 20.4846 3.51472C19.3702 2.40042 18.0474 1.5165 16.5915 0.913446C15.1356 0.310389 13.5751 0 11.9993 0Z"
                                fill="black" />
                        </svg>
                    </form>

                    <?= $task; ?>

                    <form action="functions.php" method="POST" class="delete-task">
                        <input type="hidden" name="action" value="remove_task">

                        <svg width="27" height="24" viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.3333 0H5.66667C4.95942 0 4.28115 0.280951 3.78105 0.781048C3.28095 1.28115 3 1.95942 3 2.66667V21.3333C3 22.0406 3.28095 22.7189 3.78105 23.219C4.28115 23.719 4.95942 24 5.66667 24H24.3333C25.0406 24 25.7189 23.719 26.219 23.219C26.719 22.7189 27 22.0406 27 21.3333V2.66667C27 1.95942 26.719 1.28115 26.219 0.781048C25.7189 0.280951 25.0406 0 24.3333 0ZM19.8 18.6667L15 13.8667L10.2 18.6667L8.33333 16.8L13.1333 12L8.33333 7.2L10.2 5.33333L15 10.1333L19.8 5.33333L21.6667 7.2L16.8667 12L21.6667 16.8L19.8 18.6667Z"
                                fill="#D40000" />
                        </svg>
                    </form>
                </li>
                <?php
                endforeach;
                ?>
            </ul>
        </div>

    </div>
</body>

</html>