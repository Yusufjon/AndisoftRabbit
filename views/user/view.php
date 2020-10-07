<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserModel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-model-view">


    <p>
        <?= Html::a('Yangi foydalanuvchi kiritish', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Taxrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'fullname',
            [
                'attribute' => 'Xuquqi',
                'value' => function ($model) {
                    return $model->roleName->name;
                },
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->status == '10' ? '<span style="color:green;">Active</span>' : '<span style="color:red;">Inactive</span>';
                },
                'filter' => array(10 => "Aktiv", 5 => "Bloklangan", 0 => 'NoAktiv'),
            ],
        ],
    ]) ?>

</div>
