
<!------ Include the above in your HEAD tag ---------->
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use app\models\UserProfile;
use app\controllers\UserProfileController;

$this->title = 'Shaxsiy kabinet';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container emp-profile">

            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                       <!-- <img src="   <?=Yii::$app->homeUrl?>images/avatar.jpg" alt=""/> -->
                         <img style="border-radius:60%" src="<?=Yii::$app->homeUrl?>uploads/<?=(!empty($client->user_photo))?$client->user_photo:0?>" alt=""/> 
                            
                        </div>
                        
                    </div>
                    
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                     <?=$client->userInfo->fullname?>
                                    </h5>
                                    <h6>
                                     <?php $role = app\models\Roles::find()->one()?><?=$role->name?>
                                    </h6>
                                    <p >Jami quyonlar:<span> <?=$client->user_rabbit_quantity?></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Foydalanuvchi ma'lumotlari</a>
                                </li>
                             
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                       
                   
                    <?= Html::a('Tahrirlash', ['user-profile/update','id' => $client->id], ['class' => 'btn btn-primary btn-sm']) ?>   
                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                      
                
                        </div>
                        </div>

                    
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div style="border-bottom:1px solid #f8f8f8 " class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                        
                                        </div>
                                        <div style="border-bottom:1px solid #f8f8f8 "  class="row">
                                            <div class="col-md-6">
                                                <label>Ism-sharifi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$client->userInfo->fullname?></p>
                                            </div>
                                        </div>
                                        <div style="border-bottom:1px solid #f8f8f8 "  class="row">
                                            <div class="col-md-6">
                                           <label> Hisob raqami</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?=(!empty($client->user_balance))?$client->user_balance:0?> so'm</p>
                                            </div>
                                        </div>
                                        <div style="border-bottom:1px solid #f8f8f8 "  class="row">
                                            <div  class="col-md-6">
                                                <label>Tel raqami</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=(!empty($client->user_mobile))?$client->user_mobile:0?></p>
                                            </div>
                                        </div>
                                        <div style="border-bottom:1px solid #f8f8f8 "  class="row">
                                            <div class="col-md-6">
                                                <label>Viloyat</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=(!empty($client->user_address))?$client->user_address:0?></p>
                                            </div>
                                        </div>
                                        <div style="border-bottom:1px solid #f8f8f8 "  class="row">
                                            <div class="col-md-6">
                                                <label>Shahar(tuman)</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=(!empty($client->user_city))?$client->user_city:0?></p>
                                            </div>
                                        </div>
                                      

                                        <div style="border-bottom:1px solid #f8f8f8 "  class="row">
                                            <div class="col-md-6">
                                                <label>Jami quyonlar soni</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=(!empty($client->user_rabbit_quantity))?$client->user_rabbit_quantity:0?></p>
                                            </div>
                                        </div>
                            </div>
                     
                        </div>
                    </div>
                </div>
            </form>       
 
        </div>

     
     
     
        <style>    
        body{
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
    width:100%;
    height:100%
   
}
.profile-img{
    text-align: center;
    padding-top:0px;
}
.profile-img img{
    width: 50%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
        </style>