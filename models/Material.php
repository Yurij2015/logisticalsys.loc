<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property int $idmaterial
 * @property int $count
 * @property double $price
 * @property string $notice
 * @property int $storehouse_idstorehouse
 * @property string $adoptiondate
 * @property int $responsible_person
 *
 * @property Employee $responsiblePerson
 * @property Storehouse $storehouseIdstorehouse
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count', 'storehouse_idstorehouse', 'responsible_person'], 'integer'],
            [['price'], 'number'],
            [['storehouse_idstorehouse', 'responsible_person'], 'required'],
            [['adoptiondate'], 'safe'],
            [['notice'], 'string', 'max' => 255],
            [['responsible_person'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['responsible_person' => 'idemployee']],
            [['storehouse_idstorehouse'], 'exist', 'skipOnError' => true, 'targetClass' => Storehouse::className(), 'targetAttribute' => ['storehouse_idstorehouse' => 'idstorehouse,']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmaterial' => Yii::t('app', 'Idmaterial'),
            'count' => Yii::t('app', 'Count'),
            'price' => Yii::t('app', 'Price'),
            'notice' => Yii::t('app', 'Notice'),
            'storehouse_idstorehouse' => Yii::t('app', 'Storehouse Idstorehouse'),
            'adoptiondate' => Yii::t('app', 'Adoptiondate'),
            'responsible_person' => Yii::t('app', 'Responsible Person'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsiblePerson()
    {
        return $this->hasOne(Employee::className(), ['idemployee' => 'responsible_person']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStorehouseIdstorehouse()
    {
        return $this->hasOne(Storehouse::className(), ['idstorehouse,' => 'storehouse_idstorehouse']);
    }
}
