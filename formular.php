<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Formulär</title>
</head>
<body>
<?php
// includera db_lanesystem.class.php och skapa en ny DB instans
include 'db_lanesystem.class.php';
$db= new DB();

/* DB code */
// Lägg till itemtype
if (isset($_POST['addType'])) {
    // query för att lägga till name i itemtypes
    $query = "INSERT INTO itemtypes(name)
    VALUES (:name)";
    // filtrera input
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $sth = $db->prepare($query);
    if ($sth->execute(array(':name' => $name))) {
    echo "<h4>Itemtype added</h4>";
    } else {
    // om något går fel skriv ut PDO felmeddelande
    echo "<h4>Error</h4>";
    echo "<pre>" . print_r($sth->errorInfo(), 1) . "</pre>";
    }
    }

    // Lägg till item
if (isset($_POST['addItem'])) {
    // query för att lägga till name i itemtypes
    $query = "INSERT INTO items(description, type)
    VALUES (:description, :type)";
    // filtrera input
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_NUMBER_INT);
    $description = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);
    $sth = $db->prepare($query);
    if ($sth->execute(array(':type' => $type, ':description' => $description))) {
    echo "<h4>type and description added</h4>";
    } else {
    // om något går fel skriv ut PDO felmeddelande
    echo "<h4>Error</h4>";
    echo "<pre>" . print_r($sth->errorInfo(), 1) . "</pre>";
    }
    }


    

?>

<h4>Add item type</h4>
<!--Formulär för kategorier -->
<form action="" method="post">
<input type="text" name="name" placeholder="name">
<input type="submit" name="addType" value="Submit">
</form>

<h4>Add item</h4>
<!--Formulär för föremål -->
<form action="" method="post">
<select name="type">
<?php
/* Här hämtas all data från itemtypes tabellen för att enkelt skappa en lista över existerande itemtype kategorier till förmuläret.
* Detta gör även att vi slipper uppdatera vår html när vi lägger till nya kategorier.
*/
$query= "SELECT * FROM itemtypes ORDER BY name ASC";
if($result = $db->query($query)){
    while ($row = $result->fetch(PDO::FETCH_NUM)) {
        // skriv ut varje rad som en <option>
        echo '<option value="' . $row['0'] . '">' . $row['1'] . '</option>';
    }
}
?>
</select>
<input type="text" name="desc" placeholder="description">
<input type="submit" name="addItem" value="Submit">
</form>

<hr>






</body>
</html>