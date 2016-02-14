<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "click_calendar_event".
 *
 * @property integer $id
 * @property integer $client
 * @property string $titulo
 * @property string $descripcion
 * @property string $fechaCreacion
 */
class CalendarEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'click_calendar_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'client', 'titulo', 'descripcion', 'fechaCreacion'], 'required'],
            [['id', 'client'], 'integer'],
            [['fechaCreacion'], 'safe'],
            [['titulo'], 'string', 'max' => 255],
            [['descripcion'], 'string', 'max' => 4000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    
    {
        return [
            'id' => 'ID',
            'client' => 'Client',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'fechaCreacion' => 'Fecha Creacion',
        ];
    }
}
