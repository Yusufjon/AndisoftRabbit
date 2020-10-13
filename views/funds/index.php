<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pul o\'tkazmalari    tarixi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funds-index">

    <h1><?= Html::encode($this->title) ?></h1>
<p>
<?= Html::a('Summa kiritish', ['diller-create-user'], ['class' => 'btn btn-warning']) ?>
</p>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'userInfo.fullname',
            'user_balance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
