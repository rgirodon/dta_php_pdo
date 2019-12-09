<?php

$productLine = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $productLine = $_POST["productLine"];

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', 'rgirodon');
                
        $req = $bdd->prepare("INSERT INTO productlines (productLine) VALUES ( :productLine )");
        
        $req->execute(array('productLine' => $productLine));
    
        $req = null;
        
        $bdd = null;
    } 
    catch (PDOException $e) {
        print "Erreur : " . $e->getMessage() . "<br/>";
        die();
    }
}
?>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">

        <title>Display form</title>
    </head>
    <body>
        <h1>Create ProductLine</h1>

        <form action="insertProductLine.php" method="post">

            <label for="productLine">ProductLine</label> 

            <input type="text" name="productLine" id="productLine">
            
            <button type="submit">Submit</button>

        </form>

    </body>
</html>