<?php
// ================================
// Hatim's School of Mathematics
// Website Configuration
// ================================

// Website Settings
define('SITE_NAME', "Hatim's School of Mathematics");
define('SITE_URL', "https://hatimeducationsite.infinityfree.me");

// Database Settings
define('DB_HOST', "sql306.infinityfree.com");
define('DB_NAME', "if0_42367222_hatim_site");
define('DB_USER', "if0_42367222");
define('DB_PASS', "hat1ms1t30");

// Time Zone
date_default_timezone_set("Asia/Karachi");

// Start Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
