<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Movimiento;

/**
 * MovimientosSearch represents the model behind the search form about `app\models\Movimiento`.
 */
class MovimientosSearch extends Movimiento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cuenta_id'], 'integer'],
            [['fecha_aparicion', 'concepto'], 'safe'],
            [['importe'], 'number'],
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
        $query = Movimiento::find();

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
            'id' => $this->id,
            'fecha_aparicion' => $this->fecha_aparicion,
            'importe' => $this->importe,
            'cuenta_id' => $this->cuenta_id,
        ]);

        $query->andFilterWhere(['like', 'concepto', $this->concepto]);

        return $dataProvider;
    }
}
