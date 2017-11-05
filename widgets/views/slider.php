<?php
use yamalweb\slider\SliderAsset;
SliderAsset::register($this);

echo yii\bootstrap\Carousel::widget([
    'controls' => $controls,
    'items' => $items
]);