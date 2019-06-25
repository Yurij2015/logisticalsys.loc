<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $idemployee
 * @property string $name
 * @property string $secondname
 * @property string $timestamp
 * @property string $email
 * @property int $position_idposition
 *
 * @property Position $positionIdposition
 * @property Employeeinunit[] $employeeinunits
 * @property Unit[] $unitIdunits
 * @property Material[] $materials
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timestamp'], 'safe'],
            [['position_idposition'], 'required'],
            [['position_idposition'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['secondname', 'email'], 'string', 'max' => 45],
            [['position_idposition'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_idposition' => 'idposition']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idemployee' => Yii::t('app', 'Idemployee'),
            'name' => Yii::t('app', 'Name'),
            'secondname' => Yii::t('app', 'Secondname'),
            'timestamp' => Yii::t('app', 'Timestamp'),
            'email' => Yii::t('app', 'Email'),
            'position_idposition' => Yii::t('app', 'Position Idposition'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositionIdposition()
    {
        return $this->hasOne(Position::className(), ['idposition' => 'position_idposition']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeinunits()
    {
        return $this->hasMany(Employeeinunit::className(), ['employee_idemployee' => 'idemployee']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitIdunits()
    {
        return $this->hasMany(Unit::className(), ['idunit' => 'unit_idunit'])->viaTable('employeeinunit', ['employee_idemployee' => 'idemployee']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['responsible person' => 'idemployee']);
    }
}
