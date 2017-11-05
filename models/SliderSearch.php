<?php

namespace yamalweb\slider\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yamalweb\slider\models\Slider;

/**
 * BlogSearch represents the model behind the search form about `common\modules\blog\models\Blog`.
 */
class SliderSearch extends  Slider
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_public'], 'integer'],
            [['title', 'description', 'url', 'update_datetime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Slider::find()
            ->orderBy('create_datetime DESC')
            ->andWhere('is_public = 1');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>20
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        return $dataProvider;
    }

    public function searchAdmin($params)
    {
        $query = Slider::find()->orderBy(['sort_order' => SORT_ASC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            'sort' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'update_datetime' => $this->update_datetime,
            'is_public' => $this->is_public,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
