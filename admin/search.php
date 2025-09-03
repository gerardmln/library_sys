<?php

$search = $searchErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["search"])) {
        $searchErr = "Required";
    } else {
        $search = $_POST["search"];
    }


    if ($search) {
        echo "<script>window.location.href='result.php?search=$search';</script>";
    }

}


?>

<style>

.error{color:red;}

</style>
</form>
<form action="result.php" method="get">
    <label for="search">Search for books:</label>
    <input type="text" name="search" id="search">
    <input type="submit" value="Search">
</form>


