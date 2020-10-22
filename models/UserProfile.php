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
            [['user_address','user_city', 'user_mobile'], 'string', 'max' => 255],
            [['user_photo'], 'file',  'extensions' => ['png','jpg','jpeg']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_balance' => 'Hisobdagi mablag\'',
            'temp_user_balance' => 'Summa',
            'user_address' => 'Viloyatingiz',
            'user_city' => 'Shahringiz(tuman)',
            'user_mobile' => 'Mobil raqamingiz',
            'user_parent_id' => 'User Parent ID',
            'user_photo' => 'Rasm yuklash',
            'user_id'=>'Foydalanuvchi',
            'userInfo.fullname'=>'FISH',
            'user_rabbit_quantity'=>'Jami quyonlar soni',
        ];
    }
    public function upload()
    {
        if ($this->validate() and $this->user_photo->baseName) {
            $this->user_photo->saveAs(Yii::$app->basePath.'\uploads/' . $this->user_photo->baseName . '.' . $this->user_photo->extension);
            return true;
        } else {
            return false;
        }
    }
    public function getUserInfo()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
