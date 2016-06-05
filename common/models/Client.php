<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "click_clients".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $direccion
 * @property string $cPostal
 * @property string $poblacion
 * @property string $provincia
 * @property string $pais
 * @property integer $telefono
 * @property integer $nCuenta
 * @property integer $plan
 * @property string $fecha_alta
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'click_clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'direccion', 'cPostal', 'provincia', 'fecha_alta'], 'required'],
            [['telefono', 'nCuenta', 'plan'], 'integer'],
            [['fecha_alta'], 'safe'],
            [['nombre', 'direccion'], 'string', 'max' => 255],
            [['cPostal'], 'string', 'max' => 5],
            [['poblacion', 'provincia', 'pais'], 'string', 'max' => 100]
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
            'direccion' => yii::t('common','Address'),
            'cPostal' => yii::t('common','Postal Code'),
            'poblacion' => yii::t('common', 'Town'),
            'provincia' => yii::t('common','Province'),
            'pais' => yii::t('common','Country'),
            'telefono' => yii::t('common','Phone'),
            'nCuenta' => yii::t('common','Account Number'),
            'plan' => yii::t('common','Program'),
            'fecha_alta' => yii::t('common','Start Date'),
        ];
    }
}
