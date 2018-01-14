<?php

namespace yamalweb\slider\widgets;

use yamalweb\slider\models\Slider;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
/**
 * This is just an example.
 */
class SliderWidget extends \yii\base\Widget
{

    public $controlsVisible = true;
    public $controls = [];
    public $urlClass = 'btn btn-success btn-lg';

    private $items;

    public function init(){
        parent::init();

        if ($this->controlsVisible === true) {
            $this->controls = [
                '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
            ];
        }else{
            $this->controls = false;
        }

        $model = Slider::find()->where(['is_public'=>1])->orderBy('sort_order')->all();

        $this->items = ArrayHelper::toArray($model,[
            'yamalweb\slider\models\Slider' => [
                'content'=>function ($slider) {
                    return Html::img($slider->getThumbUploadUrl('pic', 'preview'), ['style'=>'width: 100%;']);
                },
                'caption'=>function ($slider) {
                    return '<h2>'.$slider->title.'</h2>'."<p>$slider->description</p>".self::getUrl($slider)
                        ;
                },
            ],
        ]);
    }

    public function run(){

        return $this->render('slider.php',[
            'items'=>$this->items,
            'controls'=>$this->controls
        ]);
    }

    private function getUrl($model){

        return $model->url?Html::a('Подробнее...',$model->url,['target'=>'_blank',
            'class'=>$this->urlClass]):'';

    }
}
