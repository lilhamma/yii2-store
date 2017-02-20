<?php

namespace lilhamma\store\models;

use Yii;

/**
 * This is the model class for table "store_remain".
 *
 * @property integer $id
 * @property integer $element_id
 * @property integer $store_id
 * @property integer $amount
 * @property string $comment
 *
 * @property Element $element
 * @property Store $store
 */
class Remain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_remain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['element_id', 'store_id', 'amount'], 'required'],
            [['element_id', 'store_id', 'amount'], 'integer'],
            [['comment'], 'string'],
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
            'amount' => 'Amount',
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
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }
}
