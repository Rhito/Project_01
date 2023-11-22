<?php
    $conn = new mysqli("localhost", "root", "", "project_01_dtl");

    // Check connection
    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
        exit();
}
