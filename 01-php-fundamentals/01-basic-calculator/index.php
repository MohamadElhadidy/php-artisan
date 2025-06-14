<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Calculator</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/108/108808.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <h1>Basic Calculator</h1>
        <div class="calculator">
            <form method="POST" action="calculate.php" >
             <div class="input-group1"> 
                   <input type="text" name="num1" placeholder="First" required value="<?= $_REQUEST['num1'] ?? '' ?>">
                <select name="operation" required>
                    <option value="add" <?= ($_REQUEST['operation'] ?? '') == 'add' ? 'selected' : '' ?>>+</option>
                    <option value="subtract" <?= ($_REQUEST['operation'] ?? '') == 'subtract' ? 'selected' : '' ?>>-</option>
                    <option value="multiply" <?= ($_REQUEST['operation'] ?? '') == 'multiply' ? 'selected' : '' ?>>*</option>
                    <option value="divide" <?= ($_REQUEST['operation'] ?? '') == 'divide' ? 'selected' : '' ?>>/</option>
                </select>
                <input type="text" name="num2" placeholder="Second" required value="<?= $_REQUEST['num2'] ?? '' ?>">
                <span>=</span>
                <p class="result" readonly><?= $_REQUEST['result'] ?? '' ?></p>
             </div>
               <div class="input-group2">
                 <button type="submit">Calculate</button>
                 <span class="error"><?= $_REQUEST['errors'] ?? '' ?></span>
               </div>
            </form>
        </div>
        
    </div>
    <footer>
        <p>&copy; 2025 Basic Calculator</p>
    </footer>
</body>
</html>