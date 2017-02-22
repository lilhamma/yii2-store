<?php

namespace lilhamma\store\models;

use Yii;

/**
 * This is the model class for table "store_element_category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 *
 * @property StoreElement[] $storeElements
 * @property ElementCategory $parent
 * @property ElementCategory[] $elementCategories
 */
class ElementCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_element_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => ElementCategory::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStoreElements()
    {
        return $this->hasMany(StoreElement::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(ElementCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElementCategories()
    {
        return $this->hasMany(ElementCategory::className(), ['parent_id' => 'id']);
    }
}
