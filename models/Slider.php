<?php

namespace common\modules\slider\models;

use common\modules\slider\Module;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use mongosoft\file\UploadImageBehavior;
use himiklab\sortablegrid\SortableGridBehavior;

/**
 * This is the model class for table "slider".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $pic
 * @property string $url
 * @property string $create_datetime
 * @property string $update_datetime
 * @property integer $is_public
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'url'], 'string'],
            ['pic', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['insert', 'update']],
            [['title'], 'required'],
            [['create_datetime', 'update_datetime'], 'safe'],
            [['is_public','sort_order'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'pic' => 'Изображение',
            'url' => 'Ссылка',
            'create_datetime' => 'Дата/время создания',
            'update_datetime' => 'Дата/время изменения',
            'is_public' => 'Опубликовано?',
        ];
    }

    function behaviors()
    {
        return [

            [
                'class' => \mohorev\file\UploadImageBehavior::className(),
                'attribute' => 'pic',
                'scenarios' => ['insert', 'update'],
                //'placeholder' => '@frontend/web/public/slider/no-image.jpg',
                'path' => '@frontend/web/public/slider',//\Yii::$app->params['uploadPathDocument']
                'url' => '@web/public/slider',
                /*'unlinkOnSave' => false,
                'unlinkOnDelete' => false,*/
                'thumbs' => [
                    'thumb' => ['width' => 80, 'quality' => 90],
                    'preview' => ['width' => 1425, 'height' => 540,'mode'=>Module::THUMBNAIL_OUTBOUND],
                ],
            ],
            'sort' => [
                'class' => SortableGridBehavior::className(),
                'sortableAttribute' => 'sort_order'
            ],
        ];
    }


    public static function getItems(){


    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($this->isNewRecord){
                $this->create_datetime = Yii::$app->formatter->asDatetime('now', "php:Y-m-d H:i:s");
            }
            $this->update_datetime = Yii::$app->formatter->asDatetime('now', "php:Y-m-d H:i:s");

            return true;
        }
        return false;
    }
}
