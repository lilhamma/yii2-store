<?php

namespace lilhamma\store\models;

use Yii;

/**
 * This is the model class for table "store_exchange".
 *
 * @property integer $id
 * @property integer $element_id
 * @property integer $store_id_from
 * @property integer $store_id_to
 * @property integer $amount
 * @property integer $user_id
 * @property string $status
 * @property string $date
 * @property string $comment
 *
 * @property Element $element
 * @property Store $storeIdFrom
 * @property Store $storeIdTo
 */
class Exchange extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_exchange';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'element_id', 'store_id_from', 'store_id_to', 'amount', 'user_id'], 'required'],
            [['id', 'element_id', 'store_id_from', 'store_id_to', 'amount', 'user_id'], 'integer'],
            [['status', 'comment'], 'string'],
            [['date'], 'safe'],
            [['element_id'], 'exist', 'skipOnError' => true, 'targetClass' => Element::className(), 'targetAttribute' => ['element_id' => 'id']],
            [['store_id_from'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['store_id_from' => 'id']],
            [['store_id_to'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['store_id_to' => 'id']],
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
            'store_id_from' => 'Store Id From',
            'store_id_to' => 'Store Id To',
            'amount' => 'Amount',
            'user_id' => 'User ID',
            'status' => 'Status',
            'date' => 'Date',
            'comment' => 'Comment',
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
    public function getStoreIdFrom()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id_from']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStoreIdTo()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id_to']);
    }
}
