<?php
/* db_read.php */
// inkludera dblabb2 där vi angav mysql-uppgifter
include 'db_lanesystem.class.php';
// skapa en ny DB instans
$db = new DB();

// En enkel query
$query = "SELECT * FROM user";

// Om vi får ett resultat, loppa då igenom detta och skriv ut varje rad
if($result= $db->query($query)){
    while ($row= $result->fetch(PDO::FETCH_NUM)){
        echo "<pre>" . print_r($row, 1) . "</pre>";
    }
}

/* JOIN i vår SQL för att välja en specifik rad ur de två user-tabeller */

$query = "SELECT username, firstname, lastname, birthdate, address FROM user LEFT JOIN userdata ON userdata.userid = user.id WHERE user.id=(:id)";

if ($sth = $db->prepare($query)){
    $sth->execute(array(':id' => '1'));
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    echo $result['username'] . "<br>";
    echo $result['firstname'] . " " .$result['lastname'] . "<br>";
    echo $result['birthdate'];
}
