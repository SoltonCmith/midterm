<?php
include_once('database.php');

$bookID = $_GET["bookID"];

if($bookID != false) {
    $query = "DELETE FROM books WHERE Id = :book_id ";
    $statement = $db->prepare($query);
    $statement->bindValue(":book_id", $bookID);
    $success = $statement->execute();
    $statement->closeCursor();
}

header('Location: index.php');

?>
