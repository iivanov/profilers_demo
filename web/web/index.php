<?php

ini_set('display_errors', 0);
//init xhprof
tideways_enable(TIDEWAYS_FLAGS_NO_SPANS | TIDEWAYS_FLAGS_CPU | TIDEWAYS_FLAGS_MEMORY);

require_once __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../src/app.php';
require __DIR__.'/../config/prod.php';
require __DIR__.'/../src/controllers.php';
$app->run();



$file_path = sys_get_temp_dir() . "/{$app['xhprof.trace_name']}.{$app['xhprof.source']}.xhprof";

$data = tideways_disable();
file_put_contents(
    $file_path,
    serialize($data)
);