<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\controllers\UserProfileController;
$user = \app\models\User::findOne($_GET['id']);
$data = \app\models\UserProfile::find()->one();

/* @var $this yii\web\View */
/* @var $model app\models\UserProfile */
/* @var $form yii\widgets\ActiveForm */
?>



<script type="text/javascript"> 
    var tags = [  
    "Delhi", 
    "Ahemdabad", 
    "Punjab", 
    "Uttar Pradesh", 
    "Himachal Pradesh", 
    "Karnatka", 
    "Kerela", 
    "Maharashtra", 
    "Gujrat", 
    "Rajasthan", 
    "Bihar", 
    "Tamil Nadu", 
    "Haryana" 
      ]; 
  
      /*list of available options*/ 
     var n= tags.length; //length of datalist tags     
  
     function ac(value) { 
        document.getElementById('datalist').innerHTML = ''; 
         //setting datalist empty at the start of function 
         //if we skip this step, same name will be repeated 
           
         l=value.length; 
         //input query length 
     for (var i = 0; i<n; i++) { 
         if(((tags[i].toLowerCase()).indexOf(value.toLowerCase()))>-1) 
         { 
             //comparing if input string is existing in tags[i] string 
  
             var node = document.createElement("option"); 
             var val = document.createTextNode(tags[i]); 
              node.appendChild(val); 
  
               document.getElementById("datalist").appendChild(node); 
                   //creating and appending new elements in data list 
             } 
         } 
     } 
   
</script> 

<!-- On keyup calls the function everytime a key is released -->
<datalist id="datalist"> 
  
<option value="Delhi"></option> 
<option value="Ahemdabad"></option> 
<option value="Punjab"></option> 
<option value="Uttar Pradesh"></option> 
<option value="Himachal Pradesh"></option> 
<option value="Karnatka"></option> 
<option value="Kerela"></option> 
<option value="Maharashtra"></option> 
<option value="Gujrat"></option> 
<option value="Rajasthan"></option> 
<option value="Bihar"></option> 
<option value="Tamil Nadu"></option> 
<option value="Haryana"></option> 
  
<!-- This data list will be edited through javascript     -->
</datalist> 





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
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>
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
                                <?= $form->field($model, 'user_mobile')->textInput(['placeholder'=>'Tel raqamingiz']) ?>
                            </div>
                        </div>
                        <div class="col-xs-3 col-md-3">
                            <div class="form-group">
                                <?= $form->field($model, 'user_address')->dropDownList([ 'Andijon' => 'Andijon', 'Namangan' => 'Namangan', 'Farg\'ona' => 'Farg\'ona', 'Toshkent shahri' => 'Toshkent Shahri', 'Toshkent viloyati' => 'Toshkent viloyati', 'Sirdaryo' => 'Sirdaryo', 'Jizzah' => 'Jizzah', 'Samarkand' => 'Samarkand', 'Buxoro' => 'Buxoro','Qashqadaryo' => 'Qashqadaryo','Surxondaryo' => 'Surxondaryo', 'Navoiy' => 'Navoiy', 'Xorazm' => 'Xorazm','Qoraqalpog\'ston Respublikasi' => 'Qoraqalpog\'ston Respublikasi'], ['prompt' => '']) ?>
                            </div>
                        </div>
                        <div class="col-xs-3 col-md-3">
                            <div class="form-group">
                             <?= $form->field($model, 'user_city')->textInput(['placeholder'=>'Shahar(tuman)']) ?>
                             
                            
                            </div>
                        </div>

                        <div style="text-align:center" class="col-xs-2 col-md-1">
                            <div class="form-group">
                            <?= $form->field($model, 'user_photo')->fileInput(); ?>
                            <?php if ($model->user_photo) { ?>
                      <img src="/uploads/<?=$model->user_photo?>" style="max-width: 100%;height:100%">
                                <?php }?>
                            </div>
                        </div>
           

                    </div>

                <?= Html::submitButton('Tasdiqlash', ['class' => 'btn btn-success btn-lg btn-block']) ?>

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

