<?php
session_start();

// Ако корисникот не е најавен, пренасочи кон login
if (!isset($_SESSION['user_id'])) {
    header("Location: users/login.php");
    exit();
}
