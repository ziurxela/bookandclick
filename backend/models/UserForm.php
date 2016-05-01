<?php
namespace backend\models;

use common\models\User;
use yii\base\Model;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * Create user form
 */
class UserForm extends Model
{
    public $client;
    public $username;
    public $email;
    public $password;
    public $status;
    public $roles;

    private $model;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['client','filter', 'filter' => 'trim'],
            
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass'=>'\common\models\User', 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id'=>$this->getModel()->id]]);
                }
            }],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass'=> '\common\models\User', 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id'=>$this->getModel()->id]]);
                }
            }],

            ['password', 'required', 'on'=>'create'],
            ['password', 'string', 'min' => 6],

            [['status'], 'boolean'],
            [['roles'], 'each',
                'rule' => ['in', 'range' => ArrayHelper::getColumn(
                    Yii::$app->authManager->getRoles(),
                    'name'
                )]
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'client' => Yii::t('backend','Client'),
            'username' => Yii::t('backend', 'Username'),
            'email' => Yii::t('backend', 'Email'),
            'password' => Yii::t('backend', 'Password'),
            'roles' => Yii::t('backend', 'Roles')
        ];
    }

    public function setModel($model)
    {
        $this->client = $model->client;
        $this->username = $model->username;
        $this->email = $model->email;
        $this->status = $model->status;
        $this->model = $model;
        if(Yii::$app->user->can('administrator')){
            $this->roles = ArrayHelper::getColumn(
                Yii::$app->authManager->getRolesByUser($model->getId()),
                'name'
            );
        }
        return $this->model;
    }

    public function getModel()
    {
        if (!$this->model) {
            $this->model = new User();
        }
        return $this->model;
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function save()
    {  
        
        if ($this->validate()) {
            $model = $this->getModel();
            $isNewRecord = $model->getIsNewRecord();
            if(Yii::$app->user->can('administrator')){
                $model->client = $this->client;
            }else{
                $model->client = Yii::$app->user->identity->client;
            }
            $model->username = $this->username;
            $model->email = $this->email;
            $model->status = $this->status;
            if ($this->password) {
                $model->setPassword($this->password);
            }
            if ($model->save() && $isNewRecord) {
                $model->afterSignup();
            }
            $auth = Yii::$app->authManager;
            $auth->revokeAll($model->getId());

            if ($this->roles && is_array($this->roles)) {
                foreach ($this->roles as $role) {
                    $auth->assign($auth->getRole($role), $model->getId());
                }
            }
/*  Creación de ficheros para el calendario          
            $directorioCalendar = "../../common/calendar/". Yii::$app->user->identity->client."/". $model->getId();
            
            if(!is_dir($directorioCalendar)){
                @mkdir($directorioCalendar, 0700);
            }else{
                throw new NotFoundHttpException('Ya existe ese directorio'); 
            }  

            $ourFileName = $directorioCalendar. "/" . date("Y"). date("m") .".json.php";
            $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
            fclose($ourFileHandle);
  */
            return !$model->hasErrors();
        }
        return null;
    }
}
