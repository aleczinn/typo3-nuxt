<?php
declare(strict_types=1);
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

$keyImageWithText = 'image_with_text';

// Adds the content element to the "Type" dropdown
ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'Image with Text',
        'value' => $keyImageWithText,
        'icon' => 'content-text',
        'group' => 'special',
        'description' => 'Bild mit Text'
    ],
    'textmedia',
    'after',
);

// Configure the default backend fields for the content element
$GLOBALS['TCA']['tt_content']['types'][$keyImageWithText] = [
    'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
               --palette--;;general,
               header; Internal title (not displayed),
               bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
               --palette--;;hidden,
               --palette--;;access,
         ',
    'columnsOverrides' => [
        'bodytext' => [
            'config' => [
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
            ],
        ],
    ],
];
