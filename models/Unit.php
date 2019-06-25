<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property int $idunit
 * @property string $unitname
 *
 * @property Employeeinunit[] $employeeinunits
 * @property Employee[] $employeeIdemployees
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unitname'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idunit' => Yii::t('app', 'Idunit'),
            'unitname' => Yii::t('app', 'Unitname'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeinunits()
    {
        return $this->hasMany(Employeeinunit::className(), ['unit_idunit' => 'idunit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeIdemployees()
    {
        return $this->hasMany(Employee::className(), ['idemployee' => 'employee_idemployee'])->viaTable('employeeinunit', ['unit_idunit' => 'idunit']);
    }
}
