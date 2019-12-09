<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Product Lines</title>
    </head>
    <body>
        <h1>Product Lines de la BDD Classic Models</h1>
        <ul>
<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', 'rgirodon');
    
    $result = $bdd->query('SELECT productLine FROM productlines');
    
    $data = $result->fetchAll();
    
    foreach($data as $row) {
        
        echo('<li>'.$row['productLine'].'</li>');
    }

    $result = null;
    
    $bdd = null;
} 
catch (PDOException $e) {
    print "Erreur : " . $e->getMessage() . "<br/>";
    die();
}
?>
        </ul>
    </body>
</html>