<?php
function getNumber($key) {
    return isset($_POST[$key]) ? (float)$_POST[$key] : 0;
}

function getOperation() {
    return isset($_POST['operation']) ? $_POST['operation'] : '';
}

function calculate($num1, $num2, $operation) {
    switch ($operation) {
        case "+":
            return $num1 + $num2;
        case "-":
            return $num1 - $num2;
        case "*":
            return $num1 * $num2;
        case "/":
            if ($num2 != 0) {
                return $num1 / $num2;
            } else {
                return "Error: Division by zero!";
            }
        default:
            return "Invalid operation!";
    }
}

$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = getNumber('num1');
    $operation = getOperation();
    $num2 = getNumber('num2');
    $result = calculate($num1, $num2, $operation);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator Result</title>
</head>
<body>
<h1>Simple Calculator</h1>
<form action="Simple-calculators.php" method="post">
    <label for="num1">Enter first number:</label>
    <input type="number" step="any" name="num1" id="num1" required><br><br>

    <label for="operation">Enter operation (+, -, *, /):</label>
    <input type="text" name="operation" id="operation" required><br><br>

    <label for="num2">Enter second number:</label>
    <input type="number" step="any" name="num2" id="num2" required><br><br>

    <input type="submit" value="Calculate">
</form>

<h2>Result:</h2>
<p><?php echo htmlspecialchars($result); ?></p>
</body>
</html>
