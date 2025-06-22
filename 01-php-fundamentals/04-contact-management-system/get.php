<?php
function get_contacts(): array
{
    require_once('db.php');

    $sql = "SELECT * FROM contacts ";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        return [];
    }

    return $result->fetch_all(MYSQLI_ASSOC);

}

