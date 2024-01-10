<?php
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

$app = new FrameworkX\App();

$app->get('/inventory', Gian\Wms\InventoryController::class);

$app->run();
