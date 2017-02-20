<?php

namespace lilhamma\store;

/**
 * LilhammaStore module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    //public $controllerNamespace = 'lilhamma\yii2-store\controllers';
	
	public $userModel;
	
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
