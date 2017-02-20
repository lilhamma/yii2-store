<?php

namespace lilhamma\store\models;

use Yii;

/**
 * This is the model class for table "store_element".
 *
 * @property integer $id
 * @property string $model
 * @property integer $item_id
 * @property integer $category_id
 *
 * @property ElementCategory $category
 * @property Exchange[] $exchanges
 * @property Remain[] $remains
 * @property Transaction[] $transactions
 */
class Element extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_element';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model', 'item_id', 'category_id'], 'required'],
            [['item_id', 'category_id'], 'integer'],
            [['model'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ElementCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'item_id' => 'Item ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ElementCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExchanges()
    {
        return $this->hasMany(Exchange::className(), ['element_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRemains()
    {
        return $this->hasMany(Remain::className(), ['element_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['element_id' => 'id']);
    }
}
