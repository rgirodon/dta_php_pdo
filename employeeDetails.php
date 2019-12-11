<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Employee Details</title>
    </head>
    <body>
        <h1>Employee de la BDD Classic Models</h1>
        <ul>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', 'rgirodon');

$id = $_GET["id"];

$order = 'SELECT employeeNumber, firstName, lastName, jobTitle'
            .' FROM employees'
            .' WHERE employeeNumber = :id';

$req = $bdd->prepare($order);

$req->execute(["id" => $id]);

$data = $req->fetchAll();

foreach($data as $row) {
    
    echo('<li>'.$row['employeeNumber'].' - '.$row['firstName'].' - '.$row['lastName'].' - '.$row['jobTitle'].'</li>');
}

$req = null;

$bdd = null;
?>
        </ul>
    </body>
</html>