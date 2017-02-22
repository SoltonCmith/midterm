<?php
include_once('database.php');

$isAddition = filter_input(INPUT_POST, "isAddition");
$bookTitle = filter_input(INPUT_POST, "TitleTextField");
$bookAuthor = filter_input(INPUT_POST, "AuthorTextField");
$bookPrice = filter_input(INPUT_POST, "PriceTextField");
$bookGenre = filter_input(INPUT_POST, "GenreTextField");

// check if user is Adding a New Book
if($isAddition == "1") {

    /*//////////////////////*/
    /* FIX THIS MYSQL QUERY */
    /*//////////////////////*/

$query = "INSERT INTO books (Title, Price, Author, Genre) VALUES (:book_title, :book_price, :book_author, :book_genre)";
$statement = $db->prepare($query); // encapsulate the sql statement
}
// else if user is Updating an Existing Book
else {
$bookID = filter_input(INPUT_POST, "IDTextField");
echo $bookID;
/*//////////////////////*/
/* FIX THIS MYSQL QUERY */
/*//////////////////////*/

$query = "UPDATE books SET Title = :book_title, Price = :book_price, Author = :book_author, Genre = book_genre WHERE Id = :book_ID ";
$statement = $db->prepare($query); // encapsulate the sql statement
$statement->bindValue(':book_id', $bookID);

}

$statement->bindValue(':book_title', $bookTitle);
$statement->bindValue(':book_author', $bookAuthor);
$statement->bindValue(':book_price', $bookPrice);
$statement->bindValue(':book_genre', $bookGenre);
$statement->execute(); // run on the db server
$statement->closeCursor(); // close the connection

// redirect to index page
//header('Location: index.php');
?>
