<?php

use yii\helpers\Html;
use app\controllers\Funds;

/* @var $this yii\web\View */
/* @var $model app\models\UserProfile */

$this->title = 'Hisob raqamiga mablag\' o\'tkazish';
$this->params['breadcrumbs'][] = ['label' => 'User Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
