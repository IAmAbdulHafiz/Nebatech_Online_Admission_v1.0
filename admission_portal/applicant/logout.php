<?php
session_start();
session_destroy();
header("Location: applicant/login.php");
?>