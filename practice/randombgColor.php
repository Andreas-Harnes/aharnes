<?php
    function getRGBA() {
        $red = rand(0,255);
        $blue = rand(0,255);
        $green = rand(0,255);
        $alpha = (rand(0,100)/100);
        
        return "rgba($red,$green,$blue,$alpha);";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Random background color</title>
        <meta charset="utf-8" />
        
        <style>
            body {
                <?php
                    echo "background-color:" . getRGBA() ;
                ?>
            }
            
            h1 {
                <?php
                    echo "color:" . getRGBA() ;
                ?>
            }
            
            h2 {
                color:<?=getRGBA()?>;    
            }
        </style>
    </head>
    <body>
        <h1>Welcome</h1>
        <h2>Hello again</h2>
    </body>
</html>