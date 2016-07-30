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
            [['idCliente'], 'required'],
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
}
