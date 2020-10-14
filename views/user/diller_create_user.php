<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$users = \app\models\User::find()->where(['status'=>10])->andWhere(['role'=>4])->andWhere(['status'=>10])->all();
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
            <div class="col-md-4">
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
        <div class="col-md-4" id="users">
            <label for="users">Foydalanuvchi kim tomonidan jalb etildi?</label>
            <select class="js-example-basic-single" name="user_parent" style="width: 100%">
                <option  value="0">Foydalanuvchi o'zi keldi</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?=$user->id?>"><?=$user->fullname?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Berilayotgan quyonlar soni</label>
                <input type="number" id="rabbit_amount" min="1" name="rabbit_quantity"  class="form-control"  placeholder="Quyonlar soni (masalan: 10)" required>
            </div>
        </div>



        <div class="col-md-12">
            <?= $form->field($model, 'userBalance')->hiddenInput(['value'=>0])->label(false)?>
        </div>


        <div class="col-md-12">
            <div class="card bg-info">
                <div class="card-body text-center">
                    <div class="row">
                    <div class="col-sm-4 d-flex h-100">
                        <img  style="width: 150px;float: left" src="<?=Yii::$app->homeUrl?>images/study.png" alt="">
                        <div class="row justify-content-center align-self-center text-menu">
                           <?= number_format($settings['study_fee'])?> so'm
                        </div>
                    </div>

                        <div class="col-sm-4 d-flex h-100">
                            <img  style="width: 150px;float: left" src="<?=Yii::$app->homeUrl?>images/rabbit.png" alt="">
                            <div class="row justify-content-center align-self-center text-menu">
                                <?= number_format($settings['rabbit_price'])?> so'm
                            </div>
                        </div>
                        <div class="col-sm-4 d-flex h-100">
                            <img  style="width: 150px;float: left" src="<?=Yii::$app->homeUrl?>images/calculate.png" alt="">
                            <div class="row justify-content-center align-self-center text-menu">
                                <div id="overall_sum"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    $(document).ready(function(){
        $("#rabbit_amount").keyup(function(){
            var calculate=null;
            var value = $(this).val();
            var study_fee = null;
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl. '/user/get-rabbit-price' ?>',
                type: 'post',
                success: function (data) {
                    calculate = data['rabbit_price']*value;
                    study_fee = data['study_fee'];
                    var rabbit_fee = numeral(calculate).format(0,0);
                    var study_fee = numeral(study_fee).format(0,0);
                  $('#overall_sum').text(rabbit_fee+' + '+study_fee);
                    // console.log(study_fee)
                }
            });
        });
    });
</script>


<style>
    .center {
        position: relative;
    }
    .center p {
        margin: 0;
        text-align: left;
        position: absolute;
        left: 50%;
        top: 50%;
    }
</style>