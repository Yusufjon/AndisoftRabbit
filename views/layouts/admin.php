<?php
use yii\helpers\Url;
?>
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="<?=Url::to(['/'])?>" class="waves-effect">
                <i class="ri-dashboard-line"></i>
                <span>Bosh sahifa</span>
            </a>
        </li>

        <li>
            <a href="<?=Url::to(['user/'])?>" class=" waves-effect">
                <i class="ri-user-shared-2-line"></i>
                <span>Foydalanuvchilar</span>
            </a>
        </li>
        <li>
            <a href="<?=Url::to(['user-profile/'])?>" class=" waves-effect">
                <i class="ri-wallet-3-fill"></i>
                <span>Mablag'lar</span>
            </a>
        </li>
        <li>
            <a href="<?=Url::to(['funds/'])?>" class=" waves-effect">
                <i class="ri-wallet-3-fill"></i>
                <span>O'tkazmalar</span>
            </a>
        </li>

        <li>
            <a href="<?=Url::to(['clients/'])?>" class=" waves-effect">
                <i class="fa fa-user"></i>
                <span>Mijozlar</span>
            </a>
        </li>

        <!-- <li>
            <a href="<?=Url::to(['cabinet/'])?>" class=" waves-effect">
                <i class="fa fa-user"></i>
                <span>Foydalanuvchi kabineti</span>
            </a>
        </li> -->

   

    </ul>
</div>