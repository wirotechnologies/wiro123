<?php
// cli-config.php
// configure Composer autoloader for Doctrine + Application namespaces
include __DIR__ . '/doctrine_autoloader.php';

// get the Doctrine "Entity Manager"
$em = include __DIR__ . '/entity.manager.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;
return ConsoleRunner::createHelperSet($em);
