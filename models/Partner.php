<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property int $id
 * @property string $partnertitle Наименование партнера
 * @property string $agentname ФИО агента
 * @property string $passport Серия и номер пасспорта агента
 * @property string $address Адрес контрагента
 * @property string $city Город
 * @property string $phone Контактный номер телефона
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['partnertitle'], 'string', 'max' => 100],
            [['agentname'], 'string', 'max' => 150],
            [['passport'], 'string', 'max' => 10],
            [['address'], 'string', 'max' => 200],
            [['city'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 15],
            [['partnertitle', 'agentname', 'passport', 'address', 'city', 'phone'], 'required'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'partnertitle' => Yii::t('app', 'Наименование партнера'),
            'agentname' => Yii::t('app', 'ФИО агента'),
            'passport' => Yii::t('app', 'Серия и номер пасспорта агента'),
            'address' => Yii::t('app', 'Адрес контрагента'),
            'city' => Yii::t('app', 'Город'),
            'phone' => Yii::t('app', 'Контактный номер телефона'),
        ];
    }
}
