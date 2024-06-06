# Multipurpose Calculator Application

![image-calculator](design.png)

## Table of Contents

1. [Introduction](#introduction)
2. [Features](#features)
3. [Installation Instructions](#installation-instructions)
4. [Usage Instructions](#usage-instructions)
5. [Implementation Details](#implementation-details)
6. [Testing Instructions](#testing-instructions)
7. [Conclusion](#conclusion)

## Introduction

This project is a multipurpose calculator application developed using PHP. It performs a range of calculations including basic arithmetic operations (addition, subtraction, multiplication, division, modulus), as well as more complex calculations like percentages, square roots, and logarithms. The application is designed to be user-friendly with a simple web interface for inputting values and selecting operations.

## Features

- Basic arithmetic operations: addition, subtraction, multiplication, division, and modulus.
- Percentage calculation.
- Square root calculation.
- Logarithm calculation (base 10).
- User-friendly web interface.

## Installation Instructions

### Requirements

- A web server with PHP support (e.g., XAMPP, WAMP, or a remote server with PHP enabled).
- A web browser to access the application.

### Steps

1. Download or clone the repository to your local machine.
   ```sh
   git clone https://github.com/yourusername/calculator.git
   ```
2. Place the project directory (`calculator`) in your web server's root directory. For XAMPP, this is typically `C:\xampp\htdocs\`.
3. Start your web server (e.g., Apache) using your control panel (XAMPP Control Panel for XAMPP users).
4. Open a web browser and navigate to `http://localhost/calculator/index.php`.

## Usage Instructions

1. Open the application in your web browser.
2. Enter the first number in the input field labeled "Enter first number".
3. Enter the second number in the input field labeled "Enter second number" (if required for the operation).
4. Select the desired operation from the dropdown menu.
5. Click the "Calculate" button.
6. The result of the calculation will be displayed on the next page.

### Example Calculations

- **Addition**: Enter `5` in the first number, `3` in the second number, select `Addition (+)`, and click "Calculate". Result: `8`.
- **Square Root**: Enter `16` in the first number, leave the second number blank, select `Square Root`, and click "Calculate". Result: `4`.

## Implementation Details

### `index.php`

This file contains the HTML form for user input. It includes fields for entering two numbers, selecting an operation from a dropdown menu, and a submit button to send the data to `calculate.php`.

### `calculate.php`

This file processes the form data submitted from `index.php`. It performs the selected calculation and displays the result back to the user. The calculations are handled using a `switch` statement based on the selected operation.

### `style.css`

This file contains CSS styles for the application, ensuring a clean and user-friendly interface.

## Testing Instructions

### Test Cases

1. **Addition**:

   - Input: `num1 = 10`, `num2 = 5`, operation `Addition (+)`.
   - Expected Result: `15`.

2. **Division by Zero**:

   - Input: `num1 = 10`, `num2 = 0`, operation `Division (/)`.
   - Expected Result: `Error! Division by zero.`

3. **Logarithm of Non-Positive Number**:

   - Input: `num1 = -10`, `num2` not needed, operation `Logarithm`.
   - Expected Result: `Error! Logarithm of non-positive number.`

4. **Square Root**:
   - Input: `num1 = 25`, `num2` not needed, operation `Square Root`.
   - Expected Result: `5`.

### Steps for Testing

1. Open the application in your web browser.
2. Enter the values and select the operations as described in the test cases.
3. Click "Calculate" and verify the result matches the expected result.

## Conclusion

This multipurpose calculator application provides a range of basic and complex calculations through a simple and user-friendly web interface. Future improvements could include additional operations, enhanced error handling, and a more dynamic user interface.
