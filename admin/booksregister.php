<?php

 include("connections.php");

$isbn = $title = $authors = $pub_date = $pub_name = "";
$isbnErr = $titleErr = $authorsErr = $pub_dateErr = $pub_nameErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["isbn"])) {
        $isbnErr = "ISBN is required";
    } else {
        $isbn = $_POST["isbn"];
    }

    if (empty($_POST["title"])) {
        $titleErr = "Title is required";
    } else {
        $title = $_POST["title"];
    }

    if (empty($_POST["authors"])) {
        $authorsErr = "Author is required";
    } else {
        $authors = $_POST["authors"];
    }

    if (empty($_POST["pub_date"])) {
        $pub_dateErr = "Publication date is required";
    } else {
        $pub_date = $_POST["pub_date"];
    }

    if (empty($_POST["pub_name"])) {
        $pub_nameErr = "Publication name is required";
    } else {
        $pub_name = $_POST["pub_name"];
    }

   

if($isbn && $title && $authors && $pub_date && $pub_name) {

        // Correct duplicate check to use isbn
        $check_isbn = mysqli_query($connections, "SELECT * FROM bookstbl WHERE isbn='$isbn'");
        $check_isbn_row = mysqli_num_rows($check_isbn);

        if($check_isbn_row > 0) {
            $isbnErr = "Book ISBN already exists.";
        } else {
            $query = mysqli_query($connections, "INSERT INTO bookstbl (isbn, title, authors, pub_date, pub_name)
                VALUES ('$isbn', '$title', '$authors', '$pub_date', '$pub_name')");
            if ($query) {
                echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
                echo "<script>window.location.href='index.php';</script>";
            } else {
                echo "<span class='error'>Error inserting record: " . mysqli_error($connections) . "</span>";
            }
        }
    }

}


?>

<a href="index.php">Home</a>
&nbsp;
<a href="search.php">Search</a>
&nbsp;

<br><br>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<label for="isbn">Enter ISBN</label> <br>
<input type="text" name="isbn" value="<?php echo $isbn; ?>"> <br>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $isbnErr) { ?>
<span class="error"><?php echo $isbnErr; ?></span> <br>
<?php } ?>

<br>

<label for="title">Enter Title</label> <br>
<input type="text" name="title" value="<?php echo $title; ?>"> <br>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $titleErr) { ?>
<span class="error"><?php echo $titleErr; ?></span> <br>
<?php } ?>

<br>

<label for="authors">Enter Author</label> <br>
<input type="text" name="authors" value="<?php echo $authors; ?>"> <br>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $authorsErr) { ?>
<span class="error"><?php echo $authorsErr; ?></span> <br>
<?php } ?>

<br>

<label for="pub_date">Enter the Date Published</label> <br>
<input type="text" name="pub_date" value="<?php echo $pub_date; ?>"> <br>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $pub_dateErr) { ?>
<span class="error"><?php echo $pub_dateErr; ?></span> <br>
<?php } ?>

<br>

<label for="pub_name">Enter Publisher</label> <br>
<input type="text" name="pub_name" value="<?php echo $pub_name; ?>"> <br>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $pub_nameErr) { ?>
<span class="error"><?php echo $pub_nameErr; ?></span> <br>
<?php } ?>

<br>


<br>

<input type="submit" value="Submit">
</form>


<hr>



<style>
.error { color: red; }
</style>