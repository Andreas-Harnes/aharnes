<?php
    // Checks if any of the questions are filled out
    if ( isset($_GET["q1"]) || isset($_GET["q2"]) || isset($_GET["q3"]) ) {
        // Assigning values from the url to variables
        $q1 = strtolower($_GET["q1"]);
        $q2 = $_GET["q2"];
        $q3 = $_GET["q3"];

        // Devalring a variable to keep remember how many right answers you got
        $total_right_answers = 0;





    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Homework 3</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>

    <h1>Web scripting quiz!</h1>

    <form>
        <div id="allQuestions">
            what does C in CSS stand for?<input type="text" name="q1"/> <br>

            What does the &ltbr&gt tag do? <select name="q2">
                      <option value="">Select One</option>
                      <option value="a1">A tag for line break</option>
                      <option value="a2">A tag to import external css</option>
                      <option value="a3">A tag for importing videos</option>
                  </select> <br>

            Is HTML a programming language? <input id="lYes" type="radio" name="q3" value="yes"/>
            <label for="lYes"> Yes </label>

            <input id="lNo" type="radio" name="q3" value="no"/>
            <label for="lNo"> No </label> <br>




            <input id="btnSubmit" type="submit" value="Submit"/>
        </div>
    </form>

    <?php
        // Cheking if there is any parameters in the url
        if ( isset($_GET["q1"]) || isset($_GET["q2"]) || isset($_GET["q3"]) ) {
            $question_answered = 0;

            // Checking if any of the parameters are empty and notify the user which are empty
            if ( $q1 == "") {
                echo "<h3 class='errorMessage'>You need to answer question one</h3>";
            } else {
                $question_answered++;
            }
            if ( $q2 == "") {
                echo "<h3 class='errorMessage'>You need to answer question two</h3>";
            } else {
                $question_answered++;
            }
            if ( $q3 == "") {
                echo "<h3 class='errorMessage'>You need to answer question three</h3>";
            } else {
                $question_answered++;
            }

            // If they are all filled out the site will check your answers and echo the total amount of points
            if ( $question_answered == 3) {
                if ( $q1 == "cascading") {
                    $total_right_answers++;
                }
                if ( $q2 == "a1") {
                    $total_right_answers++;
                }
                if ( $q3 == "no") {
                    $total_right_answers++;
                }

                 // Echos out the total points to the user
                echo "<h2 id='txtTotalPoints'>You got "  . $total_right_answers ." questions right!</h3>";
            }


        }

    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>
