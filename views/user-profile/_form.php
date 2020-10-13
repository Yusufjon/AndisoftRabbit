<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\controllers\Funds;

/* @var $this yii\web\View */
/* @var $model app\models\UserProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profile-form">


  <?php $form = ActiveForm::begin(); ?>


    <?php
        $data = \yii\helpers\ArrayHelper::map(\app\models\User::find()->all(),'id','fullname')
        ?>
        <?= $form->field($model, 'user_id')->dropDownList($data) ?>






    <?= $form->field($model, 'user_balance')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
