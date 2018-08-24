<?php

require 'vendor/autoload.php';

// Configure the data store

$dir = __DIR__ . '/data';

$config = new \JamesMoss\Flywheel\Config($dir, array(
    'formatter' => new \JamesMoss\Flywheel\Formatter\JSON,
));

$repo = new \JamesMoss\Flywheel\Repository('shouts', $config);
    
// Store the posted shout data to the data store

if (isset($_POST["name"]) && isset($_POST["comment"])) {
    
    $name = htmlspecialchars($_POST["name"]);
    $name = str_replace(["\n", "\r"], '', $name);

    $comment = htmlspecialchars($_POST["comment"]);
    $comment = str_replace(["\n", "\r"], '', $comment);
    
    // Storing a new shout

    $shout = new \JamesMoss\Flywheel\Document([
        'text' => $comment,
        'name' => $name,
        'createdAt' => time()
    ]);
    
    $repo->store($shout);
    
}
