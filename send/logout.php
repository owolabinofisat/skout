<?php
// Start the session
session_start();

// Destroy the session and logout the user
session_destroy();

echo json_encode(['message' => 'Logout successful']);
?>