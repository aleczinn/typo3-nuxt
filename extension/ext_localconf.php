<?php
defined('TYPO3') or die();

// PSR-4 Autoloader für Babiel\BabielCore
spl_autoload_register(function ($class) {
    $prefix = 'Babiel\\BabielCore\\';
    $baseDir = __DIR__ . '/Classes/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});