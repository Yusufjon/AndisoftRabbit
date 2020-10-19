<?php

namespace app\controllers;

use app\models\LoginLogs;
use app\models\User;
use app\models\UserProfile;
use app\models\UserProfit;
use app\models\UserRoleChangeLogs;
use Yii;
use app\models\UserModel;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for UserModel model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UserModel::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserModel model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionDillerView($id)
    {
        $userParentHierachy = UserProfit::findAll(['taken_user_id'=>$id]);
        $settings = (new \yii\db\Query())
            ->from('settings')
            ->one();

        return $this->render('diller_view', [
            'model' => $this->findModel($id),
            'userParentHierachy' => $userParentHierachy,
            'settings' => $settings,
        ]);
    }

    /**
     * Creates a new UserModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserModel();

        if ($model->load($post = Yii::$app->request->post()) /*&& $model->save()*/) {
            $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $model->save(false);
            $userProfile = new UserProfile();
            $userProfile->user_id = $model->id;
            $userProfile->user_balance = $model->userBalance;
            $userProfile->user_parent_id = (!empty($post['user_parent'])?$post['user_parent']:0);
            $userProfile->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDillerCreateUser()
    {
        $model = new UserModel();

        $settings = (new \yii\db\Query())
            ->from('settings')
            ->one();

        if ($model->load($post = Yii::$app->request->post()) /*&& $model->save()*/) {
            $model->role = 4;
            $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $model->save(false);
            $userProfile = new UserProfile();
            $userProfile->user_id = $model->id;
            $userProfile->user_parent_id = (!empty($post['user_parent'])?$post['user_parent']:0);
            $userProfile->user_rabbit_quantity = $post['rabbit_quantity'];
            $userProfile->save(false);
              $percentage =  UserProfit::writeRoot($model->id);
              $study_fee_percentage = $settings['study_fee']*$percentage/100;

            /*dillerni balansidan ayrib yuborish*/
            $dillerBalance = UserProfile::findOne(['user_id'=>Yii::$app->user->id]);
            $rabbit_fee = $post['rabbit_quantity']*$settings['rabbit_price']+$study_fee_percentage;
            $dillerBalance->user_balance-= $rabbit_fee;
            $dillerBalance->save(false);

            return $this->redirect(['diller-view', 'id' => $model->id]);
        }


        return $this->render('diller_create_user', [
            'model' => $model,
            'settings' => $settings,
        ]);
    }

    public function actionGetRabbitPrice()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $settings = (new \yii\db\Query())
            ->from('settings')
            ->one();
        return $settings;
    }


    /**
     * Updates an existing UserModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldRole = $model->roleName->name;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $newRole = $model->roleName->name;
           if(strlen($model->tempPassword)>0)
           {
               $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->tempPassword);
               $model->save(false);
           }
           if($oldRole != $newRole) {
               $loginLogs = new UserRoleChangeLogs();
               $loginLogs->old_role = $oldRole;
               $loginLogs->new_role = $newRole;
               $loginLogs->user_id = Yii::$app->user->id;
               $loginLogs->time = time();
               $loginLogs->ip = $_SERVER['REMOTE_ADDR'];
               $loginLogs->save(false);
           }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UserModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $user = UserModel::findOne($id);
        $user->status = 0;
        $user->save(false);

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
