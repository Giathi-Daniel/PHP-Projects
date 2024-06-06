<?php
    if(isset($_POST['submit'])) {
        $age = $_POST['age']
        if($age > 30) {
            echo "Your age is greater than 30"
        } else {
            echo '<script>alert("You are very young!")</script>'
        }
    }
?>