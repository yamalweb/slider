<?php
use common\modules\slider\SliderAsset;
SliderAsset::register($this);

echo yii\bootstrap\Carousel::widget([
    'controls' => $controls,
    'items' => $items
]);