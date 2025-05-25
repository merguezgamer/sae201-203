<?php
session_start();
function verifierAdmin() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header("Location: acceuil.php");
        exit;
    }
} 
?>