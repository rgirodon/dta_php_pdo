<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Employees</title>
    </head>
    <body>
        <h1>Employees de la BDD Classic Models</h1>
        <ul>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', 'rgirodon');

$order = 'SELECT employeeNumber, firstName, lastName, jobTitle'
            .' FROM employees'
            .' ORDER BY lastName, firstName';

$req = $bdd->query($order);

$data = $req->fetchAll();

foreach($data as $row) {
    
    echo "<li>";
    
    echo "<a href='employeeDetails.php?id=".$row['employeeNumber']."'>";
    echo $row['employeeNumber'].'</a> - ';
    
    echo $row['firstName'].' - ';
    
    echo $row['lastName'].' - ';
    
    echo $row['jobTitle'];
    
    echo '</li>';
}

$req = null;

$bdd = null;
?>
        </ul>
    </body>
</html>