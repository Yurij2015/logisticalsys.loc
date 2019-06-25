<?php

use app\models\Storehouse;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Employee;
use kartik\widgets\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Material */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'material_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'notice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'storehouse_idstorehouse')->dropDownList(
        ArrayHelper::map(Storehouse::find()->all(), 'idstorehouse', 'storehouse_name')
    ) ?>

    <?php // $form->field($model, 'adoptiondate')->textInput() ?>

    <?= $form->field($model, 'order_date_fmt')->widget(DatePicker::class,[
        'options' => ['placeholder' => \Yii::t('app','Выберите дату ...')],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
            'orientation' => "bottom",
        ]
    ]) ?>

    <?php // $form->field($model, 'responsible_person')->dropDownList(
    //ArrayHelper::map(Employee::find()->all(), 'idemployee', 'secondname' )
    // ) ?>

    <?= $form->field($model, 'responsible_person')->dropDownList(
        ArrayHelper::map(Employee::find()->all(), 'idemployee', function ($model) {
            return $model['secondname'] . ' ' . $model['name'];
        })
    ) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
