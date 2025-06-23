<?php

function get_contacts(): array
{
    global $conn;
    $sql = "SELECT * FROM contacts ";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        return [];
    }

    return $result->fetch_all(MYSQLI_ASSOC);

}


function get_contact($id): array
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM contacts where id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        return [];
    }

    return $result->fetch_assoc();

}

