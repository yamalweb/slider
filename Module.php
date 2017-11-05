<?php

namespace yamalweb\slider;

use yii\helpers\Html;

class Module extends \yii\base\Module
{
    const THUMBNAIL_INSET    = 'inset';
    const THUMBNAIL_OUTBOUND = 'outbound';

    public function init()
    {
        parent::init();
        $this->params['mode'] = self::THUMBNAIL_OUTBOUND;

        // custom initialization code goes here
    }


}
