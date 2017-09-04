<?php

// configure your app for the production environment

$app['xhprof.trace_name'] = uniqid();
$app['xhprof.source'] = 'yourapp';
$app['xhprof.href'] = "<a href=\"http://127.0.0.1:1026/index.php?run={$app['xhprof.trace_name']}&source={$app['xhprof.source']}\">xhprof</a>";


$app['twig.path'] = array(__DIR__.'/../templates');
$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');
