<?php
$results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buyingPrices = $_POST['buying_price'];
    $vatRates = $_POST['vat_rate'];
    $expensePercentages = $_POST['expense_percentage'];
    $profitMargins = $_POST['profit_margin'];

    for ($i = 0; $i < count($buyingPrices); $i++) {
        $buyingPrice = floatval($buyingPrices[$i]);
        $vatRate = floatval($vatRates[$i]);
        $expensePercentage = floatval($expensePercentages[$i]);
        $profitMargin = floatval($profitMargins[$i]);

        $vatAmount = $buyingPrice * ($vatRate / 100);
        $generalExpense = $buyingPrice * ($expensePercentage / 100);
        $profitAmount = $buyingPrice * ($profitMargin / 100);

        $sellingPrice = $buyingPrice + $vatAmount + $generalExpense + $profitAmount;

        $results[] = [
            'buying_price' => $buyingPrice,
            'vat_amount' => $vatAmount,
            'general_expense' => $generalExpense,
            'profit_amount' => $profitAmount,
            'selling_price' => $sellingPrice
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculation Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            inline-size: 80%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            inline-size: 100%;
            border-collapse: collapse;
            margin-block-end: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .footer {
            text-align: center;
            margin-block-start: 20px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculation Results</h1>
        <?php if (!empty($results)): ?>
        <table>
            <tr>
                <th>Product</th>
                <th>Buying Price</th>
                <th>VAT Amount</th>
                <th>General Expense</th>
                <th>Profit Amount</th>
                <th>Selling Price</th>
            </tr>
            <?php foreach ($results as $index => $result): ?>
            <tr>
                <td>Product <?php echo $index + 1; ?></td>
                <td><?php echo number_format($result['buying_price'], 2); ?></td>
                <td><?php echo number_format($result['vat_amount'], 2); ?></td>
                <td><?php echo number_format($result['general_expense'], 2); ?></td>
                <td><?php echo number_format($result['profit_amount'], 2); ?></td>
                <td><?php echo number_format($result['selling_price'], 2); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
            <p>No data to display. Please fill out the form and submit.</p>
        <?php endif; ?>
        <div class="footer">
            &copy; 2024 Hypermarket Pricing Calculator
        </div>
    </div>
</body>
</html>
