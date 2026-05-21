<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property int $user_id
 * @property int $course_id
 * @property string|null $status
 * @property string $payment_method
 * @property string $started_at
 *
 * @property Course $course
 * @property User $user
 */
class Request extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const STATUS_NEW = 'new';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_DONE = 'done';
    const PAYMENT_METHOD_CASH = 'cash';
    const PAYMENT_METHOD_CARD = 'card';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['user_id', 'default', 'value' => Yii::$app->user->id],
            [['status'], 'default', 'value' => 'new'],

            [['course_id', 'payment_method', 'started_at'], 'required'],
            [['user_id', 'course_id'], 'integer'],
            [['status', 'payment_method'], 'string'],
            [['started_at'], 'safe'],
            ['status', 'in', 'range' => array_keys(self::optsStatus())],
            ['payment_method', 'in', 'range' => array_keys(self::optsPaymentMethod())],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'course_id' => 'Курс',
            'status' => 'Статус',
            'payment_method' => 'Метод оплаты',
            'started_at' => 'Дата начала обучения',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }


    /**
     * column status ENUM value labels
     * @return string[]
     */
    public static function optsStatus()
    {
        return [
            self::STATUS_NEW => 'new',
            self::STATUS_IN_PROGRESS => 'in_progress',
            self::STATUS_DONE => 'done',
        ];
    }

    /**
     * column payment_method ENUM value labels
     * @return string[]
     */
    public static function optsPaymentMethod()
    {
        return [
            self::PAYMENT_METHOD_CASH => 'cash',
            self::PAYMENT_METHOD_CARD => 'card',
        ];
    }

    /**
     * @return string
     */
    public function displayStatus()
    {
        return self::optsStatus()[$this->status];
    }

    /**
     * @return bool
     */
    public function isStatusNew()
    {
        return $this->status === self::STATUS_NEW;
    }

    public function setStatusToNew()
    {
        $this->status = self::STATUS_NEW;
    }

    /**
     * @return bool
     */
    public function isStatusInprogress()
    {
        return $this->status === self::STATUS_IN_PROGRESS;
    }

    public function setStatusToInprogress()
    {
        $this->status = self::STATUS_IN_PROGRESS;
    }

    /**
     * @return bool
     */
    public function isStatusDone()
    {
        return $this->status === self::STATUS_DONE;
    }

    public function setStatusToDone()
    {
        $this->status = self::STATUS_DONE;
    }

    /**
     * @return string
     */
    public function displayPaymentMethod()
    {
        return self::optsPaymentMethod()[$this->payment_method];
    }

    /**
     * @return bool
     */
    public function isPaymentMethodCash()
    {
        return $this->payment_method === self::PAYMENT_METHOD_CASH;
    }

    public function setPaymentMethodToCash()
    {
        $this->payment_method = self::PAYMENT_METHOD_CASH;
    }

    /**
     * @return bool
     */
    public function isPaymentMethodCard()
    {
        return $this->payment_method === self::PAYMENT_METHOD_CARD;
    }

    public function setPaymentMethodToCard()
    {
        $this->payment_method = self::PAYMENT_METHOD_CARD;
    }
}
