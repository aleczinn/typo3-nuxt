<?php
declare(strict_types=1);

namespace Babiel\BabielCore\ContentElement;

class ImageWithText extends AbstractContentElement
{
    public static function getCtype(): string {
        return 'image_with_text';
    }

    public static function getLabel(): string {
        return 'Image with Text';
    }

    public static function getDescription(): string {
        return 'Bild mit Text';
    }

    public static function getShowItem(): string {
        return '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
               --palette--;;general,
               header; Internal title (not displayed),
               bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
               --palette--;;hidden,
               --palette--;;access,
        ';
    }

    public static function getColumnsOverrides(): array {
        return [
            'bodytext' => [
                'config' => [
                    'enableRichtext' => true,
                    'richtextConfiguration' => 'default',
                ],
            ]
        ];
    }
}