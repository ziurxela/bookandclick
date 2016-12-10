<?php

namespace common\models;

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
class Event extends \yii\db\ActiveRecord
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
            [['id', 'calendar', 'titulo', 'descripcion', 'fechaCreacion','customer', 'eventDate', 'start', 'end'], 'required'],
            [['id', 'calendar', 'customer'], 'integer'],
            [['fechaCreacion', 'eventDate', 'start', 'end'], 'safe'],
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
            'calendar' => 'Calendario',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripción',
            'fechaCreacion' => 'Fecha Creación',
            'customer' => 'Cliente',
            'eventDate' => 'Fecha del Evento',
            'start' => 'Inicio',
            'end' => 'Fin',
        ];
    }
    
    public function getRecessByClient($idCalendar){
        $connection = Yii::$app->getDb();
       
        $query = (new \yii\db\Query())
           ->select('*')
           ->from('click_calendar_event')
           ->where(['calendar' => $idCalendar])
           ->all();
        $retorno = $query;

        return $retorno;
    }

    public function getModel($data){
        $EventModel = new event();
        $EventModel->id = $data['id'];
        $EventModel->isNewRecord = false;
         return $EventModel;
    }

    public function addRecess($idCalendar){
        $Recess = 'ola q ase';//getRecess($idCalendar);

        echo '<script language="javascript">alert("'. $Recess .'");</script>';
        return true;
    }

    public function getRecess($idCalendar){
        
        return  '(function ( $event ) { AddNewRecess('. $idCalendar .'); })();';
    }
}
