<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $user_balance
 * @property string|null $user_address
 * @property string|null $user_mobile
 * @property int|null $user_parent_id
 * @property string|null $user_photo

 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_profile';
    }
    public $temp_user_balance;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_balance', 'user_parent_id','user_id','user_rabbit_quantity','temp_user_balance'], 'integer'],
            [['user_address', 'user_mobile', 'user_photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_balance' => 'Summa',
            'temp_user_balance' => 'Summa',
            'user_address' => 'User Address',
            'user_mobile' => 'User Mobile',
            'user_parent_id' => 'User Parent ID',
            'user_photo' => 'User Photo',
            'user_id'=>'Foydalanuvchi',
        ];
    }

    public function getUserInfo()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
