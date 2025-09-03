<?php

session_start();

if(isset($_SESSION["id"])) {

    $user_id = $_SESSION["id"];
    include("../connections.php");

    $get_record = mysqli_query($connections, "SELECT * FROM mytbl WHERE id='$user_id'");
    $record = mysqli_fetch_assoc($get_record); {
        $db_name = $record["name"];
        $db_address = $record["address"];
        $db_email = $record["email"];
        $db_section = $record["section"];
        $db_contact = $record["contact"];
    }


    echo "Welcome $db_name ! <a href='logout.php'>Logout</a>";



}else{

    echo "You must login first! <a href='../login.php'>Login now!</a>";


}

?>

<hr>

<?php


$view_query = mysqli_query($connections, "SELECT * FROM bookstbl");

echo "<table border='1' width='50%'>";
echo "<tr>
        <td>ISBN</td>
        <td>Title</td>
        <td>Authors</td>
        <td>Date of Publication</td>
        <td>Publisher</td>
        <td>Option</td>
    </tr>";

while($row = mysqli_fetch_assoc($view_query)) {
    $book_id = $row["book_id"];
    $db_isbn = $row["isbn"];
    $db_title = $row["title"];
    $db_authors = $row["authors"];
    $db_pub_date = $row["pub_date"];
    $db_pub_name = $row["pub_name"];

    echo "<tr>
            <td>$db_isbn</td>
            <td>$db_title</td>
            <td>$db_authors</td>
            <td>$db_pub_date</td>
            <td>$db_pub_name</td>
            <td>
                <a href='Borrow.php?id=$user_id'>Borrow</a>
                &nbsp;
                <a href='Return.php?id=$user_id'>Return</a>
            </td>
        </tr>";
}

echo "</table>";

?>

<hr>