<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Log errors to stderr
ini_set('log_errors', 1);
ini_set('error_log', 'php://stderr');

// Check if we're in the correct directory
$currentDir = __DIR__;
error_log("Current directory: " . $currentDir);

// Check if the file exists before requiring it
$publicIndex = __DIR__ . '/../public/index.php';
if (!file_exists($publicIndex)) {
  error_log("Error: Could not find " . $publicIndex);
  http_response_code(500);
  die('Error: Could not find public/index.php');
}

error_log("Loading public/index.php from: " . $publicIndex);

// Forward Vercel requests to normal index.php
require $publicIndex;
