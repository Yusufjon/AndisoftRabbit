<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$users = \app\models\User::find()->where(['status'=>10])->all();
/* @var $this yii\web\View */
/* @var $model app\models\UserModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <?php if ($model->isNewRecord) : ?>
            <div class="col-md-6">
                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
            </div>
        <?php else : ?>
            <div class="col-md-6">
                <?= $form->field($model, 'tempPassword')->passwordInput(['placeholder' => 'Yangi parol']) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'status')->dropDownList([
                    10 => 'Aktiv',
                    0 => 'Blok'
                ]) ?>
            </div>
        <?php endif; ?>

        <div class="col-md-6">
            <?= $form->field($model, 'role')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Roles::find()->all(), 'id', 'name'), array('prompt'=>'Foydalanuvchi xuquqi')) ?>

        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'userBalance')->textInput(['value'=>0])?>
        </div>
        <div class="col-md-12" id="users">
            <label for="users">Foydalanuvchi kim tomonidan jalb etildi?</label>
            <select class="js-example-basic-single" name="user_parent" style="width: 100%">
                <option  value="0">Foydalanuvchi o'zi keldi</option>
                <?php foreach ($users as $user): ?>
                <option value="<?=$user->id?>"><?=$user->fullname?></option>
                <?php endforeach; ?>
            </select>

        </div>


    </div>

    <br>
    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>


    $(document).ready(function(){
        $("#usermodel-role").change(function(){
            var selectedCountry = $(this).children("option:selected").val();
           console.log(selectedCountry)
            if(selectedCountry === '1') {
                $(".field-usermodel-userbalance").css('display','none')
            } else {
                $(".field-usermodel-userbalance").css('display','')
            }
            if(selectedCountry === '4') {
            $('#users').css('display','')
            } else {
                $('#users').css('display','none')
            }
        });
    });

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
