<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_profit".
 *
 * @property int $id
 * @property int|null $given_user_id
 * @property string|null $given_user_fullname
 * @property int|null $taken_user_id
 * @property string|null $taken_user_fullname
 * @property int|null $profit_percentage
 * @property int|null $summa
 * @property string|null $date
 * @property int|null $level
 * @property int|null $is_registered
 */
class UserProfit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_profit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['given_user_id', 'taken_user_id', 'profit_percentage', 'summa', 'level', 'is_registered'], 'integer'],
            [['date'], 'safe'],
            [['given_user_fullname', 'taken_user_fullname'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'given_user_id' => 'Given User ID',
            'given_user_fullname' => 'Given User Fullname',
            'taken_user_id' => 'Taken User ID',
            'taken_user_fullname' => 'Taken User Fullname',
            'profit_percentage' => 'Profit Percentage',
            'summa' => 'Summa',
            'date' => 'Date',
            'level' => 'Level',
            'is_registered' => 'Is Registered',
        ];
    }

    public static function writeRoot($user_id)
    {
        $checkUser = UserProfile::find()->where(['user_id' => $user_id])->one();

        $settings = (new \yii\db\Query())
            ->from('settings')
            ->one();

        if ($checkUser->user_parent_id != 0) {
            $study_fee = $settings['study_fee'];
            $profit = array(
                'twenty'=>$study_fee*20/100,
                'ten'=>$study_fee*10/100,
                'five'=>$study_fee*5/100,
            );
            $percentage = 0;
            /*diller uchun*/
            $percentage+=5;
           #  -----------------Level 1 -------------------------------------------
            $userProfile_level_1 = UserProfile::findOne(['user_id'=>$checkUser->user_parent_id]);
            $userProfit = new UserProfit();
            $userProfit->given_user_fullname = $userProfile_level_1->userInfo->fullname;
            $userProfit->given_user_id = $userProfile_level_1->user_id;
            $userProfit->taken_user_fullname = $checkUser->userInfo->fullname;
            $userProfit->taken_user_id =$checkUser->userInfo->id;
            $userProfit->is_registered = 1;
            $userProfit->summa = $profit['twenty'];
            $userProfit->profit_percentage = 20;
            $percentage+=20;
            $userProfit->level = 1;
            $userProfit->save(false);
            /*balanceni qoshib qoyish*/
            $userProfile = UserProfile::findOne(['user_id'=>$userProfile_level_1->user_id]);
            $userProfile->user_balance += $profit['twenty'];
            $userProfile->save(false);
            /* paymentlarni istoriyaga yozib qoyish*/
            $moneyReport = new UserMoneyReports();
            $moneyReport->user_id =$userProfile_level_1->user_id;
            $moneyReport->balance = $profit['twenty'];
            $moneyReport->time = date('Y-m-d');
            $moneyReport->is_income = 1;
            $moneyReport->description = "Yangi ro'yxattan o'tgan foydalanuvchidan 20% o'tdi";
            $moneyReport->save(false);


        #  -----------------Level 2 -------------------------------------------
        $userProfile_level_2 = UserProfile::find()->where(['user_id'=>$userProfile_level_1->user_parent_id])->exists();
        if($userProfile_level_2)
        {
            $userProfile_level2= UserProfile::findOne(['user_id'=>$userProfile_level_1->user_parent_id]);
            $userProfit = new UserProfit();
            $userProfit->given_user_fullname = $userProfile_level2->userInfo->fullname;
            $userProfit->taken_user_fullname = $checkUser->userInfo->fullname;
            $userProfit->taken_user_id =$checkUser->userInfo->id;
            $userProfit->given_user_id = $userProfile_level2->user_id;
            $userProfit->is_registered = 1;
            $userProfit->summa = $profit['ten'];
            $userProfit->profit_percentage = 10;
            $percentage+=10;
            $userProfit->level = 2;
            $userProfit->save(false);
            /*balanceni qoshib qoyish*/
            $userProfile = UserProfile::findOne(['user_id'=>$userProfile_level2->user_id]);
            $userProfile->user_balance+= $profit['ten'];
            $userProfile->save(false);
            /* paymentlarni istoriyaga yozib qoyish*/
            $moneyReport = new UserMoneyReports();
            $moneyReport->user_id =$userProfile_level2->user_id;
            $moneyReport->balance = $profit['ten'];
            $moneyReport->time = date('Y-m-d');
            $moneyReport->is_income = 1;
            $moneyReport->description = "Yangi ro'yxattan o'tgan foydalanuvchidan 10% o'tdi";
            $moneyReport->save(false);
        }

        # -----------------Level 3 -------------------------------------------
        $userProfile_level_3 = UserProfile::find()->where(['user_id'=>$userProfile_level2->user_parent_id])->exists();
        if($userProfile_level_3)
        {
            $userProfile_level3= UserProfile::findOne(['user_id'=>$userProfile_level2->user_parent_id]);
            $userProfit = new UserProfit();
            $userProfit->given_user_fullname = $userProfile_level3->userInfo->fullname;
            $userProfit->taken_user_fullname = $checkUser->userInfo->fullname;
            $userProfit->taken_user_id =$checkUser->userInfo->id;
            $userProfit->given_user_id = $userProfile_level3->user_id;
            $userProfit->is_registered = 1;
            $userProfit->summa = $profit['ten'];
            $userProfit->profit_percentage = 10;
            $percentage+=10;
            $userProfit->level = 3;
            $userProfit->save(false);
            /*balanceni qoshib qoyish*/
            $userProfile = UserProfile::findOne(['user_id'=>$userProfile_level3->user_id]);
            $userProfile->user_balance+= $profit['ten'];
            $userProfile->save(false);
            /* paymentlarni istoriyaga yozib qoyish*/
            $moneyReport = new UserMoneyReports();
            $moneyReport->user_id =$userProfile_level3->user_id;
            $moneyReport->balance = $profit['ten'];
            $moneyReport->time = date('Y-m-d');
            $moneyReport->is_income = 1;
            $moneyReport->description = "Yangi ro'yxattan o'tgan foydalanuvchidan 10% o'tdi";
            $moneyReport->save(false);
        }
            # -----------------Level 4 -------------------------------------------
            $userProfile_level_4 = UserProfile::find()->where(['user_id' => $userProfile_level3->user_parent_id])->exists();
            if ($userProfile_level_4) {
                $userProfile_level4 = UserProfile::findOne(['user_id' => $userProfile_level3->user_parent_id]);
                $userProfit = new UserProfit();
                $userProfit->given_user_fullname = $userProfile_level4->userInfo->fullname;
                $userProfit->taken_user_fullname = $checkUser->userInfo->fullname;
                $userProfit->taken_user_id = $checkUser->userInfo->id;
                $userProfit->given_user_id = $userProfile_level4->user_id;
                $userProfit->is_registered = 1;
                $userProfit->summa = $profit['five'];
                $userProfit->profit_percentage = 5;
                $percentage+=5;
                $userProfit->level = 4;
                $userProfit->save(false);
                /*balanceni qoshib qoyish*/
                $userProfile = UserProfile::findOne(['user_id'=>$userProfile_level4->user_id]);
                $userProfile->user_balance+= $profit['five'];
                $userProfile->save(false);
                /* paymentlarni istoriyaga yozib qoyish*/
                $moneyReport = new UserMoneyReports();
                $moneyReport->user_id =$userProfile_level4->user_id;
                $moneyReport->balance = $profit['five'];
                $moneyReport->time = date('Y-m-d');
                $moneyReport->is_income = 1;
                $moneyReport->description = "Yangi ro'yxattan o'tgan foydalanuvchidan 5% o'tdi";
                $moneyReport->save(false);
            }

            # -----------------Level 5 -------------------------------------------
            $userProfile_level_5= UserProfile::find()->where(['user_id' => $userProfile_level4->user_parent_id])->exists();
            if ($userProfile_level_5) {
                $userProfile_level5 = UserProfile::findOne(['user_id' => $userProfile_level4->user_parent_id]);
                $userProfit = new UserProfit();
                $userProfit->given_user_fullname = $userProfile_level5->userInfo->fullname;
                $userProfit->taken_user_fullname = $checkUser->userInfo->fullname;
                $userProfit->taken_user_id = $checkUser->userInfo->id;
                $userProfit->given_user_id = $userProfile_level5->user_id;
                $userProfit->is_registered = 1;
                $userProfit->summa = $profit['five'];
                $userProfit->profit_percentage = 5;
                $percentage+=5;
                $userProfit->level = 4;
                $userProfit->save(false);
                /*balanceni qoshib qoyish*/
                $userProfile = UserProfile::findOne(['user_id'=>$userProfile_level5->user_id]);
                $userProfile->user_balance+= $profit['five'];
                $userProfile->save(false);
                /* paymentlarni istoriyaga yozib qoyish*/
                $moneyReport = UserMoneyReports::findOne(['user_id'=>$userProfile_level5->user_id]);
                $moneyReport->user_id =$userProfile_level5->user_id;
                $moneyReport->balance = $profit['five'];
                $moneyReport->time = date('Y-m-d');
                $moneyReport->is_income = 1;
                $moneyReport->description = "Yangi ro'yxattan o'tgan foydalanuvchidan 5% o'tdi";
                $moneyReport->save(false);
            }

            # -----------------Level 6 -------------------------------------------
            $userProfile_level_6= UserProfile::find()->where(['user_id' => $userProfile_level5->user_parent_id])->exists();
            if ($userProfile_level_6) {
                $userProfile_level6 = UserProfile::findOne(['user_id' => $userProfile_level5->user_parent_id]);
                $userProfit = new UserProfit();
                $userProfit->given_user_fullname = $userProfile_level6->userInfo->fullname;
                $userProfit->taken_user_fullname = $checkUser->userInfo->fullname;
                $userProfit->taken_user_id = $checkUser->userInfo->id;
                $userProfit->given_user_id = $userProfile_level6->user_id;
                $userProfit->is_registered = 1;
                $userProfit->summa = $profit['five'];
                $userProfit->profit_percentage = 5;
                $percentage+=5;
                $userProfit->level = 4;
                $userProfit->save(false);
                /*balanceni qoshib qoyish*/
                $userProfile = UserProfile::findOne(['user_id'=>$userProfile_level_6->user_id]);
                $userProfile->user_balance+= $profit['five'];
                $userProfile->save(false);
                /* paymentlarni istoriyaga yozib qoyish*/
                $moneyReport = new UserMoneyReports();
                $moneyReport->user_id =$userProfile_level6->user_id;
                $moneyReport->balance = $profit['five'];
                $moneyReport->time = date('Y-m-d');
                $moneyReport->is_income = 1;
                $moneyReport->description = "Yangi ro'yxattan o'tgan foydalanuvchidan 5% o'tdi";
                $moneyReport->save(false);
            }

        }
        return  $percentage;
    }
}
