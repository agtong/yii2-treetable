<?php

/**
 * @copyright Copyright &copy; Arno Slatius 2017
 * @package yii2-treetable
 * @version 1.0
 */

namespace agtong\treetable;

use \Yii;
use yii\grid\GridView;
use yii\helpers\Json;
use agtong\treetable\TreetableAsset;

class Treetable extends GridView
{
    /**
    * @var array configuration options for the treetable() component
    */
    public $treetableOptions = ['expandable' => true, 'indent' => 0];

    /**
    * @var boolean load default theme
    */
    public $treetableTheme = false;

    /**
    * @var boolean whether to load your own css
    */
    public $useOwnCss = false;

    /**
     * @var integer a counter used to generate [[id]] for widgets.
     * @internal
     */
    public static $counter = 0;

    /**
     * Initializes the widget
     *
     * Register the assets and activate the jquery.treetable() on the table
     */
    public function init()
    {
        /* Register the assets */
        TreetableAsset::register($this->view, $this->treetableTheme);

        /* Determine table id */
        if (in_array('id', $this->tableOptions))
            $id = $this->tableOptions['id'];
        else
            $this->tableOptions['id'] = 'treetable' . static::$counter++;;

        /* Activate the jquery code */
        $options = Json::htmlEncode($this->treetableOptions);
        $this->view->registerJs("$('#".$this->tableOptions['id']."').treetable(".$options.");");

        if (!$this->useOwnCss) {
            $css = file_get_contents(Yii::getAlias('@vendor') . '/agtong/yii2-treetable/css/treetable.css');
            $this->view->registerCss($css);
        }

        parent::init();
    }
}
