<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "storehouse".
 *
 * @property int $idstorehouse
 * @property string $storehouse_name
 * @property string $description
 * @property string $address
 *
 * @property Material[] $materials
 */
class Storehouse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'storehouse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['storehouse_name'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idstorehouse' => Yii::t('app', 'Idstorehouse'),
            'storehouse_name' => Yii::t('app', 'Storehouse Name'),
            'description' => Yii::t('app', 'Description'),
            'address' => Yii::t('app', 'Address'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['storehouse_idstorehouse' => 'idstorehouse']);
    }
}
