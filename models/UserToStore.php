<?php

namespace lilhamma\store\models;

use Yii;

/**
 * This is the model class for table "store_user_to_store".
 *
 * @property integer $id
 * @property integer $store_id
 * @property integer $user_id
 *
 * @property Store $store
 */
class UserToStore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_user_to_store';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['store_id', 'user_id'], 'required'],
            [['store_id', 'user_id'], 'integer'],
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
            'store_id' => 'Store ID',
            'user_id' => 'User ID',
        ];
    }

}
