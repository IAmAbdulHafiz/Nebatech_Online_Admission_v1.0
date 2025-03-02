<?php
// Set a cookie with advanced security options
setcookie("userPreference", "darkMode", [
    'expires' => time() + (7 * 24 * 60 * 60), // Expires in 7 days
    'path' => '/',
    'domain' => 'nebatech.com',   // Replace with your actual domain
    'secure' => true,               // Only send cookie over HTTPS
    'httponly' => true,             // Accessible only via HTTP(S), not JavaScript
    'samesite' => 'Strict'          // Prevent cross-site request forgery
]);

// Check if the cookie is set
if (isset($_COOKIE['userPreference'])) {
    echo "User preference: " . htmlspecialchars($_COOKIE['userPreference']);
} else {
    echo "Cookie is not set.";
}
?>
