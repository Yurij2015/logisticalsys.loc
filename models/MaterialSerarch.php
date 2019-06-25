<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Material;

/**
 * MaterialSerarch represents the model behind the search form of `app\models\Material`.
 */
class MaterialSerarch extends Material
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idmaterial', 'count', 'storehouse_idstorehouse', 'responsible_person'], 'integer'],
            [['price'], 'number'],
            [['notice', 'adoptiondate', 'material_name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Material::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idmaterial' => $this->idmaterial,
            'count' => $this->count,
            'price' => $this->price,
            'storehouse_idstorehouse' => $this->storehouse_idstorehouse,
            'adoptiondate' => $this->adoptiondate,
            'responsible_person' => $this->responsible_person,
        ]);

        $query->andFilterWhere(['like', 'notice', $this->notice])
            ->andFilterWhere(['like', 'material_name', $this->material_name]);

        return $dataProvider;
    }
}
