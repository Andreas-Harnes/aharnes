<?php
    function displaySymbol($symbol) {
        echo "<img src='../lab/lab2/img/$symbol.png' width='50px' />" ;
    }
    
    $symbols = array("lemon", "orange", "cherry");
    
    //print_r($symbols);
    
    //echo $symbols[0];
    
    //displaySymbol($symbols[0]);
    
    $symbols[] = "bar";
    
    //displaySymbol($symbols[3]);

    array_push($symbols, "seven");
    
    //displaySymbol($symbols[4]);
    
    /*
    for ($i = 0; $i < 5; $i++) {
         displaySymbol($symbols[$i]);
         echo "<br />";
    }
    */
    
    //$randomNumber = rand(0,4);
    //displaySymbol($symbols[array_rand($symbols)]);
    
    //print_r($symbols);
    
    $lastItem = array_pop($symbols);
    
    //displaySymbol($lastItem);
    echo "<hr> Before sort: <br />";
    print_r($symbols);
    
    echo "<hr> After sort: <br />";
    sort($symbols);
    print_r($symbols);
    
    echo "<hr> After shuffle: <br />";
    shuffle($symbols);
    print_r($symbols);
    
    echo "<hr> printing the shuffled array: <br />";
    
    
    foreach($symbols as $x) {
        displaySymbol($x);
    }

    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP array practice</title>
    </head>
    <body>
        
    </body>
</html>