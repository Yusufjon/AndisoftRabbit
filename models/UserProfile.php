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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_balance', 'user_parent_id','user_id'], 'integer'],
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
            'user_balance' => 'User Balance',
            'user_address' => 'User Address',
            'user_mobile' => 'User Mobile',
            'user_parent_id' => 'User Parent ID',
            'user_photo' => 'User Photo',
        ];
    }
}