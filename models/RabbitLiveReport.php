<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rabbit_live_report".
 *
 * @property int $id
 * @property int|null $rabbit_amount
 * @property int|null $given_by
 * @property int|null $is_dead
 * @property int|null $user_id
 * @property string|null $date
 */
class RabbitLiveReport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rabbit_live_report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rabbit_amount', 'given_by', 'is_dead', 'user_id'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rabbit_amount' => 'Rabbit Amount',
            'given_by' => 'Given By',
            'is_dead' => 'Is Dead',
            'user_id' => 'User ID',
            'date' => 'Date',
        ];
    }
}
