<?php

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";

include("connections.php");

if (!$id) {
    echo "<span class='error'>No ID provided.</span>";
    exit;
}

// Try to fetch user record
$query_delete = mysqli_query($connections, "SELECT * FROM mytbl WHERE id='$id'");
if ($query_delete && mysqli_num_rows($query_delete) > 0) {
    $row_delete = mysqli_fetch_assoc($query_delete);
    $db_name = $row_delete["name"];
    echo "<h1>Are you sure you want to delete user <b>$db_name</b>?</h1>";
    ?>
    <form method="POST" action="Delete_Now.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Yes, Delete"> &nbsp; <a href="index.php">No</a>
    </form>
    <?php
    exit;
}

// Try to fetch book record
$query_delete = mysqli_query($connections, "SELECT * FROM bookstbl WHERE book_id='$id'");
if ($query_delete && mysqli_num_rows($query_delete) > 0) {
    $row_delete = mysqli_fetch_assoc($query_delete);
    $db_title = $row_delete["title"];
    echo "<h1>Are you sure you want to delete book <b>$db_title</b>?</h1>";
    ?>
    <form method="POST" action="Delete_Now.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Yes, Delete"> &nbsp; <a href="index.php">No</a>
    </form>
    <?php
    exit;
}

echo "<span class='error'>Record not found.</span>";
?>