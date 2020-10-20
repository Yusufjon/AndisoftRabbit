
<?php
$client = \app\models\UserProfile::find()->all();
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Mijoz ma\'lumotlari';
$this->params['breadcrumbs'][] = $this->title;
?>



   

            <div>
              
                <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <input  class="form-control" id="myInput" type="text" placeholder="Foydalanuvchini izlash..."><br/>
               </div>
            <table class="table table-striped table-hover">
                <thead style="background:#505d69">
                    <tr style="color:white">
                        <th>#</th>
                        <th>Ism-sha'rifi</th>						
                        <th>Quyon berilgan vaqt</th>
                        <th>Hozirda quyonlar soni</th>
                        <th style="margin:20px 20px 20px 20px">Status</th>
                      
                    </tr>
                </thead>
                <?php foreach($client as $client):?>
                <tbody id="myTable">
                    <tr>
                    
                        <td><?php for($i=0;$i<=$client->id;$i++);?></td>
                        <td><a href="#"><img style="width:8%;height:12%" src="images/avatar.jpg" class="avatar" alt="Avatar"> <?=$client->userInfo->fullname?></a></td>
                       
                        <td>04/10/2013</td>                        
                        <td><?=(!empty($client->user_rabbit_quantity))?$client->user_rabbit_quantity:0?> ta</td>
                        <td><span class="status text-success">&bull;</span> Active</td>
             
                    </tr>
         
                </tbody>
                <?php endforeach;?>
            </table>
            


                <style>

    .table-responsive {
        margin: 30px 0;
    }
	.table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {
		padding-bottom: 15px;
		background: #505d69;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn {
		color: #566787;
		float: right;
		font-size: 13px;
		background: #fff;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn:hover, .table-title .btn:focus {
        color: #566787;
		background: #f2f2f2;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 30px;
	}
	table.table tr th:last-child {
		width: 50px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    
	}
	table.table-striped.table-hover tbody tr:hover {
	
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
       cursor:pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
	
		color: #566787;
		display: inline-block;
		text-decoration: none;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.settings {
        color: #2196F3;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
	.status {
		font-size: 30px;
		margin: 2px 2px 0 0;
		display: inline-block;
		vertical-align: middle;
		line-height: 10px;
	}
    .text-success {
        color: #10c469;
    }
    .text-info {
        color: #62c9e8;
    }
    .text-warning {
        color: #FFC107;
    }
    .text-danger {
        color: #ff5b5b;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>

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