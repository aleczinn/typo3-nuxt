<?php
defined('TYPO3') or die();

call_user_func(function() {
    $extensionKey = 'babiel_core';

    \TYPO3\CMS\Core\Utility\ExtensionmanagementUtility::addStaticFile(
        $extensionKey,
        'Configuration/TypoScript',
        'Babiel Template'
    );
});