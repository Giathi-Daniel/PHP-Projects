<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number1 = $_POST['number1'] ?? 0; // Default to 0 if not set
    $number2 = $_POST['number2'] ?? 0; // Default to 0 if not set
    $sum = $number1 + $number2;
    echo "<script>alert('The sum of $number1 and $number2 is: $sum')</script>";
}
?>
