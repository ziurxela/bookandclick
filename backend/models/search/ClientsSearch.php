<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Client;

/**
 * ClientsSearch represents the model behind the search form about `common\models\Client`.
 */
class ClientsSearch extends Client
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'telefono', 'nCuenta', 'plan'], 'integer'],
            [['nombre', 'direccion', 'cPostal', 'poblacion', 'provincia', 'pais', 'fecha_alta'], 'safe'],
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
        $query = Client::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'telefono' => $this->telefono,
            'nCuenta' => $this->nCuenta,
            'plan' => $this->plan,
            'fecha_alta' => $this->fecha_alta,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'cPostal', $this->cPostal])
            ->andFilterWhere(['like', 'poblacion', $this->poblacion])
            ->andFilterWhere(['like', 'provincia', $this->provincia])
            ->andFilterWhere(['like', 'pais', $this->pais]);

        return $dataProvider;
    }
}
