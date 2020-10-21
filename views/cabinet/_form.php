<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\controllers\UserProfileController;
$user = \app\models\User::findOne($_GET['id']);
$data = \yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id', 'fullname');
$client = \app\models\UserProfile::find()->all()?>
/* @var $this yii\web\View */
/* @var $model app\models\UserProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
<!--                <h3 class="panel-title text-center mb-1" style="margin-bottom: 20px">-->
<!--                  --><?//= $model->userInfo->fullname?><!-- hisobiga pul tushirish-->
<!--                </h3>-->
            </div>
            <br>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(); ?>
                    <div class="form-group">
                        <label for="cardNumber">
                           Foydalanuvchi FISH: </label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="<?=$user->fullname?>"
                                   disabled/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-3 col-md-3">
                            <div class="form-group">
                                <?= $form->field($model, 'user_balance')->textInput(['placeholder'=>'O\'tkazma summasi']) ?>
                            </div>
                        </div>
                        <div class="col-xs-3 col-md-3">
                            <div class="form-group">
                                <?= $form->field($model, 'user_address')->textInput(['placeholder'=>'O\'tkazma summasi']) ?>
                            </div>
                        </div>
                        <div class="col-xs-3 col-md-3">
                            <div class="form-group">
                                <?= $form->field($model, 'user_city')->textInput(['placeholder'=>'O\'tkazma summasi']) ?>
                            </div>
                        </div>
           

                    </div>

                <?= Html::submitButton('To\'lovni amalga oshirish', ['class' => 'btn btn-success btn-lg btn-block']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
<!--        <ul class="nav nav-pills nav-stacked">-->
<!--            <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span>4200</span> Final Payment</a>-->
<!--            </li>-->
<!--        </ul>-->
        <br/>
    </div>
</div>












<style>
    body { margin-top:20px; }
    .panel-title {display: inline;font-weight: bold;}
    .checkbox.pull-right { margin: 0; }
    .pl-ziro { padding-left: 0px; }
</style>