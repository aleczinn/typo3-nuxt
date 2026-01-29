<?php
declare(strict_types=1);

namespace Babiel\BabielCore\ContentElement;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

abstract class AbstractContentElement {

    abstract public static function getCtype(): string;
    abstract public static function getLabel(): string;
    abstract public static function getDescription(): string;
    abstract public static function getShowItem(): string;
    abstract public static function getColumnsOverrides(): array;

    public abstract function register(): void {
        $ctype = static::getCtype();

        ExtensionManagementUtility::addTcaSelectItem(
            'tt_content',
            'CType',
            [
                'label' => static::getLabel(),
                'value' => $ctype,
                'icon' => static::getIcon(),
                'group' => 'special',
                'description' => static::getDescription(),
            ],
            'textmedia',
            'after',
        );

        $GLOBALS['TCA']['tt_content']['types'][$ctype] = [
            'showitem' => static::getShowItem(),
            'columnsOverrides' => static::getColumnsOverrides(),
        ];
    }

    public static function getIcon(): string {
        return 'content-text';
    }
}