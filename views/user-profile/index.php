
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use app\models\UserProfile;
use app\controllers\UserProfileController;
$model = UserProfile::find()->all();

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hisobni to\'ldirish';
$this->params['breadcrumbs'][] = $this->title;
?>
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="user-profile-index">

    <h1><?= Html::encode($this->title) ?></h1>

     <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<input style="width:270px;float:right" class="form-control" id="myInput" type="text" placeholder="Qidirish..."><br/>
<br/>
<table class="table table-bordered">

  <thead class="thead-dark">
    <tr>
       <th scope="col">Ism-Sharifi</th>
      <th scope="col">Balans</th>
      <th scope="col">Operatsiyalar</th>
      
      
      
    </tr>
  </thead>
  <tbody id="myTable">
  <?php foreach($model as $model):?>
    <tr>
      <th scope="row"><?=$model->userInfo->fullname?></th>
      <td><?=(!empty($model->user_balance))?$model->user_balance:0?> so'm</td>
      <td style="text-align:center"><?= Html::a('Hisobni to\'ldirish', ['create','id' => $model->id], ['class' => 'btn btn-warning btn-sm']) ?>   </td>
     
    </tr>
 <?php endforeach?>

 </tbody>
  </table>






</div>
