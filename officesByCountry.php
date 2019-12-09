<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Offices</title>
    </head>
    <body>
        <h1>Offices de la BDD Classic Models</h1>
        <ul>
<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', 'rgirodon');
 
    /*
    $req = $bdd->prepare('SELECT officeCode, city FROM offices WHERE country = ?');
    
    $req->execute([$_GET['country']]);
    */

    $req = $bdd->prepare('SELECT officeCode, city FROM offices WHERE country = :country');
    
    $req->execute(["country" => $_GET['country']]);
    
    $data = $req->fetchAll();
    
    foreach($data as $row) {
        
        echo('<li>'.$row['officeCode'].' - '.$row['city'].'</li>');
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