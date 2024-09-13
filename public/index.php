<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Aumentar el tiempo máximo de ejecución a 120 segundos
set_time_limit(120);

// Verificar si la aplicación está en modo de mantenimiento
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Registrar el autoloader de Composer
require __DIR__.'/../vendor/autoload.php';

// Iniciar Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// Manejar la solicitud entrante y enviar la respuesta de vuelta al navegador
$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
);

$response->send();

// Terminar el proceso del kernel
$kernel->terminate($request, $response);
