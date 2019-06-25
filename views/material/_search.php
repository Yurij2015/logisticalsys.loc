<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialSerarch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idmaterial') ?>

    <?= $form->field($model, 'count') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'notice') ?>

    <?= $form->field($model, 'storehouse_idstorehouse') ?>

    <?php // echo $form->field($model, 'adoptiondate') ?>

    <?php // echo $form->field($model, 'responsible_person') ?>

    <?php // echo $form->field($model, 'material_name') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
