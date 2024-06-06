<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0;
        $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : 0;
        $operation = $_POST['operation']
        $result = ''

        switch($operation) {
            case "add":
                $result = $num1 + $num2;
                break;
            case "subtract":
                $result = $num1 - $num2;
                break;
            case "multiply":
                $result = $num1 * $num2;
                break;
            case "divide":
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = "Error! Division by zero";
                }
                break;
            case "modulus":
                if ($num2 != 0) {
                    $result = $num1 % $num2;
                } else {
                    $result = "Error! Division by zero";
                }
                break;
            case "percentage":
                $result = ($num1 / 100) * $num2;
                break;
            case "sqrt":
                $result = sqrt($num1);
                break;
            case "log":
                if($num1 > 0) {
                    $result = log10($num1)
                } else {
                    $result = "Cannot perform logarithm of non-positive numbers"
                }
                break;   
            default:
                $result = "Invalid Operation"
                break;                                     
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <h2>Calculation Result</h2>
        <p><?php echo "Result: " . $result; ?></p>
        <a href="index.php">Go Back</a>
    </div>
</body>
</html>