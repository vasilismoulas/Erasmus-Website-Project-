<?php
session_start();
$response = isset($_SESSION['username']) ? 'true' : 'false';
echo json_encode($response);
?>