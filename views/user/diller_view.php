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



<div class="row">

    <div class="col-md-6">
        <?= Html::a('Yangi foydalanuvchi kiritish', ['diller-create-user'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Taxrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
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
    <div class="col-md-6">
        <h4 class="text-center">Quyidagi foydalanuvchilar foydaga ega bo'lishdi</h4>
<!--        <h1 class="text-center">Ushbu foydalanuvchidan quyidagi foydalanuvchilarga foyda ajratib berildi</h1>-->
        <div class="list-group">
            <a href="#" style="color: blue" class="list-group-item list-group-item-action list-group-item-secondary text-right"><b>Diller: <?=Yii::$app->user->identity->fullname?> <?=$settings['study_fee']*5/100?>so'm (5%)</b></a>

            <?php foreach ($userParentHierachy as $user) : ?>
                <?php if ($user->profit_percentage == 20) {
                    $class = 'success';
                } elseif ($user->profit_percentage == 10) {
                    $class = 'info';
                } elseif ($user->profit_percentage == 5) {
                    $class = 'warning';
                } ?>
                <a href="#" class="list-group-item list-group-item-action list-group-item-<?=$class?>"> <?=$user->given_user_fullname?> <?=$user->summa?> so'm (<?=$user->profit_percentage?>%)</a>
            <?php endforeach;?>
        </div>
    </div>
</div>






</div>
