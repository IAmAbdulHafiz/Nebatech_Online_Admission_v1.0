<?php
session_start();

// Generate a random CAPTCHA string
$captchaText = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 0, 6);

// Store the CAPTCHA text in a session variable
$_SESSION['captcha'] = $captchaText;

// Create an image
$image = imagecreate(120, 40);
$backgroundColor = imagecolorallocate($image, 255, 255, 255); // White background
$textColor = imagecolorallocate($image, 0, 0, 0); // Black text

// Add the CAPTCHA text to the image
imagestring($image, 5, 10, 10, $captchaText, $textColor);

// Output the image as a PNG
header("Content-Type: image/png");
imagepng($image);
imagedestroy($image);
?>
