<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crud</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
</head>
<body>
    
<h2>Exercice 1 : </h2>
<h3>Afficher tous les clients.</h3><br/>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=colyseum','root','toor');
/*
try{
    $dbh = new PDO('mysql:host=localhost;dbname=test',$user,$pass);
    foreach($dbh -> query('SELECT * FROM foo') as $row){
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !:".$e->getMessage()."<br/>";
    die();
}
*/
//require 'sqlconnect.php';

$sql = 'SELECT * FROM clients';
$req = $pdo -> query($sql);
while ($row = $req -> fetch()){
    echo '<p>'.$row['lastName']." ".$row['firstName']." est né le ".$row['birthDate']." possède ".$row['card']." carte . N°: ".$row['cardNumber'].'</p>';
};
$req -> closeCursor();

?>

<h2>Exercice 2 : </h2>
<h3>Afficher tous les types de spectacles possibles.</h3><br/>

<?php

$sql = 'SELECT type FROM showTypes';
$req = $pdo -> query($sql);
while ($row = $req -> fetch()){
    echo '<p>'.$row['type'].'</p>';
};
$req -> closeCursor();

?>

<h2>Exercice 3 : </h2>
<h3>Afficher les 20 premiers clients.</h3><br/>

<?php

$sql = 'SELECT lastName, firstName, id FROM clients WHERE id<21';
$req = $pdo -> query($sql);
while ($row = $req -> fetch()){
    echo '<p>'.$row['id']." ".$row['lastName']." ".$row['firstName'].'</p>';
};
$req -> closeCursor();

?>

<h2>Exercice 4 : </h2>
<h3>N'afficher que les clients possédant une carte de fidélité.</h3><br/>

<?php

$sql = 'SELECT lastName, firstName, id FROM clients WHERE card=1';
$req = $pdo -> query($sql);
while ($row = $req -> fetch()){
    echo '<p>'.$row['id']." ".$row['lastName']." ".$row['firstName'].'</p>';
};
$req -> closeCursor();

?>

<h2>Exercice 5 : </h2>
<h3>Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".</h3><br/>

<?php

$sql = 'SELECT lastName, firstName FROM clients WHERE lastName LIKE "M%" ORDER BY lastName';
$req = $pdo -> query($sql);
while ($row = $req -> fetch()){
    echo '<p>'."Nom: ".$row['lastName']."</p><p>Prenom: ".$row['firstName'].'</p><br/>';
};
$req -> closeCursor();

?>

<h2>Exercice 6 : </h2>
<h3>Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique.</h3><br/>

<?php

$sql = 'SELECT title, performer, date, startTime FROM shows';
$req = $pdo -> query($sql);
while ($row = $req -> fetch()){
    echo '<p>'.$row['title']." par ".$row['performer'].", le ".$row['date']." à ".$row['startTime'].'</p><br/>';
};
$req -> closeCursor();

?>

<h2>Exercice 1 : </h2>
<h3>Afficher tous les clients.</h3><br/>

<?php

$sql = 'SELECT * FROM clients';
$req = $pdo -> query($sql);
while ($row = $req -> fetch()){
    if($row['card']==1){
        $row['card']="oui";
    }else{
        $row['card']="non";
    }
    echo '<p>Nom: '.$row['lastName'].'</p><p>Prenom: '.$row['firstName'].'</p><p>Date de naissance: '.$row['birthDate'].'</p><p>Carte de fidélité: '.$row['card'].'</p><p>Numero de carte: '.$row['cardNumber'].'</p><br/>';
};
$req -> closeCursor();

?>

</body>
</html>