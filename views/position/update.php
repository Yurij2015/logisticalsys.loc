<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Position */

$this->title = Yii::t('app', 'Update Position: {name}', [
    'name' => $model->positiontname,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->positiontname, 'url' => ['view', 'id' => $model->idposition]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="position-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
