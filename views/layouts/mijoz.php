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

         
    </ul>
</div>