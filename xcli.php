#!/usr/bin/env php
<?php
use Ballen\Clip\Utilities\CommandRouter;
use Ballen\Clip\Exceptions\CommandNotFoundException;

$bindir = dirname(__FILE__);
require_once $bindir . 'vendor/autoload.php';

$app = new CommandRouter($argv);

$app->add('help', Xcli\Handlers\HelpHandler::class);
$app->add('update', Xcli\Handlers\UpdateHandler::class);

try {
    $app->dispatch();
} catch (CommandNotFoundException $exception) {
    $app->dispatch('help');
}

