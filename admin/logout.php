<?php
require_once '../config.php';

// Hapus semua session
session_destroy();

// Redirect ke login
redirect(ADMIN_URL . '/login.php');
?>