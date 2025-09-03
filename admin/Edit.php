<?php
include("connections.php");

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";

if (!$id) {
    echo "<span class='error'>No ID provided.</span>";
    exit;
}

// Try to fetch from mytbl (users)
$get_record = mysqli_query($connections, "SELECT * FROM mytbl WHERE id='$id'");
if ($get_record && mysqli_num_rows($get_record) > 0) {
    $row_edit = mysqli_fetch_assoc($get_record);
    $db_name = $row_edit['name'];
    $db_address = $row_edit['address'];
    $db_email = $row_edit['email'];
    $db_section = $row_edit['section'];
    $db_contact = $row_edit['contact'];
    ?>
    <form method="POST" action="Update_Record.php">
        <input type="hidden" name="user_id" value="<?php echo $id; ?>">
        <label for="new_name">Update your name</label> <br>
        <input type="text" name="new_name" value="<?php echo $db_name; ?>"><br><br>
        <label for="new_address">Update your address</label> <br>
        <input type="text" name="new_address" value="<?php echo $db_address; ?>"><br><br>
        <label for="new_email">Update your email</label> <br>
        <input type="text" name="new_email" value="<?php echo $db_email; ?>"><br><br>
        <label for="new_section">Update your section</label> <br>
        <input type="text" name="new_section" value="<?php echo $db_section; ?>"><br><br>
        <label for="new_contact">Update your contact</label> <br>
        <input type="text" name="new_contact" value="<?php echo $db_contact; ?>"><br><br>
        <input type="submit" value="Update">
    </form>
    <?php
} else {
    // Try to fetch from bookstbl (books)
    $get_record = mysqli_query($connections, "SELECT * FROM bookstbl WHERE book_id='$id'");
    if ($get_record && mysqli_num_rows($get_record) > 0) {
        $row_edit = mysqli_fetch_assoc($get_record);
        $db_isbn = $row_edit['isbn'];
        $db_title = $row_edit['title'];
        $db_authors = $row_edit['authors'];
        $db_pub_date = $row_edit['pub_date'];
        $db_pub_name = $row_edit['pub_name'];
        ?>
        <form method="POST" action="Update_Book.php">
            <input type="hidden" name="book_id" value="<?php echo $id; ?>">
            <label for="new_isbn">Update ISBN</label> <br>
            <input type="text" name="new_isbn" value="<?php echo $db_isbn; ?>"><br><br>
            <label for="new_title">Update Title</label> <br>
            <input type="text" name="new_title" value="<?php echo $db_title; ?>"><br><br>
            <label for="new_authors">Update Authors</label> <br>
            <input type="text" name="new_authors" value="<?php echo $db_authors; ?>"><br><br>
            <label for="new_pub_date">Update Publication Date</label> <br>
            <input type="text" name="new_pub_date" value="<?php echo $db_pub_date; ?>"><br><br>
            <label for="new_pub_name">Update Publisher</label> <br>
            <input type="text" name="new_pub_name" value="<?php echo $db_pub_name; ?>"><br><br>
            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        echo "<span class='error'>Record not found.</span>";
    }
}
?>