<?php
session_start();

// Database connection (example using MySQLi)
$db = new mysqli('localhost', 'username', 'password', 'profilelayouts');

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Process referral code if provided
if (isset($_GET['ref'])) {
    $referralCode = $db->real_escape_string($_GET['ref']);
    
    // Store in session
    $_SESSION['referred_by'] = $referralCode;
    
    // Redirect to remove ref from URL
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit;
}

// Generate referral code for current user if not exists
if (!isset($_SESSION['referral_code'])) {
    $_SESSION['referral_code'] = 'REF' . strtoupper(substr(md5(uniqid()), 0, 8));
    
    // Store in database if user is logged in
    // if (isset($_SESSION['user_id'])) {
    //     $userId = $_SESSION['user_id'];
    //     $code = $_SESSION['referral_code'];
    //     $db->query("UPDATE users SET referral_code = '$code' WHERE id = $userId");
    // }
}

// Apply discount if user was referred
if (isset($_SESSION['referred_by']) && !isset($_SESSION['discount_applied'])) {
    // Verify referral code exists
    $referrerCode = $_SESSION['referred_by'];
    $result = $db->query("SELECT id FROM users WHERE referral_code = '$referrerCode'");
    
    if ($result->num_rows > 0) {
        $_SESSION['discount'] = 10; // 10% discount
        $_SESSION['discount_applied'] = true;
        
        // You might want to record this in the database
        // $db->query("INSERT INTO referrals (referrer_id, referred_id) VALUES (...)");
    }
}

// Close connection
$db->close();
?>