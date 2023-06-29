<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="number1">Number 1:</label>
    <input type="number" id="number1" name="number1" value="<?php if (isset($_POST['number1'])) {
        echo $_POST['number1'];
                                                            }?>" required>
    <br>
    <label for="number2">Number 2:</label>
    <input type="number" id="number2" name="number2" value="<?php if (isset($_POST['number2'])) {
        echo $_POST['number2'];
                                                            }?>" required>
    <br>
    <label for="operator">Operator:</label>
    <select id="operator" name="operator" required>
        <option value="+" <?php if (isset($_POST['operator']) && $_POST['operator'] == "+") {
            echo 'selected';
                          }?>>+</option>
        <option value="-" <?php if (isset($_POST['operator']) && $_POST['operator'] == "-") {
            echo 'selected';
                          }?>>-</option>
        <option value="*" <?php if (isset($_POST['operator']) && $_POST['operator'] == "*") {
            echo 'selected';
                          }?>>*</option>
        <option value="/">/</option>
        <option value="%">%</option>
    </select>
    <br>
    <input type="submit" value="Calculate">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number1 = validate_input($_POST["number1"]);
    $number2 = validate_input($_POST["number2"]);
    $operator = validate_input($_POST["operator"]);
    $error = false;
} if (!is_numeric($number1)) {
        echo 'Number 1 is not a number.<br>';
        $error = true;
} if (!is_numeric($number2)) {
        echo 'Number 2 is not a number.<br>';
        $error = true;
}
if (empty($number1) || empty($number2) || empty($operator)) {
        echo 'Please enter both numbers and an operator.<br>';
        $error = true;
} else if ($operator == '/' && $number2 == 0) {
        echo 'Cannot divide by 0.<br>';
        $error = true;
} else if ($operator == '%' && $number2 == 0) {
        echo 'Cannot take modulo by 0.<br>';
        $error = true;
}
?>
    
</body>
</html>