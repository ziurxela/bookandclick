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

    const LANGUAGE_ENGLISH = '';
    const LANGUAGE_SPANISH = 'es-ES';
    const FIRSTDAY_LANG = 0;
    const FIRSTDAY_MONDAY = 1;
    const FIRSTDAY_SUNDAY = 2;
    const TRUE = 1;
    const FALSE = 0;
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
            [['language'], 'in', 'range'=>[NULL, self::LANGUAGE_ENGLISH, self::LANGUAGE_SPANISH]],
            [['firstday'], 'in', 'range'=>[self::FIRSTDAY_LANG, self::FIRSTDAY_MONDAY, self::FIRSTDAY_SUNDAY]],
            [['format12'], 'in', 'range'=>[self::TRUE, self::FALSE]],
            [['timeStart'], 'string', 'max' => 5],
            [['timeEnd'], 'string', 'max' => 5],
            [['timeInterval'], 'integer'],
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
            'language' => yii::t('backend', 'Language'),
            'firstday' => yii::t('common', 'First day'),
            'format12' => yii::t('common', 'Hours format'),
            'timeStart' => yii::t('common', 'Start day'),
            'timeEnd' => yii::t('common', 'End of day'),
            'timeInterval' => yii::t('common', 'Time Interval'),
        ];
    }

    public function getCalendars($id){ 
        $connection = Yii::$app->getDb();
       
        $query = (new \yii\db\Query())
           ->select(['*'])
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

    public function findModel($id)
    {
        if (($model = Calendar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function encodeName($name){
        $name = str_replace(' ', '', $name);
        $name = str_replace('&', 'And', $name);
        return $name;
    }
}
