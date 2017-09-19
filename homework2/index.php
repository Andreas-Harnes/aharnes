<?php

    //Arrays that contains the names used in the getName function
    $humanMaleFirstName = array("Martinus", "Gerimund", "Mikko", "Erlend", "Kåre", "Sean", "Robert", "Tidemann");
    $humanFemaleFirstName = array("Martine", "Jenny", "Oda", "Ulrikke", "Sigrid", "Charlotte", "Gudbjørg", "Berit");
    $humanLastName = array("Johnny", "Hansen", "Smith", "Wallis", "Britton", "Sarin", "Pritsak", "Gilboa", "Ozment");

    //Arrays that contain gender, classes, the stats and stat names
    $gender = array("Male", "Female");
    $classes = array("Warrior", "Mage", "Archer", "Rogue", "Bard");
    $stats = array(0,0,0,0,0,0);
    $statNames = array("Strength", "Dexeterity", "Intellect", "Agility", "Luck", "Charisma");
    
    //Global variabels used in several functions
    $genderFromfunction;
    $selectedClass;
    $randomGender;
    
    //The completeCharacter function that put all the other functions together
    function completeCharacter() {
            getGender();
            getName();
            getClass();
            getStats();
            
    }
    
    //Give the character a random gender
    function getGender() {
        global $genderFromfunction, $randomGender;
        $randomGender = rand(0,1);
        
        if ($randomGender == 0) {
            $genderFromfunction = 0;
        } else {
            $genderFromfunction = 1;
        }
    }
    
    //Give the character a name based of its gender
    function getName() {
        global $humanLastName, $humanMaleFirstName, $humanFemaleFirstName, $genderFromfunction, $randomGender;
        shuffle($humanLastName);
        
        $selectedFirstname;
        $selectedLastname;
        
        
        if ($genderFromfunction == 0) {
            shuffle($humanMaleFirstName);
            $selectedFirstname = current($humanMaleFirstName);
        } else {
            shuffle($humanFemaleFirstName);
            $selectedFirstname = current($humanFemaleFirstName);
        }
        
        $selectedLastname = end($humanLastName);
        
        
        
        echo "<h2> ". $selectedFirstname . " " . $selectedLastname . "</h2>";
        
        if ($genderFromfunction == 0) {
            echo "<img src='img/male.png' />";
            echo "<p><span id='genderIdentifier'>Gender:</span> Male</p>";
        } else {
            echo "<img src='img/female.png' />";
            echo "<span id='genderIdentifier'>Gender:</span> Female</p>";
        }
    }
    
    //Give the character a random class
    function getClass() {
        global $classes, $selectedClass;
        
        shuffle($classes);
        
        for($i = 0; $i < count($classes); $i++) {
            $selectedClass = array_shift($classes);
        }
        echo "<p id='characterClass'><span id='className'>Class:</span> $selectedClass </p>";
    }
    
    //Give the character random stats and a bonus depending on which class it has
    function getStats() {
        global $selectedClass, $stats, $statNames;
        
        for($i = 0; $i < count($stats); $i++) {
            $stats[$i] = rand(1,10);
        }
        if ($selectedClass == Warrior) {
            $stats[0] += 10;
        } elseif ($selectedClass == Mage) {
            $stats[2] += 10;
        } elseif ($selectedClass == Archer) {
            $stats[1] += 10;
        } elseif ($selectedClass == Rogue) {
            $stats[3] += 10;
        } elseif ($selectedClass == Bard) {
            $stats[5] += 10;
        }
        
        echo "<p id='InfoDivider'>Stats: </p>";
        
        for($i = 0; $i < count($stats); $i++) {
            echo "<p> <span id='statName'>$statNames[$i]: </span> $stats[$i] </p>";
        }
    }
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>RPG character generator</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <div id="content">
            <h1>RPG character generator</h1>
            <?php completeCharacter(); ?>
        </div>
        
        
    </body>
</html>