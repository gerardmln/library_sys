<?php

include("connections.php");

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";

if (!$id) {
    echo "<span class='error'>No ID provided.</span>";
    exit;
}

// Try to delete from mytbl (users)
$delete_user = mysqli_query($connections, "DELETE FROM mytbl WHERE id='$id'");
if ($delete_user && mysqli_affected_rows($connections) > 0) {
    echo "<script>alert('User record deleted successfully!'); window.location.href='index.php';</script>";
    exit;
}

// Try to delete from bookstbl (books)
$delete_book = mysqli_query($connections, "DELETE FROM bookstbl WHERE book_id='$id'");
if ($delete_book && mysqli_affected_rows($connections) > 0) {
    echo "<script>alert('Book record deleted successfully!'); window.location.href='index.php';</script>";
    exit;
}

echo "<span class='error'>Record not found or could not be deleted.</span>";
?>