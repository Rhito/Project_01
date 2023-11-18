<?php
    $conn = new mysqli("localhost", "root", "", "project_01_dtl");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
}
