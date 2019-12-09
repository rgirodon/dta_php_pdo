<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Insert Office</title>
    </head>
    <body>
        <h1>Création d'un Office dans la BDD Classic Models</h1>
<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', 'rgirodon');
            
    $req = $bdd->prepare('INSERT INTO offices (officeCode, city, phone, addressLine1, country, postalCode, territory)'
                        .'             VALUES (:officeCode, :city, :phone, :addressLine1, :country, :postalCode, :territory)');
    
    $randomOfficeCode = rand(100, 1000);

    $req->execute(array('officeCode' => ''.$randomOfficeCode,
                        'city' => 'Fake '.$randomOfficeCode,
                        'phone' => 'Fake '.$randomOfficeCode,
                        'addressLine1' => 'Fake '.$randomOfficeCode,
                        'country' => 'Fake '.$randomOfficeCode,
                        'postalCode' => 'Fake '.$randomOfficeCode,
                        'territory' => 'Fake'
                        ));
    
    echo('<div>Un nouvel office a été ajouté : '.$randomOfficeCode.'</div>');

    $req = null;
    
    $bdd = null;
} 
catch (PDOException $e) {
    print "Erreur : " . $e->getMessage() . "<br/>";
    die();
}
?>
    </body>
</html>