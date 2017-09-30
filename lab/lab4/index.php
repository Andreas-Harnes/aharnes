<?php

$backgroundImage;

if ( isset($_GET['keyword']) ) {
  
    $keyword = $_GET['keyword'];
    
    if (!empty($_GET['category']) ) {  
        $keyword = $_GET['category'];
    }
  
    include 'api/pixabayAPI.php';
    
    if (isset($_GET['layout'])) {
        $imageURLs = getImageURLs($keyword, $_GET['layout']);
    } else {
         $imageURLs = getImageURLs($keyword);
    }
    
    shuffle($imageURLs);
    
   $backgroundImage = end($imageURLs); 
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <!-- Parts of the following code ig gotten from https://css-tricks.com/perfect-full-page-background-image/ -->
        <style>
          body { 
            background-image: url(' <?php echo (empty($backgroundImage) ?"img/sea.jpg" : $backgroundImage ) ; ?> '); 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
          }
        </style>
          
    </head>
    <body>
        <form>
            <input class="formStyle" type="text" name="keyword"/>
            
            <div id="allOptions">
              <input id="lhorizontal" type="radio" name="layout" value="horizontal"/>
              <label for="lhorizontal">Horizontal</label>
              
              <input id="lvertical" type="radio" name="layout" value="vertical" /> 
              <label for="lvertical">Vertical</label>
            
              <select name="category">
                  <option value="">Select One</option>
                  <option value="ocean">Sea</option>
                  <option>Forest</option>
                  <option>Snow</option>
              </select>
            </div>
            
            <input class="formStyle" type="submit" name="Search!"/>
            
        </form>
        
        <?php
        
        if (!isset($_GET["keyword"])) { //is there any parameter called "keyword" in the URL
            echo "<h2>Type a keyword to display a slideshow with random images from Pixabay.com</h2>";
        } else { //the form has been submitted
        
            
          if ( empty($_GET['keyword']) && empty($_GET['category']) )  {
        
            echo "<h2> ERROR: You must select a category or type a keyword</h2>";
  
            return;
            exit; 
          }
            ?>
            
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                <li data-target="#carousel-example-generic" data-slide-to="6"></li>
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img class="currentPicture" src="<?=$imageURLs[0]?>" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div>
                
                <div class="item">
                  <img src="<?=$imageURLs[1]?>" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div>
                
                <div class="item">
                  <img src="<?=$imageURLs[2]?>" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div> 
                
                <div class="item">
                  <img src="<?=$imageURLs[3]?>" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div>
                
                <div class="item">
                  <img src="<?=$imageURLs[4]?>" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div>
                
                <div class="item">
                  <img src="<?=$imageURLs[5]?>" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div>
                
                <div class="item">
                  <img src="<?=$imageURLs[6]?>" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div>
                
              </div>
            
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            
            
        <?php    
            
        } //Else
        
        ?>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>