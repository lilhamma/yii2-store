<?php

namespace lilhamma\store\models;

use Yii;
use lilhamma\store\models\UserToStore;

/**
 * This is the model class for table "store_store".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Exchange[] $exchanges
 * @property Exchange[] $exchanges0
 * @property Remain[] $remains
 * @property Transaction[] $transactions
 * @property UserToStore[] $userToStores
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_store';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['user_ids'], 'each', 'rule' => ['integer']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор в базе',
            'name' => 'Название',
            'user_ids' => 'Операторы',
        ];
    }
    
    
    public function behaviors()
    {
        return 
        [
            [
                'class' => \voskobovich\behaviors\ManyToManyBehavior::className(),
                'relations' => [
                    'user_ids' => 'users',
                ],
            ],
        ];
    }
    
    public function getUsers(){
        $userModel = Yii::$app->getModule('lilhammastore')->userModel;
        return $this->hasMany(
            $userModel::className(), 
            ['id' => 'user_id']
        )->viaTable(
            'store_user_to_store', 
            ['store_id' => 'id']
        );
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
     /*
    public function getUsers()
    {
        return $this->hasMany(
            UserToStore::className(), 
            ['store_id' => 'id']
        )->viaTable(
            'store_user_to_store',
            ['user_id' => 'id']
        );;
    }*/
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOutgoingExchanges()
    {
        return $this->hasMany(Exchange::className(), ['store_id_from' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncomingExchanges()
    {
        return $this->hasMany(Exchange::className(), ['store_id_to' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRemains()
    {
        return $this->hasMany(Remain::className(), ['store_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['store_id' => 'id']);
    }

}
