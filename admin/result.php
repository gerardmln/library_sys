<?php

include("connections.php");

if(empty($_GET["search"])) {
    echo "WALANG LAMAN BEH!";
} else {
    $check = $_GET["search"];
    $terms = explode(" ", $check);

    // Build query to search across multiple columns
    $q = "SELECT * FROM bookstbl WHERE ";
    $search_columns = ["isbn", "title", "authors", "pub_date", "pub_name"];
    $conditions = [];

    foreach ($terms as $each) {
        $sub_conditions = [];
        foreach ($search_columns as $col) {
            $sub_conditions[] = "$col LIKE '%$each%'";
        }
        $conditions[] = "(" . implode(" OR ", $sub_conditions) . ")";
    }
    $q .= implode(" AND ", $conditions);

    $query = mysqli_query($connections, $q);
    $c_q = mysqli_num_rows($query);

    if($c_q > 0 && $check!=""){
        echo "<table border='1' width='50%'>";
        echo "<tr>
                <td>ISBN</td>
                <td>Title</td>
                <td>Authors</td>
                <td>Date of Publication</td>
                <td>Publisher</td>
            </tr>";
        while($row = mysqli_fetch_assoc($query)) {
            echo "<tr>
                    <td>{$row['isbn']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['authors']}</td>
                    <td>{$row['pub_date']}</td>
                    <td>{$row['pub_name']}</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No Result.";
    }
}

?>