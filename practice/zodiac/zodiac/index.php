<?php
    function yearList($startYear, $endYear) {                           
        $totalYears;
        $currentAnimal = 0;
        
        $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
        for($i = $startYear; $i <= $endYear; $i+=4) {                   
            if($i == 1776) {                                            
               echo '<li>Year '.$i.' <b>USA INDEPENDENCE!</b></li>';
               echo '<img src="img/'.$zodiac[$currentAnimal].'.png">';
            } elseif ($i % 100 == 0){                                   
                echo '<li>Year '.$i.' <b>HAPPY NEW CENTURY!</b></li>';
                echo '<img src="img/'.$zodiac[$currentAnimal].'.png">';
            } else {                                                    
               echo '<li>Year '.$i.'</li>';
               echo '<img src="img/'.$zodiac[$currentAnimal].'.png">';
            }
            $totalYears += $i;
            
            $currentAnimal++;
            if($currentAnimal == 12) {
                $currentAnimal = 0;
            }
            
        }
        return $totalYears;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Zodiac </title>
    </head>
    <body>
        <h1>chonese Zodiac Years</h1>
        
        <ul>
            <?php
                
                yearlist($_GET['startYear'],$_GET['endYear']);
                                      
            ?> 
        </ul>
        
        <?php
            $sum = yearList($_GET['startYear'],$_GET['endYear']);                                 
            echo '<h1> Total years '.  $sum .'</h1>';                   
        ?>
       
        
    </body>
</html>