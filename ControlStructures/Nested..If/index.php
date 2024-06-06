<?php
    if(isset($_POST['submit'])) {
        $age = $_POST['age']
        $nationality = $_POST['nationality']
        if($nationality == 'kenyan') {
            if($age >= 18) {
                echo "Age = $age and Nationality = $nationality <br> Eligible to vote"
            } esle {
                echo "Age = $age and Nationality = $nationality <br> Enda ukale sima kijana!"
            }
        }
    }
?>