<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\web\JqueryAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="<?=Url::to(['/'])?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="frontasset/images/logo-sm-dark.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="frontasset/images/logo-dark.png" alt="" height="20">
                        </span>
                    </a>

                    <a href="<?=Url::to(['/'])?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="frontasset/images/logo-sm-light.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="frontasset/images/logo-light.png" alt="" height="20">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                    <i class="ri-menu-2-line align-middle"></i>
                </button>


                <div class="dropdown dropdown-mega d-none d-lg-block ml-2">
                    <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                       Hisob: 2500 UZS
                    </button>

                </div>

                    </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="frontasset/images/users/avatar-2.jpg"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">Kevin</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="ri-user-line align-middle mr-1"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle mr-1"></i> My Wallet</a>
                    <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right mt-1">11</span><i class="ri-settings-2-line align-middle mr-1"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle mr-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i> Logout</a>
                </div>
            </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->

                    <?php
                    $user = Yii::$app->user->identity;
                    switch ($user->role) {
                        case 1: /*admin role*/
                            echo $this->render('admin');
                            break;
                        case 2:  /*sotuvchi role*/
                            echo $this->render('moderator');
                            break;
                        case 3: /*omborchi role*/
                            echo $this->render('diller');
                            break;
                        case 4: /*omborchi role*/
                            echo $this->render('mijoz');
                            break;
                        default:
                            echo $this->render('admin');
                            break;
                    }
                    ?>

                    <!-- Sidebar -->
                </div>
            </div>

            <!-- Left Sidebar End -->
    <div class="main-content">
        <div class="page-content">
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Nazox.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<style>
    .help-block {
        color:red;
        font-weight: bold;
    }
</style>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
