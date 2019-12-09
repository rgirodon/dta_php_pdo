<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Products</title>
    </head>
    <body>
        <h1>Products de la BDD Classic Models</h1>

<?php            
if (isset($_GET['productLine'])) {
    
    $productLine = $_GET['productLine'];
    
    echo('<ul>');
    
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=classicmodels', 'root', 'rgirodon');

        $req = $bdd->prepare('SELECT productName FROM products WHERE productLine = :productLine');

        $req->execute(array('productLine' => $productLine));

        $data = $req->fetchAll();

        foreach($data as $row) {

            echo('<li>'.$row['productName'].'</li>');
        }

        $req = null;

        $bdd = null;
    } 
    catch (PDOException $e) {
        print "Erreur : " . $e->getMessage() . "<br/>";
        die();
    }
    
    echo('</ul>');
}
else {
    echo('<div>Pas de Product Line sélectionnée</div>');
}
?>
        
    </body>
</html>