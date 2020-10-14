<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Funds */

$this->title = 'Create Funds';
$this->params['breadcrumbs'][] = ['label' => 'Funds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funds-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
