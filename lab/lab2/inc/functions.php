<?php
    function runProgram() {
        for ($i = 0; $i < 3; $i++) {
            ${"randomValue" . $i } = rand(0,3);
                displaySymbol(${"randomValue" . $i}, $i);
            }
        
            displayPoints($randomValue0,$randomValue1, $randomValue2);   
        }


    function displaySymbol($randomNumber, $pos) {
            
        if ($randomNumber == 0) {
            $symbol = "seven";
        }
        elseif ($randomNumber == 1) {
            $symbol = "cherry";
        }
        elseif ($randomNumber == 2) {
            $symbol = "lemon";
        }
        else {
            $symbol = "grapes";
        } 
       
        echo "<img id = 'reel$pos' src='img/$symbol.png'  alt='$symbol' title='$symbol'  width='70'/>";
    }
    
    
    
    function displayPoints($randomValue1, $randomValue2, $randomValue3) {
        echo "<div id= 'output'>";
        if($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
            switch ($randomValue1) {
                case 0: $totalPoints = 1000;
                    echo "<h1>Jackpot!</h1>";
                    break;
                case 1: $totalPoints = 500;
                    break;
                case 2: $totalPoints = 250;
                    break;
                case 3: $totalPoints = 900;
                    break;
            }
            
            echo "<h2>you won $totalPoints points! </h2>";
        }
        else {
            echo "<h3> Try Again! </h3>";   
        }
        echo "</div>";
    }
    



?>