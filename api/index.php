<?php

// Load composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Load Laravel app
$app = require __DIR__ . '/../bootstrap/app.php';

// Run the application
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
  $request = Illuminate\Http\Request::capture()
);
$response->send();
$kernel->terminate($request, $response);
