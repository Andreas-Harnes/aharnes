<?php


function displayImages() {

    if (isset($_POST['submitForm'])) {
        if ($_FILES["myFile"]["size"] < 1000000) {
            move_uploaded_file($_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name'] );
            $files = scandir("gallery/", 1);

        } else {
            fileToobig();
        }
        showPictures($files);


    }
}
function fileToobig() {
    echo "<h2>The file needs to be smaller then 1 MB</h2>";
}

function showPictures($files) {
    for ($i = 0; $i < count($files)-2; $i++  ) {
        echo "<img id='pic" . $i . "' src='gallery/".  $files[$i] . "' width='35' onclick='mouseOver(".$i.")' > <br />";
    }
}



?>


<!DOCTYPE html>
<html>
    <head>
        <title>Lab 10: File Upload </title>
        <link rel="stylesheet" href="style.css" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>

        <script type='text/javascript'>
            function mouseOver(i) {
                $('#pic' + i).css("width","400px");
                $('#pic' + i).css("height","400px");
            }

        </script>
    </head>
    <body>


    <h1> Photo Gallery </h1>

    <form method="POST" enctype="multipart/form-data">

        Upload file:

        <input type="file" name="myFile"/>

        <input type="submit" name="submitForm" value="Upload!" />

        <p id="error"></p>

    </form>

    <br />

    <?=displayImages()?>


    </body>
</html>