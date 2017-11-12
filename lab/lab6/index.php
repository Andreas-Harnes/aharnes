<?php

   include '../../dbconnection.php';
   $conn = getConnection();

   function displayCountryOptions() {
       global $conn;
       $sql = "SELECT DISTINCT(country)
                FROM `q_author`
                ORDER by country";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);



        foreach ($records as $record) {
            echo "<option " ;

            if ($record['country'] == $_GET['country'] ) {
                echo "selected";
            }
            echo ">" . $record['country'] . "</option>";
        }

   }


    function displayCategoryOptions() {
       global $conn;
       $sql = "SELECT *
                FROM `q_category`
                ORDER BY category";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);



        foreach ($records as $record) {
            echo "<option " ;

            if ($record['category'] == $_GET['category'] ) {
                echo "selected";
            }
            echo ">" . $record['category'] . "</option>";
        }

   }

   function displayQuotes(){
       global $conn;

       $sql = "SELECT DISTINCT firstName, lastName, quote
               FROM q_author
               NATURAL JOIN q_quote, q_category, q_cat_quote
               WHERE 1";

        $namedParameters = array();

        if (!empty($_GET['content'])) {
           $sql = $sql . " AND quote LIKE :quoteContent";
           $namedParameters[":quoteContent"] = "%" . $_GET['content'] . "%";
        }

        if (isset($_GET['gender'])) {
            $sql = $sql . " AND gender = :gender ";
            $namedParameters[':gender'] = $_GET['gender'];
        }

        if (isset($_GET['orderBy'])) {
            if ($_GET['orderBy'] == 'orderByAuthor') {
               $sql = $sql . " ORDER BY lastName";
            } else {
                $sql = $sql . " ORDER BY quote";
            }
        }

        if (!empty($_GET['country'])) {
            $sql = $sql . " AND country = :country ";
            $namedParameters[':country'] = $_GET['country'];
        }

        if (!empty($_GET['category'])) {
            $sql = $sql . "  AND q_quote.quoteId IN (SELECT quoteId FROM q_cat_quote NATURAL JOIN q_category WHERE category =  :category )";
            $namedParameters[':category'] = $_GET['category'];
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            echo "<div id='singleQuote'>" . "<em>" . $record['quote'] . "</em> " . "<span id='authorName'>" . $record['firstName'] . " " . $record['lastName'] . "</span>" . "</div>" . "<br />";
        }
   }

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6: Quote Finder</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <h1>Quote Finder</h1>
        <form method="get">
                <strong>Quote Content:</strong>
                <input type="text" name="content" value="<?=$_GET['content']?>">
                <strong>Author's Gender:</strong>
                <input type="radio" name="gender" id="female" value="F"

                <?php

                 if ($_GET['gender'] == 'F') {
                     echo " checked";
                 }

                 ?>

                >
                <label for="female">Female</label>
                <input type="radio" name="gender" id="male" value="M"

                <?php

                 if ($_GET['gender'] == 'M') {
                     echo " checked";
                 }

                 ?>

                >
                <label for="male">Male</label>

                <strong>Author's Birthplace:</strong>
                <select name="country">
                    <option value="">Select a Country</option>
                    <?=displayCountryOptions()?>
                </select>

                <strong>Category:</strong>
                <select name="category">
                    <option value="">Select a Category</option>
                    <?=displayCategoryOptions()?>
                </select>

                Order by:
                 <input type="radio" name="orderBy" id="orderByAuthor" value="orderByAuthor"
                <?php
                 if ($_GET['orderBy'] == 'orderByAuthor') {
                     echo " checked";
                 }
                 ?>
                 >
                <label for="orderByAuthor">Author</label>
                 <input type="radio" name="orderBy" id="orderByQuote" value="orderByQuote"
                <?php
                 if ($_GET['orderBy'] == 'orderByQuote') {
                     echo " checked";
                 }
                 ?>
                 >
                <label for="orderByQuote">Quote</label>
                <input type="submit" value="Filter" name="submit">
        </form>

        <hr />

        <div class="quotes">

            <?=displayQuotes()?>

        </div>

    </body>
</html>