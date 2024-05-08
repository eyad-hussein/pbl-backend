<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*'],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'], // Add the HTTP methods your application uses
    'allowed_origins' => ['http://localhost:3000/'], // Add the origin (domain) of your React.js frontend
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['Content-Type', 'Authorization'], // Adjust as needed
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,

];
