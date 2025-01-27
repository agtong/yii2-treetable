<?php

/**
 * @copyright Copyright &copy; Arno Slatius 2017
 * @package yii2-treetable
 * @version 1.0
 */

namespace agtong\treetable;

use yii\web\AssetBundle;

class TreetableAsset extends AssetBundle {

    public $sourcePath = '@bower/jquery-treetable';
    public $css = [
        'css/jquery.treetable.css',
    ];
    public $js = [
        'jquery.treetable.js',
    ];
    public $depends = [
       'yii\web\JqueryAsset',
    ];

    /**
     * @inheritdoc
     */
    public static function register($view, $useDefaultTheme=false)
    {
        if ($useDefaultTheme) {
            $css[] = 'css/jquery.treetable.theme.default.css';
        }
        parent::register($view);
    }
}