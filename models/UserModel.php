<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property int $role
 * @property int|null $status
 */
class UserModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    public $tempPassword;
    public $userBalance;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'fullname', 'role'], 'required','message'=>'Ushbu maydon to\'ldirilishi shart!'],
            [['role', 'status','userBalance'], 'integer','message'=>'Ushbu maydon faqat raqam qabul qiladi'],
            [['username', 'password', 'fullname'], 'string', 'max' => 255],
            [['tempPassword'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Login',
            'password' => 'Parol',
            'fullname' => 'Ism Sharif',
            'role' => 'Xuquqi',
            'status' => 'Status',
            'userBalance'=>'Foydalanuvchining balansi (uzs)',
            'tempPassword'=>'Yangi parol (agar o\'zgartirilsa)'
        ];
    }



    public function getRoleName()
    {
        return $this->hasOne(Roles::className(), ['id' => 'role']);   //city_state_id is field of city
    }

}
