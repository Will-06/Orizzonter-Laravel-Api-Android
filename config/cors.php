<?php

return [

    // Asegúrate de incluir todas las rutas necesarias de tu API
    'paths' => ['api/*', 'v1/*', 'sanctum/csrf-cookie'],

    // Permitir todos los métodos HTTP
    'allowed_methods' => ['*'],

    // Solo permite orígenes específicos (buenas prácticas)
    'allowed_origins' => [
        'http://localhost:4200',
        'http://127.0.0.1:4200',
    ],

    // Puedes dejar esto vacío si no usas expresiones regulares
    'allowed_origins_patterns' => [],

    // Permitir cualquier encabezado (como Authorization, Content-Type, etc.)
    'allowed_headers' => ['*'],

    // Headers que el navegador podrá leer desde la respuesta
    'exposed_headers' => [],

    // Tiempo en segundos que los navegadores pueden almacenar el resultado de la política CORS
    'max_age' => 0,

    // Muy importante si usas cookies (Sanctum, sesiones, etc.)
    'supports_credentials' => true,

];
