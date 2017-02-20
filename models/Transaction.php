<?php

namespace lilhamma\store\models;

use Yii;

/**
 * This is the model class for table "store_transaction".
 *
 * @property integer $id
 * @property integer $element_id
 * @property integer $store_id
 * @property string $type
 * @property string $reason
 * @property integer $reason_id
 * @property integer $amount
 * @property string $date
 * @property integer $user_id
 * @property string $comment
 * @property string $deleted
 *
 * @property Element $element
 * @property Store $store
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['element_id', 'store_id', 'type', 'reason', 'amount'], 'required'],
            [['element_id', 'store_id', 'reason_id', 'amount', 'user_id'], 'integer'],
            [['type', 'reason'], 'string'],
            [['date', 'deleted'], 'safe'],
            [['comment'], 'string', 'max' => 500],
            [['element_id'], 'exist', 'skipOnError' => true, 'targetClass' => Element::className(), 'targetAttribute' => ['element_id' => 'id']],
            [['store_id'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['store_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'element_id' => 'Element ID',
            'store_id' => 'Store ID',
            'type' => 'Type',
            'reason' => 'Reason',
            'reason_id' => 'Reason ID',
            'amount' => 'Amount',
            'date' => 'Date',
            'user_id' => 'User ID',
            'comment' => 'Comment',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElement()
    {
        return $this->hasOne(Element::className(), ['id' => 'element_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }
}
