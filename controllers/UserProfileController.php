<?php


namespace app\controllers;
use app\models\UserMoneyReports;
use Yii;
use app\models\UserProfile;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Funds;
use app\controllers\FundsController;
use yii\web\UploadedFile;


/**
 * UserProfileController implements the CRUD actions for UserProfile model.
 */
class UserProfileController extends Controller
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
     * Lists all UserProfile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UserProfile::find(),
        ]);
         $model = UserProfile::find()->all();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserProfile model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
  

    /**
     * Creates a new UserProfile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $model = new UserProfile();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }


    //             return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }


    public function actionRefillBalance($id)
    {
        $UserProfile = new UserProfile();
        $funds = new UserMoneyReports();
        $model =UserProfile::findOne(['user_id'=>$id]);


        if ($model->load(Yii::$app->request->post())) 
        {
            /*adding balance*/
            $model->user_balance += $model->temp_user_balance;
            $model->save(false);

            /*keeping history*/
            $funds->user_id = $model->user_id;
            $funds->balance = $model->temp_user_balance;
            $funds->is_income = 1;
            $funds->time = date('Y-m-d');
            $funds->description = 'Admin tomonidan o\'tkazildi';
            $funds->save(false);
            Yii::$app->session->setFlash('success-alert', "Mablag' o'tkazildi!");
            return $this->redirect(['user-profile/']);
        }
        else
        {
            return $this->render('create', [
                'model' => $model,
                'funds' => $funds,
            ]);
        }
    }

        public function actionGetUserBalance()
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $data = Yii::$app->request->post();
            $user_id = $data['user_id'];
            $balance = UserProfile::findOne(['user_id'=>$user_id]);
            return $balance->user_balance;
        }





    /**
     * Updates an existing UserProfile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user_photo = $model->user_photo;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $model->user_photo = UploadedFile::getInstance($model, 'user_photo');
                if ($model->user_photo and $model->upload()) {
                    $model->user_photo = $model->user_photo->baseName.'.'.$model->user_photo->extension;
                    $model->save();
                }else{
                    $model->user_photo = $user_photo;
                    $model->save();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);

           }else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Deletes an existing UserProfile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = \app\models\UserProfile::find()->where(['id'=>$id,'status'=>'active'])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     
}
