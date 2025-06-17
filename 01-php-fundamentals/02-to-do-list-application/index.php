<?php
require_once 'init.php';
require_once 'functions.php';

$tasks = getTasks();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List Application</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/190/190411.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Irish+Grover&family=Jua&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Irish+Grover&family=Jua&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>To Do List</h1>
        <?php if (isset($_GET['message'])): ?>
            <p class="message"><?= htmlspecialchars($_GET['message']) ?></p>
        <?php endif; ?>

        <form action="add.php" method="POST" class="add-form">
            <input type="text" name="task" id="task" placeholder="Add Task">
            <button type="submit">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="black" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 7.5H7.5V0H16.5V7.5H24V16.5H16.5V24H7.5V16.5H0V7.5ZM10.5 13.5V21H13.5V13.5H21V10.5H13.5V3H10.5V10.5H3V13.5H10.5Z"
                        fill="black" />
                </svg>
            </button>
        </form>

        <div class="task-list">
            <?php foreach ($tasks as $taskId => $task): ?>
                <div class="line"></div>
                <div class="task">

                    <?php if ($task['status'] !== 'done'): ?>
                        <form action="complete.php" method="POST">
                            <input type="hidden" name="taskId" value="<?= $taskId; ?>" />
                            <button type="submit">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="black" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.99927 18C7.87754 18 5.8427 17.1571 4.34241 15.6569C2.84212 14.1566 1.99927 12.1217 1.99927 10C1.99927 7.87827 2.84212 5.84344 4.34241 4.34315C5.8427 2.84285 7.87754 2 9.99927 2C12.121 2 14.1558 2.84285 15.6561 4.34315C17.1564 5.84344 17.9993 7.87827 17.9993 10C17.9993 12.1217 17.1564 14.1566 15.6561 15.6569C14.1558 17.1571 12.121 18 9.99927 18ZM9.99927 0C8.68605 0 7.38569 0.258658 6.17243 0.761205C4.95918 1.26375 3.85679 2.00035 2.9282 2.92893C1.05284 4.8043 -0.000732422 7.34784 -0.000732422 10C-0.000732422 12.6522 1.05284 15.1957 2.9282 17.0711C3.85679 17.9997 4.95918 18.7362 6.17243 19.2388C7.38569 19.7413 8.68605 20 9.99927 20C12.6514 20 15.195 18.9464 17.0703 17.0711C18.9457 15.1957 19.9993 12.6522 19.9993 10C19.9993 8.68678 19.7406 7.38642 19.2381 6.17317C18.7355 4.95991 17.9989 3.85752 17.0703 2.92893C16.1417 2.00035 15.0394 1.26375 13.8261 0.761205C12.6128 0.258658 11.3125 0 9.99927 0Z"
                                        fill="black" />
                                </svg>
                            </button>

                        </form>
                    <?php else: ?>
                        <form action="uncomplete.php" method="POST">
                            <input type="hidden" name="taskId" value="<?= $taskId; ?>" />
                            <button type="submit">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="#008829"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.99927 15L2.99927 10L4.40927 8.58L7.99927 12.17L15.5893 4.58L16.9993 6M9.99927 0C8.68605 0 7.38569 0.258658 6.17243 0.761205C4.95918 1.26375 3.85679 2.00035 2.9282 2.92893C1.05284 4.8043 -0.000732422 7.34784 -0.000732422 10C-0.000732422 12.6522 1.05284 15.1957 2.9282 17.0711C3.85679 17.9997 4.95918 18.7362 6.17243 19.2388C7.38569 19.7413 8.68605 20 9.99927 20C12.6514 20 15.195 18.9464 17.0703 17.0711C18.9457 15.1957 19.9993 12.6522 19.9993 10C19.9993 8.68678 19.7406 7.38642 19.2381 6.17317C18.7355 4.95991 17.9989 3.85752 17.0703 2.92893C16.1417 2.00035 15.0394 1.26375 13.8261 0.761205C12.6128 0.258658 11.3125 0 9.99927 0Z"
                                        fill="#008829" />
                                </svg>
                            </button>

                        </form>
                    <?php endif; ?>
                    <p  style="text-decoration: <?= $task['status'] === 'done' ? 'line-through' : 'none' ?> ;">
                        <?= htmlspecialchars($task['title']) ?></p>
                    <form action="delete.php" method="POST" class="delete-form">
                        <input type="hidden" name="taskId" value="<?= $taskId; ?>" />


                        <button type="submit">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="#D40000"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.7778 0H5.22222C4.63285 0 4.06762 0.234126 3.65087 0.650874C3.23413 1.06762 3 1.63285 3 2.22222V17.7778C3 18.3671 3.23413 18.9324 3.65087 19.3491C4.06762 19.7659 4.63285 20 5.22222 20H20.7778C21.3671 20 21.9324 19.7659 22.3491 19.3491C22.7659 18.9324 23 18.3671 23 17.7778V2.22222C23 1.63285 22.7659 1.06762 22.3491 0.650874C21.9324 0.234126 21.3671 0 20.7778 0ZM17 15.5556L13 11.5556L9 15.5556L7.44444 14L11.4444 10L7.44444 6L9 4.44444L13 8.44445L17 4.44444L18.5556 6L14.5556 10L18.5556 14L17 15.5556Z"
                                    fill="#D40000" />
                            </svg>
                        </button>
                    </form>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>