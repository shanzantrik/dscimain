<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Return a simple JSON response
header('Content-Type: application/json');
echo json_encode([
  'status' => 'ok',
  'php_version' => PHP_VERSION,
  'server' => $_SERVER['SERVER_SOFTWARE'] ?? 'unknown',
  'time' => date('Y-m-d H:i:s'),
  'directory' => __DIR__,
  'files' => scandir(__DIR__)
]);
