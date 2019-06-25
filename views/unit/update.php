<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$this->title = Yii::t('app', 'Update Unit: {name}', [
    'name' => $model->unitname,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Units'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->unitname, 'url' => ['view', 'id' => $model->idunit]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="unit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
