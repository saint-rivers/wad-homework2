<?php
include "../config/config.php";

if (isset($_POST['submit'])) {
    $project_name = $_POST['project-name'];
    $description = $_POST['project-description'];
    echo $project_name;

    $sql = "INSERT INTO `projects` (`name`,`manager`) VALUES ('$project_name', 4)";

    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header('Location: /pages/project/projects.php');
}
