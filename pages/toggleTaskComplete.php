<?php

include "config.php";

if (isset($_POST['id'])) {
    $task_id = $_POST['id'];
    $is_completed = $_POST['is_completed'];

    if ($is_completed == 1) {
        $sql = "UPDATE `tasks` SET `is_completed`= 0 WHERE `id`='$task_id'";
    } else {
        $sql = "UPDATE `tasks` SET `is_completed`= 1 WHERE `id`='$task_id'";
    }

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record deleted successfully.";
    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
header('Location: index.php');
