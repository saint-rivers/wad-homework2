<?php

include "../config/config.php";

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `tasks` WHERE `id`='$user_id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record deleted successfully.";
    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
header('Location: index.php');