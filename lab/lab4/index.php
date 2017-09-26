<?php
    $backgroundImage = "img/sea.jpg";
    if (isset($_GET['keyword'])) {
                include 'api/pixabayAPI.php';
                $imageURLs = getImageURLs($_GET['keyword']);
                $backgroundImage = $imageURLs[array_rand($imageURLs)];
                
                for ($i = 0; $i < 5; $i++) {
                    $currentPic = rand(0, count($imageURLs));
                    echo "<img src='" . $imageURLs[$currentPic] . "' width = '200' >";
                    unset($imageURLs[$currentPic]);
                    array_values($imageURLs);
                }
            }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4. Pixabay slideshow</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style type="text/css">
           @import url('css/styles.css'); 
               body {
                   background-image: url('<?= $backgroundImage ?>');
               }
        </style>
    </head>
    <body>
        <?php
        
            if (!isset($imageURLs)) {
                echo "<h2>Type a keyword to display a slideshow <br /> with random images from pixabay.com</h2>";
            } else {
                //thingthingthing
            }
        ?>

        <form>
            <input type="text" name="keyword" placeholder="Keyword"/>
            <input type="radio" name="layout" value="horizontal"/> Horizontal
            <input type="radio" name="layout" value="vertical" /> vertical

            <input type="submit" value="Submit" />
        </form>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>