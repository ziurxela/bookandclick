<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "click_planes".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $nCalendarios
 */
class Planes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'click_planes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'nCalendarios'], 'required'],
            [['nCalendarios'], 'integer'],
            [['nombre'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' =>  yii::t('common', 'ID'),
            'nombre' => yii::t('common','Name'),
            'nCalendarios' => yii::t('common','Number of Calendars'),
        ];
    }

    public function getNumCalendarsByClient($idClient){
        $connection = Yii::$app->getDb();
       
        $queryPlan = (new \yii\db\Query())
           ->select(['plan'])
           ->from('click_clients')
           ->where(['id' => $idClient])
           ->all();
        $plan = $queryPlan[0]['plan'];
        if ($plan == 0){
            $nCalendarios = 0;
        }else{
            $queryNCalendar = (new \yii\db\Query())
               ->select(['nCalendarios'])
               ->from('click_planes')
               ->where(['id' => $plan])
               ->all();
            $nCalendarios = $queryNCalendar[0]['nCalendarios'];
        }
        return $nCalendarios;
    }
}
