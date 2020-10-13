<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funds".
 *
 * @property int $id
 * @property int $user_id
 * @property int $amount
 */
class Funds extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funds';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'user_balance'], 'required'],
            [['user_id', 'user_balance'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_balance' => 'Balans',
            'userInfo.fullname'=>'Foydalanuvchi ismi',
        ];
    }

    public function getUserInfo()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }







}
