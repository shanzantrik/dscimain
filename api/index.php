<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the file exists before requiring it
if (!file_exists(__DIR__ . '/../public/index.php')) {
  http_response_code(500);
  die('Error: Could not find public/index.php');
}

// Forward Vercel requests to normal index.php
require __DIR__ . '/../public/index.php';
