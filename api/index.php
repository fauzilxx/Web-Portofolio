<?php

// Vercel Serverless PHP - Laravel Bootstrap

try {
    // Autoload
    require __DIR__ . '/../vendor/autoload.php';

    // Bootstrap Laravel
    $app = require_once __DIR__ . '/../bootstrap/app.php';

    // Handle Request
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );

    $response->send();

    $kernel->terminate($request, $response);
    
} catch (\Throwable $e) {
    // Fallback error display
    http_response_code(500);
    if (getenv('APP_DEBUG') === 'true') {
        echo '<h1>Laravel Bootstrap Error</h1>';
        echo '<pre>' . htmlspecialchars($e->getMessage()) . '</pre>';
        echo '<pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
    } else {
        echo '<h1>500 Server Error</h1>';
        echo '<p>Something went wrong.</p>';
    }
}
