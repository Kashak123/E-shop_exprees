<?php
    session_start();
    $sessionId = session_id();

    $conn = new mysqli("localhost", "root", "", "my_database");
?>