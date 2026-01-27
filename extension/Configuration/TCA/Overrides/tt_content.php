<?php
defined('TYPO3') or die();

// Hero Banner Content Element registrieren
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'Hero Banner',
        'value' => 'herobanner',
        'icon' => 'content-image',
        'group' => 'special',
        'description' => 'Großes Hero-Banner mit Bild und Text'
    ]
);

// Felder für Hero Banner definieren
$GLOBALS['TCA']['tt_content']['types']['herobanner'] = [
    'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            header;Überschrift (Hero Title),
            subheader;Unterüberschrift,
            bodytext;Beschreibung,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:media,
            image;Hintergrundbild,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:appearance,
            --palette--;;frames,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;;access,
    ',
    'columnsOverrides' => [
        'bodytext' => [
            'config' => [
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
            ]
        ],
        'image' => [
            'config' => [
                'maxitems' => 1,
            ]
        ]
    ]
];