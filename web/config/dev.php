<?php

use Silex\Provider\MonologServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;

// include the prod configuration
require __DIR__.'/prod.php';

// enable the debug mode
$app['debug'] = true;

$app['xhprof.trace_name'] = uniqid();
$app['xhprof.source'] = 'yourapp';
$app['xhprof.href'] = "<a href=\"http://127.0.0.1:1026/index.php?run={$app['xhprof.trace_name']}&source={$app['xhprof.source']}\">xhprof</a>";

$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../var/logs/silex_dev.log',
));

$app->register(new WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => __DIR__.'/../var/cache/profiler',
));
