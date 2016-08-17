<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "click_clients".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $idCliente
 */
class Calendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'click_calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCliente'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => yii::t('common','ID'),
            'nombre' => yii::t('common','Name'),
            'idCliente' => yii::t('common','Client'),
        ];
    }

    public function getCalendars($id){ 
        $connection = Yii::$app->getDb();
       
        $query = (new \yii\db\Query())
           ->select('id, nombre', 'idCliente')
           ->from('click_calendar')
           ->where(['idCliente' => $id])
           ->all();
        $retorno = $query;
        return $retorno;
    }

    public function getNumCalendars($id){ 
        $connection = Yii::$app->getDb();
       
        $query = (new \yii\db\Query())
           ->select(['COUNT(*) AS count'])
           ->from('click_calendar')
           ->where(['idCliente' => $id])
           ->all();
        $retorno = $query[0]['count'];
        return $retorno;
    }
}
