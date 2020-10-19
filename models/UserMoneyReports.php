<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_money_reports".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $balance
 * @property string|null $time
 * @property int|null $is_income
 * @property string|null $description
 */
class UserMoneyReports extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_money_reports';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'user_id', 'balance', 'is_income'], 'integer'],
            [['time','description'], 'safe'],
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
            'balance' => 'Balance',
            'time' => 'Time',
            'is_income' => 'Is Income',
        ];
    }
}
