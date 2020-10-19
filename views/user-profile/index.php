
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

<div class="user-profile-index">





<br/>
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <input  class="form-control" id="myInput" type="text" placeholder="Foydalanuvchini izlash..."><br/>
<table class="table table-borderless table-hover">

  <thead class="thead-dark">
    <tr>
       <th scope="col">Ism-Sharifi</th>
      <th scope="col">Balans</th>
      <th scope="col"></th>
    </tr>
  </thead>

  <tbody id="myTable">

  <?php foreach($model as $model):?>
    <tr>
      <td><?=$model->userInfo->fullname?></th>
      <td><?=(!empty($model->user_balance))?$model->user_balance:0?> so'm</td>
      <td><?= Html::a('Hisobni to\'ldirish', ['refill-balance','id' => $model->user_id], ['class' => 'btn btn-success btn-sm']) ?>   </td>
     
    </tr>
 <?php endforeach?>

 </tbody>
  </table>
</div>


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
<style>
    .thead-dark th
    {
        background-color: #505d69 !important;
    }
</style>