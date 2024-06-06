<?php
    if(isset($_POST['submit'])) {
        $marks = $_POST['marks'];

        if(($marks >= 70) && ($marks < 100)) {
            echo("$marks - Grade A")
        } else if(($marks >= 60) && ($marks < 69)) {
            echo("$marks - Grade B")
        } else if(($marks >= 50) && ($marks < 59)) {
            echo("$marks - Grade C")
        } else if(($marks >= 40) && ($marks < 49)) {
            echo("$marks - Grade D")
        } else if(($marks >= 0) && ($marks < 39)) {
            echo("$marks - Grade E")
        } else {
            echo("TRY AGAIN")
        }
    }
?>