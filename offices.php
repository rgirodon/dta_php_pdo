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
    
    $req = $bdd->query('SELECT officeCode, city, country FROM offices');

    $data = $req->fetchAll();
    
    foreach($data as $row) {
        
        echo('<li>'.$row['officeCode'].' - '.$row['city'].' - '.$row['country'].'</li>');
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