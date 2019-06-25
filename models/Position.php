<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property int $idposition
 * @property string $positiontname
 *
 * @property Employee[] $employees
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['positiontname'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idposition' => Yii::t('app', 'Idposition'),
            'positiontname' => Yii::t('app', 'Positiontname'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['position_idposition' => 'idposition']);
    }
}
