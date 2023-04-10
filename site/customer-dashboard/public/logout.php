<?php
// Initialize the session
session_start();

// Destroy the session.
session_unset();
// Redirect to login page
header("location: /site/");
exit;
?>