<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Log errors to stderr
ini_set('log_errors', 1);
ini_set('error_log', 'php://stderr');

// Set default timezone
date_default_timezone_set('UTC');

// Load Composer's autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Check if the request is for a static file
$uri = $_SERVER['REQUEST_URI'];
if (preg_match('/\.(css|js|jpg|jpeg|png|gif|ico|svg|webp|mp4)$/i', $uri)) {
  $file = __DIR__ . '/../public' . $uri;
  if (file_exists($file)) {
    $extension = pathinfo($file, PATHINFO_EXTENSION);
    $mime_types = [
      'css' => 'text/css',
      'js' => 'application/javascript',
      'jpg' => 'image/jpeg',
      'jpeg' => 'image/jpeg',
      'png' => 'image/png',
      'gif' => 'image/gif',
      'ico' => 'image/x-icon',
      'svg' => 'image/svg+xml',
      'webp' => 'image/webp',
      'mp4' => 'video/mp4'
    ];

    if (isset($mime_types[$extension])) {
      header('Content-Type: ' . $mime_types[$extension]);
      header('Cache-Control: public, max-age=31536000');
      readfile($file);
      exit;
    }
  }
}

// Forward the request to Laravel
require_once __DIR__ . '/../public/index.php';
